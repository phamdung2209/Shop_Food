<div class="lists" id="list-comment">
    @foreach($comments as $comment)
        <div class="item">
            <p class="item-auth">
                <span>{{ get_name_short($comment->user->name ?? '') }}</span>
                <span>{{ $comment->user->name ?? '' }}</span>
            </p>
            <p class="item-content">{{ $comment->cmt_content }}</p>
            <p class="item-footer">
                <a href="" class="js-show-form-reply" data-id="{{ $comment->id }}"
                   data-product="{{ $comment->cmt_product_id }}" data-name="{{ $comment->user->name ?? "[N\A]" }}">Trả lời</a>
                <span>-</span>
                <a href="">{{ $comment->created_at->diffForHumans() }}</a>
            </p>
            @if (isset($comment->reply) && count($comment->reply))
                <div class="comments-reply">
                    @foreach($comment->reply as $item)
                        <div class="item">
                            <p class="item-auth">
                                <span>{{ get_name_short($item->user->name ?? '') }}</span>
                                <span>{{ $item->user->name ?? '' }}</span>
                            </p>
                            <p class="item-content">{{ $item->cmt_content }}</p>
                            <p class="item-footer">
                                <a href="" class="js-show-form-reply" data-name="{{ $item->user->name ?? "[N\A]" }}"
                                   data-id="{{ $comment->id }}" data-product="{{ $item->cmt_product_id }}">Trả lời</a>
                                <a href=""><i class="la la-thumbs-up"></i>Hài lòng</a>
                                <a href=""><i class="la la-thumbs-down"></i>Không hài lòng</a>
                                <a href="">{{ $item->created_at->diffForHumans() }}</a>
                            </p>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    @endforeach
    <div>
        {!! $comments->appends($query ?? [])->links() !!}
    </div>
</div>
