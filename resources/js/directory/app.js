app = angular.module('kisiApp', ['ui.router', 'ngSanitize', 'satellizer', 'ngTouch', 'superswipe', 'environment','ui-notification','ngTagsInput', 'ezfb', 'infinite-scroll','validation.match' ]);
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
/*.directive('uiSticky', function() {
	return function (scope, element, attr) {
		$(element).sticky({
			observeChanges: true,
			context: "#content"
		});
    };
})*/
/*.directive('ukTooltip', function() {
	return function (scope, element, attr) {
		UIkit.tooltip(element);
    };
})*/
.directive('uiTab', function() {
	return function (scope, element, attr) {
		$(element).tab();
    };
})
.directive('uiSidebar', function() {
	return function (scope, element, attr) {
		$(element).sidebar('toggle');
		$(element).sidebar('attach events', attr.trigger);
    };
})
.directive('uiDropdown', function() {
	return function (scope, element, attr) {
		$(element).dropdown({
			keepOnScreen: false
		});
    };
})
.directive('uiAccordion', function() {
	return function (scope, element, attr) {
		$(element).accordion();
    };
})
.directive('uiCheckbox', function() {
	return function (scope, element, attr) {
		$(element).checkbox('toggle');
    };
})
/*
.directive('sidebar', function() {
	return function (scope, element, attr) {
		$.AdminLTE.tree(element);
    };
})
*/
