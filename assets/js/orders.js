var app = angular.module('ordersApp', ['ngResource', 'ngRoute', 'ui.bootstrap']);

app.config(['$routeProvider', function($routeProvider) {
    $routeProvider.when('/', {
        templateUrl: 'assets/js/orders/partials/all.html',
        controller: 'workordersCtrl'
    });
}]);

// dropdown directive with 'dropit' plugin support. 
app.directive('dropdown', function() {
    return {
        'scope': {
            'order': '=',
            'usertype': '='
        },
        'restrict': 'A',
        'transclude': true,
        'link': function(scope, element, attrs) {

            // add dropit plugin
            element.dropit();

            scope.dropdown = function($event) {
                $event.preventDefault();
            }
        },
        'templateUrl': 'assets/js/orders/partials/dropdown.html'
    }
});

// our asynchronus services
app.factory('orderFactory', ['$resource',
    function($resource) {
        return $resource('/api/:action/:id/:pageNumber', {
            'action': '@action'
        }, {
            getOrders: {
                'method': 'GET',
                'headers': {
                    'Accept': 'application/json'
                },
                'params': {
                    'action': 'orders'
                },
                'isArray': true
            },
            getCount: {
                'method': 'GET',
                'headers': {
                    'Accept': 'application/json'
                },
                'params': {
                    'action': 'amountOfOrders'
                }
            },
            getUserType: {
                'method': 'GET',
                'headers': {
                    'Accept': 'application/json'
                },
                'params': {
                    'action': 'getUserType'
                }
            }
        });
    }
]);

app.controller('workordersCtrl', ['$scope', '$filter', 'orderFactory', function($scope, $filter, orderFactory) {
    var orderBy = $filter('orderBy');
    $scope.totalItems = [];
    $scope.currentPage = 1;

    orderFactory.getUserType().$promise.then(function(resp) {
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

        orderFactory.getOrders({
            'pageNumber': 1
        }).$promise.then(function(resp) {
            $scope.orders = resp;
            orderFactory.getCount().$promise.then(function(response) {
                $scope.totalItems = response.count;
            });
        }, function(err) {
            console.log(err);
        });
    });

    $scope.pageChanged = function() {
        $scope.loading = true;
        $scope.searchText = '';
        orderFactory.getOrders({
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
