var courseCtrl = ['$http','$scope', '$rootScope', '$state', '$sce', '$auth', '$location', 'Notification', 'envService',
function($http, $scope, $rootScope, $state, $sce, $auth, $location, Notification, envService) {
    $rootScope.env = envService.read('all');
	//$(".ui.sidebar").sidebar("toggle");
	//$(".ui.sidebar").sidebar('attach events', '#sidebarToggle');

	$scope.courses = [];
	$scope.scrollBusy = false;
	$scope.limit = 12;
	$scope.after = 0;
	$scope.onSearch = false;
	$scope.filter = {};
	$scope.url = $location.absUrl();

	$scope.popup = function() {
		$('.browse').popup({ inline: true, hoverable: true,
			delay: {
				show: 300,
				hide: 800
			} });
	}
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

    /*$scope.filterCourse = function() {
        $http.get($scope.env.api+'course/form')
        .success(function (response) {
            $scope.courseCategories = response.courseCategories;
            $scope.cities = response.cities;
            $scope.provinces = response.provinces;
        });
    };
    $scope.filterCourse();*/

	$scope.searchCourse = function(filter) {
		$scope.after = 0;
		$scope.courses = [];
		$scope.nextPage();
		$scope.filter = filter;
		$scope.onSearch = false;
		$state.go('course');
	}

	$scope.nextPage = function() {
		//console.log($scope.filter);
		$scope.scrollBusy = true;
		$http.get($scope.env.api+'course/scroll/'+$scope.after+'/'+$scope.limit, {
			params: $scope.filter
		}).success(function (response) {
			for (var i = 0; i < response.courses.length; i++) {
				$scope.courses.push(response.courses[i]);
			}
            //$scope.courses.push(response.courses[0]);
			if (response.courses.length > 0) {
				$scope.after = response.courses[response.courses.length - 1].id;
				$scope.scrollBusy = false;
			}
			//$('.ui.sticky').sticky('refresh');
			//console.log($scope.courses);
        })
	}

	/*$scope.searchCourse = function(filter) {
		$http.post($scope.env.api+'course/search', filter)
        .success(function (response) {
            $scope.courses = response.courses;
        });
	}*/

    $scope.detailCourse = function(id) {
        $http.get($scope.env.api+'course/'+id)
        .success(function (response) {
            $scope.detail = response.detail;
            $scope.detail.description = $sce.trustAsHtml(response.detail.description);
            $scope.detail.embed = $sce.trustAsResourceUrl(response.detail.embed);
            //$scope.modalTemplate = 'views/course/course.detail.html';
			$scope.modal1.modal('show');
        });
    };

	//include authentication script
	//=include ../public.auth.js

    var widget = this;
    $scope.$watch(function () {
        return widget.href;
    }, function () {
        widget.rendered = false;
    });
}];
