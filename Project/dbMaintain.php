<?php
    session_start();
    if ( isset( $_SESSION['id'] ) ) {
    $bool = 'yes';
    } 
    else { 
    header("Location: http://localhost/cps630/Project/login.php");
    echo "try again";
    }
    include 'test.php';
    $conn = OpenCon(); 
    $continents = $conn->query("SELECT DISTINCT title, a_id FROM attractions");
    echo "<html>";
    $title = "Database Maintaining";
    $personalcss = "";
    include 'assets/includes/header.php';

    echo "<body>";
    $page = 'dbMaintain';
    include 'assets/includes/nav.php';
?>
<div class="form-group">
<form action="#" method="post">
<select name="choice" id="choice">
<option value="">Select an option...</option>
<option value="sel" <?php if ((!empty($_POST['choice'])) && $_POST['choice'] == 'sel') echo 'selected=\"selected\"'; ?> >SELECT</option>
<option value="ins" <?php if ((!empty($_POST['choice'])) && $_POST['choice'] == 'ins') echo 'selected=\"selected\"'; ?> >INSERT</option>
<option value="upd" <?php if ((!empty($_POST['choice'])) && $_POST['choice'] == 'upd') echo 'selected=\"selected\"'; ?> >UPDATE</option>
<option value="del" <?php if ((!empty($_POST['choice'])) && $_POST['choice'] == 'del') echo 'selected=\"selected\"'; ?> >DELETE</option>
<option value="all" <?php if ((!empty($_POST['choice'])) && $_POST['choice'] == 'all') echo 'selected=\"selected\"'; ?> >SHOW ALL</option>
</select>
<input type="submit" name="submit" value="Submit" />
</form>
</div>
<div id="attractionsdrop">
<?php 
include 'databaseDML.php';
if (isset($_POST['choice'])){
if ($_POST['choice'] == 'sel' ){
    selectForm($continents);
}
}
?>
</div>
<br>
<div class="item">
<?php
if (isset($_POST['attr'])){
$val = $_POST['attr'];
echo printSelect($val, $conn);
}
?>
</div>

<?php 
include 'Controllers/attractions.php';
if (isset($_POST['choice'])){
if ($_POST['choice'] == 'all' ){
$query = "SELECT * FROM attractions";
$allAttractions = $conn->query($query);

$listofAttractions = array(); // array of arrays - List of Attractions (array of keys and fields) 

$i = 0;
try {
  while ($row = $allAttractions->fetch_assoc()) { //for each row in table Attractions 
           $element = new Attractions(); //instantiate a new Attraction object                 

       foreach($row as $key => $field) {
            $element->__set(htmlspecialchars($key), htmlspecialchars($field));

       } //take each column / data from row and set it as the value for the Attraction object

       $listofAttractions[$i] = $element; //add the object into the list of Attractions array 
       $i++;

    }

} catch (Exception $e) {echo '';}

echo '<table><th>a_id</th><th>title</th><th>date_of_creation</th><th>founder_name</th><th>dimensions</th><th>location</th><th>country</th><th>continent</th>';

foreach($listofAttractions as $row) {

    echo $row->__toString(); //using the Attraction object's toString, printout all the attractions
}

echo '</table>';    


?>
</body>
</html>