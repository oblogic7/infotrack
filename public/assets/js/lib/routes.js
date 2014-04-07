/**
 * Created by matt on 4/6/14.
 */
var App = angular.module('app');

App.config(
    function($stateProvider, $urlRouterProvider) {
        $stateProvider
            .state('home', {
                url: '',
                templateUrl: '/assets/js/lib/views/dashboard/index.html'
            })
            .state('clients', {
                url: '/clients',
                templateUrl: '/assets/js/lib/views/clients/index.html'
            })
    });