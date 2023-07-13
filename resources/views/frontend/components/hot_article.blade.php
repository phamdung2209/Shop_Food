<div class="blog-top">
    <div class="title"> Bài viết nổi bật</div>
    {{-- <div class="top">
        <div class="top__avatar">
            <a href="" title="" class="image cover">
                <img data-src="" class="lazyload" alt="" src="{{ url('images/banner/dongho.jpg') }}">
            </a>
        </div>
        <a href="" title="" class="top__title">DDây là tiêu đề bài viết</a>
    </div> --}}
    <div class="bot">
        @foreach($articles as $article)
            <div class="item">
                <a href="{{ route('get.blog.detail',$article->a_slug.'-'.$article->id) }}" title="{{  $article->a_name }}" class="image cover">
                    <img  class="lazyload lazy" src="{{  asset('images/preloader.gif') }}"  alt="{{  $article->a_name }}" data-src="{{ pare_url_file($article->a_avatar) }}">
                    <p>{{  $article->a_name }}</p>
                </a>
            </div>
        @endforeach
    </div>
</div>