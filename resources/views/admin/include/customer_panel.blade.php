@extends('admin.layout.index')
@section('header')
    User Panel
@endsection
@section('content')
    @include('admin.common.customer_view')
    <div class="box box-info">
        <div class="box-body">
            <table class="table table-bordered">
                <tr><th>Name</th><th>Action</th><th>Status</th></tr>

                    <tr ng-repeat="info in customerInfo">
                        <td>@{{ info.name }}</td>
                        <td>
                            <a ng-if="info.active == 0" ng-click="getAction(info.id)" class="label label-success" href="#">Active</a>
                            <a ng-if="info.active == 1" ng-click="getAction(info.id)" class="label label-danger" href="#">Block</a>
                            <a data-toggle="modal" data-target="#confirm-view" id="customer_view" class="label label-info" ng-click="view(info.id)" href="#">View</a></td>
                        <td>
                            <span ng-if="info.active == 0" class="label label-danger">Inactive</span>
                            <span ng-if="info.active == 1" class="label label-primary">Active</span>
                        </td>
                    </tr>
            </table>
        </div>
    </div>
@endsection