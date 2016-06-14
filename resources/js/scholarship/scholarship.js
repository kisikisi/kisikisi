var scholarshipCtrl = ['$http','$scope', '$rootScope', '$state', '$sce', '$location', 'Notification', 'envService',
function($http, $scope, $rootScope, $state, $sce, $location, Notification, envService) {
    $rootScope.env = envService.read('all');
	//$(".ui.sidebar").sidebar("toggle");
	//$(".ui.sidebar").sidebar('attach events', '#sidebarToggle');

	$scope.scholarships = [];
	$scope.scrollBusy = false;
	$scope.limit = 12;
	$scope.after = 0;
	$scope.onSearch = false;
	$scope.filter = {};
	$scope.url = $location.absUrl();

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

    /*$scope.filterScholarship = function() {
        $http.get($scope.env.api+'scholarship/form')
        .success(function (response) {
            $scope.scholarshipCategories = response.scholarshipCategories;
            $scope.cities = response.cities;
            $scope.provinces = response.provinces;
        });
    };
    $scope.filterScholarship();*/

	$scope.searchScholarship = function(filter) {
		$scope.after = 0;
		$scope.scholarships = [];
		$scope.nextPage();
		$scope.filter = filter;
		$scope.onSearch = false;
		$state.go('scholarship');
	}

	/*$scope.scholarshipCalendar = function() {
		$http.get($scope.env.api+'scholarship/calendar')
        .success(function (response) {
            var calendar = response.calendar;
			for (i=0;i<calendar.length;i++) {
				calendar[i].start = moment.unix(response.calendar[i].start).format("YYYY-MM-DD");
				calendar[i].end = moment.unix(response.calendar[i].end).format("YYYY-MM-DD");
			}
			$scope.eventSources = {
				events: calendar,
				color: 'yellow',   // an option!
				textColor: 'black' // an option!
			}
        });
	}
	$scope.scholarshipCalendar();*/

	$scope.nextPage = function() {
		//console.log($scope.filter);
		$scope.scrollBusy = true;
		$http.get($scope.env.api+'scholarship/scroll/'+$scope.after+'/'+$scope.limit, {
			params: $scope.filter
		}).success(function (response) {
			for (var i = 0; i < response.scholarships.length; i++) {
				response.scholarships[i].deadline = moment.unix(response.scholarships[i].deadline).format("MM/DD/YYYY");
				$scope.scholarships.push(response.scholarships[i]);
			}
            //$scope.scholarships.push(response.scholarships[0]);
			if (response.scholarships.length > 0) {
				$scope.after = response.scholarships[response.scholarships.length - 1].id;
				$scope.scrollBusy = false;
			}
			//$('.ui.sticky').sticky('refresh');
			//console.log($scope.scholarships);
        })
	}

	/*$scope.searchScholarship = function(filter) {
		$http.post($scope.env.api+'scholarship/search', filter)
        .success(function (response) {
            $scope.scholarships = response.scholarships;
        });
	}*/

	$scope.loginForm = function() {
        //$scope.modalTemplate = 'views/partial/login.html';
		$scope.modal2.modal('show');
	}

    $scope.detailScholarship = function(id) {
        $http.get($scope.env.api+'scholarship/'+id)
        .success(function (response) {
            $scope.detail = response.detail;
            $scope.detail.content = $sce.trustAsHtml(response.detail.content);
            $scope.detail.requirement = $sce.trustAsHtml(response.detail.requirement);
            $scope.detail.registration = $sce.trustAsHtml(response.detail.registration);
			$scope.detail.deadline = moment.unix(response.detail.deadline).format("MM/DD/YYYY");
            //$scope.modalTemplate = 'views/scholarship/scholarship.detail.html';
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
