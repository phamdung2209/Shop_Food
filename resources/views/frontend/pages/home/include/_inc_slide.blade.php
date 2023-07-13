<div id="slider">
    <div class="imageSlide js-banner owl-carousel">
        @foreach($slides as $item)
            <div>
                <a href="{{ $item->sd_link }}" title="{{ $item->sd_title }}">
                    <img alt="Web Selling Clean Food" src="{{ pare_url_file($item->sd_image) }}"  style="max-width: 100%;height: 500px;" class="" />
                </a>
            </div>
        @endforeach
    </div>
</div>
