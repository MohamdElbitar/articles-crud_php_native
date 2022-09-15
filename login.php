
<?php session_start();
include_once('conn.php');
//Coding For Signup
if(isset($_POST['login']))
{
//Getting Psot Values
$email=$_POST['email'];	
$pass=$_POST['password'];


    $stmt = $conn->prepare("SELECT first_name,id FROM users  WHERE (email=? && password=?)");
    $stmt->bind_param('ss',$email,$pass);
    $stmt->execute();
    $stmt->bind_result($fname,$id);
    $rs= $stmt->fetch ();
    $stmt->close();
    if (!$rs) {
  echo "<script>alert('Invalid Details. Please try again.')</script>";
    } 
    else {
     $_SESSION['first_name']=$fname;
    $_SESSION['uid']=$id;
     header('location:index.php');
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
          <h1 class="text-center">Login</h1>
      </div>
      <div class="modal-body">        

<form class="form col-md-12 center-block" method="post">
<div class="form-group">
 
<input type="email" class="form-control input-lg" name="email" placeholder="Email Address" required="required" title="Valid Email id">

</div>
 
<div class="form-group">
 
<input type="password" class="form-control input-lg" name="password" placeholder="Password" required="required">

</div>

 
<div class="form-group">
<button type="submit" class="btn btn-primary btn-lg btn-block" name="login">Login</button>
 </div>
 </form>
 </div>
      <div class="modal-footer">
          <div class="col-md-12">
            <label>If Dont have Email Go to </label>
          <button class="btn" data-dismiss="modal" aria-hidden="true"><a href="register.php"> Register</a></button>
		  </div>	
      </div>
  </div>
  </div>
</div>
</body>
</html>