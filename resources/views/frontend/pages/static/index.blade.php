@extends('layouts.app_master_frontend')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/blog_detail.min.css') }}">
@stop
@section('content')
    <div class="container">
        <div class="breadcrumb">
            <ul>
                <li >
                    <a href="/" title="Home"><span itemprop="title">Trang chủ</span></a>
                </li>
                
                <li >
                    <a href="javascript://" title="Đồng hồ chính hãng"><span itemprop="title">{{  $page->s_title ?? '' }}</span></a>
                </li>
            </ul>
        </div>
        <div class="blog-main" style="margin-bottom: 20px;">
            <div class="left">
                <div class="post-detail">
                    <div class="post-detail__content">
                        {!! $page->s_content ?? '' !!}
                    </div>

                </div>
            </div>
            <div class="right">
                {{-- @include('frontend.components.articles_hot_sidebar_top',['articles' => $articlesHotSidebarTop])
                @include('frontend.components.top_product',['products' => $productTopPay])
                @include('frontend.components.hot_article',['articles'  => $articlesHot]) --}}
            </div>
        </div>
    </div>
@stop
@section('script')
    <script src="{{ asset('js/blog_detail.js') }}" type="text/javascript"></script>
@stop