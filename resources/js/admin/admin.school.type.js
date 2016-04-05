var schoolTypeCtrl = ['$http','$scope', 'Notification', function($http, $scope, Notification) {
	$scope.currentPage = 1;
	$scope.limit = 10;

    $http.get($scope.env.api+'school/type')
	.success(function (response) {
		$scope.type = response.type;
	})

	$scope.addType = function(input) {
		$http.post($scope.env.api+'school/type', input)
		.success(function (response) {
            Notification({message: response.message}, response.status);
			if (response.status == 'success') {
				//console.log(response.type);
				$scope.type.push(response.type);
				$scope.input = {};
				$('#code').focus();
			}
		})
	}
	$scope.saveType = function(data, id) {
		return $http.put($scope.env.api+'school/type/'+id, data);
		/*.success(function (response) {
            Notification({message: response.data.message}, response.status);
		})*/
	}
	$scope.deleteType = function(id) {
		var index = $scope.indexSearch($scope.type, id);
		if (confirm('delete type?')) {
			$http.delete($scope.env.api+'school/type/'+id)
			.success(function (response) {
				Notification({message: response.message}, response.status);
				if (response.status == 'success') {
					//console.log(response.type);
					$scope.type.splice(index, 1);	
				}
			})
		}
	}
}];
