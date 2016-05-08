var dirDetailCtrl = ['$http','$scope', '$location',  '$stateParams', 'Notification',
    function($http, $scope, $location, $stateParams, Notification) {
        
        $http.get($scope.env.api+'school/'+$stateParams.id)
        .success(function (response) {
            $scope.detail = response.detail[0];
            $scope.onDetail = true;
            $location.hash('schoolDetail');
        })
        
}];