@foreach($ratings as $item)
    <div class="item">
        <p class="item_author">
            <span>{{ $item->user->name ?? "[N\A]" }}</span>
            <span class="item_success"><i class="la la-check-circle"></i> Đã đánh giá sản phẩm tại Siêu Thị Của Chúng Tôi</span>
        </p>
        <div class="item_review">
            <span class="item_review">
                @for ($j = 1 ; $j <= 5 ; $j ++)
                    <i class="la la-star {{ $j <= $item->r_number ? 'active' : '' }}"></i>
                @endfor
            </span>
            {{ $item->r_content }}
        </div>
        <div class="item_footer">
            <span class="item_time"><i class="la la-clock-o"></i> đánh giá {{  $item->created_at }}</span>
        </div>
    </div>
@endforeach
@if (\Request::route()->getName() == 'get.product.rating_list')
    <div>
        {!! $ratings->appends($query ?? [])->links() !!}
    </div>
@else 
    <a href="{{  route('get.product.rating_list',$product->pro_slug . '-'.$product->id ) }}" class="btn-load-rating">Xem tất cả đánh giá <i class="la la-angle-right"></i></a>
@endif