var config = [ '$stateProvider', '$httpProvider', '$urlRouterProvider', '$authProvider', '$locationProvider', 'envServiceProvider', 'ezfbProvider',
	function($stateProvider, $httpProvider, $urlRouterProvider, $authProvider, $locationProvider, envServiceProvider, ezfbProvider) {

	var loginRequired = ['$q', '$location', '$auth', function($q, $location, $auth) {
      var deferred = $q.defer();
      if ($auth.isAuthenticated()) {
        deferred.resolve();
      } else {
        $location.path('/login');
      }
      return deferred.promise;
    }];

    var skipIfLoggedIn = ['$q', '$auth', function($q, $auth) {
      var deferred = $q.defer();
      if ($auth.isAuthenticated()) {
        deferred.reject();
      } else {
        deferred.resolve();
      }
      return deferred.promise;
    }];

	$stateProvider.state('course', {
		url:'/',
		controller: 'courseIndexCtrl',
        templateUrl: 'views/course/course.list.html'
	}).state('course.detail', {
		url:'{id:[a-zA-Z0-9.-]*}/{slug}',
		onEnter: [ '$stateParams', '$rootScope', function($stateParams, $rootScope) {
			$rootScope.detailCourse($stateParams.id);
		}],
		onExit: [ '$stateParams', '$rootScope', function($stateParams, $rootScope) {
			$rootScope.modal1.modal('hide');
			//console.log($stateParams.productId);
		}]
	});

	envServiceProvider.config({
		domains: {
			development: ['localhost', 'kisikisi.dev', 'learning.kisikisi.dev'],
			production: ['103.11.74.10', 'kisikisi.id', 'learning.kisikisi.id']
		},
		vars: {
			development: {
				site: '//kisikisi.dev/',
				api: '//api.kisikisi.dev/',
				file: '//files.kisikisi.dev/',
				course: '//learning.kisikisi.dev/'

			},
			production: {
				site: '//kisikisi.id/',
				api: '//api.kisikisi.id/',
				course: '//learning.kisikisi.id/',
				file: '//files.kisikisi.id/'
			}
		}
	});

	// run the environment check, so the comprobation is made
	// before controllers and services are built
	envServiceProvider.check();

	$locationProvider.html5Mode(true);
	$urlRouterProvider.otherwise('/');

	$authProvider.facebook({
	  //for development
      //clientId: '1496399374007633', // for live
      clientId: '607018229476252',
      url: '//api.kisikisi.id/auth/facebook'
    });

    $authProvider.google({
      /*clientId: '923539880721-sprpmk4rgmjq1ht75govalre7gl86bbm.apps.googleusercontent.com',*/
      clientId: '184079557512-d60g6d3mfa3c6j62lk8kp0p692gvcd3c.apps.googleusercontent.com', // for development
      url: '//api.kisikisi.id/auth/google',
    });

	$authProvider.loginUrl = '/login';
	$authProvider.signupUrl = '/register';

	ezfbProvider.setInitParams({
        appId: '607018229476252'
    });

}]
