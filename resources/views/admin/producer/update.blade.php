@extends('layouts.app_master_admin')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Cập nhật nhà sản xuất</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{  route('admin.producer.index') }}">Producer</a></li>
            <li class="active"> Update</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <div class="box-body">
                    <form role="form" action="" method="POST">
                         @csrf
                        <div class="col-sm-8">
                            <div class="form-group {{ $errors->first('pdr_name') ? 'has-error' : '' }}">
                                <label for="pdr_name">Tên <span class="text-danger">(*)</span></label>
                                <input type="text" class="form-control" value="{{  old('pdr_name', isset($producer->pdr_name) ? $producer->pdr_name : '') }}" name="pdr_name"  placeholder="Name ...">
                                @if ($errors->first('pdr_name'))
                                    <span class="text-danger">{{ $errors->first('pdr_name') }}</span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->first('pdr_email') ? 'has-error' : '' }}">
                                <label for="pdr_name">Email <span class="text-danger">(*)</span></label>
                                <input type="text" class="form-control" value="{{ old('pdr_email', isset($producer->pdr_email) ? $producer->pdr_email : '') }}" name="pdr_email"  placeholder="Email ...">
                                @if ($errors->first('pdr_email'))
                                    <span class="text-danger">{{ $errors->first('pdr_email') }}</span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->first('pdr_phone') ? 'has-error' : '' }}">
                                <label for="pdr_name">Số điện thoại <span class="text-danger">(*)</span></label>
                                <input type="text" class="form-control" value="{{  old('pdr_phone', isset($producer->pdr_phone) ? $producer->pdr_phone : '') }}" name="pdr_phone"  placeholder="Phone ...">
                                @if ($errors->first('pdr_phone'))
                                    <span class="text-danger">{{ $errors->first('pdr_email') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="box-footer text-center "  style="margin-top: 20px;">
                                <a href="{{ route('admin.producer.index') }}" class="btn btn-danger">
                                Quay lại <i class="fa fa-undo"></i></a>
                                <button type="submit" class="btn btn-success">Cập nhật dữ liệu <i class="fa fa-save"></i></button>
                            </div>
                        </div>
                    </form>  
                </div>
            </div>
            <!-- /.box -->
    </section>
    <!-- /.content -->
@stop