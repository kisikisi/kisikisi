var scholarshipDetailCtrl = ['$http','$scope', '$location', '$sce', '$stateParams', 'Notification',
    function($http, $scope, $location, $sce, $stateParams, Notification) {

        $http.get($scope.env.api+'scholarship/'+$stateParams.id)
        .success(function (response) {
            $scope.detail = response.detail;
            $scope.detail.content = $sce.trustAsHtml(response.detail.content);
            $scope.detail.requirement = $sce.trustAsHtml(response.detail.requirement);
            $scope.detail.registration = $sce.trustAsHtml(response.detail.registration);
			$scope.detail.deadline = moment.unix(response.detail.deadline).format("MM/DD/YYYY");
            $scope.onDetail = true;
			// $location.hash('scholarshipDetail');
        });

}];
