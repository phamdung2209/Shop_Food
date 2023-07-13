<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rating;
use App\Models\Product;
class AdminRatingController extends Controller
{
    public function index()
    {
        $ratings = Rating::with('product:id,pro_name,pro_slug','user:id,name')
        ->orderByDesc('id')
        ->paginate(10);

        return view('admin.rating.index',compact('ratings'));
    }

    public function delete($id)
    {
        $rating = Rating::find(($id));
        if ($rating) {
            $product =  Product::find($rating->r_product_id);
            $product->pro_review_total --;
            $product->pro_review_star -= $rating->r_number;
            $product->save();
            $rating->delete();
        }

        return redirect()->back();
    }
}
