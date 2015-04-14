define(['angular'], function(angular) {
    "use strict";

    angular.module('trinityAccount.services', [])

        .service("inspectorService", ["$resource", function($resource) {
            return $resource("/api/:action/:id/:pageNumber", {
                action: "@action"
            }, {
                list: {
                    method: "GET",
                    headers: {
                        "Accept": "application/json"
                    },
                    params: {
                        "action": "list-inspectors"
                    },
                    isArray: true
                }
            })
        }])
        
        .service('orderService', ['$resource',
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
})