<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Producer;
use App\Http\Requests\AdminProducerRequest;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AdminProducerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $producers = Producer::orderByDesc('id')
            ->paginate(10);
        $viewData = [
            'producers' => $producers,
            'query'      => $request->query()
        ];
        return view('admin.producer.index', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.producer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminProducerRequest $request)
    {
        //
        $data = $request->except('_token');
        $data['pdr_slug']   = Str::slug($request->pdr_name);
        $data['created_at'] = Carbon::now();
        Producer::insertGetId($data);
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
        $producer = Producer::find($id);
        if (!$producer) {
            return redirect()->back();
        }
        return view('admin.producer.update', compact('producer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminProducerRequest $request, $id)
    {
        //
        $producer = Producer::find($id);
        $data               = $request->except('_token');
        $data['pdr_slug']   = Str::slug($request->pdr_name);
        $data['updated_at'] = Carbon::now();
        $producer->update($data);
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
        $producer   = Producer::find($id);
        if ($producer) $producer->delete();
        return redirect()->back();
    }
}
