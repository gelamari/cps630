<!DOCTYPE html>
<html>
<?php 
    $title = "adminEdit";
    $personalcss = '<link rel="stylesheet" type="text/css" href="assets/css/adminEdit.css">';
    include 'assets/includes/registerhead.php';
    echo '<body ng-app="myApp">';
    $page = 'dbMaintain';
    include 'assets/includes/nav.php';




?>
<script type="text/javascript">

      $(document).ready(function(){
      	    $('.collapsible').collapsible();

      	$('.fixed-action-btn').floatingActionButton({
      		direction: 'right',
      		hoverEnabled: 'false'
      	});
	});

      var app = angular.module("myApp", ["ngRoute"]);
app.config(function($routeProvider) {
  $routeProvider
  .when("/", {
    templateUrl : "main.htm"
  })
  .when("/del", {
    templateUrl : "delete.html"
  })
  .when("/edit", {
    templateUrl : "edit.html"
  })
  .when("/add", {
    templateUrl : "add.html"
  });
});
</script>


<div class="container-fluid">
<div class="row">
<div class="col s2 m2 l2 center-align">

  <ul>
    <li><a class="btn-floating btn-large red" href="#!del">DELETE</a></li>
    <li><a class="btn-floating btn-large yellow darken-1" href="#!edit">EDIT</a></li>
    <li><a class="btn-floating btn-large blue" href="#!add">ADD</a></li>

  </ul>
</div>


<div class="col s10 m10 l10">
<div ng-view></div>
</div>
</div>	
</div>
</body>
</html>
