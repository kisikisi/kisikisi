var dirIndexCtrl = ['$http','$scope', '$rootScope', '$location', 'Notification', 'envService',
function($http, $scope, $rootScope, $location, Notification, envService) {

	$scope.schools = [];
	$scope.scrollBusy = false;
	$scope.limit = 12;
	$scope.after = 0;

    /*$scope.listSchool = function() {
        $http.get($scope.env.api+'school')
        .success(function (response) {
            $scope.schools = response.school;
        })
    }*/
    //$scope.listSchool();

	$scope.nextPage = function() {
		$scope.scrollBusy = true;
		$http.get($scope.env.api+'school/scroll/'+$scope.after+'/'+$scope.limit)
        .success(function (response) {
			for (var i = 0; i < response.schools.length; i++) {
				$scope.schools.push(response.schools[i]);
			}
            //$scope.schools.push(response.schools[0]);
			$scope.after = response.schools[response.schools.length - 1].id;
			$scope.scrollBusy = false;
			//$('.ui.sticky').sticky('refresh');
			//console.log($scope.schools);
        })
	}
}];
