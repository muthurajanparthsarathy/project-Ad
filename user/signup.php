<?php 
session_start();
error_reporting(0);
include('../includes/dbconnection.php');
if(isset($_POST['submit']))
  {
    $fname=$_POST['firstname'];
    $lname=$_POST['lastname'];
    $contno=$_POST['contactno'];
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $ret=mysqli_query($con, "select Email from tbluser where Email='$email' || MobileNumber='$contno'");
    $result=mysqli_fetch_array($ret);
    if($result>0){
echo "<script>alert('This email or Contact Number already associated with another account');</script>";

    }
    else{
    $query=mysqli_query($con, "insert into tbluser(FirstName, LastName,MobileNumber, Email,  Password) value('$fname', '$lname','$contno', '$email', '$password' )");
    if ($query) {
    echo "<script>alert('You have successfully registered');</script>";
  }
  else
    {
      echo "<script>alert('Something Went Wrong. Please try again');</script>";
    }
}
}
 ?>

<!DOCTYPE html>
<html lang="en" style="height:90vh;">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<title>sign up</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../css/sign.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
  body {
	color: #fff;
	background: url("../images/university.jpg");
    background-repeat:no-repeat;
	font-family: 'Roboto', sans-serif;
	height: 100vh; 
  background-repeat: no-repeat;
  background-size: cover;
}
</style>
</head>
<body class="h-100 img-fluid" >
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      
    </ul>
    <form class="form-inline my-2 my-lg-0">
	  <a href="signIn.php" class=" btn btn-primary">Sign In</a>
      <a href="signup.php" class="ml-2 btn btn-primary">Sign Up</a>
    </form>
  </div>
</nav>
<div class="container h-100 ">
       <div class="row h-100">  
           <div class="col-md-6  col-lg-5 col-sm-10  box bg signup-form  m-auto">
      <div class="signup-form">
         <form action="" method="post">
		<h2>Register</h2>
		<p class="hint-text">Create your account. It's free and only takes a minute.</p>
        <div class="form-group">
			<div class="row">
				<div class="col"><input type="text" class="form-control" name="firstname" id="firstname" placeholder="First Name" required="required"></div>
				<div class="col"><input type="text" class="form-control"name="lastname" id="lastname" placeholder="Last Name" required="required"></div>
			</div>        	
        </div>
        <div class="form-group">
        	<input type="text" class="form-control" name="contactno" placeholder="Contact number" required="required">
        </div>
        <div class="form-group">
        	<input type="email" class="form-control" name="email" placeholder="Email" required="required">
        </div>
       
		<div class="form-group">
      <div class="row">
            <div class="col"><input type="password" class="form-control" name="password" placeholder="Password" required="required"></div>
            <div class="col"><input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" required="required"></div>

            </div>
        </div>
	
		<div class="form-group">
            <button type="submit" name="submit" class="btn btn-success btn-lg btn-block">Register Now</button>
			<div class="text-center mt-3">Already have an account? <a href="signin.php" style="color:red;">Sign in</a>
		</div>
			
		
    </form>
</div>
</div>



	
</div>
</body>
</html>