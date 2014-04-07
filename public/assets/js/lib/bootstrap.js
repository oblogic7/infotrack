// @codekit-prepend "../vendors/jquery/jquery-1.11.0.js"
// @codekit-prepend "../vendors/jquery/jquery-ui-1.10.3.js"

/*************************
 |  ANGULAR
 *************************/

// @codekit-prepend "../../bower_components/angular/angular.js"

/* END ANGULAR */

/*************************
 |  ANGULAR INCLUDES
 *************************/

// @codekit-prepend "../../bower_components/angular-ui-router/release/angular-ui-router.js"

/* END INCLUDES */

/*************************
 |  ROUTING
 *************************/

// @codekit-append "routes.js"

/* END ROUTING */

/*************************
 |  CONTROLLERS
 *************************/

// @codekit-append "controllers/TestController.js"
// @codekit-append "controllers/ClientsController.js"

/* END CONTROLLERS */

/*************************
 |  DIRECTIVES
 *************************/

// @codekit-append "directives/Treeview.js"

/* END DIRECTIVES */

/*************************
 |  HERE WE GO!
 *************************/

(function() {
    'use strict';

    angular.module('app', [ 'app.controllers', 'ui.router' ]);

    angular.module('app.controllers', []);
})();