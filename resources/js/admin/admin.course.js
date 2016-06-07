var courseCtrl = ['$http','$scope', '$location', 'Upload', 'Notification',
                function($http, $scope, $location, Upload, Notification) {
	$.AdminLTE.layout.fix();

    $scope.onEdit = false;
    $scope.input = {};
    $scope.courseForm = {};
    $scope.courses = [];
    $scope.totalCourses = 0;
    $scope.limit = 20;
	$scope.after = 0;
	$scope.scrollBusy = false;

	/*$scope.listCourse = function() {
        $http.get($scope.env.api+'course')
        .success(function (response) {
            $scope.course = response.course;
        })
    }*/

	$scope.searchCourse = function(filter) {
		$scope.after = 0;
		$scope.course = [];
		$scope.nextPage();
		$scope.filter = filter;
	}

	$scope.nextPage = function() {
		$scope.scrollBusy = true;
		$http.get($scope.env.api+'course/scroll/'+$scope.after+'/'+$scope.limit, {
			params: $scope.filter
		}).success(function (response) {
			for (var i = 0; i < response.courses.length; i++) {
				$scope.courses.push(response.courses[i]);
			}
            //$scope.schools.push(response.schools[0]);
			if (response.courses.length > 0) {
				$scope.after = response.courses[response.courses.length - 1].id;
				$scope.scrollBusy = false;
			}
			//$('.ui.sticky').sticky('refresh');
			//console.log($scope.schools);
        })
	}

    $scope.formCourse = function() {
        $http.get($scope.env.api+'course/form')
        .success(function (response) {
            $scope.labels = response.labels;
        })
    }

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
			$scope.env.api+"course/"+id+'/label/'+tag.id
		).success(function(response){
			if (response.status == "success") return true;
			else return false;
			//TODO: id tag otomatis ditambahkan ke model
		});
    }

    $scope.removeLabel = function(tag, id) {
        if (confirm("remove label?")) {
			$http.delete(
				$scope.env.api+"course/"+id+'/label/'+tag.id
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
                url: $scope.env.api+'course/cover',
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

    /*$scope.uploadContent = function(isValid, file) {
        if (isValid) {
            $scope.onProgress2 = true;

            Upload.upload({
                url: $scope.env.api+'course/content',
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
    }*/

    $scope.resetCourse = function() {
        $scope.input = {};
        $("[data-widget='collapse']").click();
    }

	$scope.saveCourse = function(input) {
        //input.content = $('#addContent').val();

        if (input.id == undefined) {
            $http.post($scope.env.api+'course', input)
            .success(function (response) {
                Notification({message: response.message}, response.status);
                if (response.status == 'success') {
                    //console.log(response.type);
                    $scope.courses.push(response.course);
                    $scope.input.id = response.course.id;
                }
            });
        } else {

            var index = $scope.indexSearch($scope.courses, input.id);
            $http.put($scope.env.api+'course/'+input.id, input)
            .then(function (response) {
                $scope.courses[index] = response.data.course[0];
                Notification({message: response.data.message}, response.data.status);
                //$scope.onEdit = false;
            });
        }

	}

    $scope.editCourse = function(id) {
        //$scope.onEdit = false;
        $http.get($scope.env.api+'course/'+id)
        .success(function (response) {
            $scope.input = response.detail;

            $("[data-widget='collapse']").click();
            $location.hash('courseForm');
        })
    }

	/*$scope.saveCourse = function(data, id) {
		edit.content = $('#editContent').val();
        edit.course_category_id = $scope.edit.school_type.id;

        var index = $scope.indexSearch($scope.course, id);
		return $http.put($scope.env.api+'course/'+id, edit)
		.then(function (response) {
            $scope.course[index] = response.data.course[0];
            Notification({message: response.data.message}, response.status);
            $scope.onEdit = false;
		})
	}*/

	$scope.deleteCourse = function(id) {
		var index = $scope.indexSearch($scope.courses, id);
		if (confirm('delete course?')) {
			$http.delete($scope.env.api+'course/'+id)
			.success(function (response) {
				Notification({message: response.message}, response.status);
				if (response.status == 'success') {
					//console.log(response.type);
					$scope.courses.splice(index, 1);
				}
			})
		}
	}

	//$scope.listCourse();
    $scope.formCourse();

}];
