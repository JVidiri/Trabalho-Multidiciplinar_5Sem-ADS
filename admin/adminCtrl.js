var adminList = angular.module('adminList', []);

adminList.controller('adminCtrl', function($scope, $http) {
	$scope.admins = [];
	$http.get('/Trabalho-Multidiciplinar_5Sem-ADS/resources/template/list/admin.php?lastElement=0')
       .then(function(res){
          $scope.admins = res.data;               
        });    
});