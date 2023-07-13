<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Producer;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Slide;
use App\Models\Event;
use Illuminate\Support\Facades\Log;

class HomeController extends FrontendController
{
    public function index()
    {
        // return view("emails.email_success_transaction");
        // Sản phẩm mới
        $productsNew = Product::where('pro_active',1)
            ->orderByDesc('id')
            ->limit(4)
            ->select('id','pro_name','pro_slug','pro_sale','pro_avatar','pro_price','pro_review_total','pro_review_star')
            ->get();

        //Sản phẩm hót
        $productsHot = Product::where([
                'pro_active' => 1,
                'pro_hot'    => 1
            ])
            ->orderByDesc('id')
            ->limit(5)
            ->select('id','pro_name','pro_slug','pro_sale','pro_avatar','pro_price','pro_review_total','pro_review_star')
            ->get();

        //Sản phẩm mua nhiều
        $productsPay = Product::where([
                'pro_active' => 1,
            ])
            ->where('pro_pay','>=',0)
            ->orderByDesc('pro_pay')
            ->limit(10)
            ->select('id','pro_name','pro_slug','pro_sale','pro_avatar','pro_price','pro_review_total','pro_review_star')
            ->get();

        // Lấy event hiển thị đầu
        $event1 = Event::where('e_position_1', 1)
            ->first();

        // Lấy event hiển thị 2
        $event2 = Event::where('e_position_2', 1)
            ->first();

            // Lấy event hiển thị 2
        $event3 = Event::where('e_position_3', 1)
            ->first();

        // Sản phẩm thuộc danh mục hot
        $categoriesHot = Category::where([
            'c_hot'      => 1,
            'c_status'   => 1
        ])->get()->toArray();

        if (!empty($categoriesHot)) {
            foreach ($categoriesHot as $key => $cate) {
                if ($cate['c_parent_id'] == 0) {
                    $cateCh = Category::where('c_parent_id', $cate['id'])->pluck('id');
                    $product = Product::whereIn('pro_category_id', $cateCh)->orWhere('pro_category_id', $cate['id'])->orderByDesc('id')->get();
                } else {
                    $product = Product::where('pro_category_id', $cate['id'])->orderByDesc('id')->get();
                }
                $categoriesHot[$key]['products'] = $product;
            }

        }

        $articlesHot = Article::where([
            'a_active' => 1,
            'a_hot'    => 1
        ])
            ->select('id','a_name','a_slug','a_description','a_avatar','created_at')
            ->orderByDesc('id')
            ->limit(4)
            ->get();

        $viewData = [
            'productsNew'   => $productsNew,
            'productsHot'   => $productsHot,
            'productsPay'   => $productsPay,
            'event1'        => $event1,
            'event2'        => $event2,
            'event3'        => $event3,
            'title_page'    => "Web Selling Clean Food",
            'categoriesHot' => $categoriesHot,
            'articlesHot'   => $articlesHot
        ];

        return view('frontend.pages.home.index', $viewData);
    }

    public function getLoadProductRecently(Request $request)
    {
        if ($request->ajax()) {
            $listID = $request->id;
            $products = Product::whereIn('id',$listID)
                ->orderByDesc('id')
                ->limit(5)
                ->select('id','pro_name','pro_slug','pro_sale','pro_avatar','pro_price','pro_review_total','pro_review_star')
                ->get();
            $html = view('frontend.pages.home.include._recently',compact('products'))->render();

            return response()->json(['data' => $html]);
        }
    }

    protected function loadSlideHome(Request $request)
    {
        // Lấy slide trang chủ
        $slides = Slide::where('sd_active',1)
            ->orderBy('sd_sort','asc')
            ->get();

        $html = view('frontend.pages.home.include._inc_slide',compact('slides'))->render();
        return response()->json(['data' => $html]);
    }
}
