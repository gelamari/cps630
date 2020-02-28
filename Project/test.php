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

if (isset($_POST["plan_id"])){
    $plan_id = $_POST["plan_id"];

	$conn = OpenCon(); 
	$plan = $conn->query("SELECT * FROM plans WHERE id='".$plan_id."'");
    $plan_data = $plan->fetch_assoc();
    if ($plan_data["purchased"]) {
        $order = $conn->query("SELECT * FROM orders WHERE plan_id='".$plan_id."'");
        $order_data = $order->fetch_assoc();
        echo json_encode($order_data);
    } else {
        echo "|".$plan_data["total_price"];
    }
    CloseCon($conn);
}

if (isset($_POST["purchase"])) {
    $purchase = $_POST['purchase'];
    $plan_id = $_POST['plan_id'];
    $num_travelers = $_POST['num_travelers'];
    $ages = $_POST['ages'];
    $total = $_POST['total'];

    $conn = OpenCon(); 
	$plan = $conn->query("UPDATE plans SET purchased = 1 WHERE id=$plan_id");

    $sql = "INSERT INTO orders (plan_id, num_travelers, ages, total)
    VALUES ($plan_id, $num_travelers, \"$ages\", $total)";

    if ($conn->query($sql) === TRUE) {
        echo "New record(s) created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    CloseCon($conn);
}


if (isset($_POST["attraction"])) {
    $attraction = strval($_POST["attraction"]);
    // echo $attraction;

	$conn = OpenCon(); 
    $outputArray = array();

    $outputId = $conn->query("SELECT a_id FROM attractions WHERE title=\"$attraction\"");
    	if ($outputId->num_rows > 0) {
		// output data of each row
		while($row = $outputId->fetch_assoc()) {
			if ($row["a_id"] % 2 == 0) {
				$nearby = $row["a_id"] - 1; 
			}
			else {
				$nearby = $row["a_id"] + 1;

			}
			array_push($outputArray, $nearby);
            array_push($outputArray, $row["a_id"]);
            $outputNum =  $row["a_id"];
            
		}
    }
    


	$outputPhoto = $conn->query("SELECT img_path FROM photos WHERE a_id=$outputNum");
	if ($outputPhoto->num_rows > 0) {
		// output data of each row
		while($row = $outputPhoto->fetch_assoc()) {
			array_push($outputArray, $row["img_path"]);
		}
	}
	$nearbyPhoto = $conn->query("SELECT img_path FROM photos WHERE a_id=$nearby ORDER BY p_id desc LIMIT 1");
	if($nearbyPhoto->num_rows > 0) {
		   $row = $nearbyPhoto-> fetch_assoc();	
		   array_push($outputArray, $row["img_path"]);
		
	}
	$nearbyTitle = $conn->query("SELECT title, location, country FROM attractions WHERE a_id=$nearby");
	if($nearbyTitle->num_rows > 0) {
		   $row = $nearbyTitle-> fetch_assoc();	
		   array_push($outputArray, $row["title"]);
		    array_push($outputArray, $row["location"]);
		     array_push($outputArray, $row["country"]);
		
	}

	

	CloseCon($conn);
	echo implode("|", $outputArray);
}


if (isset($_POST["search"])) {
    $search = 'Italy';

	$conn = OpenCon(); 
	$outputResults = array();
	
	$queryAttractions = "SELECT * FROM `attractions` WHERE (CONVERT(`a_id` USING utf8) LIKE '%$search%' OR CONVERT(`title` USING utf8) LIKE '%$search%' OR CONVERT(`date_of_creation` USING utf8) LIKE '%$search%' OR CONVERT(`founder_name` USING utf8) LIKE '%$search%' OR CONVERT(`dimensions` USING utf8) LIKE '%$search%' OR CONVERT(`location` USING utf8) LIKE '%$search%' OR CONVERT(`country` USING utf8) LIKE '%$search%' OR CONVERT(`continent` USING utf8) LIKE '%$search%')";
	$queryOrders = "SELECT *  FROM `orders` WHERE (CONVERT(`id` USING utf8) LIKE'%$search%' OR CONVERT(`plan_id` USING utf8) LIKE'%$search%' OR CONVERT(`num_travelers` USING utf8) LIKE'%$search%' OR CONVERT(`ages` USING utf8) LIKE'%$search%' OR CONVERT(`total` USING utf8) LIKE'%$search%')";
	$queryPhotos = "SELECT *  FROM `photos` WHERE (CONVERT(`p_id` USING utf8) LIKE'%$search%' OR CONVERT(`img_path` USING utf8) LIKE'%$search%' OR CONVERT(`a_id` USING utf8) LIKE'%$search%')";
	$queryPlans = "SELECT *  FROM `plans` WHERE (CONVERT(`id` USING utf8) LIKE'%$search%' OR CONVERT(`start_date` USING utf8) LIKE'%$search%' OR CONVERT(`duration` USING utf8) LIKE'%$search%' OR CONVERT(`fare` USING utf8) LIKE'%$search%' OR CONVERT(`total_price` USING utf8) LIKE'%$search%' OR CONVERT(`purchased` USING utf8) LIKE'%$search%' OR CONVERT(`map_link` USING utf8) LIKE'%$search%' OR CONVERT(`description` USING utf8) LIKE'%$search%')";
	$queryReviews ="SELECT *  FROM `reviews` WHERE (CONVERT(`r_id` USING utf8) LIKE'%$search%' OR CONVERT(`name` USING utf8) LIKE'%$search%' OR CONVERT(`rating` USING utf8) LIKE'%$search%' OR CONVERT(`review` USING utf8) LIKE'%$search%' OR CONVERT(`a_id` USING utf8) LIKE'%$search%' OR CONVERT(`date_posted` USING utf8) LIKE'%$search%')";

	$queries = array($queryAttractions, $queryOrders, $queryOrders, $queryPhotos, $queryPlans, $queryReviews);

	foreach($queries as $query) {
		$searchResult = $conn->query($query);
		echo("<table class=\"responsive-table striped\">");
		$first_row = true;
		try {
			while ($row = $searchResult->fetch_assoc()) {
				if ($first_row) {
					$first_row = false;
					// Output header row from keys.
					echo '<tr>';
					foreach($row as $key => $field) {
						echo '<th>' . htmlspecialchars($key) . '</th>';
					}
					echo '</tr>';
				}
				echo '<tr>';
				foreach($row as $key => $field) {
					echo '<td style="overflow: hidden; max-width: 300px;">' . htmlspecialchars($field) . '</td>';
				}
				echo '</tr>';
			}
		} catch (Exception $e) {echo '';}
		echo("</table>");
	}
    CloseCon($conn);
}

?>