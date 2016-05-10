var authCtrl = ['$scope', '$auth', '$state', 'Notification', function($scope, $auth, $state, Notification) {
	$scope.login = function(form) {
		$auth.login(form)
		  .then(function(response) {
		    // Redirect user here after a successful log in.
		    //console.log(response.token)
		  	//$scope.getAuthUser();
		  	$state.go('dashboard');
            Notification({message: response.data.message}, response.data.status);

		  })
		  .catch(function(response) {
             Notification({message: response.data.message}, response.data.status);
		  });
	}	
}];
