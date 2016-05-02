/* Kisikisi JS Script App */
/*var hostName = window.location.hostname;  
var hostNameArray = hostName.split(".");  
var posOfTld = hostNameArray.length - 1;  
var host = hostNameArray[posOfTld];
*/
app = angular.module('kisiApp', ['ui.router', 'satellizer', 'ngTouch', 'superswipe', 
	'angularUtils.directives.dirPagination', 'xeditable', 'environment','ui-notification','ngFileUpload','ngTagsInput','toggle-switch' ]);
app
/*.constant('constant', {
	'site': '//'+host+'/',
	'api': '//api.'+host+'/',
	'files': '//files.'+host+'/',
	'embedly': '8081dea79e164014bcd7cd7e1ab2363a'
})*/
.run(['editableOptions', 'editableThemes',function(editableOptions, editableThemes) {
  editableThemes.bs3.inputClass = 'ui input';
  editableThemes.bs3.buttonsClass = 'ui button';
  editableOptions.theme = 'bs3';
}])
.config(config)
.controller('kisiCtrl', kisiCtrl)
.controller('homeCtrl', homeCtrl)
.controller('authCtrl', authCtrl)
.controller('schoolTypeCtrl', schoolTypeCtrl)
.controller('schoolCtrl', schoolCtrl)
.controller('newsCtrl', newsCtrl)
.controller('newsCatCtrl', newsCatCtrl)
.controller('newsLabelCtrl', newsLabelCtrl)
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
.directive('sidebar', function() {
	return function (scope, element, attr) {
		$.AdminLTE.tree(element);
    };
})
.directive('wysihtml5', function() {
	return function (scope, element, attr) {
		$(element).wysihtml5();
    };
})
.directive('datepicker', function() {
    return function(scope, element, attr) {
        $(element).datepicker();
    }
});
/*.directive('icheckRadio', function() {
    return function(scope, element, attr) {
        $(element).iCheck({
          radioClass: 'iradio_flat-blue'
        });
    }
})*/