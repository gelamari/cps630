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
        <h1><b>Create a Plan for your travels</b></h1>
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
                    <div id="attr" class="card text-center mx-auto" style="width: 43rem; height: 43rem">
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
                    <div id="attr2" class="card text-center mx-auto" style="width: 43rem; height: 43rem">
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

<div class="container-fluid">
    <h4> Distance between the two Attractions: <i id="distance"></i></h4>
    <div><h4> Price of Travel: <i id="price"></i></h4></div>
</div>
<div id="map_wrapper">
    <div id="map_canvas" class="mapping"></div>
</div>

<script>

    // Google map implementation
    var latlong = ['',0,0];
    var latlong2 = ['',0,0];
    jQuery(function($) {
        // Asynchronously Load the map API 
        var script = document.createElement('script');
        script.src = "//maps.googleapis.com/maps/api/js?key=AIzaSyDQd7v6wsiwu4kvbuehXWm8PFpiBvZDeAI&sensor=false&callback=initialize";
        document.body.appendChild(script);
    });

    function initialize() {
        getDistance(latlong[1],latlong[2],latlong2[1],latlong2[2])
        var map;
        var bounds = new google.maps.LatLngBounds();
        var mapOptions = {
            mapTypeId: 'roadmap'
        };
                        
        // Display a map on the page
        map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
        map.setTilt(45);
            
        // Multiple Markers
        var markers = [
            latlong,
            latlong2
        ];
                            
            
        // Display multiple markers on a map
        var infoWindow = new google.maps.InfoWindow(), marker, i;
        
        // Loop through our array of markers & place each one on the map  
        for( i = 0; i < markers.length; i++ ) {
            var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
            bounds.extend(position);
            marker = new google.maps.Marker({
                position: position,
                map: map,
                title: markers[i][0]
            });
            
            // Allow each marker to have an info window    
            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                    infoWindow.setContent(infoWindowContent[i][0]);
                    infoWindow.open(map, marker);
                }
            })(marker, i));

            // Automatically center the map fitting all markers on the screen
            map.fitBounds(bounds);
        }

        // Override our map zoom level once our fitBounds function runs (Make sure it only runs once)
        var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
            this.setZoom(2);
            google.maps.event.removeListener(boundsListener);
        });
        
    }

    // attraction containers
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
                latlong = [country,placeArray[11].split(",")[0],placeArray[11].split(",")[1]];

                $("#attrImg").attr('src', placeImg);
                document.getElementById("attr").innerHTML='<object style="width:inherit;height:inherit" type="text/html" data="../Project/readmore.php?num=' + placeId + '" ></object>';
                $(".container-fluids").fadeIn(1000);
                $("#location").text(city + ', ' + country);

                initialize();
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
                latlong2 = [country,placeArray[11].split(",")[0],placeArray[11].split(",")[1]];

				$("#attrImg2").attr('src', placeImg);
                document.getElementById("attr2").innerHTML='<object style="width:inherit;height:inherit" type="text/html" data="../Project/readmore.php?num=' + placeId + '" ></object>';
                $(".container-fluids").fadeIn(1000);
                $("#location2").text(city + ', ' + country);
                initialize();
            });
            request.fail(function(jqXHR, textStatus) {
            alert( "Request failed: " + textStatus );
            });
		});
    });
    


    function Deg2Rad( deg ) {
       return deg * Math.PI / 180;
    }

    function getDistance(lat1,lon1,lat2,lon2)
    {       
        //Toronto Latitude  43.74 and longitude  -79.37
        //Vancouver Latitude  49.25 and longitude  -123.12
        lat1 = Deg2Rad(lat1); 
        lat2 = Deg2Rad(lat2); 
        lon1 = Deg2Rad(lon1); 
        lon2 = Deg2Rad(lon2);
        latDiff = lat2-lat1;
        lonDiff = lon2-lon1;
        var radius = 6371000; // metres
        var d1 = lat1;
        var d2 = lat2;
        var l1 = latDiff;
        var l2 = lonDiff;
        var dist = (Math.acos( Math.sin(d1)*Math.sin(d2) + Math.cos(d1)*Math.cos(d2) * Math.cos(l2) ) * radius)/1000;
        $("#distance").text(dist + " KM");
        $("#price").text("$" + Math.round(dist*0.23));


    }    
</script>
</body>
</html>
