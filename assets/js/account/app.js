require.config({
    baseUrl: "/assets/js/account",
    paths: {
        'jquery': './vendor/jquery/dist/jquery.min',
        'bootstrap': './vendor/bootstrap/dist/js/bootstrap.min',
        'angular': './vendor/angular/angular.min',
        'angular-route': './vendor/angular-route/angular-route.min',
        'angular-resource': './vendor/angular-resource/angular-resource.min',
        'trinityAccount': 'js/'
    },
    shim: {
        'jquery': {
            exports: 'jquery'
        },
        'bootstrap': {
            deps: ['jquery'],
            exports: 'bootstrap'
        },
        angular: {
            exports: 'angular'
        },
        'angular-route': ['angular'],
        'angular-resource': ['angular']
    }
});

/* You can add multiple files, but cannot `require` a directory */

require(['angular', './js/controllers/inspectors', './js/controllers/orders', './js/directives', './js/filters', './js/services', 'angular-route', 'angular-resource'],
    function (angular) {

        angular.module('trinityAccount', [
            'ngRoute',
            'ngResource',
            'trinityAccount.filters',
            'trinityAccount.services',
            'trinityAccount.directives',
            'trinityAccount.controllers.inspectors',
            'trinityAccount.controllers.orders'
        ])
            .config(['$routeProvider',

                function ($routeProvider) {

                    $routeProvider.when('/inspectors', {
                        templateUrl: '/assets/js/account/js/partials/inspectors.html',
                        controller: 'inspectorsCtrl'
                    });

                    $routeProvider.when("/inspectors/:id", {
                        templateUrl: "/assets/js/account/js/partials/inspector.html",
                        controller: "inspectorsCtrl"
                    });
                    
                    $routeProvider.when("/", {
                        templateUrl: "/assets/js/account/js/partials/all.html",
                        controller: 'ordersCtrl'
                    });

                }

            ])

            .config(['$httpProvider',
                function ($httpProvider) {
                    $httpProvider.interceptors.push(['$q', '$location', '$window', '$rootScope', '$timeout',
                        function ($q, $location, $window, $rootScope, $timeout) {
                            return {
                                'request': function (config) {
                                    config.headers = config.headers || {};
                                    return config || $q.when(config);
                                }
                            };
                        }]);
                }
            ]);

        /*global document*/
        angular.bootstrap(document, ['trinityAccount']);
    });