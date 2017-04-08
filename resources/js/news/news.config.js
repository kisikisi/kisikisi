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

	$stateProvider.state('news', {
		url:'/', 
		controller: 'newsIndexCtrl',
        templateUrl: 'views/news/news.list.html'
	}).state('news.detail', {
		url:'{id:[a-zA-Z0-9.-]*}/{slug}',
		onEnter: [ '$stateParams', '$rootScope', function($stateParams, $rootScope) {
			$rootScope.detailNews($stateParams.id);
		}],
		onExit: [ '$stateParams', '$rootScope', function($stateParams, $rootScope) {
			$rootScope.modal1.modal('hide');
			//console.log($stateParams.productId);
		}]
	});
        
	envServiceProvider.config({
		domains: {
			development: ['localhost', 'kisikisi.dev', 'berita.kisikisi.dev'],
			production: ['103.11.74.10', 'kisikisi.id', 'berita.kisikisi.id']
		},
		vars: {
			development: {
				site: '//kisikisi.dev/',
				api: '//api.kisikisi.dev/',
				file: '//files.kisikisi.dev/',
				news: '//berita.kisikisi.dev/'
				
			},
			production: {
				site: '//kisikisi.id/',
				api: '//api.kisikisi.id/',
				news: '//berita.kisikisi.id/',
				file: '//files.kisikisi.id/'
			}
		}
	});

	// run the environment check, so the comprobation is made 
	// before controllers and services are built 
	envServiceProvider.check();

	$locationProvider.html5Mode(true);
	$urlRouterProvider.otherwise('/');
	$authProvider.withCredentials = false;

	$authProvider.facebook({
	  //for development
      //clientId: '1496399374007633', // for live
      clientId: '607018229476252',
      url: '//api.kisikisi.dev/auth/facebook'
    });

    $authProvider.google({
      /*clientId: '923539880721-sprpmk4rgmjq1ht75govalre7gl86bbm.apps.googleusercontent.com',*/
      clientId: '184079557512-d60g6d3mfa3c6j62lk8kp0p692gvcd3c.apps.googleusercontent.com', // for development
      url: '//api.kisikisi.dev/auth/google',
    });
	
	$authProvider.loginUrl = '/login';
    $authProvider.signupUrl = '/register';

    ezfbProvider.setInitParams({
        appId: '607018229476252'
    });
	
}]
