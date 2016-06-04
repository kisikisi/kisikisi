var scholarshipDegreeCtrl = ['$http','$scope', 'Notification', function($http, $scope, Notification) {
    $.AdminLTE.layout.fix();

    $scope.currentPage = 1;
	$scope.limit = 10;
	$scope.degrees = [];
    $scope.totalDegrees = 0;
    $scope.limit = 20;
	$scope.after = 0;
	$scope.scrollBusy = false;

	/*$scope.listDegree = function() {
        $http.get($scope.env.api+'scholarship/degree')
        .success(function (response) {
            $scope.degrees = response.degrees;
        })
    }*/

	$scope.nextPage = function() {
		$scope.scrollBusy = true;
		$http.get($scope.env.api+'scholarship/degree/scroll/'+$scope.after+'/'+$scope.limit, {
			params: $scope.filter
		}).success(function (response) {
			for (var i = 0; i < response.degrees.length; i++) {
				$scope.degrees.push(response.degrees[i]);
			}
            //$scope.degrees.push(response.degrees[0]);
			if (response.degrees.length > 0) {
				$scope.after = response.degrees[response.degrees.length - 1].id;
				$scope.scrollBusy = false;
			}
			//$('.ui.sticky').sticky('refresh');
			//console.log($scope.degrees);
        })
	}

	$scope.slug = function(str) {
        str = str.replace(/[^a-zA-Z0-9\s]/g,"");
        str = str.toLowerCase();
        str = str.replace(/\s/g,'-');
        return str;
    }

	$scope.addDegree = function(input) {
		$http.post($scope.env.api+'scholarship/degree', input)
		.success(function (response) {
            Notification({message: response.message}, response.status);
			if (response.status == 'success') {
				//console.log(response.type);
				$scope.degrees.push(response.degree);
				$scope.input = {};
				$('#name').focus();
			}
		})
	}

	$scope.saveDegree = function(data, id) {
		return $http.put($scope.env.api+'scholarship/degree/'+id, data);
		/*.success(function (response) {
            Notification({message: response.data.message}, response.status);
		})*/
	}

	$scope.deleteDegree = function(id) {
		var index = $scope.indexSearch($scope.type, id);
		if (confirm('delete scholarship degree?')) {
			$http.delete($scope.env.api+'scholarship/degree/'+id)
			.success(function (response) {
				Notification({message: response.message}, response.status);
				if (response.status == 'success') {
					//console.log(response.type);
					$scope.degrees.splice(index, 1);
				}
			})
		}
	}

	//$scope.listDegree();

}];
