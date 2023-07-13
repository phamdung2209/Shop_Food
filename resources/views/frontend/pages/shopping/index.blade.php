@extends('layouts.app_master_frontend')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/cart.min.css') }}">
@stop
@section('content')
    <div class="container cart">
        <div class="left">
            <div class="list">
                <div class="title">THÔNG TIN GIỎ HÀNG</div>
                <div class="list__content">
                    <table class="table">
                        <thead>
                        <tr>
                            <th style="width: 100px;"></th>
                            <th style="width: 30%">Sản phẩm</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($shopping as $key => $item)
                                <tr>
                                    <td style="vertical-align: middle;">
                                        <a href="{{ route('get.product.detail',\Str::slug($item->name).'-'.$item->id) }}"
                                            title="{{ $item->name }}" class="avatar image contain">
                                            <img alt="" src="{{ pare_url_file($item->options->image) }}" class="lazyload">
                                        </a>
                                    </td>
                                    <td style="vertical-align: middle;">
                                        <a href="{{ route('get.product.detail',\Str::slug($item->name).'-'.$item->id) }}"><strong>{{ $item->name }}</strong></a>
                                    </td>

                                    <td style="vertical-align: middle;">
                                        <p><b>{{  number_format($item->price,0,',','.') }} đ</b></p>
                                        <p>

                                            @if ($item->options->price_old)
                                                <span style="text-decoration: line-through;">{{  number_format(number_price($item->options->price_old),0,',','.') }} đ</span>
                                                <span class="sale">- {{ $item->options->sale }} %</span>
                                            @endif
                                        </p>
                                    </td>
                                    <td style="vertical-align: middle;">
                                        <div class="qty_number">
                                            <input type="number"  min="1" class="input_quantity" name="quantity_14692" value="{{  $item->qty }}" id="">
                                            <p data-price="{{ $item->price }}" data-url="{{  route('ajax_get.shopping.update', $key) }}" data-id-product="{{  $item->id }}">
                                                <span class="js-increase">+</span>
                                                <span class="js-reduction">-</span>
                                            </p>
                                            <a href="{{  route('get.shopping.delete', $key) }}" class="js-delete-item btn-action-delete"><i class="la la-trash"></i></a>
                                        </div>
                                    </td>
                                    <td style="vertical-align: middle;">
                                        <span class="js-total-item">{{ number_format($item->price * $item->qty,0,',','.') }} đ</span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <p style="float: right;margin-top: 20px;">Tổng tiền : <b id="sub-total">{{ \Cart::subtotal(0) }} đ</b></p>
                </div>
            </div>
        </div>
        <div class="right">
            <div class="customer">
                <div class="title">THÔNG TIN ĐẶT HÀNG</div>
                <div class="customer__content">
                    <form class="from_cart_register" action="{{ route('post.shopping.pay') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name" >Họ và tên <span class="cRed">(*)</span></label>
                            <input name="tst_name" id="name" required="" value="{{ get_data_user('web','name') }}" type="text" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="phone">Điện thoại <span class="cRed">(*)</span></label>
                            <input name="tst_phone" id="phone" required="" value="{{ get_data_user('web','phone') }}" type="text" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="address">Địa chỉ <span class="cRed">(*)</span></label>
                            <input name="tst_address" id="address" required="" value="{{ get_data_user('web','address') }}" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">Email <span class="cRed">(*)</span></label>
                            <input name="tst_email" id="email" required="" value="{{ get_data_user('web','email') }}" type="text" value="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="note">Ghi chú thêm</label>
                            <textarea name="tst_note" id="note" cols="3" style="min-height: 100px;" rows="2" class="form-control"></textarea>
                        </div>
                        <div class="btn-buy">
                            <button class="buy1 btn btn-purple {{ \Auth::id() ? '' : 'js-show-login' }}" type="submit">
                                Thanh toán khi nhận hàng
                            </button>
                            <button class="btn btn-purple" name="payment" value="2" type="submit">
                                <span class="">Thanh toán online</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
@section('script')
    <script src="{{ asset('js/cart.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://codeseven.github.io/toastr/build/toastr.min.js"></script>
    <script type="text/javascript">
        $(function() {
            $(".js-delete-item").click( function(event){
                event.preventDefault();
                let $this = $(this);
                let url    = $this.attr('href');

                if(url) {
                    $.ajax({
                        url: url,
                    }).done(function( results ) {
                        toastr.success(results.messages);
						$this.parents('tr').remove();
						$("#sub-total").text(results.totalMoney+ " đ");
                   });
                }
            })

            $('.js-increase').click(function (event) {
				event.preventDefault();
                let $this = $(this);
                let $input = $this.parent().prev();
                let number = parseInt($input.val());
                if (number >= 10) {
					toastr.warning("Mỗi sản phẩm chỉ được mua tối đa số lượng 10 lần / 1 lần mua");
                	return false;
                }

                let price = $this.parent().attr('data-price');
                let URL = $this.parent().attr('data-url');
                let productID = $this.parent().attr("data-id-product");

                number = number + 1;
				$.ajax({
					url: URL,
					data: {
						qty        : number,
						idProduct  : productID
					}
				}).done(function( results ) {
					if (typeof results.totalMoney !== "undefined") {
						$input.val(number);
						$("#sub-total").text(results.totalMoney+ " đ");
						toastr.success(results.messages);
						$this.parents('tr').find(".js-total-item").text(results.totalItem +' đ');
                    }else {
						$input.val(number - 1);
                    }
				});
			})

            $('.js-reduction').click(function (event) {
                let $this  = $(this);
                let $input = $this.parent().prev();
                let number = parseInt($input.val());
                if (number <= 1) {
					toastr.warning("Số lượng sản phẩm phải >= 1");
                	return false;
                }

				let URL       = $this.parent().attr('data-url');
				let productID = $this.parent().attr("data-id-product");


				number = number - 1;
				$.ajax({
					url: URL,
					data: {
						qty        : number,
						idProduct  : productID
					}
				}).done(function( results ) {
					if (typeof results.totalMoney !== "undefined") {
						$input.val(number);
						$("#sub-total").text(results.totalMoney+ " đ");
						toastr.success(results.messages);
						$this.parents('tr').find(".js-total-item").text(results.totalItem +' đ');
					}else {
						$input.val(number + 1);
					}
				});
			})
        })
    </script>
@stop
