var app = angular.module('autocompleteApp', []);

app.factory('dataFactory', function($http) {

    return {

        getInspectors: function(callback) {
            return $http.get('/api/getInspectors').success(callback);
        }

    };

});

app.directive('typeahead', function($timeout) {
    return {
        restrict: 'AEC',
        scope: {
            items: '=',
            prompt: '@',
            title: '@',
            subtitle: '@',
            model: '=',
            onSelect: '&'
        },

        link: function(scope, elem, attrs) {
            scope.handleSelection = function(selectedItem) {
                scope.model = selectedItem;
                scope.current = 0;
                scope.selected = true;
                $timeout(function() {
                    scope.onSelect();
                }, 200);
            };
            scope.current = 0;
            scope.selected = true; // hides the list initially
            scope.isCurrent = function(index) {
                return scope.current == index;
            };
            scope.setCurrent = function(index) {
                scope.current = index;
            };
        },

        template: '<input type="text" ng-model="model" placeholder="{{prompt}}" ng-keydown="selected=false" /><br/>' +
            '<div class="items" ng-hide="!model.length || selected">' +
            '<div class="item" ng-repeat="item in items | filter:model  track by $index" ng-click="handleSelection(item[title])" style="cursor:pointer" ng-class="{active:isCurrent($index)}" ng-mouseenter="setCurrent($index)">' +
            '<p class="title">{{item[title]}}</p>' +
            '<p class="subtitle">{{item[subtitle]}}</p>' +
            '</div>' +
            '</div>'

    };
});

app.controller('typeAheadCtrl', function($scope, dataFactory) {
    dataFactory.getInspectors(function(data) {
        $scope.items = data;
    });

    angular.extend($scope, {
        name: '',
        onItemSelected: function() {
            console.log('selected=' + $scope.name);
        }
    });
});