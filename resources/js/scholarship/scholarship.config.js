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

	$stateProvider.state('agenda', {
		url:'/',
		controller: 'agendaIndexCtrl',
        templateUrl: 'views/agenda/agenda.list.html'
	}).state('agendaDetail', {
		url:'/{id:[a-zA-Z1-9.-]*}',
		controller: 'agendaDetailCtrl',
        templateUrl: 'views/agenda/agenda.detail.html'
	});

	envServiceProvider.config({
		domains: {
			development: ['localhost', 'kisikisi.dev', 'agenda.kisikisi.dev'],
			production: ['103.11.74.10', 'kisikisi.id', 'agenda.kisikisi.id']
		},
		vars: {
			development: {
				site: '//kisikisi.dev/',
				api: '//api.kisikisi.dev/',
				file: '//files.kisikisi.dev/',
				agenda: '//agenda.kisikisi.dev/'

			},
			production: {
				site: '//kisikisi.id/',
				api: '//api.kisikisi.id/',
				agenda: '//agenda.kisikisi.id/',
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
