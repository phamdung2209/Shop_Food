@extends('layouts.app_master_admin')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-3">
                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle" src="{{ pare_url_file($admin->avatar) }}" alt="User profile picture">
                        <h3 class="profile-username text-center">{{ $admin->name }}</h3>
                        <p class="text-muted text-center">{{ $admin->email }}</p>
                    </div>
                    <!-- /.box-body -->
                </div>

            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#activity" data-toggle="tab" aria-expanded="true">Thông tin cá nhân</a></li>
                    </ul>
                    <div class="tab-content">

                        <div class="tab-pane active" id="settings">
                            <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ route('admin.profile.update', $admin->id) }}">
                                @csrf
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Họ tên</label>
                                    <div class="col-sm-10">
                                        <input type="name" class="form-control" name="name" placeholder="" value="{{ $admin->name }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" name="email"  placeholder="Email" value="{{ $admin->email }}">
                                        @if ($errors->first('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Phone</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="phone" placeholder="Name" value="{{ $admin->phone }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Địa chỉ</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="address" placeholder="Nhập địa chỉ cá nhân" value="{{ $admin->address }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Lớp</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="class" placeholder="Lớp học" value="{{ $admin->class }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Ảnh đại diện</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" name="avatar" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-danger">Cập nhật</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
@stop
