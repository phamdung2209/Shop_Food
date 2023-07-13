<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $admin = Admin::find(get_data_user('admins'));
        $viewData = [
            'admin' => $admin
        ];

        return view('admin.index', $viewData);
    }
}
