var agendaCtrl = ['$http','$scope', '$rootScope', '$state', '$auth', '$sce', '$location', 'Notification', 'envService',
function($http, $scope, $rootScope, $state, $auth, $sce, $location, Notification, envService) {
    $rootScope.env = envService.read('all');
	//$(".ui.sidebar").sidebar("toggle");
	//$(".ui.sidebar").sidebar('attach events', '#sidebarToggle');

	$scope.agendas = [];
	$scope.scrollBusy = false;
	$scope.limit = 12;
	$scope.after = 0;
	$scope.onSearch = false;
	$scope.filter = {};
	$scope.url = $location.absUrl();

	if ($auth.getToken() == null) $auth.setToken();

	$scope.popup = function() {
		$('.browse').popup({ inline: true, hoverable: true,
			delay: {
				show: 300,
				hide: 800
			} });
	}
	$scope.$on('$includeContentLoaded', function(event) {
		$rootScope.modal1 = $("#siteModal").modal();
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

    $scope.filterAgenda = function() {
        $http.get($scope.env.api+'agenda/form')
        .success(function (response) {
            $scope.agendaCategories = response.agendaCategories;
            $scope.cities = response.cities;
            $scope.provinces = response.provinces;
        });
    };
    $scope.filterAgenda();

	$scope.searchAgenda = function(filter) {
		$scope.after = 0;
		$scope.agendas = [];
		$scope.nextPage();
		$scope.filter = filter;
		$scope.onSearch = false;
		$state.go('agenda');
	}

	$scope.agendaCalendar = function() {
		$http.get($scope.env.api+'agenda/calendar')
        .success(function (response) {
            var calendar = response.calendar;
			for (i=0;i<calendar.length;i++) {
				calendar[i].start = moment.unix(response.calendar[i].start).format("YYYY-MM-DD");
				calendar[i].end = moment.unix(response.calendar[i].end).format("YYYY-MM-DD");
				if (i % 2 == 0) calendar[i].color = '#E13E95';
				else calendar[i].color = '#933894';
			}
			$scope.eventSources = {
				events: calendar,
				//color: 'yellow',   // an option!
				textColor: 'black' // an option!
			}
        });
	}
	$scope.agendaCalendar();

	$scope.nextPage = function() {
		//console.log($scope.filter);
		$scope.scrollBusy = true;
		$http.get($scope.env.api+'agenda/scroll/'+$scope.after+'/'+$scope.limit, {
			params: $scope.filter
		}).success(function (response) {
			for (var i = 0; i < response.agendas.length; i++) {
				response.agendas[i].start_datetime = moment.unix(response.agendas[i].start_datetime).format('Do MMM YYYY');
				$scope.agendas.push(response.agendas[i]);
			}
            //$scope.agendas.push(response.agendas[0]);
			if (response.agendas.length > 0) {
				$scope.after = response.agendas[response.agendas.length - 1].id;
				$scope.scrollBusy = false;
			}
			//$('.ui.sticky').sticky('refresh');
			//console.log($scope.agendas);
        })
	}

	/*$scope.searchAgenda = function(filter) {
		$http.post($scope.env.api+'agenda/search', filter)
        .success(function (response) {
            $scope.agendas = response.agendas;
        });
	}*/

    $rootScope.detailAgenda = function(id) {
        $http.get($scope.env.api+'agenda/'+id)
        .success(function (response) {
            $scope.detail = response.detail;
            $scope.detail.content = $sce.trustAsHtml(response.detail.content);
            $scope.detail.map_address = $sce.trustAsResourceUrl(response.detail.map_address);
			$scope.detail.start = moment.unix(response.detail.start_datetime).format("Do MMM YYYY");
			$scope.detail.end = moment.unix(response.detail.end_datetime).format("Do MMM YYYY");
            //$scope.modalTemplate = 'views/agenda/agenda.detail.html';
			$rootScope.modal1.modal('show');
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
