<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function index()
    {
        return view('frontend.document.index');
    }

    public function list()
    {
        return view('frontend.document.list');
    }

    public function detail()
    {
        return view('frontend.document.detail');
    }
}
