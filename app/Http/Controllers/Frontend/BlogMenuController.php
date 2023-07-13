<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Menu;

class BlogMenuController extends BlogBaseController
{
    public function getArticleByMenu(Request $request, $slug)
    {
        $arraySlug = explode('-', $slug);
        $id = array_pop($arraySlug);
        if ($id) {
            //  Danh sách bài viết
            $articles = Article::where([
                'a_active'  => 1,
                'a_menu_id' => $id
            ])
            ->select('id','a_name','a_slug','a_description','a_avatar')
            ->orderByDesc('id')
            ->paginate(10);

            $menu = Menu::find($id);

            $viewData = [
                'articles'              => $articles,
                'menu'                  => $menu,
                'articlesHotSidebarTop' => $this->getArticleTopSidebar(),
                'articlesHot'           => $this->getArticleHot(),
                'productTopPay'         => $this->getProductTop(),
                'title_page'            => $menu->mn_name
            ];

            return view('frontend.pages.article.index', $viewData);
        }

        return redirect()->to('/');
    }
}
