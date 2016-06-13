@extends('customer.layout.index')
@section('header')
    Dasboard
@endsection
@section('content')
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
            <span class="info-box-icon bg-aqua-active"><i class="ion-briefcase"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Remaining Token</span>
                <span class="info-box-number">{{ $data['remaining_token'] }}</span>
            </div><!-- /.info-box-content -->
        </div>
    </div>
@endsection
