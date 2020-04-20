<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <?php 
        session_start(); 
        if ( isset( $_SESSION['id'] ) ) {
            $bool = 'yes';
        } 
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
        
                <button class="btn waves-effect waves-light" type="submit" name="nuSubmit">Login</button>
            </div>
        </form>
    </body>
</html>
