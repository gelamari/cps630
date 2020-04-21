<!DOCTYPE html>
<html>
<?php 
    $title = "Plans";
    $personalcss = '<link rel="stylesheet" type="text/css" href="assets/css/adminEdit.css">';

    include 'assets/includes/registerhead.php';
    echo '<body ng-app="myApp">';
    $page = 'plans';


    session_start(); 
    if ( isset( $_SESSION['id'] ) ) {
        $bool = 'yes';
    } 

    include 'test.php';
    $conn = OpenCon();  
    $plans = $conn->query("SELECT * FROM plans");
    $continents = $conn->query("SELECT DISTINCT continent FROM attractions");
    $continents2 = $conn->query("SELECT DISTINCT continent FROM attractions");

    CloseCon($conn);
    include 'assets/includes/nav.php';

	include 'assets/includes/header.php';
?>

<!DOCTYPE html>
<div class="page-header">
        <h1><b>Plan Your Travel</b></h1>
    </div>
  <div class="container-fluid row">

    <div class="col s6">
        <div class="input-field col">
            <select name="continent" id="continent" class="continent">
                <option>Select a Continent</option>
                <?php
                    if ($continents->num_rows > 0) {
                        // output data of each row
                        while($row = $continents->fetch_assoc()) {
                            echo "<option value=".$row["continent"].">".$row["continent"]."</option>";
                        }
                    }
                ?>
            </select>
            <select id="country"></select>
            <select id="attraction"></select>
        </div>
    </div>
    <div class="col s6">
        <div class="input-field col">
            <select name="continent2" id="continent2" class="continent">
                <option>Select a Continent</option>
                <?php
                    if ($continents2->num_rows > 0) {
                        // output data of each row
                        while($row = $continents2->fetch_assoc()) {
                            echo "<option value=".$row["continent"].">".$row["continent"]."</option>";
                        }
                    }
                ?>
            </select>
            <select id="country2"></select>
            <select id="attraction2"></select>
        </div>
    </div>
</div><br>
    <div class="row">
        <div class="container-fluids s6">
            <div class="col h-50">
                <div class="col-sm-12 h-100 d-table">
                    <div class="card text-center mx-auto" style="width: 43rem;">
                        <img id="attrImg" class="card-img-top" src="assets/img/et.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h5 id="attrName" class="gelafont card-title"></h5>
                            <p class="card-text"><em id="attrDescription"></em></p>
                            <a href="" id="attrReadMore" class="btn btn-primary">Continue Reading</a>
                        </div>
                    </div><br>

                </div>
            </div>
        </div>
        <div class="container-fluids s6">
            <div class="col h-50">
                <div class="col-sm-12 h-100 d-table">
                    <div class="card text-center mx-auto" style="width: 43rem;">
                        <img id="attrImg2" class="card-img-top" src="assets/img/et.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h5 id="attrName2" class="gelafont card-title"></h5>
                            <p class="card-text"><em id="attrDescription2"></em></p>
                            <a href="" id="attrReadMore2" class="btn btn-primary">Continue Reading</a>
                        </div>
                    </div><br>

                </div>
            </div>
        </div>
    </div>

</body>


