var namespace = angular.module("myApp", []);
namespace.controller("MyController", function($scope, $http, $log){
    /**
     * Load the API key in the browser from database
     */
    $http.get('api-key/get')
        .success(function(data) {
            if(data.length != 0) {
                $scope.customerApiKey = data;
            } else {
                $scope.data = 0;
            }
        });

    /**
     * Generate the API key
     */
    $scope.apiKey = function() {
        $http.post('api-key/generate')
            .success(function(data) {
                $scope.customerApiKey = data;
                $scope.data = 1;
            })
    };

    /**
     * Load the Token in the browser from database
     * Check it is approved by admin or not for showing button visible or invisible
     * And Also for the Notification | if notApproved then notification will be load else not not load
     * If there are no any remaining token available
     */
    $http.get('token/get/approval')
        .success(function(data) {
            if(data.length != 0) {
                if(data == 0) {
                    $scope.notApproved = true;
                } else {
                    $scope.notApproved = false;
                }
            }
        });

    /**
     * @param $params | Expect requested token
     * @from token.blade.php
     * @return getData
     */
    $scope.newToken = function($params) {
         $http.post('token/generate', {new_token: $params.requested_token, customer_id: $params.customerID})
            .success(function(data){
                 $scope.myTokenForm.$setPristine();
                 $scope.myTokenForm.$setUntouched();
                 $params.requested_token = '';
                 //When Customer request for new token then it will be under pending for approval.
                 //That's why notApproval is true
                 $scope.notApproved = true;
            })
    };

    /**
     * @check the remaining token in database, if 0 then button will visible else not visible
     */
    $http.get('token/remaining')
        .success(function(data) {
            if(data == 0) {
                $scope.remainingToken = 0;
            } else {
                $scope.remainingToken = data;
            }
        });

    //===============================INBOX Script Start======================//
    /**
     * @return the total customer mailbox information from database
     */
    $http.get('mailbox/inbox')
        .success(function(data){
            $scope.inboxData = data;
        });

    /**
     * @param id | Expect Id of all mail
     */
    $scope.readMessage = function(id) {
        $http.post('mailbox/inbox/single', {id: id})
            .success(function(data){
                $scope.inboxReadData = data;
            })
    };

    /**
     * Load the new mail at first time in the page
     */
    $http.get('mailbox/newmail')
        .success(function(data){
            $scope.newMail = data;
        });

    /**
     * @return reload the inbox message and recount the new mail by reloading everything
     */
    $scope.reload = function() {
        $http.get('mailbox/inbox')
            .success(function(data){
                $scope.inboxData = data;
            });

        //For recount the new mail by reloading everything
        $http.get('mailbox/newmail')
            .success(function(data){
                $scope.newMail = data;
            });
    };


    /**
     * @param $params | Expect subject, message as parameter
     * @return success message;
     */
    $scope.pushCompose = function($params) {
        $http.post('mailbox/compose', {subject: $params.subject, message: $params.message})
            .success(function(data) {
                $scope.composeForm.$setPristine();
                $scope.composeForm.$setUntouched();
                $params.subject = '';
                $params.message = '';
                if(data == 'true') {
                    alert('Successfully sent the mail');
                }
            })
    }
});

/**
 * This is for password matching
 */
namespace.directive("passwordVerify", function() {
    return {
        require: "ngModel",
        scope: {
            passwordVerify: '='
        },
        link: function(scope, element, attrs, ctrl) {
            scope.$watch(function() {
                var combined;

                if (scope.passwordVerify || ctrl.$viewValue) {
                    combined = scope.passwordVerify + '_' + ctrl.$viewValue;
                }
                return combined;
            }, function(value) {
                if (value) {
                    ctrl.$parsers.unshift(function(viewValue) {
                        var origin = scope.passwordVerify;
                        if (origin !== viewValue) {
                            ctrl.$setValidity("passwordVerify", false);
                            return undefined;
                        } else {
                            ctrl.$setValidity("passwordVerify", true);
                            return viewValue;
                        }
                    });
                }
            });
        }
    };
});
