<div class="item">
    <p class="item-auth"><span>{{ get_name_short($comment->user->name ?? "[N\A]") }}</span><span>{{ $comment->user->name ?? "[N\A]" }}</span></p>
    <p class="item-content">{{ $comment->cmt_content }}</p>
    <p class="item-footer">
        <a href="" class="js-show-form-reply" data-name="{{ $comment->user->name ?? "[N\A]" }}"
           data-id="{{ $comment->cmt_parent_id ? $comment->cmt_parent_id : $comment->id }}" data-product="{{ $comment->cmt_product_id }}">Trả lời</a>
        <span>-</span>
        <a href="">{{ $comment->created_at->diffForHumans() }}</a>
    </p>
</div>
