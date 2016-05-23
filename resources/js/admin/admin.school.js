var schoolCtrl = ['$http','$scope', '$location', 'Notification','Upload', 
    function($http, $scope, $location, Notification, Upload) {
	$.AdminLTE.layout.fix();
    
    $scope.onEdit = false;
    $scope.input = {};
    $scope.schoolAddForm = {};
    $scope.schools = [];
    $scope.totalSchools = 0;
    $scope.limit = 20;
	$scope.after = 0;
	$scope.scrollBusy = false;

    /*$scope.listSchool = function() {
        $http.get($scope.env.api+'school')
        .success(function (response) {
            $scope.schools = response.school;
        });
    };*/

    /*$scope.getResultsPage = function(page) {
        $http.get($scope.env.api+'school/paging/'+page+'/'+$scope.limit)
        .success(function (response) {
            $scope.schools = response.schools;
            $scope.totalSchools = response.count;
        });
    };

    $scope.pageChanged = function(page) {
        $scope.getResultsPage(page);
    };*/
    
	$scope.searchSchool = function(filter) {
		$scope.after = 0;
		$scope.schools = [];
		$scope.nextPage();
		$scope.filter = filter;
	}

	$scope.nextPage = function() {
		$scope.scrollBusy = true;
		$http.get($scope.env.api+'school/scroll/'+$scope.after+'/'+$scope.limit, {
			params: $scope.filter
		}).success(function (response) {
			for (var i = 0; i < response.schools.length; i++) {
				$scope.schools.push(response.schools[i]);
			}
            //$scope.schools.push(response.schools[0]);
			if (response.schools.length > 0) {
				$scope.after = response.schools[response.schools.length - 1].id;
				$scope.scrollBusy = false;
			}
			//$('.ui.sticky').sticky('refresh');
			//console.log($scope.schools);
        })
	}

    $scope.formSchool = function() {
        $http.get($scope.env.api+'school/form')
        .success(function (response) {
            $scope.schoolTypes = response.schoolTypes;
            $scope.cities = response.cities;
            $scope.provinces = response.provinces;
        });
    };

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
    };
    
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
    };
    
    $scope.resetSchool = function() {
        $scope.input = {};
        $("[data-widget='collapse']").click();
    };

	$scope.saveSchool = function(input) {
        
        if (input.id === undefined) {
            $http.post($scope.env.api+'school', input)
            .success(function (response) {
                Notification({message: response.message}, response.status);
                if (response.status == 'success') {
                    $scope.schools.push(response.school[0]);
                    $scope.input.id = response.school[0].id;
                    //$scope.input = {};
                    //$scope.fileicon = {};
                    //$('#name').focus();
                }
            });
        } else {
            //input.city_id = $scope.input.city.id;
            //input.school_type_id = $scope.input.school_type.id;

            var index = $scope.indexSearch($scope.schools, input.id);
            return $http.put($scope.env.api+'school/'+input.id, input)
            .then(function (response) {
                $scope.schools[index] = response.data.school[0];
                Notification({message: response.data.message}, response.status);
                //$scope.onEdit = false;
            });
        }
	};
    
    $scope.editSchool = function(id) {
        $scope.onEdit = false;
        $http.get($scope.env.api+'school/'+id)
        .success(function (response) {
            $scope.input = response.detail[0];
            $scope.input.school_type_id = parseInt($scope.input.school_type_id);
            $scope.input.province_id = parseInt($scope.input.city.province_id);
            $scope.input.city_id = parseInt($scope.input.city_id);

            $("[data-widget='collapse']").click();
            $location.hash('schoolForm');
        });
    };
    
	/*$scope.saveSchool = function(edit, id) {
        
	}*/
    
	$scope.deleteSchool = function(id) {
		var index = $scope.indexSearch($scope.schools, id);
		if (confirm('delete school?')) {
			$http.delete($scope.env.api+'school/'+id)
			.success(function (response) {
				Notification({message: response.message}, response.status);
				if (response.status == 'success') {
					//console.log(response.type);
					$scope.schools.splice(index, 1);
				}
			});
		}
	};

    //$scope.listSchool();
    //$scope.getResultsPage(1);
    $scope.formSchool();
}];
