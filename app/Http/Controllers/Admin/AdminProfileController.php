<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequestUpdateProfile;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminProfileController extends Controller
{
    public function index()
    {
        $admin = Admin::find(get_data_user('admins'));
        $viewData = [
            'admin' => $admin
        ];
        return view('admin.profile.index', $viewData);
    }

    public function update(AdminRequestUpdateProfile $request, $id)
    {
        $data = $request->except('_token','avatar');
        if ($request->avatar) {
            $image = upload_image('avatar');
            if ($image['code'] == 1)
                $data['avatar'] = $image['name'];
        }

        \DB::table('admins')->where('id',get_data_user('admins'))
            ->update($data);

        return redirect()->back();
    }
}
