var homeCtrl = ['$scope', '$http', function($scope, $http) {
    
  $.AdminLTE.layout.fix();
  //$.AdminLTE.tree(".sidebar");

  $http.get($scope.env.api+'dashboard').success(function(response){
	  $scope.count = response;
  });

}];
