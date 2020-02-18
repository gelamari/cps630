<?php 
?>

<nav class="navbar mr-auto navbar-expand-sm bg-dark navbar-dark">
      <ul class="navbar-nav mr-auto">
        <li id="home" class="nav-item">
              <a class="nav-link" href="homepage.php">Home</a>
        </li>
        <li id="about" class="nav-item">
              <a class="nav-link" href="#">About</a>
        </li>
        <li id="contact" class="nav-item">
              <a class="nav-link" href="#">Contact</a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li id="cart" class="nav-item">
            <a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i></span> Cart</a>
        </li>
      </ul>
</nav>


<script>
      $("#<?php echo $page; ?>").addClass('active');
</script>