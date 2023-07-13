<div class="blog-item">
    <div class="avatar">
        <a href="{{ route('get.blog.detail',$article->a_slug.'-'.$article->id) }}" title="{{  $article->a_name }}" class="image cover">
            <img class="lazyload lazy" alt="" src="{{  asset('images/preloader.gif') }}"  data-src="{{ pare_url_file($article->a_avatar) }}">
        </a>
    </div>
    <div class="info">
        <a href="{{ route('get.blog.detail',$article->a_slug.'-'.$article->id) }}" title="{{  $article->a_name }}"
            >{{ $article->a_name }}</a>
        <p>{{  $article->a_description }}</p>
    </div>
</div>