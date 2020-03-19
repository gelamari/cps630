

<?php
// Put this code at the top of any page to be "protected"

// start first
session_start();

if ( isset( $_SESSION['user_id'] ) ) 
 {

    // Get user data from the database using the user_id
    // Let access only to "logged in" pages
   echo "done"
  } 
   else 
  {

    // Redirect to the login page
    header("Location: http://www.my.ryerson.ca");
    echo "try again"
 }
?>

