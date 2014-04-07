(function() {
    'use strict';

    var App = angular.module('app.controllers');

    App.controller('TestController', ['$scope', function($scope) {
        $scope.test = 'TestController Text';

    }]);
})();