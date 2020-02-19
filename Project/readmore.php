<?php
include 'test.php';
$conn = OpenCon(); 
// Right Panel
$details = "SELECT * FROM attractions WHERE title = 'Eiffel Tower'";
$results = $conn->query($details);

// Gallery Left Panel
$photos = "SELECT img_path FROM photos"; 
$res = $conn->query($photos);

// Reviews Bottom Panel
$reviews = "SELECT * FROM reviews";
$printreview = $conn->query($reviews);


?>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- MaterializeCSS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
     
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    
    <!-- JavaScript -->
    <script type="text/javascript">
      $(document).ready(function(){
          $('.materialboxed').materialbox();
          $("li").addClass("center-align");

         
      });
   
    </script>

    <!-- Personal CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/readmorestyle.css">

     
  <title>Read More Page</title>
</head>
<body>
  <!-- HEADER -->
   <?php 
    $page = 'readmore';
    include 'assets/includes/nav.php';
    ?>
  <!-- END OF HEADER  -->
<div class="row">

 <div class="col s12 m12 l7 xl8 LEFT">  
  <div class="container">
          <h3 class="galleryTitle"> Gallery</h3>
 <div id="gallery" class="row">
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
<div id="RIGHT" class="col s12 m12 l5 xl4 RIGHT">
  <h3 class="galleryTitle">/Eiffel Tower </h3>
  <div class="container">
    <div class="row">
   <div class="card-panel blue-grey darken-1">
        <div class="card-content white-text">
          <ul>
            <?php
      if ($results->num_rows > 0){
       while ($row = $results->fetch_assoc()){
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
          $row['dimensions'] .
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


<div class="container">
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
          "<blockquote>". $row['review']."</blockquote>".
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