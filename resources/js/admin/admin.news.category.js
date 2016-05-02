var newsCatCtrl = ['$http','$scope', 'Notification', function($http, $scope, Notification) {
    $.AdminLTE.layout.fix();
    
    $scope.currentPage = 1;
	$scope.limit = 10;

	$scope.listCategory = function() {
        $http.get($scope.env.api+'news/category')
        .success(function (response) {
            $scope.categories = response.categories;
        })
    }

	$scope.addCategory = function(input) {
		$http.post($scope.env.api+'news/category', input)
		.success(function (response) {
            Notification({message: response.message}, response.status);
			if (response.status == 'success') {
				//console.log(response.type);
				$scope.categories.push(response.category);
				$scope.input = {};
				$('#name').focus();
			}
		})
	}

	$scope.saveCategory = function(data, id) {
		return $http.put($scope.env.api+'news/category/'+id, data);
		/*.success(function (response) {
            Notification({message: response.data.message}, response.status);
		})*/
	}

	$scope.deleteCategory = function(id) {
		var index = $scope.indexSearch($scope.type, id);
		if (confirm('delete news category?')) {
			$http.delete($scope.env.api+'news/category/'+id)
			.success(function (response) {
				Notification({message: response.message}, response.status);
				if (response.status == 'success') {
					//console.log(response.type);
					$scope.categories.splice(index, 1);	
				}
			})
		}
	}

	$scope.listCategory();

}];
