<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\PageStatic;

class AdminStaticController extends Controller
{
    public function index()
    {
        $statics = PageStatic::get();
        return view('admin.static.index', compact('statics'));
    }

    public function create()
    {
        $type = (new PageStatic())->getType();
        return view('admin.static.create',compact('type'));
    }

    public function store(Request $request)
    {
        $data               = $request->except('_token');
        $data['created_at'] = Carbon::now();
       
        $id = PageStatic::insertGetId($data);
        return redirect()->back();
    }

    public function edit(Request $request, $id)
    {
        $static = PageStatic::find($id);
        $type = (new PageStatic())->getType();
        return view('admin.static.update', compact('static','type'));
    }

    public function update(Request $request, $id)
    {
        $static = PageStatic::find($id);
        $data               = $request->except('_token');
        $data['created_at'] = Carbon::now();        

        $update = $static->update($data);
        return redirect()->back();
    }

    public function delete(Request $request, $id)
    {
        $static = PageStatic::find($id);
        if ($static) $static->delete();

        return redirect()->back();
    }
}
