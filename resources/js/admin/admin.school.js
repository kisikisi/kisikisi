var schoolCtrl = ['$http','$scope', 'Notification','Upload', function($http, $scope, Notification, Upload) {
	$.AdminLTE.layout.fix();
    
    $scope.currentPage = 1;
	$scope.limit = 10;

    $scope.listSchool = function() {
        $http.get($scope.env.api+'school')
        .success(function (response) {
            $scope.type = response.type;
        })
    }
    
    $scope.formSchool = function() {
        $http.get($scope.env.api+'school/form')
        .success(function (response) {
            $scope.schoolTypes = response.schoolTypes;
            $scope.cities = response.cities;
            $scope.provinces = response.provinces;
        })
    }

	$scope.addSchool = function(input) {
		console.log(input);
        if ($scope.categoryForm.fileicon.$valid && $scope.fileicon) {
		  $scope.onProgress = true;
	
	      Upload.upload({
	            url: $scope.env.api+'school/icon',
	            method: 'POST',
			    data: {
			    	image: $scope.fileicon,
			    } 
	        }).then(function (resp) {
	            $http.post($scope.env.api+'school', input)
				.success(function (response) {
					//UIkit.notify(response.message, response.status);
					if (response.status == 'success') {
						$scope.onProgress = false;
						$scope.school.push(response.school);
						Notification({message: response.message}, response.status);
						$scope.input = {};
						$scope.fileicon = {};
						$('#name').focus();
					}
				})
	        }, function (resp) {
                Notification({message: resp.message}, resp.status);
	        }, function (evt) {
	            var progressPercentage = parseInt(100.0 * evt.loaded / evt.total);
	            $scope.progress = progressPercentage;
	        });
	    }    
	}
    
	$scope.saveSchool = function(data, id) {
		return $http.put($scope.env.api+'school/'+id, data);
		/*.success(function (response) {
            Notification({message: response.data.message}, response.status);
		})*/
	}
    
	$scope.deleteSchool = function(id) {
		var index = $scope.indexSearch($scope.type, id);
		if (confirm('delete type?')) {
			$http.delete($scope.env.api+'school/'+id)
			.success(function (response) {
				Notification({message: response.message}, response.status);
				if (response.status == 'success') {
					//console.log(response.type);
					$scope.type.splice(index, 1);	
				}
			})
		}
	}

    $scope.listSchool();
    $scope.formSchool();
    $(".textarea").wysihtml5();
}];