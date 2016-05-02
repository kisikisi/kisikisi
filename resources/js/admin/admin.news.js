var newsCtrl = ['$http','$scope', '$location', 'Upload', 'Notification', 
                function($http, $scope, $location, Upload, Notification) {
	$.AdminLTE.layout.fix();
    
    $scope.onEdit = false;
    $scope.input = {};
    $scope.schoolAddForm = {};
    $scope.currentPage = 1;
	$scope.limit = 10;

	$scope.listNews = function() {
        $http.get($scope.env.api+'news')
        .success(function (response) {
            $scope.news = response.news;
        })
    }
    
    $scope.formNews = function() {
        $http.get($scope.env.api+'news/form')
        .success(function (response) {
            $scope.labels = response.labels;
            $scope.newsCategories = response.newsCategories;
            
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
			$scope.env.api+"news/"+id+'/label/'+tag.id
		).success(function(response){
			if (response.status == "success") return true;
			else return false;
			//TODO: id tag otomatis ditambahkan ke model
		});
    }
    
    $scope.removeLabel = function(tag, id) {
        if (confirm("remove label?")) {
			$http.delete(
				$scope.env.api+"news/"+id+'/label/'+tag.id
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
                url: $scope.env.api+'news/cover',
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
                url: $scope.env.api+'news/content',
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
    
	$scope.saveNews = function(input) {
        input.content = $('#addContent').val();
		
        if (input.id == undefined) {
            $http.post($scope.env.api+'news', input)
            .success(function (response) {
                Notification({message: response.message}, response.status);
                if (response.status == 'success') {
                    //console.log(response.type);
                    $scope.news.push(response.news);
                    $scope.input.id = response.news.id;
                }
            });
        } else {
            input.news_category_id = $scope.input.school_type.id;

            var index = $scope.indexSearch($scope.news, input.id);
            $http.put($scope.env.api+'news/'+input.id, input)
            .then(function (response) {
                $scope.news[index] = response.data.news[0];
                Notification({message: response.data.message}, response.status);
                //$scope.onEdit = false;
            });
        }
        
	}

    $scope.editNews = function(id) {
        //$scope.onEdit = false;
        $http.get($scope.env.api+'news/'+id)
        .success(function (response) {
            $scope.input = response.detail;
            $scope.input.news_label = response.newsLabel;
            $scope.input.news_category_id = parseInt($scope.input.news_category_id);
            $scope.input.status = parseInt($scope.input.status);
            $('#addContent').val($scope.input.content);
            $("[data-widget='collapse']").click();
            //$scope.onEdit = true;
            $location.hash('newsForm');
        })
    }
    
	/*$scope.saveNews = function(data, id) {
		edit.content = $('#editContent').val();
        edit.news_category_id = $scope.edit.school_type.id;
        
        var index = $scope.indexSearch($scope.news, id);
		return $http.put($scope.env.api+'news/'+id, edit)
		.then(function (response) {
            $scope.news[index] = response.data.news[0];
            Notification({message: response.data.message}, response.status);
            $scope.onEdit = false;
		})
	}*/

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
    $scope.formNews();

}];
