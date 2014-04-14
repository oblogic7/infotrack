/**
 * Created by matt on 4/10/14.
 */

angular.module('modules.clients.services', ['ngResource'])
    .factory('ClientService', function ($resource) {
        return $resource(
            '/api/v1/clients/:id',
            {id: '@id'},
            {'update': {
                method: 'PUT'}
            });
    });