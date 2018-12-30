<?php
include('connection.php');
error_reporting(0);
session_start();

if(isset($_POST['login']))
{	
	$email = $_POST['email'];
	$pass1 = $_POST['pass1'];
	
	$login = mysqli_query($conn, "select * from user_reg where email='".$email."' AND pass1='".$pass1."'");
	$user_data = mysqli_fetch_array($login);
	$no = mysqli_num_rows($login);
	
	if($no == 1)
	{	
		$_SESSION['id'] = $user_data['id']; 
		
		if(isset($_POST['remember']) && $_POST['remember'] == 1)
		{
			setcookie("cemail", $email, time()+(60*60*24));
			setcookie("cpass1", $pass1, time()+(60*60*24));
		}
		else
		{
			setcookie("Details", "PHP");
		}		
		
		
		echo "<script>window.location.href='profile.php'</script>";
	}
	else
	{
		echo "<script>window.alert('Please check your username or password')</script>";
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>


<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.php">Expense and Income Management</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php">Home</a></li>
        <li><a href="signup.php">Register</a></li>
        <li><a href="login.php">Login</a></li>
      </ul>
    </div>
  </div>
</nav>
<br></br>

<h2 align="center">SIGN IN</h3>

 <form class="form-horizontal" method="post">

<!-- Email input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">E-mail</label>  
  <div class="col-md-3">
  <input id="email" name="email" type="text" placeholder="Enter e-mail" class="form-control input-md" value="" required="">
    
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="passwordinput">Password</label>
  <div class="col-md-3">
    <input id="pass1" name="pass1" type="password" placeholder="Enter Password" class="form-control input-md" value="" required="">
    
  </div>
</div>

<div class="form-group">
	<div class="col-md-4">
	</div>
	<div class="col-md-4">
 
</div>
</div>


<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="reg"></label>
  <div class="col-md-4">
    <input type="submit" name="login" value="Login" class="btn btn-primary"></input>
  </div>
</div>

</form>
<br></br>
<br></br>
<footer class="container-fluid bg-4 text-center">
  <p>Powered By <a href="#">Expense and Income Management</a></p> 
</footer>

</body>
</html>
