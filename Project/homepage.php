<html>
<?php 
	$title = 'Homepage';
	include 'assets/includes/header.php';
?>
<body>
	<div class="page-header"><h1><b>plan your travel</b></h1></div>
	<?php 
		$page = 'home';
		include 'assets/includes/nav.php';
	?>
	<div>
		<select name="continent" id="continent" class="continent">
			<option>Select a Continent</option>
			<option value="af" data-target="af" id="af">Africa</option>
       		<option value="am" data-target="am" id="am">America</option>
       		<option value="as" data-target="as" id="as">Asia</option>
       		<option value="eu" data-target="eu" id="eu">Europe</option>
       		<option value="oc" data-target="oc" id="oc">Oceania</option>
       	</select>
       	<div style="display:none" id="continent-af">
       		<select name="af" id="af" class="af">
       			<option>Select a Country</option>
       			<option value="egypt" data-target="egypt" class="egypt">Egypt</option>
       			<option value="mali" data-target="mali" class="mali">Mali</option>
       		</select>
       		<div style="display:none" id="af-egypt">
       			<select name="egypt" id="egypt" class="egypt">
       				<option>Select an Attraction</option>
       				<option value="sphinx" data-target="sphinx" class="sphinx">Great Sphinx of Giza</option>
       			</select>
       		</div>
       	</div>
       	<div style="display:none" id="continent-am">
       		<select name="am" id="am" class="am">
       			<option>Select a Country</option>
       			<option value="ca" data-target="ca" class="ca">Canada</option>
       			<option value="usa" data-target="usa" class="usa">USA</option>
       		</select>
       		<div style="display:none" id="am-usa">
       			<select name="usa" id="usa" class="usa">
       				<option>Select an Attraction</option>
       				<option value="stat" data-target="stat" class="stat">Statue of Liberty</option>
       			</select>
       		</div>
       	</div>
       	<div style="display:none" id="continent-as">
       		<select name="as" id="as" class="as">
       			<option>Select a Country</option>
       			<option value="ch" data-target="ch" class="ch">China</option>
       			<option value="ja" data-target="ja" class="ja">Japan</option>
       		</select>
       	</div>
       	<div style="display:none" id="continent-eu">
       		<select name="eu" id="eu" class="eu">
       			<option>Select a Country</option>
       			<option value="france" data-target="france" class="france">France</option>
       			<option value="italy" data-target="italy" class="italy">Italy</option>
       		</select>
       	</div>
       	<div style="display:none" id="continent-oc">
       		<select name="oc" id="oc" class="oc">
       			<option>Select a Country</option>
       			<option value="au" data-target="au" class="au">Australia</option>
       			<option value="nz" data-target="nz" class="nz">New Zealand</option>
       		</select>
       	</div>
       	<br>
       	<select name="popular" id="popular" class="popular">
       		<option>Popular Places</option>
       	</select>
    </div><br>
	<div class="container-fluid">
		<div class="row h-50">
  			<div class="col-sm-12 h-100 d-table">
    			<div class="card text-center mx-auto" style="width: 43rem;">
  					<img class="card-img-top" src="assets/img/et.jpg" alt="Card image cap">
  					<div class="card-body">
    					<h5 class="card-title">Eiffel Tower</h5>
    					<p class="card-text"><em>Champ de Mars, 5 Avenue Anatole France, 75007 Paris, France</em></p>
    					<a href="#" class="btn btn-primary">Continue Reading</a>
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