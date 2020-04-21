<?php
$dbhost = "us-cdbr-iron-east-04.cleardb.net:3306";
 $dbuser = "b14d132ab0daf1";
 $dbpass = "4235e037";
 $db = "heroku_fe29b274b3b479c";
$connect = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);$output  = array();
$query   = "SELECT a_id, title, continent, country, founder_name, dimensions, location, latlong FROM attractions LIMIT 20";
$result  = mysqli_query($connect, $query);
if (mysqli_num_rows($result) > 0) {
while ($row = mysqli_fetch_array($result)) {
$output[] = $row;
}
echo json_encode($output);
}
?>