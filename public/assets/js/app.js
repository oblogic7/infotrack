// @codekit-prepend "vendors/jquery/jquery-1.11.0.js"
// @codekit-prepend "vendors/jquery/jquery-ui-1.10.3.js"

/*************************
 |  ANGULAR
 *************************/

// @codekit-prepend "../bower_components/angular/angular.js"

/* END ANGULAR */


/*************************
 |  ANGULAR INCLUDES
 *************************/

// @codekit-prepend "../bower_components/angular-ui-router/release/angular-ui-router.js"
// @codekit-prepend "../bower_components/angular-resource/angular-resource.js"

/* END INCLUDES */


/*************************
 |  MODULES
 *************************/

// @codekit-append "modules/common/utils/utils.js"
// @codekit-append "modules/clients/clients.js"

/* END MODULES */


/*************************
 |  HERE WE GO!
 *************************/

angular.module('app', ['ui.router', 'modules.clients'])
    .config(function ($stateProvider, $urlRouterProvider) {

        $urlRouterProvider.otherwise('');

        $stateProvider
            .state('home', {
                url: '',
                templateUrl: '/assets/templates/dashboard/index.html'
            })
    })
    .run(
        ['$rootScope', '$state', '$stateParams',
            function ($rootScope, $state, $stateParams) {

                // It's very handy to add references to $state and $stateParams to the $rootScope
                // so that you can access them from any scope within your applications.For example,
                // <li ui-sref-active="active }"> will set the <li> // to active whenever
                // 'contacts.list' or one of its decendents is active.
                $rootScope.$state = $state;
                $rootScope.$stateParams = $stateParams;
            }
        ]
    );


/*************************
 |  DIRECTIVES
 *************************/

// @codekit-append "modules/directives/Treeview.js"

/* END DIRECTIVES */
