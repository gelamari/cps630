<?php
include "test.php";
$connect = OpenCon();
$data    = json_decode(file_get_contents("php://input"));
if (count($data) > 0) {
$title = mysqli_real_escape_string($connect, $data->title);
$date_of_creation= mysqli_real_escape_string($connect, $data->date_of_creation);
$founder_name = mysqli_real_escape_string($connect, $data->founder_name);
$dimensions= mysqli_real_escape_string($connect, $data->dimensions);
$location= mysqli_real_escape_string($connect, $data->location);
$country= mysqli_real_escape_string($connect, $data->country);
$continent= mysqli_real_escape_string($connect, $data->continent);
$btn_name = $data->btnName;
if ($btn_name == 'Update') {
$id    = $data->id;
$query = "UPDATE attractions SET title = '$title', date_of_creation = '$date_of_creation', founder_name = '$founder_name' , dimensions = '$dimensions', location = '$location', country = '$country', continent = '$continent' WHERE id = '$id'";
if (mysqli_query($connect, $query)) {
echo 'Updated Successfully...';
} else {
echo 'Failed';
}
}
}
?>