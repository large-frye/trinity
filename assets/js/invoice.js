var app = angular.module('invoicingApp', ['ngResource']);

app.factory('invoiceFactory', ['$resource',
    function($resource) {
        return {
            getItems: $resource('/api/items/:workorderId', {
                workorderId: '@workorderId'
            }),
            addItem: $resource('/api/addItem/:workorderId', {
                workorderId: '@workorderId'
            })
        };
    }
]);

app.controller('invoiceCtrl', function($scope, $location, invoiceFactory) {
    $scope.invoiceItems = [];

    invoiceFactory.getItems.get({
        workorderId: document.URL.split('/')[5]
    }).$promise.then(function(data) {
        $scope.items = [];

        for (var d in data) {
            if (typeof data[d] === "object" && typeof data[d].name !== "undefined") {
                $scope.items.push({
                    name: data[d].name,
                    cost: data[d].cost,
                    key: d,
                    checked: typeof data[d].checked !== "undefined" ? true : false
                });

                if (typeof data[d].checked !== "undefined") {
                    $scope.invoiceItems.push({
                        name: data[d].name,
                        cost: data[d].cost,
                        key: d,
                        checked: true
                    });

                    $scope.addToReportBtn = true;
                }
            }
        }
    });

    $scope.addItem = function(item) {

        // Backwards knowledge, but can't watch a bunch of items, we need to reverse. 
        if (item.checked === true) {
            for (var i = 0; i < $scope.invoiceItems.length; i++) {
                if ($scope.invoiceItems[i].name === item.name) {
                    $scope.invoiceItems.splice(i);
                }
            }

            if ($scope.invoiceItems.length === 0) {
                $scope.addToReportBtn = false;
            }

        } else {
            $scope.invoiceItems.push(item);
        }

        // After an item has been clicked, you can add to the report.
        $scope.addToReportBtn = true;

    };

    $scope.addItems = function() {

        $scope.successMsg = false;

        invoiceFactory.addItem.save({
            workorderId: document.URL.split('/')[5]
        }, $scope.invoiceItems).$promise.then(function() {
            $scope.successMsg = true;
        });

    };

    $scope.pushItem = function(item) {

        $scope.items.push({
            name: item.name,
            cost: item.cost,
            key: null,
            checked: false
        });

    };

    $scope.redirect = function(url) {
        location.href = url;
    };

});