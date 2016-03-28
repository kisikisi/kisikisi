var kisiCtrl = ['$scope','$auth','$state', function($scope,$auth,$state) {

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