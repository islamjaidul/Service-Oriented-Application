@extends('admin.layout.index')
@section('header')
    Mail Box
@endsection

@section('content')
    @include('admin.common.read_inbox')
    <div class="row">
        <div class="col-md-3">
            <a href="#" ng-click="pushCompose()" class="btn btn-primary btn-block margin-bottom">Compose</a>
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Folders</h3>
                    <div class="box-tools">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body no-padding">
                    <ul class="nav nav-pills nav-stacked">
                        <li class="active"><a id="click_for_inbox"   href="#"><i class="fa fa-inbox"></i> Inbox <span class="label label-primary pull-right">@{{ newMail }}</span></a></li>
                        <li><a id="click_for_sent" href="#"><i class="fa fa-envelope-o"></i> Sent</a></li>
                    </ul>
                </div><!-- /.box-body -->
            </div><!-- /. box -->
        </div>

        <div id="inobox_or_sent" class="col-md-9">
            @include('admin.include.inbox')
        </div>
    </div>
@endsection
