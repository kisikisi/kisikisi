var kisiCtrl = ['$scope','$rootScope','$http','$auth','$state','envService', function($scope,$rootScope,$http,$auth,$state,envService) {

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

	$scope.getAuthUser = function() {
		$http.get($scope.env.api+"auth/user")
		.success(function(response){
			$rootScope.auth = response.user;
			$scope.popup();
		})
	};

	$scope.isLogin = function() {
    	return $auth.isAuthenticated();
    };
	if (! $scope.isLogin()) {
    	//if (! $scope.refreshToken()) $scope.loginPage();
    } else {
    	$scope.getAuthUser();
    }
}];
