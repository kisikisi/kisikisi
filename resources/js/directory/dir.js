var dirCtrl = ['$http','$scope', '$rootScope', '$sce', '$location', 'Notification', 'envService',
function($http, $scope, $rootScope, $sce, $location, Notification, envService) {
    $rootScope.env = envService.read('all');
	//$(".ui.sidebar").sidebar("toggle");
	//$(".ui.sidebar").sidebar('attach events', '#sidebarToggle');

	$scope.schools = [];
	$scope.scrollBusy = false;
	$scope.limit = 12;
	$scope.after = 0;
	$scope.onSearch = false;
	$scope.filter = {};

	$scope.$on('$includeContentLoaded', function(event) {
		$scope.modal1 = $("#siteModal").modal();
		$scope.modal2 = $("#basicModal").modal();
		/*$scope.modal.modal({
			onHide: function(){
				$scope.modalTemplate = '';
			}
		});*/
	})

    //$scope.modalTemplate = 'views/partial/login.html';
    //console.log($rootScope.env);
    
    // searching array to find index by id
	$scope.indexSearch = function(array, id) {
		return array.map(function(el) {
		  return el.id;
		}).indexOf(id);
    };

	$scope.toggleSearch = function() {
		if ($scope.onSearch == false) $scope.onSearch = true;
		else $scope.onSearch = false;
	}

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
		$scope.filter = filter;
		$scope.onSearch = false;
	}

	$scope.nextPage = function() {
		//console.log($scope.filter);
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

	/*$scope.searchSchool = function(filter) {
		$http.post($scope.env.api+'school/search', filter)
        .success(function (response) {
            $scope.schools = response.schools;
        });
	}*/

	$scope.loginForm = function() {
        //$scope.modalTemplate = 'views/partial/login.html';
		$scope.modal2.modal('show');
	}

    $scope.detailSchool = function(id) {
        $http.get($scope.env.api+'school/'+id)
        .success(function (response) {
            $scope.detail = response.detail[0];
            $scope.detail.description = $sce.trustAsHtml(response.detail[0].description);
            $scope.detail.data = $sce.trustAsHtml(response.detail[0].data);
            $scope.detail.map_address = $sce.trustAsResourceUrl(response.detail[0].map_address);
            //$scope.modalTemplate = 'views/directory/school.detail.html';
			$scope.modal1.modal('show');
        });
    };

    var widget = this;
  
    $scope.$watch(function () {
        return widget.href;
    }, function () {
        widget.rendered = false;
    });
}];
