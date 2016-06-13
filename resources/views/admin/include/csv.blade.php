@extends('admin.layout.index')
@section('header')
    CSV
@endsection

@section('content')
    <div class="box box-info">
        <div class="box-body">
            <a href="{{ url('dashboard/csv/import') }}" class="label label-primary">Import CSV</a>
            <a href="{{ url('dashboard/csv/export') }}" class="label label-success">Export CSV</a>
            <a href="{{ url('dashboard/pdf/export') }}" class="label label-danger">Export PDF</a>
            <a href="{{ url('dashboard/docx/export') }}" class="label label-warning">Export DOCX</a>
        </div>

        <div ng-class="MyController">
            <table class="table table-bordered">
                <tr><th>appno</th><th>tmappliedfor</th></tr>
                <tr ng-repeat="data in csvData">
                    <td>@{{ data.appno }}</td>
                    <td>@{{ data.tmappliedfor }}</td>
                </tr>
            </table>
        </div>
    </div>

    <script>
        var namespace = angular.module("myApp", []);
        namespace.controller("MyController", function($scope, $http, $log) {
            /**
             * This is for collecting data from database
             */
            $http.get('csv/api/data').success(function (data) {
                $scope.csvData = data;
            });
        });
    </script>
@endsection