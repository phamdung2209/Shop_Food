<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controller\Frontend;
use Illuminate\Http\Request;
use App\Models\Article;

class BlogController extends BlogBaseController
{
    public function index()
    {

        //  Danh sách bài viết
        $articles = Article::where([
            'a_active' => 1
        ])
        ->select('id','a_name','a_slug','a_description','a_avatar')
        ->orderByDesc('id')
        ->paginate(10);


        //Bài viết nổi bật trung tâm
        $articlesHotTop = Article::where([
            'a_active'     => 1,
            'a_position_1' => 1
        ])
        ->select('id','a_name','a_slug','a_description','a_avatar')
        ->orderByDesc('id')
        ->limit(5)
        ->get();



        $viewData = [
            'articles'              => $articles,
            'articlesHot'           => $this->getArticleHot(),
            'articlesHotSidebarTop' => $this->getArticleTopSidebar(),
            'productTopPay'         => $this->getProductTop(),
            'articlesHotTop'        => $articlesHotTop
        ];

        return view('frontend.pages.article.index', $viewData);
    }
}
