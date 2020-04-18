<!DOCTYPE html>
<?php
session_start(); 
if ( isset( $_SESSION['id'] ) ) {
    $bool = 'yes';
} 
include 'test.php';
$num = $_GET['num'];
$conn = OpenCon(); 

//Just Title 
$one = "SELECT title FROM attractions WHERE a_id = ". $num;
$onething = $conn->query($one);

// Right Panel
$details = "SELECT * FROM attractions WHERE a_id = ". $num;
$results = $conn->query($details);

// Gallery Left Panel
$photos = "SELECT img_path FROM photos WHERE a_id =" . $num ." LIMIT 4"; 
$res = $conn->query($photos);

// Reviews Bottom Panel
$reviews = "SELECT * FROM reviews WHERE a_id =" . $num;
$printreview = $conn->query($reviews);

// HEADER
echo "<html>";

  $title = 'Read More';
  include 'assets/includes/readheader.php';
// NAV
echo "<body>";
    $page = 'readmore';
    include 'assets/includes/nav.php';
?>

<div class="row">
  <div class="container" id="attrTitle">
 <h3 class="galleryTitle fadeIn" > <?php $col = $onething->fetch_assoc(); echo "{$col['title']}"; $onething->free();

?></h3>
</div>
 <div class="col s12 m12 l7 xl8 LEFT">  
  <div class="container">
         
 <div id="gallery" class="row fadeIn">
  <ul class="">
    
    <?php
      if ($res->num_rows > 0){
       while ($row = $res->fetch_assoc()){
          echo "<li class=\"col s12 m6 l3 photo\">"; 
          echo "<img class=\"materialboxed\" src=\"" .$row['img_path'] . "\">";
          echo "</li>";

         
        }
      
      
      } 
        else { "No photos";
      }
      

    ?> 
    
</div>
</div>
</div>
<div id="RIGHT" class="col s12 m12 l5 xl4 RIGHT fadeIn2">
 <?php
      if ($results->num_rows > 0){
       while ($row = $results->fetch_assoc()){
       echo "
           <div class=\"container\"> 
    <div class=\"row\">
   <div class=\"card-panel blue-grey darken-1\">
        <div class=\"card-content white-text\">
          <ul>";
          echo "
          <li><i class=\"material-icons medium\">date_range</i></li> 
          <li>Date of Creation: " .
          $row['date_of_creation'] .
          "</li>
          <li><i class=\"material-icons medium\">person_pin</i></li>
          <li>Founder/Builder: ".
          $row['founder_name'] .
          "</li>
          <li><i class=\"material-icons medium\">zoom_out_map</i></li>
          <li>Dimensions: " .
          $row['dimensions'] . 
          "</li>
          <li><i class=\"material-icons medium\">map</i></li>
          <li>Location: " .
          $row['location'] .
          "</li>";
          
         
        }
      
      
      } 
        else { "No details";
      }
      

    ?> 
 
        </div>
  </div>
</div>
</div>
</div>


<div class="container fadeIn3">
<div class="row">
  <h3 class="galleryTitle">Reviews</h3>

 <?php
      if ($printreview->num_rows > 0){


          
       while ($row = $printreview->fetch_assoc()){
        $x = 1;

          echo "<div class=\"divider\"></div>" .
          "<div class=\"section\">".
          "<h5 class=\"reviewerName\">". $row['name']. "</h5>".
          "<h6>";
          while($x <= $row['rating']) {
               echo "<i class=\"material-icons small\">star</i>";
              $x++;

          } 
          if ($row['rating'] < 5){
            $x = $row['rating'];
          while ($x < 5){
            echo "<i class=\"material-icons small\">star_border</i>";
            $x++;
          }
          }
          echo"</h6>".
          "<blockquote>". $row['review']. "<br />". $row['date_posted']."</blockquote>".
          "</div>";

         
        }
      
      
      } 
        else { "No photos";
      }
      

    ?> 
    
</div>
</div>
<?php
 CloseCon($conn);
?>
</body>
</html>