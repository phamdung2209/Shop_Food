<div class="reviews content_text">
    <h4 class="reviews-title"><b>{{ $product->pro_review_total }}</b> đánh giá sản phẩm</h4>
    <div class="dashboards">
        <div class="item dashboards_sum">
            @php
                $age = 0;
                if ($product->pro_review_total)
                    $age = round($product->pro_review_star / $product->pro_review_total,2);
            @endphp
            <span> {{ $age }} <i class="la la-star"></i></span>
        </div>
        <div class="item dashboards_item">
            @foreach($ratingDefault as $key => $item)
                <div class="item_review">
                    <span class="item_review-name">{{ $key }} <i class="la la-star"></i></span>
                    <div class="item_review-process">
                        <div>
                            @php 
                                $ageItem = 0;
                                if ($product->pro_review_total)
                                    $ageItem = ($item['count_number'] / $product->pro_review_total) * 100 ;
                            @endphp
                            <span style="width: {{ $ageItem }}%;"> </span>
                        </div>
                    </div>
                    <span class="item_review-count"><b>{{ $item['count_number']  }}</b> đánh giá</span>
                </div>
            @endforeach
        </div>
        <div class="item dashboards_btn">
            <a href="javascript:;void(0)" title="Gửi đánh giá"
               class="btn btn-success {{ \Auth::id() ? 'js-review' : 'js-show-login' }}">Gửi đánh giá</a>
        </div>
    </div>
    @if (\Request::route()->getName() == 'get.product.rating_list')
        @include('frontend.pages.product_detail.include._inc_filter')
    @endif

    <div class="block-reviews" id="block-review">
        <form action="{{ route('ajax_post.user.rating.add') }}" id="form-review" method="POST">
            @csrf
            <div>
                <p style="margin-bottom: 0">
                    <span>Chọn đánh giá của bạn</span>
                    <span id="ratings">
                        @for ($i =1 ; $i <= 5 ; $i ++)
                            <i class="la la-star active" data-i="{{ $i }}"></i>
                        @endfor
                    </span>
                    <span class="reviews-text" id="reviews-text">Tuyệt vời</span>
                </p>
                <span style="color: red;margin-bottom: 10px;display: block">(Click vào ngôi sao để đánh giá)</span>
            </div>
            <div>
                <textarea name="content_review"  id="rv_content" cols="30" rows="5" placeholder="Nhập đánh giá sản phẩm (Tối thiểu 80 ký tự )"></textarea>
                <input type="hidden" name="review" id="review_value" value="5">
                <input type="hidden" name="product_id"  value="{{ $product->id }}">
            </div>
            <button type="submit" style="font-size: 14px;margin-top: 10px" class="btn btn-success js-process-review">Gửi đánh giá</button>
        </form>
    </div>
    <div class="reviews_list">
        @include('frontend.pages.product_detail.include._inc_list_reviews')
        {{-- {!! $reviews->links('vendor.pagination.simple-default') !!} --}}
    </div>
</div>