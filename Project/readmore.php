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
    <li class="col s12 m6 l3 photo">
       <img class="materialboxed" src="assets/img/day.jpg" >
    </li>
    <li class="col s12 m6 l3 photo">
        <img class="materialboxed"src="assets/img/longeiffel.jpg">           
    </li>
    <li class="col s12 m6 l3 photo">
         <img class="materialboxed" src="assets/img/day.jpg">
    </li>
    <li class="col s12 m6 l3 photo">
         <img class="materialboxed" src="assets/img/longwater.jpg"> 
    </li>
    <li class="col s12 m6 l3 photo">
      <img class=" materialboxed" src="assets/img/longnight.jpg"> 
    </li>
    <li class="col s12 m6 l3 photo">
      <img class=" materialboxed" src="assets/img/day.jpg"> 
    </li>
    <li class="col s12 m6 l3 photo">
      <img class=" materialboxed" src="assets/img/parislands.jpg"> 
    </li>
    <li class="col s12 m6 l3 photo">
      <img class=" materialboxed" src="assets/img/longeiffel.jpg"> 
    </li>
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
            <li><i class="material-icons medium">date_range</i></li>
            <li>Date of Creation:</li>
             <li><i class="material-icons medium">person_pin</i></li>
            <li>Founder/Builder:</li>
             <li><i class="material-icons medium">zoom_out_map</i></li>
            <li>Dimensions:</li>
             <li><i class="material-icons medium">map</i></li>
            <li>Location:</li>
          </ul>
        </div>
  </div>
</div>
</div>
</div>


<div class="container">
<div class="row">
  <h3 class="galleryTitle">Reviews</h3>
      <div class="divider"></div>
  <div class="section">
    <h5>Section 1</h5>
    <p>Stuff</p>
  </div>
  <div class="divider"></div>
  <div class="section">
    <h5>Section 2</h5>
    <p>Stuff</p>
  </div>
  <div class="divider"></div>
  <div class="section">
    <h5>Section 3</h5>
    <p>Stuff</p>
  </div>

</div>
</div>

</body>
</html>