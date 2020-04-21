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
  .otherwise({
	    redirectTo: "/"
	  });
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
'founder_name': $scope.founder_name,
'date_of_creation': $scope.date_of_creation,
'dimensions': $scope.dimensions,
'location': $scope.location
}
).success(function(data) {
alert(data);
$scope.title = null;
$scope.continent = null;
$scope.country = null;
$scope.founder_name = null;
$scope.date_of_creation = null;
$scope.dimensions = null;
$scope.location = null;
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
$scope.updateData = function(a_id, title, continent, country, founder_name, date_of_creation,dimensions, location) {
$scope.a_id = a_id;
$scope.title = title;
$scope.continent = continent;
$scope.country = country;
$scope.btnName = "Update";
$scope.founder_name = founder_name;
$scope.date_of_creation = date_of_creation;
$scope.dimensions = dimensions;
$scope.location = location;
}
});
