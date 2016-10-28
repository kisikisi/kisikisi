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
	}).state('school.detail', {
		url:'{id:[a-zA-Z0-9.-]*}/{slug}',
		onEnter: [ '$stateParams', '$rootScope', function($stateParams, $rootScope) {
			$rootScope.detailSchool($stateParams.id);
		}],
		onExit: [ '$stateParams', '$rootScope', function($stateParams, $rootScope) {
			$rootScope.modal1.modal('hide');
			//console.log($stateParams.productId);
		}]
	});
        
	envServiceProvider.config({
		domains: {
			development: ['localhost', 'kisikisi.dev', 'direktori.kisikisi.dev'],
			production: ['103.11.74.10', 'kisikisi.id', 'direktori.kisikisi.id']
		},
		vars: {
			development: {
				site: '//kisikisi.dev/',
				api: '//api.kisikisi.dev/',
				file: '//files.kisikisi.dev/',
				dir: '//direktori.kisikisi.dev/'
				
			},
			production: {
				site: '//kisikisi.id/',
				api: '//api.kisikisi.id/',
				dir: '//direktori.kisikisi.id/',
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

	$authProvider.facebook({
	  //for development
      //clientId: '1496399374007633', // for live
      clientId: '607018229476252',
      url: '//api.kisikisi.id/auth/facebook'
    });

    $authProvider.google({
      clientId: '923539880721-sprpmk4rgmjq1ht75govalre7gl86bbm.apps.googleusercontent.com',
      url: '//api.kisikisi.id/auth/google'
    });

    ezfbProvider.setInitParams({
        appId: '607018229476252'
    });
	
}]
