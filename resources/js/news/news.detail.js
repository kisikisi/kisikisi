var newsDetailCtrl = ['$http','$scope', '$location', '$sce', '$stateParams', 'Notification',
    function($http, $scope, $location, $sce, $stateParams, Notification) {
        
        $http.get($scope.env.api+'news/'+$stateParams.id)
        .success(function (response) {
            $scope.detail = response.detail;
            $scope.detail.description = $sce.trustAsHtml(response.detail.description);
            $scope.detail.data = $sce.trustAsHtml(response.detail.data);
            $scope.detail.map_address = $sce.trustAsResourceUrl(response.detail.map_address);
            
            $scope.onDetail = true;

			// $location.hash('newsDetail');
        });
        
}];
