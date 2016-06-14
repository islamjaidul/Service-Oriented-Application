@extends('auth.layout.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="box box-info">
                    <div class="box-header">
                        Activation
                    </div>
                    <div class="box-body">
                        @if(Session::has('success'))
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <div class="alert alert-success alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <i class="fa fa-envelope-o" aria-hidden="true"></i> {{ Session::get('success') }}
                                    </div>
                                </div>
                            </div>
                        @endif

                            @if(Session::has('invalid_msg'))
                                <div class="row">
                                    <div class="col-md-8 col-md-offset-2">
                                        <div class="alert alert-danger alert-dismissable">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> {{ Session::get('invalid_msg') }}
                                        </div>
                                    </div>
                                </div>
                            @endif
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('customer/register/activation/') }}">
                            {!! csrf_field() !!}

                            <div class="form-group{{ $errors->has('token') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Token</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="token">

                                    @if ($errors->has('token'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('token') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-sign-in"></i>Activate
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection