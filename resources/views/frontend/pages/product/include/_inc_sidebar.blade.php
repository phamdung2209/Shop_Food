<style type="text/css">
    .item__content .active a {
        color: red;
    }
</style>
<div class="filter-sidebar">
    {{-- <div class="item">
        <div class="item__title">Thương hiệu</div>
        <div class="item__content">
            <ul>
                <li>
                    <label>
                        <input type="checkbox" value="594">
                        <h2><span>Đồng hồ Philippe Auguste</span></h2>
                    </label>
                </li>

                <li>
                    <label>
                        <input type="checkbox" value="563">
                        <h2><span>Đồng hồ Epos Swiss</span></h2>
                    </label>
                </li>
            </ul>
        </div>
    </div> --}}
    @if (isset($country) && !empty($country))
        <div class="item">
            <div class="item__title">Xuất xứ</div>
            <div class="item__content">
                <ul>
                    @foreach($country as $key => $item)
                        <li class="{{ Request::get('country') == $item['id'] ? "active" : "" }} js-param-search" data-param="country={{ $item['id'] }}">
                            <a href="{{ request()->fullUrlWithQuery(['country'=> $item['id']]) }}">
                                <span>{{ $item['pdr_name'] }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
    @if (isset($attributes))
        @foreach($attributes as $key => $attribute)
            @if (!empty($attribute['attributes']))
                <div class="item">
                    <div class="item__title">{{ $attribute['t_name'] }}</div>
                    <div class="item__content">
                        <ul>
                            @foreach($attribute['attributes'] as $item)
                                <li class=" js-param-search {{ Request::get('attr_'.$item['atb_type_id']) == $item['id'] ? "active" : "" }}"
                                data-param="attr_{{ $item['atb_type_id'] }}={{ $item['id'] }}">
                                    <a href="{{ request()->fullUrlWithQuery(['attr_'.$item['atb_type_id'] => $item['id']]) }}">
                                        <span>{{ $item['atb_name'] }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
        @endforeach
    @endif
    <div class="item">
        <div class="item__title">Đánh giá</div>
        <div class="item__content ratings">
            <ul>
                @for ($i = 5 ; $i >0 ; $i--)
                    <li class="{{ Request::get('rv') == $i ? "active" : "" }}">
                        <a href="{{ request()->fullUrlWithQuery(['rv'=> $i]) }}">
                            <span>
                                @for($j = 1 ; $j <= 5 ; $j ++)
                                    <i class="la la-star {{ $j <= $i ? 'active' : '' }}"></i>
                                @endfor
                                {{ $i < 5 ? 'Trở lên' : '' }}
                            </span>
                        </a>
                    </li>
                @endfor
            </ul>
        </div>
    </div>
</div>
