define(['angular'], function(angular) {
    "use strict";
    
    angular.module('trinityAccount.controllers.orders', [])
    
    .controller('ordersCtrl', ['$scope', '$filter', 'orderService', function($scope, $filter, orderService) {
        var orderBy = $filter('orderBy');
        $scope.totalItems = [];
        $scope.currentPage = 1;
        
        orderService.getUserType().$promise.then(function(resp) {
            switch (resp.userType) {
                case 2: 
                $scope.usertype = {
                    admin: true
                };
                break;
                case 3: 
                $scope.usertype = {
                    inspector: true
                };
                break;
                case 4: 
                $scope.usertype = {
                    client: true
                };
                break;
                case 5:
                    $scope.usertype = {
                        officeUser: true
                    };
                    break;
                }
                
                orderService.getOrders({
                    'pageNumber': 1
                }).$promise.then(function(resp) {
                    $scope.orders = resp;
                    orderService.getCount().$promise.then(function(response) {
                        $scope.totalItems = response.count;
                    });
                }, function(err) {
                    console.log(err);
                });
            });
            
            $scope.pageChanged = function() {
                $scope.loading = true;
                $scope.searchText = '';
                orderService.getOrders({
                    'pageNumber': $scope.currentPage
                }).$promise.then(function(resp) {
                    $scope.loading = false;
                    $scope.orders = resp;
                });
            }
            
            $scope.order = function(predicate, reverse) {
                console.log(predicate);
                $scope.orders = orderBy($scope.orders, predicate, reverse);
            };
    }]);
});