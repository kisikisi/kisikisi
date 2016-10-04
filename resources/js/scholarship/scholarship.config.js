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

	$stateProvider.state('scholarship', {
		url:'/',
		controller: 'scholarshipIndexCtrl',
        templateUrl: 'views/scholarship/scholarship.list.html'
	}).state('scholarship.detail', {
		url:'{id:[a-zA-Z0-9.-]*}/{slug}',
		onEnter: [ '$stateParams', '$rootScope', function($stateParams, $rootScope) {
			$rootScope.detailScholarship($stateParams.id);
		}],
		onExit: [ '$stateParams', '$rootScope', function($stateParams, $rootScope) {
			$rootScope.modal1.modal('hide');
			//console.log($stateParams.productId);
		}]
	});

	envServiceProvider.config({
		domains: {
			development: ['localhost', 'kisikisi.dev', 'beasiswa.kisikisi.dev'],
			production: ['103.11.74.10', 'kisikisi.id', 'beasiswa.kisikisi.id']
		},
		vars: {
			development: {
				site: '//kisikisi.dev/',
				api: '//api.kisikisi.dev/',
				file: '//files.kisikisi.dev/',
				scholarship: '//beasiswa.kisikisi.dev/'

			},
			production: {
				site: '//kisikisi.id/',
				api: '//api.kisikisi.id/',
				scholarship: '//beasiswa.kisikisi.id/',
				file: '//files.kisikisi.id/'
			}
		}
	});

	// run the environment check, so the comprobation is made
	// before controllers and services are built
	envServiceProvider.check();

	$locationProvider.html5Mode(true);
	$urlRouterProvider.otherwise('/');

	$authProvider.loginUrl = '/login';
	$authProvider.signupUrl = '/register';

    ezfbProvider.setInitParams({
        appId: '607018229476252'
    });

}]
