@extends('layouts.app_master_admin')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Quản lý đơn hàng</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{  route('xemdonhang') }}"> Đơn hàng</a></li>
            <li class="active"> Chi tiết đơn hàng</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
              
                <div class="box-body">
                   <div class="col-md-12">
                        <table class="table">
                            <tbody>
                                <tr>
                                    
                                    <th>Tên sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Giá tiền</th>
                                    <th>Thành tiền</th>
                                  
                                </tr>
                                    @php
                                    $total = 0;
                                    @endphp
                                    @foreach($order as $key => $or)
                                        @php

                                            $subtotal = $or->od_qty*$or->product->pro_price;
                                            $total+=$subtotal;
                                        @endphp
                                        <tr>
                                            <td>{{ $or->product->pro_name }}</td>
                                            <td>{{ $or->od_qty }}</td>
                                            <td>{{  number_format($or->product->pro_price,0,',','.') }}đ</td>
                                            <td>{{ number_format($subtotal,0,',','.') }}đ</td>
                                           
                                          
                                        </tr>

                                    @endforeach
                                    <tr>
                                        <td colspan="3">Tổng tiền thanh toán : {{number_format($total,0,',','.')}}đ</td>
                                    </tr>
                              
                            </tbody>
                        </table>
                    </div>
                </div>
               
               
            </div>
            <!-- /.box -->
    </section>
    <!-- /.content -->
@stop
