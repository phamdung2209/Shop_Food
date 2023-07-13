<!DOCTYPE html>
<html lang="vi">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <title>{{ strtolower($title_page ?? "Web Selling Clean Food")   }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" sizes="32x32" type="image/png" href="https://organicfood.vn/image/catalog/organicfood.com_shortcut.gif" />
    @yield('css')

    {{-- Thông báo --}}
    @if(session('toastr'))
        <script>
			var TYPE_MESSAGE = "{{session('toastr.type')}}";
			var MESSAGE = "{{session('toastr.message')}}";
        </script>
    @endif
</head>
<body>
@include('frontend.components.header')
<div class="container user">
    <div class="left">
        <div class="header">
            <img src="{{ pare_url_file(Auth::user()->avatar) }}" alt="">
            <p>
                <span>Tài khoản của</span>
                <span>{{ Auth::user()->name }}</span>
            </p>
        </div>
        <p>Đăng nhập lần cuối <b>{{ get_time_login(Auth::user()->log_login)['time'] ?? "" }}</b></p>
        <div class="content">
            <ul class="left-nav">
                @foreach(config('user') as $item)
                    <li>
                        <a href="{{ route($item['route']) }}" class="{{ \Request::route()->getName() == $item['route'] ? 'active' : '' }}">
                            <i class="{{ $item['icon'] }}"></i>
                            <span>{{ $item['name'] }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="right">
        @yield('content')
    </div>
    <div class="" style="clear: both"></div>
</div>
@include('frontend.components.footer')
<script>
	var DEVICE = '{{  device_agent() }}'
</script>
<script src="{{ asset('js/cart.js') }}" type="text/javascript"></script>

@yield('script')
</body>
</html>
