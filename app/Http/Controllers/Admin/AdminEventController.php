<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Event;

class AdminEventController extends Controller
{
    public function index()
    {
        $events = Event::get();

        return view('admin.event.index', compact('events'));
    }

    public function create()
    {
        return view('admin.event.create');
    }

    public function store(Request $request)
    {
        $data               = $request->except('_token','e_banner','e_position_1','e_position_2','e_position_3','e_position_4');
        $data['created_at'] = Carbon::now();
        // dd($request->all());

        if ($request->e_position_1) {
            $data['e_position_1'] = 1;
        }

        if ($request->e_position_2) {
            $data['e_position_2'] = 1;
        }

        if ($request->e_position_3) {
            $data['e_position_3'] = 1;
        }

        if ($request->e_position_4) {
            $data['e_position_4'] = 1;
        }
        if ($request->e_detail_1) {
            $data['e_detail_1'] = 1;
        }
        if ($request->e_detail_2) {
            $data['e_detail_2'] = 1;
        }

        if ($request->e_banner) {
            $image = upload_image('e_banner');
            if ($image['code'] == 1) 
                $data['e_banner'] = $image['name'];
        } 

        $id = Event::insertGetId($data);
        return redirect()->back();
    }

    public function edit(Request $request, $id)
    {
        $event = Event::find($id);
        return view('admin.event.update', compact('event'));
    }

    public function update(Request $request, $id)
    {
        $event              = Event::find($id);
        $data               = $request->except('_token','e_banner','e_position_1','e_position_2','e_position_3','e_position_4', 'e_detail_1', 'e_detail_2');
        $data['created_at'] = Carbon::now();


        if ($request->e_position_1) {
            $data['e_position_1'] = 1;
        }else{
            $data['e_position_1'] = 0;
        }

        if ($request->e_position_2) {
            $data['e_position_2'] = 1;
        }else{
            $data['e_position_2'] = 0;
        }

        if ($request->e_position_3) {
            $data['e_position_3'] = 1;
        }else{
            $data['e_position_3'] = 0;
        }

        if ($request->e_position_4) {
            $data['e_position_4'] = 1;
        }else{
            $data['e_position_4'] = 0;
        }

        if ($request->e_detail_1) {
            $data['e_detail_1'] = 1;
        }else{
            $data['e_detail_1'] = 0;
        }

        if ($request->e_detail_2) {
            $data['e_detail_2'] = 1;
        }else{
            $data['e_detail_2'] = 0;
        }

        if ($request->e_banner) {
            $image = upload_image('e_banner');
            if ($image['code'] == 1) 
                $data['e_banner'] = $image['name'];
        } 

        $update = $event->update($data);
        return redirect()->back();
    }

    public function delete(Request $request, $id)
    {
        $event              = Event::find($id);
        if ($event) $event->delete();

        return redirect()->back();
    }
}
