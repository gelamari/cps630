<!DOCTYPE html>
<html>

<head>
</head>
<body>

<html>
<head>
  
   <script type="text/javascript">
    
     $(".formAttr").hide();
     $(".formAcc").hide();

     function showdiv(ref){
        switch($(ref).val()){
         case 'attractions':
            $(".formAcc").hide();
            $(".formAttr").show();
            break;

          case 'useraccounts':
            $(".formAttr").hide();
            $(".formAcc").show();
            break;
          case 'plans':
            $(".formAttr").hide();
            $(".formAcc").show();
            break;

          default:
         }
     }
  

  </script>
  <style type="text/css">
    .input-field {
  margin-bottom: 10px;
}
  </style>
</head>
<body>

<h2>What do you want to Edit?</h2>
  <div class=" ">
    <select name="table" id="table" onchange="showdiv(this)">
      <option value="" disabled selected>Choose your option</option>
      <!-- Print out the photos and reviews as well -->
      <option id="attr" value="attractions">Attractions</option>
      <option id="acc" value="useraccounts">User Account</option>
      <option id="order" value="plans">Plans</option>

    </select>
  </div>
 
<br>
<br>

<!-- ADD ATTRACTIONS -->
<div class="container-fluid  formAttr">
  <div class="row">
   
    <!-- LEFT HALF  -->
<div ng-app="adminApp" ng-controller="editController" ng-init="displayData()"> 

<div class="col s4"> 
<div class="col s12">
<label>Title</label><input type="text" title="title" ng-model="title" class="form-control"><br/>  
</div>
<div class="col s12">
<label>Founder</label><input type="text" title="founder_name" ng-model="founder_name" class="form-control"><br/>  
</div>
<div class="col s6">
<label>Date of Creation</label><input type="text" title="date_of_creation" ng-model="date_of_creation" class="form-control"><br/> 
</div>
<div class="col s6">
<label>Dimensions</label><input type="text" title="dimensions" ng-model="dimensions" class="form-control"><br/>  
</div>
<div class="col s6">
<label>City Location</label><input type="text" title="location" ng-model="location" class="form-control"><br/>  
</div>
<div class="col s6">
<label>Country</label><input type="text" title="country" ng-model="country" class="form-control"><br/>  
</div>
<div class="col s6">
<label>Continent</label><input type="text" title="continent" ng-model="continent" class="form-control"><br/> 
</div>
<div class="col s6">
<label>LatLong</label><input type="text" title="latlong" ng-model="latlong" class="form-control"><br/> 
</div>
<div class="col s6">
<input type="hidden" ng-model="a_id">  
<input type="submit" title="btnUpdate" class="btn " ng-click="update_data()" value="{{btnName}}">  
</div>
</div>
<!-- END OF LEFT HALF -->
<!-- START OF RIGHT HALF -->
<div class="col s8">
<table class="striped">
<tr>
<th>a_id</th>
<th>title</th>
<th>Founder</th>
<th>Date</th>

<th>Dimensions</th>

<th>continent</th>
<th>country</th>
<th>latlong</th>

<th>Edit</th>
</tr>
<tr ng-repeat="x in names">
<td>{{ x.a_id }}</td>
<td>{{ x.title }}</td>
<td>{{ x.founder_name }}</td>
<td>{{ x.date }}</td>

<td>{{ x.dimensions }}</td>
<td>{{ x.country }}</td>

<td>{{ x.location }}</td>

<td>{{ x.continent }}</td>

<td>{{ x.latlong }}</td>


<td>
<button ng-click="updateData(x.a_id, x.title, x.continent, x.country, x.founder_name, x.date,x.dimensions, x.location, x.latlong)" class="btn">Edit</button>
</td>
</tr>
</table>
</div>


</div>
</div>
</div>




<!-- ADD USER ACCOUNTS -->
<div class="container-fluid formAcc">
 <div class="row">
    <div class="col s6">
  <h3>User</h3>

  
    <form class="" name="userForm" novalidate>

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
          ng-model="main.rentpassword">

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
</div>

</body>

</html>