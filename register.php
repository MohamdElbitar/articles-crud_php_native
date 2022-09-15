
<?php
    require_once "conn.php";
    if(isset($_POST['signup'])){

        $fname=$_POST['first_name'];	
        $lname=$_POST['last_name'];
        $email=$_POST['email'];	
        $address=$_POST['address'];	
        $date_of_birth=$_POST['date_of_birth'];	
        $pass=$_POST['password'];	
       

        if($fname != "" && $lname != "" && $email != "" &&  $address != "" && $date_of_birth != "" && $pass != "" ){
            $sql = "INSERT INTO users (`first_name`, `last_name`, `email`,`address`,`date_of_birth`,`password`) 
            VALUES ('$fname', '$lname', '$email','$address', '$date_of_birth', '$pass')";
            if (mysqli_query($conn, $sql)) {
                header("location: login.php");
            } else {
                 echo "Something went wrong. Please try again later.";
            }
        }else{
            echo "Inputs cannot be empty!";
        }
    }
?>   
    

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ARTICLES</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
 
 <!-- Latest compiled and minified JavaScript -->
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
 <style>
.error {color: #FF0000;}
</style>


</head>

<body>
<div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
          <h1 class="text-center">User Sign Up</h1>
      </div>
      <div class="modal-body"> 
<form  class="form col-md-12 center-block" method="post">

<p>Please fill in this form to create an account!</p>
		<hr>
        <div class="form-group">
            
<input type="text" class="form-control" name="first_name" placeholder="First Name" required="required" pattern="[A-Za-z ]+" title="Letters only">
<input type="text" class="form-control" name="last_name" placeholder="Last Name" required="required" pattern="[A-Za-z ]+" title="Letters only">

</div>

        
<div class="form-group">

<input type="email" class="form-control" name="email" placeholder="Email Address" required="required" title="Valid Email id">
</div>

<div class="form-group">
<input type="text" class="form-control" name="address" placeholder="Address" required="required" pattern="[A-Za-z ]+" title="Letters only">


</div>
<div class="form-group">
<input type="Date" class="form-control" name="date_of_birth" placeholder="Date of birth" required="required">
</div>
		
<div class="form-group">
<input type="password" class="form-control" name="password" placeholder="Password" required="required" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="At least one number and one uppercase and lowercase letter, and at least 6 or more characters">
</div>

 
<div class="form-group">
<button type="submit" class="btn btn-primary btn-lg" name="signup">Sign Up</button>
</div>
    </form>
      </div>
      <div class="modal-footer">	
      </div>
  </div>
  </div>
</div>
    </body>

</html>