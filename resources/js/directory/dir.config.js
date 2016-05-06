var config = [ '$stateProvider', '$httpProvider', '$urlRouterProvider', '$authProvider', '$locationProvider', 'envServiceProvider',
	function($stateProvider, $httpProvider, $urlRouterProvider, $authProvider, $locationProvider, envServiceProvider) {
	
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

	$stateProvider.state('school', {
		url:'/', 
		controller: 'dirCtrl'
	}).state('schoolDetail', {
		url:'/{id:[a-zA-Z1-9.-]*}', 
		controller: 'dirDetailCtrl',
        templateUrl: 'views/directory/school.detail.html'
	});
        
	envServiceProvider.config({
		domains: {
			development: ['localhost', 'kisikisi.dev', 'dir.kisikisi.dev'],
			production: ['103.11.74.10', 'kisikisi.id', 'dir.kisikisi.id']
		},
		vars: {
			development: {
				site: '//kisikisi.dev/',
				api: '//api.kisikisi.dev/',
				file: '//files.kisikisi.dev/',
				dir: '//dir.kisikisi.dev/'
				
			},
			production: {
				site: '//kisikisi.com/',
				api: '//api.kisikisi.com/',
				dir: '//dir.kisikisi.com/',
				file: '//files.kisikisi.com/'
			}
		}
	});

	// run the environment check, so the comprobation is made 
	// before controllers and services are built 
	envServiceProvider.check();

	$locationProvider.html5Mode(true);
	$urlRouterProvider.otherwise('/');
	
	$authProvider.loginUrl = '/login';
	
}]