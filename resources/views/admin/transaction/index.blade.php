@extends('layouts.app_master_admin')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Quản lý đơn hàng</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{  route('admin.transaction.index') }}"> Transaction</a></li>
            <li class="active">List</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <div class="box-title">
                    <form class="form-inline">
                        <input type="text" class="form-control" value="{{ Request::get('id') }}" name="id" placeholder="ID">
                        <input type="text" class="form-control" value="{{ Request::get('email') }}" name="email" placeholder="Email ...">
                        <select name="type" class="form-control">
                            <option value="0">Phân loại khách</option>
                            <option value="1" {{ Request::get('type') == 1 ? "selected='selected'" : "" }}>Thành viên</option>
                            <option value="2" {{ Request::get('type') == 2 ? "selected='selected'" : "" }}>Khách</option>
                        </select>
                        <select name="status" class="form-control">
                            <option value="">Trạng thái</option>
                            <option value="1" {{ Request::get('status') == 1 ? "selected='selected'" : "" }}>Tiếp nhận</option>
                            <option value="2" {{ Request::get('status') == 2 ? "selected='selected'" : "" }}>Đang vận chuyển</option>
                            <option value="3" {{ Request::get('status') == 3 ? "selected='selected'" : "" }}>Đã bàn giao</option>
                            <option value="-1" {{ Request::get('status') == -1 ? "selected='selected'" : "" }}>Huỷ bỏ</option>
                        </select>
                        <button type="submit" class="btn btn-success"><i class="fa fa-search"></i> Search</button>
                        <button type="submit" name="export" value="true" class="btn btn-info">
                            <i class="fa fa-save"></i> Export
                        </button>
                    </form>
                </div>
                <div class="box-body">
                   <div class="col-md-12">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th style="width: 30%">Thông tin</th>
                                    <th>Tổng tiền</th>
                                    <th>Vai trò</th>
                                    <th>Phương thức thanh toán</th>
                                    <th>Trạng thái</th>
                                    <th>Ngày tạo</th>
                                    <th>Hành động</th>
                                </tr>
                                @if (isset($transactions))
                                    @foreach($transactions as $transaction)
                                        <tr>
                                            <td>{{ $transaction->id }}</td>
                                            <td>
                                                <ul>
                                                    <li>Name: {{ $transaction->tst_name }}</li>
                                                    <li>Email: {{ $transaction->tst_email }}</li>
                                                    <li>Phone: {{ $transaction->tst_phone }}</li>
                                                    <li>Addres: {{ $transaction->tst_address }}</li>
                                                </ul>
                                            </td>
                                            <td>{{ number_format($transaction->tst_total_money,0,',','.') }} đ</td>
                                            <td>
                                                @if ($transaction->tst_user_id)
                                                    <span class="label label-success">Thành viên</span>
                                                @else
                                                    <span class="label label-default">Khách</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($transaction->payments)
                                                    <ul>
                                                        <li>Ngân hàng: {{ $transaction->payments ? $transaction->payments->p_code_bank : ''}}</li>
                                                        <li>Mã thanh toán: {{ $transaction->p_code_vnpay }}</li>
                                                        <li>Tổng tiền:  {{ number_format($transaction->payments->p_money / 100,0,',','.') }} VNĐ</li>
                                                        <li>Nội dung: {{ $transaction->payments->p_note }}</li>
                                                        <li>Thời gian: {{ date('Y-m-d H:i', strtotime($transaction->payments->p_time)) }}</li>
                                                    </ul>
                                                @else
                                                    Thanh toán khi nhận hàng
                                                @endif
                                            </td>
                                            <td>
                                                <span class="label label-{{ $transaction->getStatus($transaction->tst_status)['class'] }}">
                                                    {{ $transaction->getStatus($transaction->tst_status)['name'] }}
                                                </span>
                                            </td>
                                            <td>{{  $transaction->created_at }}</td>
                                            <td>
                                                <a data-id="{{  $transaction->id }}" href="{{ route('ajax.admin.transaction.detail', $transaction->id) }}" class="btn btn-xs btn-info js-preview-transaction"><i class="fa fa-eye"></i> View</a>

                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-success btn-xs">Action</button>
                                                    <button type="button" class="btn btn-success btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                        <span class="caret"></span>
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <ul class="dropdown-menu" role="menu">
                                                        <li>
                                                            <a href="{{  route('admin.transaction.delete', $transaction->id) }}" class="js-delete-confirm"><i class="fa fa-trash"></i> Delete</a>
                                                        </li>
                                                        <li class="divider"></li>
                                                        <li>
                                                            <a href="{{ route('admin.action.transaction',['process', $transaction->id]) }}" ><i class="fa fa-ban"></i> Đang bàn giao</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('admin.action.transaction',['success', $transaction->id]) }}" ><i class="fa fa-ban"></i> Đã bàn giao</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('admin.action.transaction',['cancel', $transaction->id]) }}" ><i class="fa fa-ban"></i> Huỷ</a>
                                                        </li>

                                                    </ul>
                                                </div>
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
                    {!! $transactions->appends($query)->links() !!}
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
    </section>

    <div class="modal fade fade" id="modal-preview-transaction">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title"> Chi tiết đơn hàng <b id="idTransaction">#1</b></h4>
                </div>
                <div class="modal-body">
                    <div class="content">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Lưu dữ liệu</button>
                </div>
            </div>
        <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.content -->
@stop
