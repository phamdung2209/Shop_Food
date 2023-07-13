@extends('layouts.app_master_user')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/user.min.css') }}">
@stop
@section('content')
    <section>
        <div class="title">Lịch sử login</div>
        <div class="content">
            <table class="table">
                <thead>
                <tr>
                    <th style="width: 100px;">Device</th>
                    <th style="width: 10%">Platform</th>
                    <th class="text-center">Platform_ver</th>
                    <th class="text-center">Browser</th>
                    <th class="text-center">Browser_ver</th>
                    <th style="width: 30%" class="text-center">Time</th>
                </tr>
                </thead>
                <tbody>
                @foreach($historyLog as  $item)
                    <tr>
                        <td class="text-center">
                            <span>{{ $item['device'] }}</span>
                        </td>
                        <td class="text-center">
                            <span>{{ $item['platform'] }}</span>
                        </td>
                        <td class="text-center">
                            <span>{{ $item['platform_ver'] }}</span>
                        </td>
                        <td class="text-center">
                            <span>{{ $item['browser'] }}</span>
                        </td>
                        <td class="text-center">
                            <span>{{ $item['browser_ver'] }}</span>
                        </td>
                        <td class="text-center">
                            <span>{{ $item['time'] }}</span>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </section>
@stop
