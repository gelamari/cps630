<?php 
?>

<div>
<nav>
    <div class="nav-wrapper bg-dark navbar-dark">
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul class="hide-on-med-and-down">
            <li id="home"><a href="homepage.php">Home</a></li>
            <li id="about"><a href="about.php">About</a></li>
            <li id="contact"><a href="contact.php">Contact</a></li>
      </ul>
      <ul class="right hide-on-med-and-down">
            <li id="cart" class="rightnav-item"><a href="cart.php"><i class="fas fa-shopping-cart"></i></span> Cart</a></li>
      </ul>
    </div>
</nav>

  <ul class="sidenav" id="mobile-demo">
      <li id="home"><a href="homepage.php">Home</a></li>
      <li id="about"><a href="about.php">About</a></li>
      <li id="contact"><a href="contact.php">Contact</a></li>
      <li id="cart" class="rightnav-item"><a href="cart.php"></span> Cart</a></li>
  </ul>
</div>
<script>
      $("#<?php echo $page; ?>").addClass('active');

      $(document).ready(function(){
            $('.sidenav').sidenav();
      });
</script>