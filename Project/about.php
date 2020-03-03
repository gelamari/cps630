<html>
<?php 
    $title = "About us";
    $personalcss = "";
    include 'assets/includes/header.php';
?>
<body>
    <?php 
    $page = 'about';
    include 'assets/includes/nav.php';
    ?>

    <div class="container">
    	<div class="col s12 m7">
    		<h2 class="header">About Us</h2>
    		<div class="card horizontal">
      		<div class="card-stacked">
        		<div class="card-content">
              <p class="smol">
                <h6> <b>Hello!</b> </h6><br>
                We are a small team of web developers that implemented <em>Plan Your Travel</em>. This travel website features 20 famous attractions around the world from 5 different continents, and two different countries per continent. Users are able to view information about the attractions and check out reviews. In addition to this, our website includes two different travel plans to make trip-planning easy and simple.<br><br>

                With the use of MaterializeCSS, PHP, SQL, HTML, CSS, Javascript, JQuery, and AJAX, we were able to make this website both responsive and user-friendly. However, we would like to develop this project further so if you have any questions or suggestions on how to improve our website, feel free to contact anyone on our team via the 'Contact' page. Your feedback is greatly appreciated!<br><br>

                Thanks,<br>
                <h4 class="team"><i>Team 25</i></h4>
              </p>
        			
              </ul>
      			</div>
    		  </div>
  		  </div>
      </div>
    </div>
    <script type="text/javascript">
             $(document).ready(function(){
               $('.header').hide().fadeIn(1000);

                 $('.card').hide().fadeIn(1000);
       });
    </script>
<body>