<?php 


function OpenCon()
 {
 $dbhost = "us-cdbr-iron-east-04.cleardb.net:3306";
 $dbuser = "b14d132ab0daf1";
 $dbpass = "4235e037";
 $db = "heroku_fe29b274b3b479c";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
 
 return $conn;
 }
 
function CloseCon($conn)
 {
 $conn -> close();
}


if (isset($_POST["continent"])){
    $continent = $_POST["continent"];

	$conn = OpenCon(); 
	$countriesArray = array();
	$countries = $conn->query("SELECT DISTINCT country FROM attractions WHERE continent='".$continent."'");
	if ($countries->num_rows > 0) {
		// output data of each row
		while($row = $countries->fetch_assoc()) {
			array_push($countriesArray, $row["country"]);
		}
	}
	CloseCon($conn);
    echo implode("|", $countriesArray);
}

if (isset($_POST["country"])){
    $country = $_POST["country"];

	$conn = OpenCon(); 
	$attractionsArray = array();
	$attractions = $conn->query("SELECT DISTINCT title FROM attractions WHERE country='".$country."'");
	if ($attractions->num_rows > 0) {
		// output data of each row
		while($row = $attractions->fetch_assoc()) {
			array_push($attractionsArray, $row["title"]);
		}
	}
	CloseCon($conn);
	echo implode("|", $attractionsArray);
}
?>