<script>

	$(document).ready(function () {
        $('.parallax').parallax();
        $('.materialboxed').materialbox();

    $(".container-fluids").hide();
		$("#continent").on('change', function() {
			var request = $.ajax({
				url: "test.php",
				type: "POST",
				data: { continent : $(this).val() }
            });
            request.done(function(msg) {
				$("#country").empty();
       			$("#attraction").empty();
				var countries = msg.split("|");
				$("#country").append(new Option('Select a Country', 'default'));
				for (i = 0; i < countries.length; ++i) {
					var o = new Option(countries[i], countries[i]);
					$(o).html(countries[i]);
					$("#country").append(o);
				}
            });
            request.fail(function(jqXHR, textStatus) {
            alert( "Request failed: " + textStatus );
            });

		});

		$("#country").on('change', function() {
			var request = $.ajax({
				url: "test.php",
				type: "POST",
				data: { country : $(this).val() }
            });
            request.done(function(msg) {
				$("#attraction").empty();
				var attraction = msg.split("|");
				$("#attraction").append(new Option('Select an Attraction', 'default'));
				for (i = 0; i < attraction.length; ++i) {
					var o = new Option(attraction[i], attraction[i]);
					$(o).html(attraction[i]);
					$("#attraction").append(o);
				}
            });
            request.fail(function(jqXHR, textStatus) {
            alert( "Request failed: " + textStatus );
            });
		});

		$("#attraction").on('change', function() {
			$selfVal = $(this).val(); 
			var request = $.ajax({
				url: "test.php",
				type: "POST",
				data: { attraction : $selfVal }
            });
            request.done(function(msg) {
              console.log(msg);
				var placeArray = msg.split("|");
				var placeId = placeArray[1];
				var placeImg = placeArray[6];
        var placeNearby = placeArray[0];
        var nearbyImg = placeArray[7];
        var nearbyTitle = placeArray[8];
        var city = placeArray[9];
        var country = placeArray[10];
				$("#attrImg").attr('src', placeImg);
				$("#attrName").text($selfVal);
				$("#attrReadMore").attr('href', 'readmore.php?num=' + placeId);
                $("#nearby").attr('href', 'readmore.php?num=' + placeNearby);
                $("#nearbyImg").attr('src', nearbyImg);
                $(".container-fluids").fadeIn(1000);
                $("#nearby").text(nearbyTitle);
                $("#location").text(city + ', ' + country);
            });
            request.fail(function(jqXHR, textStatus) {
            alert( "Request failed: " + textStatus );
            });
		});



		$("#continent2").on('change', function() {
			var request = $.ajax({
				url: "test.php",
				type: "POST",
				data: { continent : $(this).val() }
            });
            request.done(function(msg) {
				$("#country2").empty();
       			$("#attraction2").empty();
				var countries2 = msg.split("|");
				$("#country2").append(new Option('Select a Country', 'default'));
				for (i = 0; i < countries2.length; ++i) {
					var o = new Option(countries2[i], countries2[i]);
					$(o).html(countries2[i]);
					$("#country2").append(o);
				}
            });
            request.fail(function(jqXHR, textStatus) {
            alert( "Request failed: " + textStatus );
            });

		});

		$("#country2").on('change', function() {
			var request = $.ajax({
				url: "test.php",
				type: "POST",
				data: { country : $(this).val() }
            });
            request.done(function(msg) {
				$("#attraction2").empty();
				var attraction2 = msg.split("|");
				$("#attraction2").append(new Option('Select an Attraction', 'default'));
				for (i = 0; i < attraction2.length; ++i) {
					var o = new Option(attraction2[i], attraction2[i]);
					$(o).html(attraction2[i]);
					$("#attraction2").append(o);
				}
            });
            request.fail(function(jqXHR, textStatus) {
            alert( "Request failed: " + textStatus );
            });
		});

		$("#attraction2").on('change', function() {
			$selfVal = $(this).val(); 
			var request = $.ajax({
				url: "test.php",
				type: "POST",
				data: { attraction : $selfVal }
            });
            request.done(function(msg) {
              console.log(msg);
				var placeArray = msg.split("|");
				var placeId = placeArray[1];




				var placeImg = placeArray[6];
                var placeNearby = placeArray[0];
                var nearbyImg = placeArray[7];
                var nearbyTitle = placeArray[8];
                var city = placeArray[9];
                var country = placeArray[10];
				$("#attrImg2").attr('src', placeImg);
				$("#attrName2").text($selfVal);
				$("#attrReadMore2").attr('href', 'readmore.php?num=' + placeId);
                $("#nearby2").attr('href', 'readmore.php?num=' + placeNearby);
                $("#nearbyImg2").attr('src', nearbyImg);
                $(".container-fluids").fadeIn(1000);
                $("#nearby2").text(nearbyTitle);
                $("#location2").text(city + ', ' + country);
            });
            request.fail(function(jqXHR, textStatus) {
            alert( "Request failed: " + textStatus );
            });
		});
	});

</script>


<div id="testo"></div>
<script type="text/javascript">

            
      var app = angular.module("myApp", ["ngRoute"]);
        app.config(function($routeProvider) {
        $routeProvider
        });

        app.controller('MainCtrl', function($scope) {
        $scope.orderByField = 'firstName';
        $scope.reverseSort = false;

        $scope.data = {
            employees: [{
            firstName: 'John',
            lastName: 'Doe',
            age: 30
            },{
            firstName: 'Frank',
            lastName: 'Burns',
            age: 54
            },{
            firstName: 'Sue',
            lastName: 'Banter',
            age: 21
            }]
        };
        });
</script>


<section ng-app="app" ng-controller="MainCtrl">
  <span class="label">Ordered By: {{orderByField}}, Reverse Sort: {{reverseSort}}</span><br><br>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>
          <a href="#" ng-click="orderByField='firstName'; reverseSort = !reverseSort">
          First Name <span ng-show="orderByField == 'firstName'"><span ng-show="!reverseSort">^</span><span ng-show="reverseSort">v</span></span>
          </a>
        </th>
        <th>
          <a href="#" ng-click="orderByField='lastName'; reverseSort = !reverseSort">
            Last Name <span ng-show="orderByField == 'lastName'"><span ng-show="!reverseSort">^</span><span ng-show="reverseSort">v</span></span>
          </a>
        </th>
        <th>
          <a href="#" ng-click="orderByField='age'; reverseSort = !reverseSort">
          Age <span ng-show="orderByField == 'age'"><span ng-show="!reverseSort">^</span><span ng-show="reverseSort">v</span></span>
          </a>
        </th>
      </tr>
    </thead>
    <tbody>
      <tr ng-repeat="emp in data.employees|orderBy:orderByField:reverseSort">
        <td>{{emp.firstName}}</td>
        <td>{{emp.lastName}}</td>
        <td>{{emp.age}}</td>
      </tr>
    </tbody>
  </table>
</section>



</body>
</html>
