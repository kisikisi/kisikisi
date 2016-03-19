var authCtrl = ['$scope', '$auth', '$state', function($scope, $auth, $state) {	
	$scope.login = function() {
		$auth.login($scope.user)
		  .then(function(response) {
		    // Redirect user here after a successful log in.
		    //console.log(response.token)
		  	//$scope.getAuthUser();
		  	$state.go('dashboard');
		  })
		  .catch(function(response) {
		    UIkit.notify(response.data.message, response.status);
		  });
	}	
}];