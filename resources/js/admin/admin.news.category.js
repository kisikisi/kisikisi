var newsCtrl = ['$http','$scope', 'Notification', function($http, $scope, Notification) {
	$scope.currentPage = 1;
	$scope.limit = 10;

	$scope.listcatnews = function() {
        $http.get($scope.env.api+'news/category')
        .success(function (response) {
            $scope.catnews = response.catnews;
        })
    }

	$scope.addcatnews = function(input) {
		$http.post($scope.env.api+'news/category', input)
		.success(function (response) {
            Notification({message: response.message}, response.status);
			if (response.status == 'success') {
				//console.log(response.type);
				$scope.catnews.push(response.catnews);
				$scope.input = {};
				$('#code').focus();
			}
		})
	}

	$scope.savecatnews = function(data, id) {
		return $http.put($scope.env.api+'news/category/'+id, data);
		/*.success(function (response) {
            Notification({message: response.data.message}, response.status);
		})*/
	}

	$scope.deletenews = function(id) {
		var index = $scope.indexSearch($scope.type, id);
		if (confirm('delete news category?')) {
			$http.delete($scope.env.api+'news/category/'+id)
			.success(function (response) {
				Notification({message: response.message}, response.status);
				if (response.status == 'success') {
					//console.log(response.type);
					$scope.type.splice(index, 1);	
				}
			})
		}
	}

	$scope.listcatnews();

}];
