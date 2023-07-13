@if (isset($product->keywords))
    <div class="infomation" style="margin-top: 20px;">
        <h2 class="infomation__title">Keyword</h2>
        <div class="infomation__group">
            <div class="item">
                @foreach($product->keywords as $keyword)
                    <a href=""
                       style="border: 1px solid #E91E63;display: inline-block;font-size: 13px;padding: 0 5px;border-radius: 5px;margin-right: 10px;color: #E91E63;">{{ $keyword->k_name }}</a>
                @endforeach
            </div>
        </div>
    </div>
@endif
