<?php

include 'test.php';

$conn = OpenCon(); 

$query = "SELECT * FROM attractions";
$photos = "SELECT img_path FROM photos"; 
$results = $conn->query($query);
$res = $conn->query($photos);

$begin = <<<EOT
<html> 
<head>		
<style>
td {
	border: 1px solid blue;
}
table {
    border: 1px solid red;
}
img {
	max-width: 100%;
min-width: 100%;
height: 270px;
  object-fit: cover;
}
</style>
</head>
<body>
EOT;
$end = <<<EOT
			</table>
			</body>
			</html>
	EOT;


echo "Connected Successfully!!";
echo $begin;

// if ($results->num_rows > 0){

// 	echo "<table><th>Title</th><th>Date</th><th>Founder(s)</th><th>Dimensions</th><th>Location</th>"; 
// 	while ($row = $results->fetch_assoc()){
// 		echo "<tr style='border:1px solid red'>" ;
// 		echo "<td>". $row['title'] ."</td>";
// 		echo "<td>". $row['date_of_creation'] ."</td>";
// 		echo "<td>". $row['founder_name'] ."</td>";
// 		echo "<td>". $row['dimensions'] ."</td>";
// 		echo "<td>". $row['location'] ."</td>";
// 		echo "</tr>";
// 	}
// $end;
// } 
// else { "0 results";
// }


// // FOR IMAGES !!! 
// if ($res->num_rows > 0){

// 	echo "<table><th>Image Path</th>"; 
// 	while ($row = $res->fetch_assoc()){
// 		echo "<tr style='border:1px solid red'>" ;
// 		echo "<td>". "<img src=\"" .$row['img_path'] . "\">" ."</td>";
// 		echo "</tr>";
// 	}
// $end;
// } 
// else { "0 results";
// }


CloseCon($conn);

?>
