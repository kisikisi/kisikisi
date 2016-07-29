var agendaCtrl = ['$http','$scope', '$location', 'Upload', 'Notification', 
                function($http, $scope, $location, Upload, Notification) {
	$.AdminLTE.layout.fix();
    
    $scope.onEdit = false;
    $scope.input = {};
    $scope.agendaForm = {};
    $scope.agendas = [];
    $scope.totalAgendas = 0;
    $scope.limit = 20;
	$scope.after = 0;
	$scope.scrollBusy = false;
	$scope.scrollLast = false;

	/*$scope.listAgenda = function() {
        $http.get($scope.env.api+'agenda')
        .success(function (response) {
            $scope.agenda = response.agenda;
        })
    }*/

	$scope.searchAgenda = function(filter) {
		$scope.after = 0;
		$scope.agenda = [];
		$scope.nextPage();
		$scope.filter = filter;
	}

	$scope.nextPage = function() {
		$scope.scrollBusy = true;
		$http.get($scope.env.api+'agenda/scroll/'+$scope.after+'/'+$scope.limit, {
			params: $scope.filter
		}).success(function (response) {
			for (var i = 0; i < response.agendas.length; i++) {
				$scope.agendas.push(response.agendas[i]);
				$scope.agendas[i].start = moment.unix(response.agendas[i].start_datetime).format("MM/DD/YYYY");
				$scope.agendas[i].end = moment.unix(response.agendas[i].end_datetime).format("MM/DD/YYYY");
			}
            //$scope.schools.push(response.schools[0]);
			if (response.agendas.length > 0) {
				$scope.after = response.agendas[response.agendas.length - 1].id;
			} else {
				$scope.scrollLast = true;
			}
			$scope.scrollBusy = false;
			//$('.ui.sticky').sticky('refresh');
			//console.log($scope.schools);
        })
	}
    
    $scope.formAgenda = function() {
        $http.get($scope.env.api+'agenda/form')
        .success(function (response) {
            $scope.labels = response.labels;
            $scope.agendaCategories = response.agendaCategories;
            $scope.cities = response.cities;
            $scope.provinces = response.provinces;
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
			$scope.env.api+"agenda/"+id+'/label/'+tag.id
		).success(function(response){
			if (response.status == "success") return true;
			else return false;
			//TODO: id tag otomatis ditambahkan ke model
		});
    }
    
    $scope.removeLabel = function(tag, id) {
        if (confirm("remove label?")) {
			$http.delete(
				$scope.env.api+"agenda/"+id+'/label/'+tag.id
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
                url: $scope.env.api+'agenda/cover',
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
                url: $scope.env.api+'agenda/content',
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
    
    $scope.resetAgenda = function() {
        $scope.input = {};
        $("[data-widget='collapse']").click();
    }

	$scope.saveAgenda = function(input) {
        //input.content = $('#addContent').val();
		$scope.onSave = true;
        if (input.id == undefined) {
            $http.post($scope.env.api+'agenda', input)
            .success(function (response) {
                Notification({message: response.message}, response.status);
                if (response.status == 'success') {
                    //console.log(response.type);
                    $scope.agendas.push(response.agenda);
                    $scope.input.id = response.agenda.id;
                }
				$scope.onSave = false;
            });
        } else {
            //input.agenda_category_id = $scope.input.category.id;

            var index = $scope.indexSearch($scope.agendas, input.id);
            $http.put($scope.env.api+'agenda/'+input.id, input)
            .then(function (response) {
                $scope.agendas[index] = response.data.agenda[0];
                Notification({message: response.data.message}, response.data.status);
                //$scope.onEdit = false;
				$scope.onSave = false;
            });
        }
        
	}

    $scope.editAgenda = function(id) {
        //$scope.onEdit = false;
        $http.get($scope.env.api+'agenda/'+id)
        .success(function (response) {
            $scope.input = response.detail;
			$scope.input.start_datetime = moment.unix(response.detail.start_datetime).format("MM/DD/YYYY");
			$scope.input.end_datetime = moment.unix(response.detail.end_datetime).format("MM/DD/YYYY");
			$scope.input.province_id = response.detail.city.province_id;
            $scope.input.agenda_label = response.agendaLabel;
            $scope.input.agenda_category_id = parseInt($scope.input.agenda_category_id);
            $scope.input.status = parseInt($scope.input.status);

            $("[data-widget='collapse']").click();
            $location.hash('agendaForm');
        })
    }
    
	/*$scope.saveAgenda = function(data, id) {
		edit.content = $('#editContent').val();
        edit.agenda_category_id = $scope.edit.school_type.id;
        
        var index = $scope.indexSearch($scope.agenda, id);
		return $http.put($scope.env.api+'agenda/'+id, edit)
		.then(function (response) {
            $scope.agenda[index] = response.data.agenda[0];
            Notification({message: response.data.message}, response.status);
            $scope.onEdit = false;
		})
	}*/

	$scope.deleteAgenda = function(id) {
		var index = $scope.indexSearch($scope.agendas, id);
		if (confirm('delete agenda?')) {
			$scope.onLoad = true;
			$http.delete($scope.env.api+'agenda/'+id)
			.success(function (response) {
				Notification({message: response.message}, response.status);
				if (response.status == 'success') {
					//console.log(response.type);
					$scope.agendas.splice(index, 1);
				}
				$scope.onLoad = false;
			})
		}
	}

	//$scope.listAgenda();
    $scope.formAgenda();

}];
