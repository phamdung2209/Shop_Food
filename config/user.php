<?php
return [
    [
        'name'  => 'Thông tin tài khoản',
        'route' => 'get.user.update_info',
        'icon'  => 'fa fa-user'
    ],
    [
        'name'  => 'Quản lý đơn hàng',
        'route' => 'get.user.transaction',
        'icon'  => 'fa fa-address-book-o'
    ],
    [
        'name'  => 'Sản phẩm yêu thích',
        'route' => 'get.user.favourite',
        'icon'  => 'fa fa-heart-o'
    ],
//    [
//        'name'  => 'Sản phẩm đã đánh giá',
//        'route' => 'get.user.rating',
//        'icon'  => 'fa fa-star'
//    ],
//    [
//        'name'  => 'Quản lý comments',
//        'route' => 'get.user.rating',
//        'icon'  => 'fa fa-comments'
//    ],
    [
        'name'  => 'Sản phẩm bạn đã xem',
        'route' => 'get.static.product_view',
        'icon'  => 'fa fa-eye'
    ],
    [
        'name'  => 'Log Login',
        'route' => 'get.user.log_login',
        'icon'  => 'fa fa-bug'
    ],
];
