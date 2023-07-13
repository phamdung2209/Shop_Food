@extends('layouts.app_master_frontend')
@section('css')
    <style>
		<?php $style = file_get_contents('css/ratings_insights.min.css');echo $style;?>
    </style>
@stop
@section('content')
    <div class="container">
        <div class="breadcrumb">
            <ul>
                <li >
                    <a itemprop="url" href="/" title="Home"><span itemprop="title">Trang chủ</span></a>
                </li>
                <li >
                    <a itemprop="url" href="{{ route('get.product.list') }}" title="Đồng hồ chính hãng"><span itemprop="title">Danh sách đánh giá</span></a>
                </li>
            </ul>
        </div>
        <div class="card">
            @include('frontend.pages.product_detail.include._inc_ratings')
        </div>
    </div>
@stop
@section('script')
    <script>
		var CSS = "{{ asset('css/ratings.min.css') }}";
    </script>
    <script src="{{ asset('js/product_detail.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(function(){
            $("body").on("click",".pagination a", function(e){
                e.preventDefault();
                let URL = $(this).attr('href');
                $("body .js-number-rating").removeClass('active');
                $(this).addClass('active');
                getListRatings(URL);
            });

            function getListRatings(URL)
            {
                $.ajax({
                    type: "GET",
                    url: URL,
                    success: function (results) { 
                        $(".reviews_list").html(results.html)
                    }
                })
            }

            $("body").on("click",".js-number-rating", function (e) {
				e.preventDefault();
				let URL = $(this).attr('href');
				$("body .js-number-rating").removeClass('active');
				$(this).addClass('active');
				getListRatings(URL);
			})
        })

    </script>
@stop
