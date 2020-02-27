<?php
include 'test.php';
$conn = OpenCon(); 
$continents = $conn->query("SELECT DISTINCT continent FROM attractions");
CloseCon($conn);
?>


<html>
<?php 
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
    					<h5 id="attrName" class="card-title"></h5>
    					<p class="card-text"><em id="attrDescription"></em></p>
    					<a href="#" id="attrReadMore" class="btn btn-primary">Continue Reading</a>
  					</div>
				</div><br>
				<div class="card mx-auto" style="width:45rem; border: none;">
					<div class="card-body">
						<h5 class="card-title">Nearby Attractions</h5>
						<div class="card-deck">
  							<div class="card">
    							<div class="card-body text-center">
      								<p class="card-text">Some text inside the first card</p>
    							</div>
  							</div>
  							<div class="card">
    							<div class="card-body text-center">
      								<p class="card-text">Some text inside the second card</p>
    							</div>
  							</div>
  							<div class="card">
    							<div class="card-body text-center">
      								<p class="card-text">Some text inside the third card</p>
    							</div>
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
				var placeId = placeArray[0];
				var placeImg = placeArray[5];
				$("#attrImg").attr('src', placeImg);
				$("#attrName").text($selfVal);
				$("#attrReadMore").attr('href', 'readmore.php?num=' + placeId);
				$(".container-fluids").fadeIn(1000);
            });
            request.fail(function(jqXHR, textStatus) {
            alert( "Request failed: " + textStatus );
            });
		});
	});

</script>