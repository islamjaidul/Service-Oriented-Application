@extends('customer.layout.index')
@section('header')
    <div class="row">
        <div class="col-md-8">
            Report
            <a target="_blank" href="{{ url('/customer/report/export') }}" style="float:right;" class="btn btn-primary btn-sm"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Export PDF</a>
        </div>
    </div>
@endsection
@section('content')
    <?php
        function getStatus($action = null) {
            if($action == 1) {
                echo '<span class="label label-info">Approved</span>';
            } else {
                echo '<span class="label label-warning">Pending</span>';
            }
        }
    ?>
    <div class="row">
        <div class="col-md-8">
            <div class="box box-info">
                <div class="box-header">
                    API Report
                </div>
                <div class="box-body">
                    @if(count($data['api_report']) != 0)
                    <table class="table table-bordered">
                        <tr><th>Uses Website</th><th>Total Uses</th></tr>

                            @foreach($data['api_report'] as $row)
                                <tr>
                                    <td>{{ $row->uses_address }}</td>
                                    <td>{{ $row->api_uses_count }} Times</td>
                                </tr>
                            @endforeach
                    </table>
                    @else
                        <h4 style="color:red">No API Report Available</h4>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="box box-info">
                <div class="box-header">Token Approval Report</div>
                <div class="box-body">
                    @if(count($data['token_report']) != 0)
                       <table class="table table-bordered">
                           <tr><th>Token Request</th><th>Status</th><th>Date</th></tr>
                           @foreach($data['token_report'] as $row)
                                <tr>
                                    <td>{{ $row->token_request }}</td>
                                    <td>{{ getStatus($row->action) }}</td>
                                    <td>{{ $row->created_at }}</td>
                                </tr>
                           @endforeach
                       </table>
                    @else
                        <h4 style="color:red">No Approval Report Available</h4>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="box box-info">
                <div class="box-header">Total Token Report</div>
                <div class="box-body">
                    @if(count($data['result']) != 0)
                        <table class="table table-bordered">
                            <tr><th>Approved Token</th><th>Default Token</th></tr>
                            <tr>
                                <td>{{ $data['result'][0] }}</td>
                                <td>{{ $data['result'][1] }}</td>
                            </tr>
                            <tr>
                                <td><b>Total Token: </b></td>
                                <td>{{ $data['result'][0] + $data['result'][1]}}</td>
                            </tr>
                        </table>
                    @else
                        <h4 style="color:red">No Token Report Available</h4>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection