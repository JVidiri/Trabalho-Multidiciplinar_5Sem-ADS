var app = angular.module('adminApp', []);
app.controller('adminCtrl', function($scope, $http) {
    $scope.showCreateForm = function(){
    // clear form
    $scope.clearForm();
     
    // change modal title
    $('#modal-product-title').text("Create New admin");
     
    // hide update product button
    $('#btn-update-product').hide();
     
    // show create product button
    $('#btn-create-product').show();    
	}

    // clear variable / form values
	$scope.clearForm = function(){	    
	    $scope.name = "";
	    $scope.password = "";
	    $scope.password_conf = "";
	}

	// create new product 
	$scope.createAdmin = function(){         
	    // fields in key-value pairs
	    $http.post('/Trabalho-Multidiciplinar_5Sem-ADS/template/insert/admin.php', {
	            'name' : $scope.name, 
	            'password' : $scope.description, 
	            'password_conf' : $scope.password_conf
	        }
	    ).success(function (data, status, headers, config) {
	        console.log(data);
	        // tell the user new product was created
	        Materialize.toast(data, 4000);
	         
	        // close modal
	        $('#modal-product-form').closeModal();
	         
	        // clear modal content
	        $scope.clearForm();
	         
	        // refresh the list
	        $scope.getAll();
    });
}
});

$(document).ready(function(){
    // initialize modal
    $('.modal-trigger').leanModal();
});

$(document).ready(function() {
    $('#btnToCreate-Join').click(function() {
        $("#trigger_id").leanModal();
    });
});
