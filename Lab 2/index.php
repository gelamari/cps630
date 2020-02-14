<?php 
if (isset($_POST['submit'])){
$title = $_POST['title']; 
$description = $_POST['description'];
$genre = $_POST['genre'];
$subject = $_POST['subject'];
$year = $_POST['year'];
$museum = $_POST['museum'];
$type = $_POST['type'];
$ccs = implode(', ', $_POST['ccs']);


$artwork = array("Title"=>$title,"Description"=>$description, "Genre"=>$genre, "Subject"=>$subject, "Year"=>$year, "Museum"=>$museum, "Type"=>$type, "Creative Commons Specifications"=>$ccs);

$i=0;
foreach ($artwork as $key => $value) {
	# code...
	echo "<strong>" .$key. "</strong>". ": " . $value . "<br>";
}

}
?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lab2";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO artworks (title, description, genre, year)
VALUES ('$title', '$description', '$genre', '$year')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?> 