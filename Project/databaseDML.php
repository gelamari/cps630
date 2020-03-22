<?php 

// Open Database connection for the production server
    
function selectForm($continents) {
	echo 
	"
<div class=\"form-group forSelect\" >
<form action=\"#\" method=\"post\">
     <select class=\"form-control\" name=\"attr\" placeholder=\"Attractions Dropdown\">
     <option value=\"\">Select an option...</option>
     ";
                if ($continents->num_rows > 0) {
                    // output data of each row
                    while($row = $continents->fetch_assoc()) {
                        echo "<option value=".$row["a_id"].">". $row["a_id"] . ": " .$row["title"]. "</option>";
                    }
                }
            
     echo "</select> <input type=\"submit\" name=\"submit\" value=\"Submit\" /></form></div>";

}

function printSelect($a_id, $conn){
	$query = $conn->query("SELECT * FROM attractions WHERE a_id =" . $a_id);
	$tag = "<table style=\"width:100%\">
 	<tr>
    <th>a_id</th>
    <th>title</th>
    <th>date_of_creation</th>
    <th>founder_name</th>
    <th>dimensions</th>
    <th>location</th>
    <th>country</th>
    <th>continent</th>
  	</tr><tr>";
    if ($query-> num_rows > 0){
    	while($rows= $query->fetch_assoc()){
    		foreach ($rows as $row) {
    			$tag .= "<td>" . $row . "</td>";
    		}
    	}
    }
    $tag .= "</tr></table>";
    return $tag;
}

// if (isset($_POST["country"])){
//     $country = $_POST["country"];

// 	$conn = OpenCon(); 
// 	$attractionsArray = array();
// 	$attractions = $conn->query("SELECT DISTINCT title FROM attractions WHERE country='".$country."'");
// 	if ($attractions->num_rows > 0) {
// 		// output data of each row
// 		while($row = $attractions->fetch_assoc()) {
// 			array_push($attractionsArray, $row["title"]);
// 		}
// 	}
// 	CloseCon($conn);
// 	echo implode("|", $attractionsArray);
// }
?>