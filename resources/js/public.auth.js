$scope.smallModal = 'views/partial/login.html';

$scope.loginForm = function() {
	$scope.smallModal = 'views/partial/login.html';
	$scope.modal2.modal('show');
}
$scope.registerPage = function() {
	$scope.smallModal = "views/partial/register.html";
	//$scope.modal2.modal('show');
};
$scope.getAuthUser = function() {
	$http.get($scope.env.api+"auth/user")
	.success(function(response){
		$rootScope.auth = response.user;
		$scope.popup();
	})
};
// member & authentication function
$scope.authenticate = function(provider) {
	$auth.authenticate(provider)
	  .then(function(response) {
		$scope.getAuthUser();
		$scope.modal2.hide();
	  })
	  .catch(function(error) {
		//UIkit.notify(response.message);
		if (error.error) {
			// Popup error - invalid redirect_uri, pressed cancel button, etc.
			Notification({message: error.error}, 'error');
		} else if (error.data) {
			// HTTP response error from server
			Notification({message: error.data.message}, error.status);
		} else {
			Notification({message: error}, 'error');
		}
	  });
};
$scope.login = function(user) {
	$auth.login(user)
	  .then(function(response) {
		// Redirect user here after a successful log in.
		//console.log(response.token)
		$scope.modal2.modal('hide');
		$scope.getAuthUser();
	  })
	  .catch(function(response) {
		Notification({message: response.data.message}, response.status);
	  });
};
$scope.register = function(user) {
	$auth.signup(user)
	  .then(function(response) {
		// Redirect user here to login page or perhaps some other intermediate page
		// that requires email address verification before any other part of the site
		// can be accessed.
		$auth.setToken(response);
		$scope.getAuthUser();
		$scope.modal2.modal('hide');
		Notification({message: "Pendaftaran berhasil, terima kasih"}, "success");
	  })
	  .catch(function(response) {
		// Handle errors here.
		Notification({message: response.data.message}, response.status);
	  });
};
//cek status login
$scope.isLogin = function() {
	return $auth.isAuthenticated();
};
// menghapus sesi user
$scope.logout = function() {
	$auth.logout();
	$scope.loginForm();
	//console.log("logout");
};
if (! $scope.isLogin()) {
	//if (! $scope.refreshToken()) $scope.loginPage();
} else {
	$scope.getAuthUser();
}
