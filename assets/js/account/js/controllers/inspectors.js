define(['angular'], function(angular) {
    "use strict";

    angular.module('trinityAccount.controllers.inspectors', [])

        .controller('inspectorsCtrl', ['$scope', function($scope) {
            $scope.inspectors = [
                {
                    "name": "Andrew",
                    "status": "PENDING",
                    "inspections": 3,
                    "id": 1
                }

            ]
        }]);
});