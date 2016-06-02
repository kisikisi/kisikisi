var agendaCtrl = ['$http','$scope', '$rootScope', '$state', '$sce', '$location', 'Notification', 'envService',
function($http, $scope, $rootScope, $state, $sce, $location, Notification, envService) {
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

	$scope.nextPage = function() {
		//console.log($scope.filter);
		$scope.scrollBusy = true;
		$http.get($scope.env.api+'agenda/scroll/'+$scope.after+'/'+$scope.limit, {
			params: $scope.filter
		}).success(function (response) {
			for (var i = 0; i < response.agendas.length; i++) {
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

	$scope.loginForm = function() {
        //$scope.modalTemplate = 'views/partial/login.html';
		$scope.modal2.modal('show');
	}

    $scope.detailAgenda = function(id) {
        $http.get($scope.env.api+'agenda/'+id)
        .success(function (response) {
            $scope.detail = response.detail;
            $scope.detail.content = $sce.trustAsHtml(response.detail.content);
            $scope.detail.map_address = $sce.trustAsResourceUrl(response.detail.map_address);
			$scope.detail.start = moment.unix(response.detail.start_datetime).format("MM/DD/YYYY");
			$scope.detail.end = moment.unix(response.detail.end_datetime).format("MM/DD/YYYY");
            //$scope.modalTemplate = 'views/agenda/agenda.detail.html';
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
