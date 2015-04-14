define(['angular'], function(angular) {
    "use strict";

    angular.module('trinityAccount.directives', [])
    
    // dropdown directive with 'dropit' plugin support. 
    .directive('dropdown', function() {
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
            'templateUrl': '/assets/js/account/js/partials/dropdown.html'
        }
    });
})