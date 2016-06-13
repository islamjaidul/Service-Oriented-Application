 <!--Customer New Token Div Start (Live means how many days customer account will be activated)-->
    <div class="modal fade" id="confirm-new-token">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="false">&times;</button>
                    <h4>New Token</h4>
                </div>
                <div  class="modal-body">
                    <form name="myTokenForm" action="">
                        <select class="form-control" ng-model="token.requested_token" required>
                            <option value="">Select the Token</option>
                            <option value="10">10 Token</option>
                            <option value="30">30 Token</option>
                            <option value="50">50 Token</option>
                        </select>
                    </form>
                </div>
                <div class="modal-footer">
                    <button ng-disabled="!myTokenForm.$valid" id="tokenSubmit" type="submit" ng-click="newToken(token)" class="btn btn-success">Start</button>
                    <button type="submit" data-dismiss="modal" aria-hidden="false" class="btn btn-default">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <!--Customer New Token Div End-->