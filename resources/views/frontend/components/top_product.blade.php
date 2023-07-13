<div class="best-sell">
    <div class="title">Top bán chạy nhất</div>
    <div class="content">
        @foreach($products as $product)
            <div class="item">
                <div class="item__avatar">
                    <a href="{{ route('get.product.detail',$product->pro_slug . '-'.$product->id ) }}" title="" class="image cover">
                        <img  class="lazyload lazy" src="{{  asset('images/preloader.gif') }}"  alt="Đồng hồ Diamond D" data-src="{{ pare_url_file($product->pro_avatar) }}">
                    </a>
                </div>
                <div class="item__info">
                    <a href="#" title="Đồng hồ Diamond D" class="cate">{{ $product->category->c_name ?? "[N\A]" }}</a>
                    @if ($product->pro_sale)
                        <a href="" title="SaleOff" class="cate sale">-{{ $product->pro_sale }}%</a>
                    @endif
                    <a href="{{ route('get.product.detail',$product->pro_slug . '-'.$product->id ) }}" title="Đồng hồ Diamond D DD6014B" class="name">{{  $product->pro_name }}</a>
                    @if ($product->pro_sale) 
                        <p class="price">
                            <span>Giá bán: </span>
                            <span class="new">{{ number_format(number_price($product->pro_price,$product->pro_sale),0,',','.') }} đ</span>
                        </p>
                        <p class="price">
                            <span>Giá gốc: </span>
                            <span class="old">{{  number_format($product->pro_price,0,',','.') }} đ</span>
                        </p>
                    @else 
                        <p class="price">
                            <span>Giá bán: </span>
                            <span class="new">{{  number_format($product->pro_price,0,',','.') }} đ</span>
                        </p>
                    @endif
                    
                </div>
            </div>
        @endforeach
    </div>
</div>