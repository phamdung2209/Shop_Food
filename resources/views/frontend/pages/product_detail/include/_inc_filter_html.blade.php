<div class="filter">
    <div>Lọc theo :</div>
    <div>
        <ul>
            <li><a href="" class="active">Tất cả</a></li>
            @for ($i = 5 ; $i >= 1 ; $i --)
                <li><a href="" >{{ $i }} sao</a></li>
            @endfor
        </ul>
    </div>
</div>