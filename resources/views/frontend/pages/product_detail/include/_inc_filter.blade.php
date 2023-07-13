<div class="filter">
    <div>Lọc theo :</div>
    <div>
        <ul>
            <li class="">
                <a href="{{  route('get.product.rating_list',$product->pro_slug . '-'.$product->id ) }}"
                   class="{{ Request::get('s') ? '' : 'active' }} js-number-rating">Tất cả</a></li>
            @for ($i = 5 ; $i >= 1 ; $i --)
                <li><a class="{{ Request::get('s') == $i ? 'active' : '' }} js-number-rating"
                    href="{{ request()->fullUrlWithQuery(['s'=> $i]) }}" >{{ $i }} sao</a></li>
            @endfor
        </ul>
    </div>
</div>
