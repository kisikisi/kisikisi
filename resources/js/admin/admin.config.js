var config = [ '$stateProvider', '$httpProvider', '$urlRouterProvider', '$authProvider', '$locationProvider',
	function($stateProvider, $httpProvider, $urlRouterProvider, $authProvider, $locationProvider) {
	$stateProvider.state('main', {
		url:'/', 
		templateUrl: 'views/admin/dashboard.html',
		controller: 'homeCtrl'/*,
		resolve: {
			loginRequired: loginRequired
		}*/
	}).state('login', {
		url:'/login', 
		templateUrl: 'views/admin/login.html',
		controller: 'authCtrl',
		resolve: {
			skipIfLoggedIn: skipIfLoggedIn
		}
	}).state('logout', {
        url: '/logout',
        template: null,
        controller: 'LogoutCtrl'
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

	$locationProvider.html5Mode(true);
	$urlRouterProvider.otherwise('/');
	
	$authProvider.loginUrl = '/api/login';

	function skipIfLoggedIn($q, $auth) {
      var deferred = $q.defer();
      if ($auth.isAuthenticated()) {
        deferred.reject();
      } else {
        deferred.resolve();
      }
      return deferred.promise;
    }

	function loginRequired($q, $location, $auth) {
      var deferred = $q.defer();
      if ($auth.isAuthenticated()) {
        deferred.resolve();
      } else {
        $location.path('/login');
      }
      return deferred.promise;
    }
}]