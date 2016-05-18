var dirCtrl = ['$http','$scope', '$rootScope', '$location', 'Notification', 'envService', 
function($http, $scope, $rootScope, $location, Notification, envService) {
    $rootScope.env = envService.read('all');
	$(".ui.sidebar").sidebar("toggle");
	$(".ui.sidebar").sidebar('attach events', '#mainNavToggle');

	$scope.schools = [];
	$scope.scrollBusy = false;
	$scope.limit = 12;
	$scope.after = 0;

    $scope.modalTemplate = 'views/directory/school.detail.html';
    //console.log($rootScope.env);
    
    $scope.indexSearch = function(array, id) {
		return array.map(function(el) {
		  return el.id;
		}).indexOf(id);
    };

    $scope.filterSchool = function() {
        $http.get($scope.env.api+'school/form')
        .success(function (response) {
            $scope.schoolTypes = response.schoolTypes;
            $scope.cities = response.cities;
            $scope.provinces = response.provinces;
        });
    };
    $scope.filterSchool();

	$scope.searchSchool = function(filter) {
		$scope.after = 0;
		$scope.schools = [];
		$scope.nextPage();
	}

	$scope.nextPage = function() {
		$scope.scrollBusy = true;
		console.log($scope.filter);
		$http.get($scope.env.api+'school/scroll/'+$scope.after+'/'+$scope.limit, {
			params: $scope.filter
		}).success(function (response) {
			for (var i = 0; i < response.schools.length; i++) {
				$scope.schools.push(response.schools[i]);
			}
            //$scope.schools.push(response.schools[0]);
			if (response.schools.length > 0) $scope.after = response.schools[response.schools.length - 1].id;
			$scope.scrollBusy = false;
			//$('.ui.sticky').sticky('refresh');
			//console.log($scope.schools);
        })
	}

	/*$scope.searchSchool = function(filter) {
		$http.post($scope.env.api+'school/search', filter)
        .success(function (response) {
            $scope.schools = response.schools;
        });
	}*/

    $scope.detailSchool = function(id) {
        $scope.modalTemplate = "";
        $http.get($scope.env.api+'school/'+id)
        .success(function (response) {
            $scope.detail = response.detail[0];
            $scope.modalTemplate = 'views/directory/school.detail.html';
            $('.ui.modal').modal({observeChanges: true}).modal('show');
        });
    };

    var widget = this;
  
    $scope.$watch(function () {
        return widget.href;
    }, function () {
        widget.rendered = false;
    });
}];
