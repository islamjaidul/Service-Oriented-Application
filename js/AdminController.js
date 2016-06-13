var namespace = angular.module("myApp", []);

namespace.directive('loading', function () {
    return {
        restrict: 'E',
        replace:true,
        template: '<div class="loading"><img src="http://www.nasa.gov/multimedia/videogallery/ajax-loader.gif" width="20" height="20" />LOADING...</div>',
        link: function (scope, element, attr) {
            scope.$watch('loading', function (val) {
                if (val)
                    $(element).show();
                else
                    $(element).hide();
            });
        }
    }
});

namespace.controller("MyController", function($scope, $http, $log){
    /**
     * Load the customer page with information
     */
    $http.get('customer/info')
        .success(function(data) {
            $scope.customerInfo = data;
        });

    /**
     * Return action for the customer
     * Customer can be active or inaction by this
     * @param id
     */
    $scope.getAction = function(id) {
        $http.post('customer/action', {id: id})
            .success(function(data) {
                $scope.customerInfo = data;
            })
    };

    /**
     * Return customer view
     * The information of a customer
     * @param id
     */
    $scope.view = function(id) {
        $http.post('customer/view', {id: id})
            .success(function(data) {
                $scope.customerView = data;
            })
    };

    /**
     * Load the Token panel page with information
     */
    $http.get('token/info')
        .success(function(data) {
            $scope.customerTokenInfo = data
        });

    /**
     * Return Approval Action of Token Request
     * @param id
     * @param token_request
     */
    $scope.getApprovalAction = function(id, token_request) {
        $http.post('token/action', {id: id, token_request: token_request})
            .success(function(data) {
                $scope.customerTokenInfo = data;
            })
    };

    /**
     * Load the Mail Box information
     */
    $http.get('mailbox/inbox')
        .success(function(data) {
            $scope.inboxData = data;
        })

    /**
     * Read the each mail
     * Keep the replay page false for see the mail first
     * @param id
     */
    $scope.readMessage = function(id) {
        $scope.replay = false;
        $http.post('mailbox/inbox/single', {id: id})
            .success(function(data) {
                $scope.inboxReadData = data;
            })
    };

    /**
     * Return the replay page view
     * Keep the replay page true for see the replay page after replay click event
     */
    $scope.getReplayView = function() {
        $scope.replay = true;
    };

    /**
     * Return replay to customer
     * @param $params
     */
    $scope.getReplay = function($params) {
      $http.post('mailbox/replay', {customerid: $params.customerid, subject: $params.inbox_subject, message: $params.message})
           .success(function(data) {
               $params.message = '';
               if(data == 'done') {
                   alert("Your mail has sent successfully");
               }
           });
        jQuery("#confirm-read-inbox").modal('hide');
    };

    /**
     * Return the Compose of the admin
     * This is unfinished task and need to develop
     */
    $scope.pushCompose = function() {
       alert('It is under construction');
    }

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

});
