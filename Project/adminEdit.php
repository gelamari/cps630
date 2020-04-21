<!DOCTYPE html>
<html ng-app="adminApp">
<?php 
    $title = "adminEdit";
    $personalcss = '<link rel="stylesheet" type="text/css" href="assets/css/adminEdit.css"> <script src="assets/js/adminScript.js"></script>';
    include 'assets/includes/registerhead.php';
    echo '<body>';
    include 'assets/includes/nav.php';



?>


<div class="container-fluid">
<div class="row">
<div class="col s1 m1 l1 center-align">

  <ul>
    <li><a class="btn-floating btn-large red" href="#!del">DELETE</a></li>
    <li><a class="btn-floating btn-large yellow darken-1" href="#!edit">EDIT</a></li>
    <li><a class="btn-floating btn-large blue" href="#!add">ADD</a></li>

  </ul>
</div>


<div class="col s11 m11 l11">
<div ng-view></div>
</div>
</div>	
</div>
</body>
</html>
