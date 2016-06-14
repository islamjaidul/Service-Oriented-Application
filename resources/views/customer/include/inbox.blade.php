
<div id="inbox" class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Inbox</h3>
        <div class="box-tools pull-right">
            <div class="has-feedback">
                <input type="text" class="form-control input-sm" placeholder="Search Mail" ng-model="search">
                <span class="glyphicon glyphicon-search form-control-feedback"></span>
            </div>
        </div><!-- /.box-tools -->
    </div><!-- /.box-header -->
    <div class="box-body no-padding">
        <div class="mailbox-controls">
            <!-- Check all button -->
            <button class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i></button>
            <div class="btn-group">
                <button class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
            </div><!-- /.btn-group -->
            <button ng-click="reload()" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
            <div class="pull-right">
                1-50/200
                <div class="btn-group">
                    <button class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                    <button class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                </div><!-- /.btn-group -->
            </div><!-- /.pull-right -->
        </div>
        <div class="table-responsive mailbox-messages">
            <table class="table table-hover table-striped">
                <tbody>
                <h4 style="text-align:center" ng-show="loading">Loading ...</h4>
                <tr ng-repeat="row in inboxData|filter:search">
                    <td ng-if="row.sent_mail != 1"><div class="icheckbox_flat-blue"style="position: relative;"><input name="id[]" type="checkbox" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div></td>
                    <td ng-if="row.sent_mail != 1"><a  data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#confirm-read-inbox" ng-click="readMessage(row.id)" ng-if="row.new_mail==0" href="#"><span  class="label label-info">new</span></a></td>
                    <td ng-if="row.sent_mail != 1" class="mailbox-name"><a data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#confirm-read-inbox" ng-click="readMessage(row.id)" href="#">Admin</a></td>
                    <td ng-if="row.sent_mail != 1" class="mailbox-subject"><a data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#confirm-read-inbox" ng-click="readMessage(row.id)" style="margin-left:132px;" href="#">@{{ row.inbox_subject }}</a></td>
                    <td ng-if="row.sent_mail != 1" class="mailbox-date">@{{ row.created_at }}</td>
                </tr>

                </tbody>
            </table><!-- /.table -->
        </div><!-- /.mail-box-messages -->
    </div><!-- /.box-body -->

    <div class="box-footer no-padding">
        <div class="mailbox-controls">
            <!-- Check all button -->
            <button class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i></button>
            <div class="btn-group">
                <button class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
            </div><!-- /.btn-group -->
            <button ng-click="reload()" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
            <div class="pull-right">
                1-50/200
                <div class="btn-group">
                    <button disabled class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                    <button class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                </div><!-- /.btn-group -->
            </div><!-- /.pull-right -->
        </div>
    </div>
</div><!-- /. box -->
