var schoolTypeCtrl = ['$http','$scope', function($http, $scope) {
	$scope.currentPage = 1;
	$scope.limit = 10;

	$http.get('/api/school/type')
	.success(function (response) {
		$scope.type = response.type;
	})

	$scope.addType = function(input) {
		$http.post('/api/school/type', input)
		.success(function (response) {
			UIkit.notify(response.message, response.status);
			if (response.status == 'success') {
				//console.log(response.type);
				$scope.type.push(response.type);
				$scope.input = {};
				$('#code').focus();
			}
		})
	}
	$scope.saveType = function(data, id) {
		return $http.put('/api/school/type/'+id, data);
		/*.success(function (response) {
			UIkit.notify(response.message, response.status);
		})*/
	}
	$scope.deleteType = function(id) {
		var index = $scope.indexSearch($scope.type, id);
		if (confirm('delete type?')) {
			$http.delete('/api/type/'+id)
			.success(function (response) {
				UIkit.notify(response.message, response.status);
				if (response.status == 'success') {
					//console.log(response.type);
					$scope.type.splice(index, 1);	
				}
			})
		}
	}
}];