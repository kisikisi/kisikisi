var dirCtrl = ['$http','$scope', '$rootScope', '$location', 'Notification', 'envService', 
function($http, $scope, $rootScope, $location, Notification, envService) {
    $rootScope.env = envService.read('all');
    //console.log($rootScope.env);
    $scope.onDetail = false;
    
    $scope.listSchool = function() {
        $http.get($scope.env.api+'school')
        .success(function (response) {
            $scope.school = response.school;
        })
    }    
    $scope.listSchool();
    
    var widget = this;
  
    $scope.$watch(function () {
    return widget.href;
    }, function () {
    widget.rendered = false;
    });
}];