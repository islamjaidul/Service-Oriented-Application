@extends('customer.layout.index')
@section('header')
    Token
@endsection
@section('content')
    @include('customer.common.new_token')
    <div class="box box-info">

        <div ng-if="notApproved == true" class="alert alert-danger">
            <i class="fa fa-check"></i> Your token request has successfully processed but not approved yet.
        </div>

        <div class="row">
            <div class="box-body">
                <div class="col-md-6">
                    <h4 style="text-align:center" ng-show="loading">Loading ...</h4>
                    <div ng-if="remainingToken == 'no record'">
                        <h4 style="color:red">API key not generated</h4>
                    </div>
                    <div ng-if="remainingToken != 'no record'">
                        <a data-toggle="modal" data-target="#confirm-new-token" href="#"  ng-class="remainingToken==0 && notApproved != true ? 'btn btn-success btn-xs' : 'btn btn-success btn-xs disabled'">Add new token</a>
                        <table class="table table-bordered">
                            <tr><th>Total Token</th><th>Remaining Token</th></tr>
                            @foreach($token as $row)
                                <tr>
                                    <td>{{$row->api_token}}</td>
                                    <td>{{ $row->remaining_api_token }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>

                <div class="col-md-6">
                    <div style="background-color:lightcyan" class="alert alert-default alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <b>Note: </b> Token will reduce per uses of API.
                        <p><b>Note: </b>Apply for new token, when your token will be finished</p>
                        <p><b>Note: </b>Admin will approve your application and you will get the new token</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <script>
        $(document).ready(function(){
            $("#tokenSubmit").click(function(event) {
                event.preventDefault();
                $("#confirm-new-token").modal("hide");
            });
        })
    </script>
@endsection