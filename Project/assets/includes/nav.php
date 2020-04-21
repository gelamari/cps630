<style type="text/css">
  #modal2 { 
    max-height: 10%;
    max-width: 25%; 
    overflow: visible;
  }
  #login > .modal-trigger {
    background-color: #288278;
  }
 

</style>
<div>
  <!-- Dropdown Structure -->
<ul id="dropdown1" class="dropdown-content">
  <li id="login" class="right">
      <a class="log modal-trigger" href="#modal2"></a>            
  </li> 
  <li id="register"><a href="register.php">Sign Up</a></li>
</ul>
<!-- Regular Navigation Bar -->
<nav>
    <div class="nav-wrapper #1565c0 teal lighten-2">
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul class="hide-on-med-and-down">
            <li id="home"><a href="homepage.php">Home</a></li>
            <li id="about"><a href="about.php">About</a></li>
            <li id="contact" class=><a href="contact.php">Contact</a></li>
            <li id="dbMaintain"><a href="dbMaintain.php">dbMaintain</a></li>
            <li class="right"><a href="cart.php"><i class="material-icons right">shopping_cart</i>Cart</a></li>
            <li class="right" id="search"><a class="modal-trigger" href="#modal1" >Search</a></li>
              <!-- Dropdown Trigger -->
             <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">Admin / Sign Up<i class="material-icons right">arrow_drop_down</i></a></li>
             
    
             
           
      </ul>
</nav>

<!-- Log Out Modal -->
  <div id="modal2" class="modal ">
    <div class="modal-content">
      <p>Are you sure you want to log out?</p>
      <a href="logout.php" class="center modal-close btn">Logout</a>
    </div>
  </div>
  <!-- END -->

  <ul class="sidenav" id="mobile-demo">
      <li id="home"><a href="homepage.php">Home</a></li>
      <li id="about"><a href="about.php">About</a></li>
      <li id="contact"><a href="contact.php">Contact</a></li>
      <li id="search"><a class="modal-trigger" href="#modal1">Search</a></li>
      <li id="cart" class="rightnav-item"><a href="cart.php"></span>Cart</a></li>
       <li id="dbMaintain"><a href="dbMaintain.php">dbMaintain</a></li>
        <!-- Dropdown Trigger -->
       <li id="login"><a href="login.php">Admin Login</a></li>
       <li id="signup"><a href="register.php">Sign Up</a></li>


            
  </ul>
</div>

<!-- Modal Structure -->
<div id="modal1" class="modal bottom-sheet">
    <form id="search" onsubmit="return false">
    <div class="modal-content">
        <h4>Search Database:</h4>
        <label for="search1" >Term</label>
        <input type="text" id="search1"/>
        <div id="searchOutput"></div>
    </div>
    <div class="modal-footer hide">
         <button type="submit"><a type="submit" href="#!" id="searchButton" class="waves-effect waves-green btn-flat">Search</a></button>
    </div>
</form>
</div>

<script>
      $("#<?php echo $page; ?>").addClass('active');

      $(document).ready(function(){
            $('.sidenav').sidenav();
            $('#modal2').modal();
            $('.modal').modal();
            $(".dropdown-trigger").dropdown();

            $('#search1').on('change', function(){
                  $("#searchOutput").empty();
                  var request = $.ajax({
                    url: "test.php",
                    type: "POST",
                    data: { search : $(this).val() }
                        });
                        request.done(function(msg) {
                            $("#searchOutput").append(msg);   
                        });
                        request.fail(function(jqXHR, textStatus) {
                            alert( "Request failed: " + textStatus );
                        });
                    });
             });
            
</script>
