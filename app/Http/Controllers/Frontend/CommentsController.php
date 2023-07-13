<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Comments;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CommentsController extends Controller
{
    public function store(Request $request)
    {
        if ($request->ajax()) {
            $productID = $request->productId;

            // Check product
            $product = Product::find($productID);
            if (!$product) {
                return response(['code' => '404']);
            }

            // Check load lại page để hiện popup captcha
            if (\Auth::user()->count_comment >= 2) {
                return response([
                    'code' => '501'
                ]);
            }

            $data      = [
                'cmt_user_id'    => \Auth::user()->id,
                'cmt_content'    => $request->comment,
                'cmt_product_id' => $productID,
                'cmt_parent_id'  => $request->commentId ?? 0,
                'created_at'     => Carbon::now()
            ];
            $commentId = Comments::insertGetId($data);
            if ($commentId) {
                $comment = Comments::with('user:id,name')->find($commentId);
                \DB::table('users')->where('id', \Auth::user()->id)
                        ->increment('count_comment');

                $html    = view('frontend.pages.product_detail.include._inc_comment_item', compact('comment'))->render();
                return response([
                    'code' => '200',
                    'html' => $html
                ]);
            }

            return response(['code' => '401']);
        }
    }
}
