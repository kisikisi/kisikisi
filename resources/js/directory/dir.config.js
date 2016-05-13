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

	$stateProvider.state('school', {
		url:'/', 
		controller: 'dirIndexCtrl',
        templateUrl: 'views/directory/school.list.html'
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
				site: '//kisikisi.id/',
				api: '//api.kisikisi.id/',
				dir: '//dir.kisikisi.id/',
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
        
    ezfbProvider.setInitParams({
        appId: '135688693164869'
    });
	
}]
