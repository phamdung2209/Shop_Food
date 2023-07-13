<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Type;
use App\Models\Category;
use App\Http\Requests\AdminTypeRequest;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AdminTypeController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $types = Type::orderByDesc('id')->paginate(10);
        $viewData = [
            'types' => $types,
            'query'      => $request->query()
        ];
        return view('admin.type.index', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.type.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminTypeRequest $request)
    {
        //
        $data = $request->except('_token');
        $data['t_slug']   = Str::slug($request->t_name);
        $data['created_at'] = Carbon::now();

        Type::insertGetId($data);
        return redirect()->back();
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
        $type = Type::find($id);
        if (!$type) {
            return redirect()->back();
        }
        return view('admin.type.update', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminTypeRequest $request, $id)
    {
        //
        $type = Type::find($id);
        $data               = $request->except('_token');
        $data['t_slug']   = Str::slug($request->t_name);
        $data['updated_at'] = Carbon::now();

        $type->update($data);
        return redirect()->back();
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
        $type   = Type::find($id);
        if ($type) $type->delete();
        return redirect()->back();
    }
}
