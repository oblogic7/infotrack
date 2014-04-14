/**
 * Created by matt on 4/5/14.
 */

// @codekit-append "controllers/clients-controller.js"
// @codekit-append "services/clients-service.js"

angular.module('modules.clients.services', [])
angular.module('modules.clients.controllers', ['modules.clients.services'])

angular.module('modules.clients', ['ui.router', 'modules.clients.controllers', 'modules.common.utils', 'ngResource', 'modules.clients.services'])

    .config(
    function ($stateProvider, $urlRouterProvider) {

        $stateProvider
            .state('clients', {
                url: '/clients',
                abstract: true,
                templateUrl: '/assets/js/modules/clients/templates/clients.html',
                controller: ['$scope', 'ClientService', function($scope, ClientService) {
                    $scope.clients = ClientService.query();
                    console.table($scope.clients)
                }]
            })
            .state('clients.index', {
                url: '',
                templateUrl: '/assets/js/modules/clients/templates/clients.index.html'

            })
            .state('clients.detail', {
                url: '/:id',
                templateUrl: '/assets/js/modules/clients/templates/clients.detail.html',
                controller: ['$scope', '$stateParams', 'Utils', function($scope, $stateParams, Utils) {
                    $scope.client = Utils.findById($scope.clients, $stateParams.id);
                }]
            })
            .state('clients.create', {
                url: '/create',
                templateUrl: '/assets/js/modules/clients/templates/clients.create.html'
            })
            .state('clients.edit', {
                url: '/:id/edit',
                templateUrl: '/assets/js/modules/clients/templates/clients.edit.html'
            })
    });