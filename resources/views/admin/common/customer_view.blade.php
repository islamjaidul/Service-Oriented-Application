 <!--Customer View Div Start-->
    <div class="modal fade" id="confirm-view">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="false">&times;</button>
                    <h4>User Info</h4>
                </div>
                <div ng-repeat="customerView in customerView" class="modal-body">
                    <h4 style="color:teal">@{{ customerView.customername }}</h4>
                    <p>Email: @{{ customerView.customeremail }}</p>
                    <p>Total Token: @{{ customerView.api_token }}</p>
                    <p>Remaining Token: @{{ customerView.remaining_api_token }}</p>
                    <p>Status: <span style="color:green" ng-if="customerView.customeractive == 1"><b>Active</b></span>
                        <span style="color:red" ng-if="customerView.customeractive == 0"><b>Inactive</b></span></p>
                </div>
                <div class="modal-footer">
                    <button type="submit" data-dismiss="modal" aria-hidden="false" class="btn btn-default">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <!--Customer View Div End-->