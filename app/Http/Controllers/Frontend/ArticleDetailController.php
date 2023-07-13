<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controller\Frontend;
use Illuminate\Http\Request;
use App\Models\Article;

class ArticleDetailController extends BlogBaseController
{
    public function index(Request $request, $slug)
    {
        $arraySlug = explode('-', $slug);
        $id = array_pop($arraySlug);
        if ($id) {
            $article = Article::find($id);
            $articleSuggest = Article::where("a_menu_id",$article->id)
                ->select('id','a_name','a_slug')
                ->limit(10)
                ->orderByDesc('id')
                ->get();

            $viewData = [
                'article'               => $article,
                'articleSuggest'        => $articleSuggest,
                'articlesHotSidebarTop' => $this->getArticleTopSidebar(),
                'articlesHot'           => $this->getArticleHot(),
                'productTopPay'         => $this->getProductTop(),
                'title_page'            => $article->a_name
            ];

            return view('frontend.pages.article_detail.index', $viewData);
        }

        return redirect()->to('/');
        
    }
}
