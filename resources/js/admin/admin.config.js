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

	$stateProvider.state('dashboard', {
		url:'/', 
		templateUrl: 'views/admin/dashboard.html',
		controller: 'homeCtrl',
		resolve: {
			loginRequired: loginRequired
		}
	}).state('school', {
		url:'/school', 
		templateUrl: 'views/admin/school.html',
		controller: 'schoolCtrl',
		resolve: {
			loginRequired: loginRequired
		}
	}).state('school-type', {
		url:'/school/type', 
		templateUrl: 'views/admin/school.type.html',
		controller: 'schoolTypeCtrl',
		resolve: {
			loginRequired: loginRequired
		}
	}).state('login', {
		url:'/login', 
		templateUrl: 'views/admin/login.html',
		controller: 'authCtrl',
		resolve: {
			skipIfLoggedIn: skipIfLoggedIn
		}
	});
	//controller example
	/*.state('mapping', {
		url:'/admin/mapping',
		templateUrl: 'views/mapping/index.html',
		controller: 'adminMappingCtrl',
		resolve: {
			loginRequired: loginRequired
		}
	})*/
	
	envServiceProvider.config({
		domains: {
			development: ['localhost', 'kisikisi.dev', 'admin.kisikisi.dev'],
			production: ['103.11.74.10', 'kisikisi.id', 'admin.kisikisi.id']
		},
		vars: {
			development: {
				site: '//kisikisi.dev/',
				api: '//api.kisikisi.dev/',
				admin: '//admin.kisikisi.dev/',
				file: '//files.kisikisi.dev/'
				
			},
			production: {
				site: '//kisikisi.com/',
				api: '//api.kisikisi.com/',
				admin: '//admin.kisikisi.com/',
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