var newsCatCtrl = ['$http','$scope', 'Notification', function($http, $scope, Notification) {
    $.AdminLTE.layout.fix();
    
    $scope.currentPage = 1;
	$scope.limit = 10;

	$scope.listCatNews = function() {
        $http.get($scope.env.api+'news/category')
        .success(function (response) {
            $scope.catNews = response.catNews;
        })
    }

	$scope.addCatNews = function(input) {
		$http.post($scope.env.api+'news/category', input)
		.success(function (response) {
            Notification({message: response.message}, response.status);
			if (response.status == 'success') {
				//console.log(response.type);
				$scope.catNews.push(response.catNews);
				$scope.input = {};
				$('#code').focus();
			}
		})
	}

	$scope.saveCatNews = function(data, id) {
		return $http.put($scope.env.api+'news/category/'+id, data);
		/*.success(function (response) {
            Notification({message: response.data.message}, response.status);
		})*/
	}

	$scope.deleteCatNews = function(id) {
		var index = $scope.indexSearch($scope.type, id);
		if (confirm('delete news category?')) {
			$http.delete($scope.env.api+'news/category/'+id)
			.success(function (response) {
				Notification({message: response.message}, response.status);
				if (response.status == 'success') {
					//console.log(response.type);
					$scope.catNews.splice(index, 1);	
				}
			})
		}
	}

	$scope.listCatNews();

}];
