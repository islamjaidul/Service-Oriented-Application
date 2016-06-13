 <!--Admin Inbox Read Div Start-->
    <div class="modal fade" id="confirm-read-inbox">
        <div class="modal-dialog">
            <div ng-repeat="data in inboxReadData" class="modal-content">
                <!--For loading the mail page Start-->
                <div ng-if="replay == false">
                    <div class="modal-header">
                        <button type="button" ng-click="reload()" class="close" data-dismiss="modal" aria-hidden="false">&times;</button>
                        <h4>{{ data.inbox_subject }}</h4>
                    </div>
                    <div  class="modal-body">
                        {{ data.inbox_message }}
                    </div>
                </div>
                <!--For loading the mail page End-->

                <!--For loading the replay page Start-->
                <div ng-if="replay == true">
                    <div class="modal-header">
                        <button type="button" ng-click="reload()" class="close" data-dismiss="modal" aria-hidden="false">&times;</button>
                        <h4>Replay</h4>
                    </div>
                    <div  class="modal-body">
                        <form name="replayForm" action="">
                            <input type="text" class="form-control" name="value" value="{{ data.inbox_subject }}">

                            <textarea style="margin-top:10px" name="message" class="form-control"  cols="30" rows="10" ng-model="data.message" placeholder="Enter the mail body" required></textarea>
                            <span style="color:red" ng-show="replayForm.message.$touched &&  replayForm.message.$invalid">
                                    <span ng-show="replayForm.message.$error.required">Mail body is required.</span>
                            </span>
                        </form>
                    </div>
                </div>
                <!--For loading the replay page End-->

                <div class="modal-footer">
                    <button ng-if="replay==false" type="submit" ng-click="getReplayView()" class="btn btn-success">Replay</button>
                    <button id="replaySubmit"  ng-if="replay==true"  ng-click="getReplay(data)" class="btn btn-info">Send</button>
                    <button type="submit" ng-click="reload()" data-dismiss="modal" aria-hidden="false" class="btn btn-default">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <!--Admin Inbox Read Div End-->