<?php

$dbhost = "us-cdbr-iron-east-04.cleardb.net:3306";
 $dbuser = "b14d132ab0daf1";
 $dbpass = "4235e037";
 $db = "heroku_fe29b274b3b479c";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
$data    = json_decode(file_get_contents("php://input"));
if (count($data) > 0) {
$title     = mysqli_real_escape_string($connect, $data->title);
$continent    = mysqli_real_escape_string($connect, $data->continent);
$country      = mysqli_real_escape_string($connect, $data->country);
$founder_name     = mysqli_real_escape_string($connect, $data->founder_name);
$date_of_creation    = mysqli_real_escape_string($connect, $data->date_of_creation);
$dimensions      = mysqli_real_escape_string($connect, $data->dimensions);
$btn_name = $data->btnName;
if ($btn_name == 'Update') {
$a_id    = $data->a_id;
$query = "UPDATE attractions SET title = '$title', continent = '$continent', country = '$country' , founder_name = '$founder_name', date_of_creation = '$date_of_creation', dimensions = '$dimensions', location = '$location' , latlong = $latlong WHERE a_id = '$a_id'";
if (mysqli_query($connect, $query)) {
echo 'Updated Successfully...';
} else {
echo 'Failed';
}
}
}
?>

