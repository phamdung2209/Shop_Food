@extends('layouts.app_master_admin')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Trang quản trị hệ thống website bán hàng điện tử</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Thông tin sinh viên</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
                    <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <ul>
                        <li>Họ Tên: {{ $admin->name }}</li>
                        <li>Lớp : {{ $admin->class }}</li>
                        <li>Số điện thoại : {{ $admin->phone }}</li>
                        <li>Email : {{ $admin->email }}</li>
                    </ul>
                </div>

            </div>
            <!-- /.box -->
    </section>
    <!-- /.content -->
@stop
