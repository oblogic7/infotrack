/**
 * Created by matt on 4/5/14.
 */

(function () {
    'use strict';

    var App = angular.module('app.controllers')

    App.controller('ClientsController', ['$scope', '$http', function ($scope, $http) {

        $http.get('/api/v1/clients').success(function(clients) {
            $scope.clients = clients;
        });

    }]);
})();