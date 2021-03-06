var agendaCatCtrl = ['$http','$scope', 'Notification', function($http, $scope, Notification) {
    $.AdminLTE.layout.fix();
    
    $scope.currentPage = 1;
	$scope.limit = 10;
	$scope.categories = [];
    $scope.totalCategories = 0;
    $scope.limit = 20;
	$scope.after = 0;
	$scope.scrollBusy = false;
	$scope.scrollLast = false;

	/*$scope.listCategory = function() {
        $http.get($scope.env.api+'agenda/category')
        .success(function (response) {
            $scope.categories = response.categories;
        })
    }*/

	$scope.nextPage = function() {
		$scope.scrollBusy = true;
		$http.get($scope.env.api+'agenda/category/scroll/'+$scope.after+'/'+$scope.limit, {
			params: $scope.filter
		}).success(function (response) {
			for (var i = 0; i < response.categories.length; i++) {
				$scope.categories.push(response.categories[i]);
			}
            //$scope.categories.push(response.categories[0]);
			if (response.categories.length > 0) {
				$scope.after = response.categories[response.categories.length - 1].id;
			} else {
				$scope.scrollLast = true;
			}
			$scope.scrollBusy = false;
			//$('.ui.sticky').sticky('refresh');
			//console.log($scope.categories);
        })
	}

	$scope.addCategory = function(input) {
		$scope.onAdd = true;
		$http.post($scope.env.api+'agenda/category', input)
		.success(function (response) {
            Notification({message: response.message}, response.status);
			if (response.status == 'success') {
				//console.log(response.type);
				$scope.categories.push(response.category);
				$scope.input = {};
				$('#name').focus();
			}
			$scope.onAdd = false;
		})
	}

	$scope.saveCategory = function(data, id) {
		$scope.onLoad = true;
		$http.put($scope.env.api+'agenda/category/'+id, data)
		.success(function (response) {
            Notification({message: response.data.message}, response.status);
			$scope.onLoad = false;
		});
	}

	$scope.deleteCategory = function(id) {
		var index = $scope.indexSearch($scope.type, id);
		if (confirm('delete agenda category?')) {
			$scope.onLoad = true;
			$http.delete($scope.env.api+'agenda/category/'+id)
			.success(function (response) {
				Notification({message: response.message}, response.status);
				if (response.status == 'success') {
					//console.log(response.type);
					$scope.categories.splice(index, 1);	
				}
				$scope.onLoad = false;
			})
		}
	}

	//$scope.listCategory();

}];
