<!DOCTYPE html>
<html>
<?php 
session_start(); 
if ( isset( $_SESSION['id'] ) ) {
    $bool = 'yes';
} 

    $title = "Registration";
    $personalcss = '<link rel="stylesheet" type="text/css" href="assets/css/register.css">';
    
    include 'assets/includes/header.php';
    
    echo "<body ng-app=\"app\" ng-controller=\"MainCtrl as main\">";
    
    $page = '';
    include 'assets/includes/nav.php';
  ?>
<script type="text/javascript">
	$(document).ready(function(){
	   $('select').formSelect();
 		
	   $('#telephone').keyup(function(){
    		$(this).val($(this).val().match(/\d+/g).join("").replace(/(\d{3})\-?(\d{3})\-?(\d{4})/,'$1-$2-$3');
	  	});


    
    
    $('#postal').keyup(function(){
        var value = $(this);
        var regex = /^[A-Za-z]\d[A-Za-z][ -]?\d[A-Za-z]\d$/;
        var match = regex.exec(value);
        if (match){
          if ( (value.indexOf("-") !== -1 || value.indexOf(" ") !== -1 ) && value.length() == 7 ) {
          return true;
          } else if ( (value.indexOf("-") == -1 || value.indexOf(" ") == -1 ) && value.length() == 6 ) {
              return true;
          }
        } else {
            return false;
        }
      }):
	});
	
</script>
<div class="container">
<h2 id="signupH">Sign Up</h2>
<div class="row">
    <form class="col s12">
    <!-- First name Last name -->
    <div class="row">
        <div class="input-field col s6">
          <input  id="first_name" type="text" class="validate">
          <label for="first_name">First Name</label>
        </div>
        <div class="input-field col s6">
          <input id="last_name" type="text" class="validate">
          <label for="last_name">Last Name</label>
        </div>
    </div>
    <!-- Address -->
    <div class="row">
    	<div class="input-field col s12">
          <input  id="street" type="text" class="validate">
          <label for="street">Street Address</label>
    	</div>
    </div>
    <div class="row">
        <div class="input-field col s6">
          <input  id="city" type="text" class="validate">
          <label for="city">City</label>
        </div>

        <div class="input-field col s6">
   			<select id="province">
      			<option id="dis" value="" disabled selected>Province</option>
      			<option value="AB">Alberta</option>
				<option value="BC">British Columbia</option>
				<option value="MB">Manitoba</option>
				<option value="NB">New Brunswick</option>
				<option value="NL">Newfoundland and Labrador</option>
				<option value="NS">Nova Scotia</option>
				<option value="ON">Ontario</option>
				<option value="PE">Prince Edward Island</option>
				<option value="QC">Quebec</option>
				<option value="SK">Saskatchewan</option>
				<option value="NT">Northwest Territories</option>
				<option value="NU">Nunavut</option>
				<option value="YT">Yukon</option>
    		</select>
  		</div>
    </div>
    <div class="row"> 
      <div class="input-field col s6">
          <input id="postal" type="tel" class="validate">
          <label for="postal">Postal Code</label>
          <span class="helper-text" data-error="Invalid" data-success="Valid">e.g. A1A A2A</span>
        </div>
     <!-- Telephone -->
    	<div class="input-field col s6">
          <input id="telephone" type="tel" class="validate" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" maxlength="10" required>
          <label for="telephone">Telephone</label>
          <!-- USE ANGULAR -->
             <span class="helper-text" data-error="Invalid" data-success="Valid">e.g. 416-123-1234</span>

        </div>
        
    </div>
    <!-- Email  -->
    <div class="row">
        <div class="input-field col s12">
          <input id="email" type="email" class="validate" autocomplete="username">
          <label for="email">Email</label>
          <!-- USE ANGULAR -->
          <span class="helper-text" data-error="Invalid" data-success="Valid"></span>
        </div>
    </div>
     <!-- Password -->
    <div class="row">
        <div class="input-field col s12">
          <input id="password" type="password" class="validate" autocomplete="new-password">
          <label for="password">Password</label>
        </div>
    </div>
    
    
    </div>
    </form>
  </div>
</div>
</body>
</html>
