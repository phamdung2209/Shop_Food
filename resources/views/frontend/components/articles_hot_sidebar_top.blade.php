@if (isset($articles))
    <div class="top-question">
        <div class="title">Bài viết hot</div>
        <ul>
            @foreach($articles as $key => $item)
            <li>
                <span class="stt">{{ $key + 1 }}</span>
                <a href="{{ route('get.blog.detail',$item->a_slug.'-'.$item->id) }}">{{ $item->a_name }}</a>
            </li>
            @endforeach
        </ul>
    </div>
@endif