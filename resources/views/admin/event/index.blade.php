@extends('layouts.app_master_admin')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Quản lý sự kiện</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{  route('admin.event.index') }}"> Sự kiện</a></li>
            <li class="active"> List</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <div class="box-header">
                    <h3 class="box-title"><a href="{{ route('admin.event.create') }}" class="btn btn-primary">Thêm mới <i class="fa fa-plus"></i></a></h3>
               </div>
                <div class="box-body">
                   <div class="col-md-12">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Tiêu đề</th>
                                    <th>Link</th>
                                    <th>Banner</th>
                                    <th>Vị trí</th>
                                    <th>Ngày tạo</th>
                                    <th>Hành động</th>
                                </tr>
                                @if (isset($events))
                                    @foreach($events as $key => $event)
                                        <tr>
                                            <td>{{ $event->id }}</td>
                                            <td>{{ $event->e_name }}</td>
                                            <td>{{ $event->e_link }}</td>
                                            <td>
                                                <img src="{{ pare_url_file($event->e_banner) }}" style="width: 100px;height: 40px">
                                            </td>
                                            <td>
                                                @if($event->e_position_1 !== 0)
                                                    <p>Home 1</p>
                                                @elseif($event->e_position_2 !== 0)
                                                    <p>Home 2</p>
                                                @elseif($event->e_position_3 !== 0)
                                                    <p>Home 3</p>
                                                @elseif($event->e_position_4 !== 0)
                                                @endif
                                            </td>
                                            <td>{{  $event->created_at }}</td>
                                            <td>
                                                <a href="{{ route('admin.event.update', $event->id) }}" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> Edit</a>
                                                <a href="{{  route('admin.event.delete', $event->id) }}" class="btn btn-xs btn-danger js-delete-confirm"><i class="fa fa-trash"></i> Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    {{-- {!! $slides->links() !!} --}}
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
    </section>
    <!-- /.content -->
@stop