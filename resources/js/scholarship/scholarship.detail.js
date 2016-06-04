var agendaDetailCtrl = ['$http','$scope', '$location', '$sce', '$stateParams', 'Notification',
    function($http, $scope, $location, $sce, $stateParams, Notification) {

        $http.get($scope.env.api+'agenda/'+$stateParams.id)
        .success(function (response) {
            $scope.detail = response.detail;
            $scope.detail.content = $sce.trustAsHtml(response.detail.content);
            $scope.detail.map_address = $sce.trustAsResourceUrl(response.detail.map_address);
			$scope.detail.start = moment.unix(response.detail.start_datetime).format("MM/DD/YYYY");
			$scope.detail.end = moment.unix(response.detail.end_datetime).format("MM/DD/YYYY");
            $scope.onDetail = true;
			// $location.hash('agendaDetail');
        });

}];
