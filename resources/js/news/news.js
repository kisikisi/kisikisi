var	newsCtrl = ['$http','$scope', '$rootScope', '$sce', '$auth', '$location', 'Notification', 'envService',
function($http, $scope, $rootScope, $sce, $auth, $location, Notification, envService) {
    $rootScope.env = envService.read('all');
	//$(".ui.sidebar").sidebar("toggle");
	//$(".ui.sidebar").sidebar('attach events', '#sidebarToggle');

	$scope.news = [];
	$scope.scrollBusy = false;
	$scope.limit = 6;
	$scope.after = 0;
	$scope.onSearch = false;
	$scope.filter = {};
	$scope.letterLimit = 200;

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

    $scope.filterNews = function() {
        $http.get($scope.env.api+'news/form')
        .success(function (response) {
            $scope.newsCategories = response.newsCategories;
            $scope.labels = response.labels;
        });
    };
    $scope.filterNews();

	$scope.searchNews = function(filter) {
		$scope.after = 0;
		$scope.news = [];
		$scope.nextPage();
		$scope.filter = filter;
		$scope.onSearch = false;
	}

	$scope.nextPage = function() {
		//console.log($scope.filter);
		$scope.scrollBusy = true;
		
		$http.get($scope.env.api+'news/scroll/'+$scope.after+'/'+$scope.limit, {
			params: $scope.filter
		}).success(function (response) {
			for (var i = 0; i < response.news.length; i++) {
				$scope.news.push(response.news[i]);
			}
			for(var i = 0; i < response.news.length; i++){
				$scope.news[i].date = moment.unix(response.news[i].date).format("MM/DD/YYYY");
			}
            //$scope.schools.push(response.schools[0]);
			if (response.news.length > 0) {
				$scope.after = response.news[response.news.length - 1].id;
				$scope.scrollBusy = false;
			}
			//$('.ui.sticky').sticky('refresh');
			//console.log($scope.schools);
        })
	}

	$scope.searchSchool = function(filter) {
		$http.post($scope.env.api+'school/search', filter)
        .success(function (response) {
            $scope.schools = response.schools;
        });
	}

    $scope.detailNews = function(id) {
        $http.get($scope.env.api+'news/'+id)
        .success(function (response) {
            $scope.detail = response.detail;
            $scope.detail.description = $sce.trustAsHtml(response.detail.description);
            $scope.detail.data = $sce.trustAsHtml(response.detail.data);
            $scope.detail.map_address = $sce.trustAsResourceUrl(response.detail.map_address);
            $scope.detail.date = moment.unix(response.detail.date).format("MM/DD/YYYY");
            //$scope.modalTemplate = 'views/directory/school.detail.html';
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
