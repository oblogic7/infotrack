/**
 * Created by matt on 4/12/14.
 */


angular.module('modules.clients.controllers')

    .controller('ClientController', ['$scope', 'ClientService', function ($scope, ClientService) {

        $scope.client = new ClientService();

        $scope.save = function (client) {
            $scope.client.$save();
           $scope.clients.push($scope.client);
            $scope.client = new ClientService();
            $state.go('clients.list');
        }

    }]);
