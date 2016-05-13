var kisiCtrl = ['$scope','$rootScope','$auth','$state','envService', function($scope,$rootScope,$auth,$state,envService) {

    $rootScope.env = envService.read('all');

    /*if ($auth.isAuthenticated()) {
        $.AdminLTE.tree(".sidebar");
    }*/

	$scope.isAuthenticated = function() {
	  return $auth.isAuthenticated();
	};

	$scope.logout = function() {
		$auth.logout();
		$state.go('login');
	}

	$scope.indexSearch = function(array, id) {	
		return array.map(function(el) {
		  return el.id;
		}).indexOf(id);
    }
}];
