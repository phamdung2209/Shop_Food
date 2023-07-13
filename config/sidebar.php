<?php
return [
    [
        'name' => 'Sản phẩm',
        'list-check' => ['category', 'producer', 'type', 'attribute', 'keyword', 'product', 'discount-code'],
        'icon' => 'fa fa-database',
        'sub'  => [
            [
                'name'  => 'Danh Mục',
                'namespace' => 'category',
                'route' => 'admin.category.index',
                'icon'  => 'fa fa-edit'
            ],
            [
                'name'  => 'Nhà sản xuất',
                'namespace' => 'producer',
                'route' => 'admin.producer.index',
                'icon'  => 'fa fa-truck'
            ],
//            [
//                'name'  => 'Kiểu dữ liệu',
//                'namespace' => 'type',
//                'route' => 'admin.type.index',
//                'icon'  => 'fa fa-bookmark'
//            ],
            // [
            //     'name'  => 'Dữ liệu sản phẩm',
            //     'namespace' => 'attribute',
            //     'route' => 'admin.attribute.index',
            //     'icon'  => 'fa fa-key'
            // ],
            [
                'name'  => 'Keyword',
                'namespace' => 'keyword',
                'route' => 'admin.keyword.index',
                'icon'  => 'fa fa-key'
            ],
            [
                'name'  => 'Sản phẩm',
                'namespace' => 'product',
                'route' => 'admin.product.index',
                'icon'  => 'fa fa-database'
            ],
            [
                'name'  => 'Mã giảm giá',
                'namespace' => 'discount-code',
                'route' => 'admin.discount.code.index',
                'icon'  => 'fa fa-fw fa-arrow-circle-down'
            ],
        ]
    ],
    [
        'name' => 'Bài viết',
        'list-check' => ['menu','article'],
        'icon' => 'fa fa-edit',
        'sub'  => [
            [
                'name'  => 'Danh mục',
                'namespace' => 'menu',
                'route' => 'admin.menu.index',
                'icon'  => 'fa fa-key'
            ],
            [
                'name'  => 'Bài viết',
                'namespace' => 'article',
                'route' => 'admin.article.index',
                'icon'  => 'fa fa-key'
            ],
        ]
    ],
    [
        'name' => 'Tài khoản',
        'list-check' => ['user','rating','comment','contact'],
        'icon' => 'fa fa-user',
        'sub'  => [
            [
                'name'  => 'Người dùng',
                'route' => 'admin.user.index',
                'namespace' => 'user',
                'icon'  => 'fa fa-user'
            ],
            [
                'name'  => 'Đánh giá',
                'namespace' => 'rating',
                'route' => 'admin.rating.index',
                'icon'  => 'fa fa-star'
            ],
            [
                'name'  => 'Bình luận',
                'namespace' => 'comment',
                'route' => 'admin.comment.index',
                'icon'  => 'fa fa-star'
            ],
            [
                'name'  => 'Liên hệ',
                'namespace' => 'contact',
                'route' => 'admin.contact',
                'icon'  => 'fa fa-star'
            ],
        ]
    ],
    [
        'name' => 'Giao dịch',
        'list-check' => ['transaction'],
        'icon' => 'fa-shopping-cart',
        'sub'  => [
            [
                'name'  => 'Danh sách',
                'namespace' => 'transaction',
                'route' => 'admin.transaction.index',
                'icon'  => 'fa-opencart'
            ]
        ]
    ],
    [
        'name'  => 'System',
        'label' => 'true'
    ]
];
