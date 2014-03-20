(function() {
    'use strict';

    angular.module('app.controllers').controller('TestController', ['$scope', function($scope) {
        $scope.test = 'TestController Text';

    }]);
})();