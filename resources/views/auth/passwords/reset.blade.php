@extends('layouts.app_master_frontend')
@section('css')
    <style>
		<?php $style = file_get_contents('css/auth.min.css');echo $style;?>
    </style>
@stop
@section('content')
    <div class="container">
        <div class="breadcrumb">
            <ul>
                <li itemscope="" >
                    <a itemprop="url" href="/" title="Home"><span itemprop="title">Trang chủ</span></a>
                </li>
                <li itemscope="" >
                    <a itemprop="url" href="" title=""><span itemprop="title">Tài khoản</span></a>
                </li>

                <li itemscope="" >
                    <a itemprop="url" href="" title=""><span itemprop="title">Quên mật khẩu</span></a>
                </li>

            </ul>
        </div>
        <div class="auth" style="background: white;">
            <form class="from_cart_register" action="" method="post" style="width: 500px;margin:0 auto;padding: 30px 0">
                @csrf
                <div class="form-group">
                    <label for="name">Mật khẩu mới <span class="cRed">(*)</span></label>
                    <input name="password"   type="password" class="form-control" placeholder="********">
                    @if ($errors->first('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="name">Xác nhận mật khẩu <span class="cRed">(*)</span></label>
                    <input name="password_confirm"  type="password" class="form-control" placeholder="********">
                    @if ($errors->first('password_confirm'))
                        <span class="text-danger">{{ $errors->first('password_confirm') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <button class="btn btn-purple btn-xs">Đổi mật khẩu mới</button>
                </div>
            </form>
        </div>
    </div>
@endsection
