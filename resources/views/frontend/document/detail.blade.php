@extends('layouts.app_master_frontend')
@section('css')
    <style>
        <?php $style = file_get_contents('css/document.css');echo $style;?>
    </style>
@stop
@section('content')
    <div class="container">
        <div class="breadcrumb">
            <ul>
                <li>
                    <a itemprop="url" href="/" title="Home"><span itemprop="title">Trang chủ</span></a>
                </li>
                <li>
                    <a itemprop="url" href="{{ route('get.document.list') }}" title="Tài liệu"><span
                            itemprop="title">Tài liệu</span></a>
                </li>

                <li>
                    <a itemprop="url" href="" title="CHUYÊN ĐỀ ĐẶC BIỆT VỀ KHOẢNG CÁCH TRONG KHÔNG GIAN"><span itemprop="title">CHUYÊN ĐỀ ĐẶC BIỆT VỀ KHOẢNG CÁCH TRONG KHÔNG GIAN</span></a>
                </li>

            </ul>
        </div>
        <div class="documents-detail">
            <div class="left">
                <h1>Chuyên đề đặc biệt về KHOẢNG CÁCH trong không gian <img src="{{ asset('images/icon/pdf.png') }}" alt=""></h1>
                <div class="header">
                    <div class="auth">
                        <a href="" class="image">
                            <img src="{{ asset('images/no-image.jpg') }}" alt="">
                        </a>
                        <p class="info">
                            <span>Siêu Thị Của Chúng Tôi</span>
                            <span>120 Tài liệu</span>
                        </p>
                    </div>
                    <div class="action">
                        <a href="" class="btn btn-pink">Download <span>120</span></a>
                    </div>
                </div>
                <div class="content" id="content-document">
                    <div class="sk-circle">
                        <div class="sk-circle1 sk-child"></div>
                        <div class="sk-circle2 sk-child"></div>
                        <div class="sk-circle3 sk-child"></div>
                        <div class="sk-circle4 sk-child"></div>
                        <div class="sk-circle5 sk-child"></div>
                        <div class="sk-circle6 sk-child"></div>
                        <div class="sk-circle7 sk-child"></div>
                        <div class="sk-circle8 sk-child"></div>
                        <div class="sk-circle9 sk-child"></div>
                        <div class="sk-circle10 sk-child"></div>
                        <div class="sk-circle11 sk-child"></div>
                        <div class="sk-circle12 sk-child"></div>
                    </div>
                </div>
                <div class="documents">
                    <h3>Tài liệu gợi ý cho bạn</h3>
                    <div class="list">
                        @for ($i = 1 ; $i <= 12 ; $i ++)
                        <div class="item" style="width: 25%;max-width: 25%">
                            <div class="box">
                                <a href="{{ route('get.static.document_detail') }}" class="image">
                                    <img src="{{ asset('images/document.jpg') }}" alt="">
                                </a>
                                <h4>
                                    <a href="">Luyện tập: Giải bài toán bằng cách lập phương trình</a>
                                </h4>
                                <a href="" class="auth">Trung Phú NA</a>
                                <p class="footer">
                                    <a href=""><i class="fa fa-file-text-o"></i> 10</a>
                                    <a href=""><i class="fa fa-eye"></i> 100</a>
                                    <a href=""><i class="fa fa-download"></i> 50</a>
                                </p>
                            </div>
                        </div>
                        @endfor
                    </div>
                </div>
            </div>
            <div class="right">
                <div class="box-content">
                    <h4>Top download</h4>
                    @for ($i = 1 ; $i <= 5 ; $i ++)
                        <div class="item">
                            <div class="number"><span>{{ $i }}</span></div>
                            <div class="content">
                                <a href="">
                                    <img src="{{ asset('images/icon/pdf.png') }}" alt="" />
                                    Bài giảng điện tử công nghệ: cơ cấu phân phối khí docx
                                </a>
                                <p class="footer">
                                    <a href=""><i class="fa fa-file-text-o"></i> 10</a>
                                    <a href=""><i class="fa fa-eye"></i> 100</a>
                                    <a href=""><i class="fa fa-download"></i> 50</a>
                                </p>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
@stop
@section('script')
    <script type="text/javascript">
        var URL_LOAD_DOCUMENT = '{{  route('get_ajax.static.document') }}'
        <?php $js = file_get_contents('js/document.js');echo $js;?>
    </script>
     
@stop
