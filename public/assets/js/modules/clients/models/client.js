/**
 * Created by matt on 4/10/14.
 */

angular.module('modules.clients.models', ['ngResource'])
    .factory('ClientModel', function ($resource) {
        return $resource(
            '/api/v1/clients/:id',
            {id: '@id'},
            {'update': {
                method: 'PUT'}
            });
    });