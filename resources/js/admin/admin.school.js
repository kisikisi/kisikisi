var schoolCtrl = ['$http','$scope', '$location', 'Notification','Upload', function($http, $scope, $location, Notification, Upload) {
	$.AdminLTE.layout.fix();
    
    $scope.onEdit = false;
    $scope.input = {};
    $scope.schoolAddForm = {};
    $scope.currentPage = 1;
	$scope.limit = 10;

    $scope.listSchool = function() {
        $http.get($scope.env.api+'school')
        .success(function (response) {
            $scope.school = response.school;
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

    $scope.uploadLogo = function(isValid, file) {
        if (isValid) {
            $scope.onProgress1 = true;
            Upload.upload({
                url: $scope.env.api+'school/logo',
                method: 'POST',
                data: {
                    image: file,
                } 
            }).then(function (resp) {
                $scope.onProgress1 = false;
                $scope.input.logo = resp.data.logo;
            }, function (resp) {
                Notification({message: resp.message}, resp.status);
            }, function (evt) {
                var progressPercentage = parseInt(100.0 * evt.loaded / evt.total);
                $scope.progress1 = progressPercentage;
            });
	    }    
    }
    
    $scope.uploadImage = function(isValid, file) {
        if (isValid) {
            $scope.onProgress2 = true;

            Upload.upload({
                url: $scope.env.api+'school/image',
                method: 'POST',
                data: {
                    image: file,
                } 
            }).then(function (resp) {
                $scope.onProgress2 = false;
                $scope.input.image = resp.data.image;
            }, function (resp) {
                Notification({message: resp.message}, resp.status);
            }, function (evt) {
                var progressPercentage = parseInt(100.0 * evt.loaded / evt.total);
                $scope.progress2 = progressPercentage;
            });
	    }    
    }
    
	$scope.addSchool = function(input) {
        input.description = $('#addDescription').val();
        input.data = $('#addData').val();
        
		$http.post($scope.env.api+'school', input)
        .success(function (response) {
            //UIkit.notify(response.message, response.status);
            if (response.status == 'success') {
                $scope.school.push(response.school[0]);
                Notification({message: response.message}, response.status);
                $scope.input = {};
                $scope.fileicon = {};
                $('#name').focus();
            }
        })
	}
    
    $scope.editSchool = function(id) {
        $scope.onEdit = false;
        $http.get($scope.env.api+'school/'+id)
        .success(function (response) {
            $scope.edit = response.detail[0];
            $scope.onEdit = true;
            $location.hash('schoolEditForm');
        })
    }
    
	$scope.saveSchool = function(edit, id) {
        edit.description = $('#editDescription').val();
        edit.data = $('#editData').val();
        
        var index = $scope.indexSearch($scope.school, id);
		return $http.put($scope.env.api+'school/'+id, edit)
		.then(function (response) {
            $scope.school[index] = response.data.school[0];
            Notification({message: response.data.message}, response.status);
            $scope.onEdit = false;
		})
	}
    
	$scope.deleteSchool = function(id) {
		var index = $scope.indexSearch($scope.school, id);
		if (confirm('delete school?')) {
			$http.delete($scope.env.api+'school/'+id)
			.success(function (response) {
				Notification({message: response.message}, response.status);
				if (response.status == 'success') {
					//console.log(response.type);
					$scope.school.splice(index, 1);	
				}
			})
		}
	}

    $scope.listSchool();
    $scope.formSchool();
}];