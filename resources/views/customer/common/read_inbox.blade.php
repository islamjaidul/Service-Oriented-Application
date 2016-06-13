 <!--Customer Inbox Read Div Start (Live means how many days customer account will be activated)-->
    <div class="modal fade" id="confirm-read-inbox">
        <div class="modal-dialog">
            <div ng-repeat="data in inboxReadData" class="modal-content">
                <div class="modal-header">
                    <button type="button" ng-click="reload()" class="close" data-dismiss="modal" aria-hidden="false">&times;</button>
                    <h4>@{{ data.inbox_subject }}</h4>
                </div>
                <div  class="modal-body">
                   @{{ data.inbox_message }}
                </div>
                <div class="modal-footer">
                    <button type="submit" ng-click="reload()" data-dismiss="modal" aria-hidden="false" class="btn btn-default">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <!--Customer Inbox Read Div End-->