var schoolCtrl = ['$http','$scope', 'Notification','Upload', function($http, $scope, Notification, Upload) {
	$.AdminLTE.layout.fix();
    
    $scope.input = {};
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

    $scope.uploadLogo = function() {
        if ($scope.schoolForm.filelogo.$valid && $scope.filelogo) {
            $scope.onProgress1 = true;

            Upload.upload({
                url: $scope.env.api+'school/logo',
                method: 'POST',
                data: {
                    image: $scope.filelogo,
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
    
    $scope.uploadImage = function() {
        if ($scope.schoolForm.fileimage.$valid && $scope.fileimage) {
            $scope.onProgress2 = true;

            Upload.upload({
                url: $scope.env.api+'school/image',
                method: 'POST',
                data: {
                    image: $scope.fileimage,
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
        input.description = $('#description').val();
        input.data = $('#data').val();
        
		$http.post($scope.env.api+'school', input)
        .success(function (response) {
            //UIkit.notify(response.message, response.status);
            if (response.status == 'success') {
                $scope.school.push(response.school);
                Notification({message: response.message}, response.status);
                $scope.input = {};
                $scope.fileicon = {};
                $('#name').focus();
            }
        })
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