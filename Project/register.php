<!DOCTYPE html>
<html>
<?php 
session_start(); 
if ( isset( $_SESSION['id'] ) ) {
    $bool = 'yes';
} 

    $title = "Registration";
    $personalcss = '<link rel="stylesheet" type="text/css" href="assets/css/register.css">';
    
    include 'assets/includes/registerhead.php';
    
    echo "<body ng-app=\"app\" ng-controller=\"MainCtrl as main\">";
    
    $page = ''; 
    include 'assets/includes/nav.php';
  ?>
<script type="text/javascript">
  

  $(document).ready(function(){
    $('select').formSelect();
  });
</script>

<div class="container">
<h2 id="signupH">Sign Up</h2>
  <div class="row">
    <form class="col s12" name="userForm" novalidate>

    <!-- First Name -->
    <div class="row">
        <div class="input-field col s6">
          <input  id="first_name" type="text" class="form-control"
          ng-model="main.fname" ng-minlength="3" ng-maxlength="15" required>
          <label for="first_name">First Name</label>


    </div>
    <!-- Last Name -->
    <div class="input-field col s6">
         <input id="last_name" type="text" class="form-control"
          ng-model="main.lname" ng-minlength="3" ng-maxlength="15" required>
          <label for="last_name">Last Name</label>



     </div>
  </div>
    <!-- Address -->
  <div class="row">
    <!-- Street -->
    	<div class="input-field col s12">
          <input  id="street" type="text" class="form-control" ng-model="main.street" ng-minlength="8" required>
          <label for="street">Street Address</label>



    	</div>
  </div>
  <div class="row">
    <!-- City -->
        <div class="input-field col s6">
          <input  id="city" type="text" class="form-control"
          ng-model="main.city" ng-minlength="3" required>
          <label for="city">City</label>
        </div>

   <!-- Province -->
        <div class="input-field col s6">
   			  <select class="form-control"
          ng-model="main.province" required>
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
    <!-- Postal Code  -->
      <div class="input-field col s6">
          <input id="postal" type="text" class="form-control"
          ng-model="main.postal" required>
          <label for="postal">Postal Code</label>

      </div>

     <!-- Telephone -->
    	<div class="input-field col s6">
          <input id="telephone" type="tel" class="form-control"
          ng-model="main.telephone" required>
          <label for="telephone">Telephone</label>

      </div>
        
    </div>

    <!-- Email  -->
    <div class="row">
        <div class="input-field col s12">
          <input id="email" type="email" name="email" class="form-control" ng-model="main.email" ng-minlength="5" ng-maxlength="20" autocomplete="username" required>
          <label for="email">Email</label>


        </div>
    </div>

     <!-- Password -->
    <div class="row">
        <div class="input-field col s12">
          <input id="password" type="password" autocomplete="new-password" class="form-control"
          ng-model="main.password">
          <label for="password">Password</label>
        </div>
    </div>

    <div class="row">
        <div class="input-field col s12">
          <input id="rentpassword" type="password" autocomplete="new-password" class="form-control"
          ng-model="main.password">
          <label for="password">Re-enter Password</label>
        </div>
    </div>


    <!-- Submit -->
    <div class="row">
        <div class="input-field col s12">
             <button class="btn waves-effect waves-light" type="submit" name="action">Submit
              <i class="material-icons right">send</i>
             </button>
        </div>
     </div>

    
    
    </form>
  </div>
</div>

  
</script>
</body>
</html>
