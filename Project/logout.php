
<?php
// Logout process 

/*session_start();

// Destroying the session clears the $_SESSION variable
// OR when the browser is closed, this happens automatically
unset($_SESSION['id']);
session_destroy();
header("Location: http://localhost/cps630/Project/homepage.php");
exit();*/
// Initialize the session
session_start();
 
// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session.
session_destroy();
 
// Redirect to login page
header("location: new-user.php");
exit;
?>