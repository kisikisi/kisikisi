var dirDetailCtrl = ['$http','$scope', '$location', '$sce', '$stateParams', 'Notification',
    function($http, $scope, $location, $sce, $stateParams, Notification) {
        
        $http.get($scope.env.api+'school/'+$stateParams.id)
        .success(function (response) {
            $scope.detail = response.detail[0];
            $scope.detail.description = $sce.trustAsHtml(response.detail[0].description);
            $scope.detail.data = $sce.trustAsHtml(response.detail[0].data);
            $scope.onDetail = true;
            // $location.hash('schoolDetail');
        });
        
}];
