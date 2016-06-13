 <!--Customer Compose Div Start-->
    <div class="modal fade" id="confirm-compose">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="false">&times;</button>
                    <h4>Compose</h4>
                </div>
                <div  class="modal-body">
                    <form name="composeForm" action="">
                        <input type="text" name="subject" class="form-control" ng-model="data.subject" placeholder="Enter your subject.." required>
                            <span style="color:red" ng-show="composeForm.subject.$touched && composeForm.subject.$invalid">
                                    <span ng-show="composeForm.subject.$error.required">Subject is required.</span>
                            </span>
                        <textarea style="margin-top:10px" name="message" class="form-control"  cols="30" rows="10" ng-model="data.message" placeholder="Enter your message" required></textarea>
                            <span style="color:red" ng-show="composeForm.message.$touched && composeForm.message.$invalid">
                                    <span ng-show="composeForm.message.$error.required">Message is required.</span>
                            </span>
                    </form>
                </div>
                <div class="modal-footer">
                    <input ng-disabled="!composeForm.$valid" type="submit" id="composeSubmit" ng-click="pushCompose(data)" class="btn btn-primary" value="Sent">
                    <button type="submit" data-dismiss="modal" aria-hidden="false" class="btn btn-default">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <!--Customer Compose Read Div End-->