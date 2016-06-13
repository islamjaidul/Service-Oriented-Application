@extends('admin.layout.index')

@section('header')
    Token Approval Panel
@endsection

@section('content')
    <div class="box box-info">
        <div class="box-body">
            <table class="table table-bordered">
                <tr><th>User Name</th><th>Requested Token</th><th>Action</th><th>Status</th><th>Date</th></tr>
                <tr ng-repeat="row in customerTokenInfo">
                    <td>@{{ row.name }}</td>
                    <td>@{{ row.token_request }}</td>
                    <td>
                        <a ng-if="row.action==0" ng-click="getApprovalAction(row.customerid, row.token_request)" href="#" class="label label-primary">Approve</a>
                        <a ng-if="row.action==1" href="#" class="label label-success">Taken</a>
                    </td>
                    <td ng-if="row.action == 0"><span class="label label-warning">Pending</span></td>
                    <td ng-if="row.action == 1"><span class="label label-info">Approved</span></td>
                    <td>@{{ row.created_at }}</td>
                </tr>
            </table>
        </div>
    </div>
@endsection
