var newsCtrl = ['$http','$scope', 'Notification', function($http, $scope, Notification) {
	$.AdminLTE.layout.fix();
    
    $scope.currentPage = 1;
	$scope.limit = 10;

	$scope.listNews = function() {
        $http.get($scope.env.api+'news')
        .success(function (response) {
            $scope.news = response.news;
        })
    }

	$scope.addNews = function(input) {
		$http.post($scope.env.api+'news', input)
		.success(function (response) {
            Notification({message: response.message}, response.status);
			if (response.status == 'success') {
				//console.log(response.type);
				$scope.news.push(response.news);
				$scope.input = {};
				$('#code').focus();
			}
		})
	}

	$scope.saveNews = function(data, id) {
		return $http.put($scope.env.api+'news/'+id, data);
		/*.success(function (response) {
            Notification({message: response.data.message}, response.status);
		})*/
	}

	$scope.deleteNews = function(id) {
		var index = $scope.indexSearch($scope.type, id);
		if (confirm('delete type?')) {
			$http.delete($scope.env.api+'news/'+id)
			.success(function (response) {
				Notification({message: response.message}, response.status);
				if (response.status == 'success') {
					//console.log(response.type);
					$scope.type.splice(index, 1);	
				}
			})
		}
	}

	$scope.listNews();

}];
