@extends('layouts.app_master_admin')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Thêm mới page tinhx</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{  route('admin.static.index') }}"> Static</a></li>
            <li class="active"> Create </li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <div class="box-body">
                    <form role="form" action="" method="POST" enctype="multipart/form-data">
                         @csrf
                        <div class="col-sm-8">
                            <div class="form-group {{ $errors->first('s_title') ? 'has-error' : '' }}">
                                <label for="name">Tiêu đề <span class="text-danger">(*)</span></label>
                                <input type="text" class="form-control" name="s_title"  placeholder="Title ...">
                                @if ($errors->first('s_title'))
                                    <span class="text-danger">{{ $errors->first('s_title') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="form-group {{ $errors->first('e_link') ? 'has-error' : '' }}">
                                <label for="name">Loại Page <span class="text-danger">(*)</span></label>
                                <select class="form-control" name="s_type">
                                    @foreach($type as $key => $item)
                                        <option value="{{  $key }}">{{  $item }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                         <div class="col-sm-8">
                            <div class="form-group {{ $errors->first('e_link') ? 'has-error' : '' }}">
                                <label for="name">Nội dung <span class="text-danger">(*)</span></label>
                                <textarea class="form-control textarea" id="content" name="s_content"></textarea>
                            </div>
                        </div>
                       
                       
                        <div class="col-sm-12">
                            <div class="box-footer text-center">
                                <a href="{{ route('admin.static.index') }}" class="btn btn-danger">
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
@section('script')
    <script src="{{  asset('admin/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript">

        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
       };

        CKEDITOR.replace( 'content' ,options);
    </script>
@stop

