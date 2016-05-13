var dirCtrl = ['$http','$scope', '$rootScope', '$location', 'Notification', 'envService', 
function($http, $scope, $rootScope, $location, Notification, envService) {
    $rootScope.env = envService.read('all');
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
