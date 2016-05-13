var dirIndexCtrl = ['$http','$scope', '$rootScope', '$location', 'Notification', 'envService',
function($http, $scope, $rootScope, $location, Notification, envService) {

    $scope.listSchool = function() {
        $http.get($scope.env.api+'school')
        .success(function (response) {
            $scope.school = response.school;
        })
    }


    $scope.listSchool();
}];
