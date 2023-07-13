<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DiscountCode;
use App\Http\Requests\DiscountCodeRequest;

class DiscountCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $discountCodes = DiscountCode::orderByDesc('id')->paginate(10);
        return view('admin.discount_code.index', compact('discountCodes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.discount_code.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DiscountCodeRequest $request)
    {
        //
        \DB::beginTransaction();
        try {
            $discountCode = new DiscountCode();
            $discountCode->d_code = $request->d_code;
            $discountCode->d_number_code = $request->d_number_code;
            $discountCode->d_date_start = $request->d_date_start;
            $discountCode->d_date_end = $request->d_date_end;
            $discountCode->d_percentage = $request->d_percentage;
            $discountCode->save();
            \DB::commit();
            return redirect()->route('admin.discount.code.index')->with('success', 'Thêm mới thành công');
        } catch (\Exception $exception) {
            \DB::rollBack();
            return redirect()->back()->with('error', 'Đã xảy ra lỗi khi lưu dữ liệu');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $discount = DiscountCode::find($id);
        return view('admin.discount_code.update', compact('discount'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        \DB::beginTransaction();
        try {
            $discountCode = DiscountCode::find($id);
            $discountCode->d_code = $request->d_code;
            $discountCode->d_number_code = $request->d_number_code;
            $discountCode->d_date_start = $request->d_date_start;
            $discountCode->d_date_end = $request->d_date_end;
            $discountCode->d_percentage = $request->d_percentage;
            $discountCode->save();
            \DB::commit();
            return redirect()->route('admin.discount.code.index')->with('success', 'Thêm mới thành công');
        } catch (\Exception $exception) {
            \DB::rollBack();
            return redirect()->back()->with('error', 'Đã xảy ra lỗi khi lưu dữ liệu');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        //
        $discount = DiscountCode::find($id);
        if (!$discount) {
            return redirect()->back()->with('error', 'Đã xảy ra lỗi khi xóa dữ liệu');
        }
        $discount->delete();
        return view('admin.discount_code.update', compact('discount'));
    }
}
