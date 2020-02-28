<?php 
?>  

<div>
<nav>
    <div class="nav-wrapper #283593 indigo darken-3">
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul class="hide-on-med-and-down">
            <li id="home"><a href="homepage.php">Home</a></li>
            <li id="about"><a href="about.php">About</a></li>
            <li id="contact" class=><a href="contact.php">Contact</a></li>
            <li id="search"><a class="modal-trigger" href="#modal1">Search</a></li>
            <li class="right"><a href="cart.php"><i class="material-icons right">shopping_cart</i>Cart</a></li>
      </ul>
    </div>
</nav>

  <ul class="sidenav" id="mobile-demo">
      <li id="home"><a href="homepage.php">Home</a></li>
      <li id="about"><a href="about.php">About</a></li>
      <li id="contact"><a href="contact.php">Contact</a></li>
      <li id="search"><a class="modal-trigger" href="#modal1">Search</a></li>
      <li id="cart" class="rightnav-item"><a href="cart.php"></span>Cart</a></li>
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
            $('.modal').modal();

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
