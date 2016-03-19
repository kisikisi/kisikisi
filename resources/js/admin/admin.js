/* Kisikisi JS Script App */

app = angular.module('kisiApp', ['ui.router', 'satellizer', 'ngTouch', 'superswipe', 
	'angularUtils.directives.dirPagination', 'xeditable' ]);

app
.run(['editableOptions', 'editableThemes',function(editableOptions, editableThemes) {
  editableThemes.bs3.inputClass = 'ui input';
  editableThemes.bs3.buttonsClass = 'ui button';
  editableOptions.theme = 'bs3';
}])
.config(config)
.controller('kisiCtrl', kisiCtrl)
.controller('homeCtrl', homeCtrl)
.controller('authCtrl', authCtrl)
//.controller('adminCtrl', function() {})
//.controller('adminMappingCtrl', adminMappingCtrl)

/*.directive('datepicker', function() {
	return function (scope, element) {
		element.datepicker();
    };
})*/

/*.directive('sidebar', function() {
	return function (scope, element) {
		element.sidebar('toggle');
    };
.directive('sticky', function() {
	return function (scope, element) {
		element.sticky();
		element.visibility({
	      type: 'fixed'
	    });
    };
})
.directive('progress', function() {
	return function (scope, element, attr) {
		element.progress();
    };
})*/
