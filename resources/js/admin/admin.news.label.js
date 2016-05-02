var newsLabelCtrl = ['$http','$scope', 'Notification', function($http, $scope, Notification) {
    
    $.AdminLTE.layout.fix();
    
	$scope.currentPage = 1;
	$scope.limit = 10;

    $scope.listLabel = function() {
        $http.get($scope.env.api+'label')
        .success(function (response) {
            $scope.labels = response.labels;
        })
    }

	$scope.addLabel = function(input) {
		$http.post($scope.env.api+'label', input)
		.success(function (response) {
            Notification({message: response.message}, response.status);
			if (response.status == 'success') {
				//console.log(response.label);
				$scope.labels.push(response.label);
				$scope.input = {};
				$('#name').focus();
			}
		})
	}
	$scope.saveLabel = function(data, id) {
		return $http.put($scope.env.api+'label/'+id, data);
		/*.success(function (response) {
            Notification({message: response.data.message}, response.status);
		})*/
	}
	$scope.deleteLabel = function(id) {
		var index = $scope.indexSearch($scope.labels, id);
		if (confirm('delete label?')) {
			$http.delete($scope.env.api+'label/'+id)
			.success(function (response) {
				Notification({message: response.message}, response.status);
				if (response.status == 'success') {
					//console.log(response.label);
					$scope.labels.splice(index, 1);	
				}
			})
		}
	}

    $scope.listLabel();
}];
