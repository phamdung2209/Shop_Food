<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AdminRequestSlide;
use Carbon\Carbon;
use App\Models\Slide;

class AdminSlideController extends Controller
{
    public function index()
    {
        $slides = Slide::paginate(20);
        return view('admin.slide.index', compact('slides'));
    }

    public function create()
    {
        return view('admin.slide.create');
    }

    public function store(AdminRequestSlide $request)
    {
        $data               = $request->except('_token','sd_avatar');
        $data['created_at'] = Carbon::now();

        if ($request->sd_avatar) {
            $image = upload_image('sd_avatar');
            if ($image['code'] == 1) 
                $data['sd_image'] = $image['name'];
        } 

        $id = Slide::insertGetId($data);
        return redirect()->back();
    }

    public function edit($id) {
        $slide = Slide::find($id);
        return view('admin.slide.update',compact('slide'));
    }

    public function update(AdminRequestSlide $request, $id)
    {
        $slide              = Slide::find($id);
        $data               = $request->except('_token','sd_avatar');
        $data['created_at'] = Carbon::now();

        if ($request->sd_avatar) {
            $image = upload_image('sd_avatar');
            if ($image['code'] == 1) 
                $data['sd_image'] = $image['name'];
        } 

        $update = $slide->update($data);
        return redirect()->back();
    }


    public function active($id)
    {
        $slide              = Slide::find($id);
        $slide->sd_active = ! $slide->sd_active;
        $slide->save();

        return redirect()->back();
    }

    public function delete($id)
    {
        $slide              = Slide::find($id);
        if ($slide) $slide->delete();

        return redirect()->back();
    }


}
