<html>

<head>
  <link rel="stylesheet" href="assets/css/login.css">
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <title>Sign in</title>
</head>

<body>
  <div class="main">
    <p class="sign" align="center">Admin Sign in</p>
    <form action="" method="post" class="form1">
      <input class="un " type="text" name="username" align="center" placeholder="Username" required>
      <input class="pass" name="password" type="password" align="center" placeholder="Password">
      <input type="submit" class="submit" align="center" placeholder="Sign in">
      </form>
                
    </div>
     
<?php

//start first
session_start();

if ( ! empty( $_POST ) ) 
{
    if ( isset( $_POST['username'] ) && isset( $_POST['password'] ) ) 
   {
        $db_host = "us-cdbr-iron-east-04.cleardb.net:3306";
        $db_user = "b14d132ab0daf1";
        $db_pass = "4235e037";
        $db_name = "heroku_fe29b274b3b479c";
        $username = $_POST['username'];
        $password = $_POST['password'];
        $con = new mysqli($db_host, $db_user, $db_pass, $db_name);
        $stmt = $con->prepare("SELECT id,username,password, admin FROM users WHERE username = ? AND password = ? LIMIT 1");
        $stmt->bind_param('ss', $username, sha1($password));
        $stmt->execute();
        $stmt->bind_result($id, $username, $password, $admin);
        $stmt->store_result();

        if($stmt->num_rows == 1)  //To check if the row exists
        {
            if($stmt->fetch()) //fetching the contents of the row
            {
                
                   $_SESSION['id'] = $id;
                   $_SESSION['username'] = $username;
                   echo 'Success!';
                   header("Location: http://localhost/cps630/Project/homepage.php");
                   exit();
               
            }
         

        }    
        else {
            echo "INVALID USERNAME/PASSWORD Combination!";

        }
        $stmt->close();
    }

}
?>

</body>
</html>
