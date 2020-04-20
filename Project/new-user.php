<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <?php ob_start();

        session_start(); 
        include 'test.php';
        $title = "New User";
        $personalcss = '<link rel="stylesheet" type="text/css" href="assets/css/new-user.css">';
    
        include 'assets/includes/header.php';
        include 'assets/includes/registerhead.php';
    
        echo "<body>";
    
        $page = 'newUser'; 
  
        include 'assets/includes/nav.php';
    ?>
    <body>
        <h2 class="login" align="center">User Login</h2>
        <form action="" method="post">
            <div class="container">
                <input type="text" placeholder="Enter email" name="uname" required>
                <input type="password" placeholder="Enter password" name="psw" required>
                <button class="btn waves-effect waves-light" type="submit" name="nuSubmit">Login</button><br>
                <p>You must first login before viewing any content on this site.<br>Don't have an account? <a href="register.php">Sign up here</a></p>
            </div>
        </form>
    </body>
</html>
