@extends('layouts.app_master_admin')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Thêm mới từ khoá</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{  route('admin.keyword.index') }}"> Keyword</a></li>
            <li class="active"> Create</a></li>
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
                            <div class="form-group {{ $errors->first('k_name') ? 'has-error' : '' }}">
                                <label for="name">Tên <span class="text-danger">(*)</span></label>
                                <input type="text" class="form-control" name="k_name"  placeholder="Name ...">
                                @if ($errors->first('k_name'))
                                    <span class="text-danger">{{ $errors->first('k_name') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <label for="name">Mô tả </label>
                            <textarea class="form-control" name="k_description" placeholder="Description ..."></textarea>
                            @if ($errors->first('k_description'))
                                <span class="text-danger">{{ $errors->first('k_description') }}</span>
                            @endif
                        </div>
                        <div class="col-sm-12">
                            <div class="box-footer text-center "  style="margin-top: 20px;">
                                <a href="{{ route('admin.keyword.index') }}" class="btn btn-danger">
                                Quay lại <i class="fa fa-undo"></i></a>
                                <button type="submit" class="btn btn-success">Lưu dữ liệu <i class="fa fa-save"></i></button>
                            </div>
                        </div>
                    </form>  
                </div>
            </div>
            <!-- /.box -->
    </section>
    <!-- /.content -->
@stop