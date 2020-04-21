  $(document).ready(function(){
            $('.collapsible').collapsible();

        $('.fixed-action-btn').floatingActionButton({
          direction: 'right',
          hoverEnabled: 'false'
        });
  });
var adminApp = angular.module('adminApp', ['ngRoute']);
adminApp.config(function($routeProvider) {
  $routeProvider
  .when("/", {
    templateUrl : "adminEdit.php"

  })
  .when("/del", {
    templateUrl : "delete.html"
  })
  .when("/edit", {
    templateUrl : "edit.php",
    controller : "editController"

  })
  .when("/add", {
    templateUrl : "add.html"
  })
  
});

// create the controller and inject Angular's $scope
	adminApp.controller('editController', function($scope, $http) {
	  // create a message to display in our view
	   
  		$scope.btnName = "Update";
$scope.update_data = function() {
if ($scope.title == null) {
alert("Enter Your Name");
} else if ($scope.continent == null) {
alert("Enter Your Email ID");
} else if ($scope.country == null) {
alert("Enter Your Age");
} else {
$http.post(
"update.php", {
'title': $scope.title,
'continent': $scope.continent,
'country': $scope.country,
'btnName': $scope.btnName,
'a_id': $scope.a_id,

}
).success(function(data) {
alert(data);
$scope.title = null;
$scope.continent = null;
$scope.country = null;

$scope.btnName = "Update";
$scope.displayData();
});
}
}
$scope.displayData = function() {
 $http({
  method: 'get',
  url: 'display.php'
 }).then(function successCallback(response) {
  // Store response data
  $scope.names = response.data;
 });
}
$scope.updateData = function(a_id, title, continent, country) {
$scope.a_id = a_id;
$scope.title = title;
$scope.continent = continent;
$scope.country = country;
$scope.btnName = "Update";

}
});
