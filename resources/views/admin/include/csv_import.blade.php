@extends('admin.layout.index')
@section('header')
    CSV Importer
@endsection

@section('content')
    <div class="box box-info">
        <div  class="box-body">

            @if(Session::has('global'))
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <i class="fa fa-exclamation-triangle"></i> {{ Session::get('global') }}
                        </div>
                    </div>
                </div>
            @endif

            <form class="form-horizontal" name="myForm1" method="POST" action="{{url('/dashboard/csv/import')}}" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <div class="form-group{{ $errors->has('csv') ? ' has-error' : '' }}">
                    <label class="col-md-4 control-label">CSV</label>

                    <div class="col-md-6">
                        <input type="file" class="form-control" name="csv">

                        @if ($errors->has('csv'))
                            <span class="help-block">
                                <strong>{{ $errors->first('csv') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-btn fa-sign-in"></i>Import
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection