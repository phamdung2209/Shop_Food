@extends('layouts.app_master_frontend')
@section('css')
    <style>
		<?php $style = file_get_contents('css/product_insights.min.css');echo $style;?>
        .filter-tab .active a {
            color: red;
        }
    </style>
@stop
@section('content')
    <div class="container">
        <div class="product-list">
            <div class="left">
                @include('frontend.pages.product.include._inc_sidebar')
            </div>
            <div class="right">
                <div class="breadcrumb">
                    <ul>
                        <li >
                            <a itemprop="url" href="/" title="Home"><span itemprop="title">Trang chủ</span></a>
                        </li>
                    </ul>
                </div>
                <div class="filter-tab">

                </div>
                {{-- {{  dd($products) }} --}}
                <div class="order-tab">
                    <span class="total-prod">Tổng số: {{ $products->total() }} sản phẩm Tính năng</span>
                    <div class="sort">
                        <div class="item">
                            <span class="title js-show-sort">Sắp xếp <i class="fa fa-caret-down"></i></span>
                            <ul>
                                <li><a class="{{ Request::get('sort') == 'desc' ? "active" : "" }}" href="{{ request()->fullUrlWithQuery(['sort'=> 'desc']) }}">Mới nhất</a></li>
                                <li><a class="{{ Request::get('sort') == 'asc' ? "active" : "" }}" href="{{ request()->fullUrlWithQuery(['sort'=> 'asc']) }}">Cũ nhất</a></li>
                            </ul>
                        </div>

                    </div>
                </div>
                 <div class="col-md-4">

                                    <form>
                                        @csrf

                                    <select name="sort" id="sort" class="form-control">
                                        <option value="{{Request::url()}}?sort=desc">--Lọc theo--</option>
                                        <option value="{{Request::url()}}?sort_by=asc">--Giá tăng dần--</option>
                                        <option value="{{Request::url()}}?sort_by=desc">--Giá giảm dần--</option>
                                        <option value="{{Request::url()}}?sort_name=asc">Lọc theo tên A đến Z</option>
                                        <option value="{{Request::url()}}?sort_name=desc">Lọc theo tên Z đến A</option>
                                    </select>

                                    </form>
                               
                            </div>
                <div class="group">
                    @foreach($products as $product)
                        @include('frontend.components.product_item', ['product' => $product])
                    @endforeach
                </div>
                <div style="display: block;">
                    {!! $products->appends($query ?? [])->links() !!}
                </div>
            </div>
        </div>
    </div>
@stop
@section('script')
    <script>
		var CSS = "{{ asset('css/product_search.min.css') }}";
    </script>
    <script type="text/javascript">
		<?php $js = file_get_contents('js/product_search.js');echo $js;?>
    </script>
@stop
