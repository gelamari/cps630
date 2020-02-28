<?php
include 'test.php';
$conn = OpenCon(); 
$continents = $conn->query("SELECT DISTINCT continent FROM attractions");
CloseCon($conn);
?>
<html>
<?php 
	// include 'assets/includes/protect-page.php';
  $title = 'Homepage';
	include 'assets/includes/header.php';
?>
<body>
	<?php 
		$page = 'home';
		include 'assets/includes/nav.php';
	?>
    <div class="container-fluid">
	<div class="page-header">
    <h1><b>Plan Your Travel</b></h1></div>

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
		   
    </div><br>
	<div class="container-fluids">
		<div class="row h-50">
  			<div class="col-sm-12 h-100 d-table">
    			<div class="card text-center mx-auto" style="width: 43rem;">
  					<img id="attrImg" class="card-img-top" src="assets/img/et.jpg" alt="Card image cap">
  					<div class="card-body">
    					<h5 id="attrName" class="gelafont card-title"></h5>
    					<p class="card-text"><em id="attrDescription"></em></p>
    					<a href="" id="attrReadMore" class="btn btn-primary">Continue Reading</a>
  					</div>
				</div><br>

<div class="container-fluid">
    <div class="card-title"><h5>Nearby Attractions</h5></div>   
				 
     <div class="row">
          <div class="col s12 m4 l4 xl4">
               <div class="parallax-container">
               <div class="parallax"> 
                      <img id="nearbyImg" src="assets/img/et.jpg">
               </div>
               </div>
             <div class="center nearbyBtn">
                  <a href="#" class="btn btn-secondary center" id="nearby">This is a link</a>
                  <p id="location" class="gelafont nearbySize"></p>
             </div>
           </div>
        <div class="col s12 m4 l4 xl4">
               <div class="card ">
              <div class="card-image">
                  <img src="assets/img/et.jpg">
                <span class="card-title"></span>
              </div>
              <div class="card-content">
          <a href="#" class="btn white" style="box-shadow: 0 0px 0px 0 rgba(0,0,0,0.14), 0 0px 0px 0px rgba(0,0,0,0.12), 0 0px 0px 0 rgba(0,0,0,0.2);"></a>
        </div>
              </div>
        </div>
        <div class="col s12 m4 l4 xl4">
               <div class="card ">
              <div class="card-image">
                  <img src="assets/img/et.jpg">
                <span class="card-title"></span></div>
              <div class="card-content">
          <a href="#" class="btn white" style="box-shadow: 0 0px 0px 0 rgba(0,0,0,0.14), 0 0px 0px 0px rgba(0,0,0,0.12), 0 0px 0px 0 rgba(0,0,0,0.2);"></a>
        </div>
              </div>
        </div>

</div>

			</div>
		</div>
	</div>
</body>
</html>


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
	});

</script>