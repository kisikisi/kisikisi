app = angular.module('kisiDirApp', ['ui.router', 'ngSanitize', 'satellizer', 'ngTouch', 'superswipe', 'environment','ui-notification','ngTagsInput', 'ezfb', 'infinite-scroll' ]);
app
/*.constant('constant', {
	'site': '//'+host+'/',
	'api': '//api.'+host+'/',
	'files': '//files.'+host+'/',
	'embedly': '8081dea79e164014bcd7cd7e1ab2363a'
})*/
.config(config)
.controller('dirCtrl', dirCtrl)
.controller('dirIndexCtrl', dirIndexCtrl)
.controller('dirDetailCtrl', dirDetailCtrl)
.directive('uiRating', function() {
	return function (scope, element, attr) {
		$(element).rating();
    };
})
.directive('uiSticky', function() {
	return function (scope, element, attr) {
		$(element).sticky({
			observeChanges: true,
			context: "#content"
		});
    };
})
.directive('uiTab', function() {
	return function (scope, element, attr) {
		$(element).tab();;
    };
})
/*
.directive('sidebar', function() {
	return function (scope, element, attr) {
		$.AdminLTE.tree(element);
    };
})
*/
