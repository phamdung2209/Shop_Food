<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attribute;
use App\Models\Product;
use App\Models\Producer;

class ProductController extends FrontendController
{
    public function index(Request $request)
    {
        $paramAtbSearch =  $request->except('price','page','k','country','rv','sort');

        $paramAtbSearch =  array_values($paramAtbSearch);

        $products       = Product::where('pro_active',1);

        if (!empty($paramAtbSearch)) {
            $products->whereHas('attributes', function($query) use($paramAtbSearch){
                $query->whereIn('pa_attribute_id', $paramAtbSearch);
            });
        }

        if ($name = $request->k) $products->where('pro_name','like','%'.$name.'%');
        if ($country = $request->country) $products->where('pro_country',$country);

        if ($request->price) {
            $price =  $request->price;
            if ($price == 6) {
                $products->where('pro_price','>', 10000000);
            }else{
                $products->where('pro_price','<=', 1000000 * $price);
            }
        }

        if ($request->k) $products->where('pro_name','like','%'.$request->k.'%');
        if ($request->rv) $products->where('pro_review_star','>',$request->rv);
        if ($request->sort) $products->orderBy('id',$request->sort);

        $products =  $products->where('pro_active', 1);
        $producerId = $products->where('pro_active', 1)->distinct()->pluck('pro_country');
        $products = $products ->select('id','pro_name','pro_slug','pro_sale','pro_avatar','pro_price','pro_review_total','pro_review_star')->paginate(12);
        $attributes =  $this->syncAttributeGroup();

        $viewData = [
            'attributes'    => $attributes,
            'products'      => $products,
            'query'         => $request->query(),
            'country'       => Producer::whereIn('id', $producerId)->get()->toArray(),
            'link_search'   => request()->fullUrlWithQuery(['k' => \Request::get('k')])
        ];

        return view('frontend.pages.product.index', $viewData);
    }
}
