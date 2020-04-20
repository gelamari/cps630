<!DOCTYPE html>
<?php 
	session_start(); 
	if ( isset( $_SESSION['id'] ) ) {
    	$bool = 'yes';
	}
    include 'test.php';
    $title = "Registration Processed";
    $personalcss = '<link rel="stylesheet" type="text/css" href="assets/css/register.css">';
    
	include 'assets/includes/registerhead.php';
    
    echo "<body>";
    
    $page = 'registerProcessed'; 
  
    include 'assets/includes/nav.php';
?>
	<body>
		<div class="container">
    		<div class="col s12 m7">
    			<h2 class="header" align="center">Thank you for joining, <?php echo $_POST["first_name"]; ?>!</h2><br>
              	<p class="center">An email confirmation has been sent to <?php echo $_POST["email"]; ?>. 
                    <a href="new-user.php">Back to Login</a></p>
            </div>
        </div>
	</body>
</html>