var scholarshipCtrl = ['$http','$scope', '$location', 'Upload', 'Notification',
                function($http, $scope, $location, Upload, Notification) {
	$.AdminLTE.layout.fix();

    $scope.onEdit = false;
    $scope.input = {};
    $scope.scholarshipForm = {};
    $scope.scholarships = [];
    $scope.totalScholarships = 0;
    $scope.limit = 20;
	$scope.after = 0;
	$scope.scrollBusy = false;
	$scope.scrollLast = false;

	/*$scope.listScholarship = function() {
        $http.get($scope.env.api+'scholarship')
        .success(function (response) {
            $scope.scholarship = response.scholarship;
        })
    }*/

	$scope.searchScholarship = function(filter) {
		$scope.after = 0;
		$scope.scholarship = [];
		$scope.nextPage();
		$scope.filter = filter;
	}

	$scope.nextPage = function() {
		$scope.scrollBusy = true;
		$http.get($scope.env.api+'scholarship/scroll/'+$scope.after+'/'+$scope.limit, {
			params: $scope.filter
		}).success(function (response) {
			for (var i = 0; i < response.scholarships.length; i++) {
				$scope.scholarships.push(response.scholarships[i]);
				$scope.scholarships[i].deadline = moment.unix(response.scholarships[i].deadline).format("MM/DD/YYYY");
			}
            //$scope.schools.push(response.schools[0]);
			if (response.scholarships.length > 0) {
				$scope.after = response.scholarships[response.scholarships.length - 1].id;
			} else {
				$scope.scrollLast = true;
			}
			$scope.scrollBusy = false;
			//$('.ui.sticky').sticky('refresh');
			//console.log($scope.schools);
        })
	}

    /*$scope.formScholarship = function() {
        $http.get($scope.env.api+'scholarship/form')
        .success(function (response) {
            $scope.scholarshipDegrees = response.scholarshipDegrees;
        })
    }*/

    $scope.slug = function(str) {
        str = str.replace(/[^a-zA-Z0-9\s]/g,"");
        str = str.toLowerCase();
        str = str.replace(/\s/g,'-');
        return str;
    }

    $scope.loadLabels = function(query) {
        return $scope.labels;
    }

    $scope.addLabel = function(tag, id) {
        $http.post(
			$scope.env.api+"scholarship/"+id+'/label/'+tag.id
		).success(function(response){
			if (response.status == "success") return true;
			else return false;
			//TODO: id tag otomatis ditambahkan ke model
		});
    }

    $scope.removeLabel = function(tag, id) {
        if (confirm("remove label?")) {
			$http.delete(
				$scope.env.api+"scholarship/"+id+'/label/'+tag.id
			).success(function(response){
				if (response.status == "success") return true;
			});
		} else {
			return false;
		}
    }

    $scope.uploadCover = function(isValid, file) {
        if (isValid) {
            $scope.onProgress1 = true;
            Upload.upload({
                url: $scope.env.api+'scholarship/cover',
                method: 'POST',
                data: {
                    image: file,
                }
            }).then(function (resp) {
                $scope.onProgress1 = false;
                $scope.input.image_cover = resp.data.cover;
            }, function (resp) {
                Notification({message: resp.message}, resp.status);
            }, function (evt) {
                var progressPercentage = parseInt(100.0 * evt.loaded / evt.total);
                $scope.progress1 = progressPercentage;
            });
	    }
    }

    $scope.uploadContent = function(isValid, file) {
        if (isValid) {
            $scope.onProgress2 = true;

            Upload.upload({
                url: $scope.env.api+'scholarship/content',
                method: 'POST',
                data: {
                    image: file,
                }
            }).then(function (resp) {
                $scope.onProgress2 = false;
                $scope.input.image_content = resp.data.content;
            }, function (resp) {
                Notification({message: resp.message}, resp.status);
            }, function (evt) {
                var progressPercentage = parseInt(100.0 * evt.loaded / evt.total);
                $scope.progress2 = progressPercentage;
            });
	    }
    }

    $scope.resetScholarship = function() {
        $scope.input = {};
        $("[data-widget='collapse']").click();
    }

	$scope.saveScholarship = function(input) {
        //input.content = $('#addContent').val();
		$scope.onSave = true;
        if (input.id == undefined) {
            $http.post($scope.env.api+'scholarship', input)
            .success(function (response) {
                Notification({message: response.message}, response.status);
                if (response.status == 'success') {
                    //console.log(response.type);
                    $scope.scholarships.push(response.scholarship);
                    $scope.input.id = response.scholarship.id;
                }
				$scope.onSave = false;
            });
        } else {
            //input.scholarship_degree_id = $scope.input.degree.id;

            var index = $scope.indexSearch($scope.scholarships, input.id);
			input.created_by = input.created_by.id;
            $http.put($scope.env.api+'scholarship/'+input.id, input)
            .then(function (response) {
                $scope.scholarships[index] = response.data.scholarship[0];
                Notification({message: response.data.message}, response.data.status);
                //$scope.onEdit = false;
				$scope.onSave = false;
            });
        }

	}

    $scope.editScholarship = function(id) {
        //$scope.onEdit = false;
        $http.get($scope.env.api+'scholarship/'+id)
        .success(function (response) {
            $scope.input = response.detail;
			$scope.input.deadline = moment.unix(response.detail.deadline).format("MM/DD/YYYY");
			$scope.input.scholarship_degree_id = parseInt($scope.input.scholarship_degree_id);
            $scope.input.status = parseInt($scope.input.status);

            $("[data-widget='collapse']").click();
            $location.hash('scholarshipForm');
        })
    }

	/*$scope.saveScholarship = function(data, id) {
		edit.content = $('#editContent').val();
        edit.scholarship_degree_id = $scope.edit.school_type.id;

        var index = $scope.indexSearch($scope.scholarship, id);
		return $http.put($scope.env.api+'scholarship/'+id, edit)
		.then(function (response) {
            $scope.scholarship[index] = response.data.scholarship[0];
            Notification({message: response.data.message}, response.status);
            $scope.onEdit = false;
		})
	}*/

	$scope.deleteScholarship = function(id) {
		var index = $scope.indexSearch($scope.scholarships, id);
		if (confirm('delete scholarship?')) {
			$scope.onLoad = true;
			$http.delete($scope.env.api+'scholarship/'+id)
			.success(function (response) {
				Notification({message: response.message}, response.status);
				if (response.status == 'success') {
					//console.log(response.type);
					$scope.scholarships.splice(index, 1);
				}
				$scope.onLoad = false;
			})
		}
	}

	//$scope.listScholarship();
    //$scope.formScholarship();

}];
