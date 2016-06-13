@extends('customer.layout.index')
@section('header')
    API Genrator
@endsection
@section('content')
@include('customer.common.get_api')
    <div class="box box-info">
        <div class="box-body">
            <a href="" ng-class="data==0 ? 'btn btn-info' : 'btn btn-info disabled'" ng-click="apiKey()">Key Genarator</a>
            <a data-toggle="modal" data-target="#confirm-get-api" href="#" ng-if="data != 0" class="btn btn-primary">Get API</a>
            <table style="margin-top:10px;" class="table table-bordered">
                <tr><th>API Key</th><th>Created at</th></tr>
                <tr ng-repeat="row in customerApiKey">
                    <td>@{{ row.api_key }}</td>
                    <td>@{{ row.created_at }}</td>
                </tr>
            </table>
        </div>
    </div>
@endsection

@section('footer')
    <script>
        $(document).ready(function() {
            $("#get_api_submit").click(function() {
                $("#confirm-get-api").modal("hide");
            });
        })
    </script>
@endsection
