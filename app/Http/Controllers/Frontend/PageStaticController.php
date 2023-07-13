<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\PageStatic;

class PageStaticController extends Controller
{
    public function getShoppingGuide()
    {
        $page     = PageStatic::where('s_type', 1)->first();
        $viewData = [
            'page' => $page
        ];
        return view('frontend.pages.static.index', $viewData);
    }

    public function getReturnPolicy()
    {
        $page     = PageStatic::where('s_type', 2)->first();
        $viewData = [
            'page' => $page
        ];
        return view('frontend.pages.static.index', $viewData);
    }

    public function getCustomerCare()
    {
        $page     = PageStatic::where('s_type', 3)->first();
        $viewData = [
            'page' => $page
        ];
        return view('frontend.pages.static.index', $viewData);
    }

    public function getProductView()
    {
        $viewData = [
            'title_page' => "Sản phẩm bạn đã xem",
        ];

        return view('user.view_product', $viewData);
    }

    public function getListProductView(Request $request)
    {
        if ($request->ajax()) {
            $listID   = $request->id;
            $products = Product::whereIn('id', $listID)
                ->orderByDesc('id')
                ->select('id', 'pro_name', 'pro_slug', 'pro_sale', 'pro_avatar', 'pro_price', 'pro_review_total', 'pro_review_star')
                ->get();

            $html     = view('frontend.pages.home.include._recently', compact('products'))->render();

            return response()->json(['data' => $html]);
        }
    }

    public function getDetailDocument()
    {
        return view('document_detail');
    }

    public function getDemoViewFile()
    {
    
        $pathToFile = ('file_pdf.pdf');

        return \Response::make(file_get_contents($pathToFile), 200, [
            'Content-Type' => 'application/pdf'
        ]);
    }

    public function getDocumentAjax()
    {
        $path =  asset('file_pdf.pdf');
        $view = view('iframe', compact('path'))->render();
        return response()->json(['html' => $view]);
    }
}
