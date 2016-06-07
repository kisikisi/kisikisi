var courseDetailCtrl = ['$http','$scope', '$location', '$sce', '$stateParams', 'Notification',
    function($http, $scope, $location, $sce, $stateParams, Notification) {

        $http.get($scope.env.api+'course/'+$stateParams.id)
        .success(function (response) {
            $scope.detail = response.detail;
            $scope.detail.description = $sce.trustAsHtml(response.detail.description);
            $scope.detail.embed = $sce.trustAsResourceUrl(response.detail.embed);
            $scope.onDetail = true;
			// $location.hash('courseDetail');
        });

}];
