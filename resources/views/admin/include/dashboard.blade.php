@extends('admin.layout.index')
@section('header')
    Dashboard
@endsection
@section('content')
    <div class="col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-aqua-active"><i class="ion ion-ios-people-outline"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Total User</span>
                <span class="info-box-number">{{ $data['total_customer'] }}</span>
            </div><!-- /.info-box-content -->
        </div>
    </div>

    <div class="col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-red-active"><i class="ion-email"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">New Mail</span>
                <span class="info-box-number">{{ $data['new_mail'] }}</span>
            </div><!-- /.info-box-content -->
        </div>
    </div>

    <div class="col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-yellow-active"><i class="ion-briefcase"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Token Request</span>
                <span class="info-box-number">{{ $data['new_token_request'] }}</span>
            </div><!-- /.info-box-content -->
        </div>
    </div>
@endsection