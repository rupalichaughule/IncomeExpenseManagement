<?php
    require_once "config.php";

  // if (isset($_SESSION['access_token'])) {
  //   header('Location: index.php');
  //   exit();
  // }

  $loginURL = $gClient->createAuthUrl();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Signup</title>
  <meta charsetet="utf-8">
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
<h2 align="center">Create an Account</h3>

<form action="mail.php" method="post" class="form-horizontal">

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Full Name</label>  
  <div class="col-md-4">
  <input name="fname" type="text" placeholder="Enter Full Name" class="form-control input-md" required="">
    
  </div>
</div>



<!-- Password1 input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="passwordinput">Password</label>
  <div class="col-md-4">
    <input id="pass1" name="pass1" type="password" placeholder="Password" class="form-control input-md" required=""> 
  </div>
      
</div>

<!--Confirm Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="passwordinput">Confirm Password</label>
  <div class="col-md-4">
    <input id="pass2" name="pass2" type="password" placeholder="Confirm Password" class="form-control input-md" onblur="passchk()" required="">
    <span style="color: red" id="passerr"></span>
  </div>
</div>
</div>
</div>



<!-- Email input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">E-mail</label>  
  <div class="col-md-4">
  <input id="textinput" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" maxlength="23" name="email" type="text" placeholder="E-mail" class="form-control input-md" required="">
    
  </div>
</div>


<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="reg"></label>
  <div class="col-md-4">
    <input id="reg" value="Register" type="submit" name="submit" class="btn btn-primary"></input>
     <input type="button" onclick="window.location = '<?php echo $loginURL ?>';" value="Log In With Google" class="btn btn-danger">
  </div>
</div>
  
</form>
<script type="text/javascript">
function passchk()
{
  var x =document.getElementById('pass1').value;
  var y = document.getElementById('pass2').value;
  
  if(x == y)
  {
    document.getElementById('passerr').innerHTML=''; 
  }
  else
  {
    document.getElementById('passerr').innerHTML='Password do not matched';
  } 
}

</script>

 <?php
 $conn=mysqli_connect("localhost","root","","2701592_word");
 
 if(isset($_POST['submit']))
 {
   $fname=$_POST['fname'];
 
   $pass1=$_POST['pass1'];
   $pass2=$_POST['pass2'];
  
   $email=$_POST['email'];
  
   
   $login = mysqli_query($conn, "select * from user_reg where email='".$email."'");
   $user_data = mysqli_fetch_array($login);
  $no = mysqli_num_rows($login);
  
  if($no == 1)
  { 
    echo "<script>window.alert('This Email is already registered!')</script>";

  }
  else
  {
    $query=mysqli_query($conn,"insert into user_reg(fname,pass1,pass2,email) values ('$fname','$pass1','$pass2','$email')") or die(mysqli_error());
     
     if($query>0)
     {
       echo "<script>window.alert('User Registered Successfully!! LOGIN and Continue')</script>";
       echo "<script>window.location.href='login.php'</script>";
     }
     else
     {
       echo "Error";
     }
   }  
     
 }
 ?>

<br></br>

<footer class="container-fluid bg-4 text-center">
  <p>Powered By <a href="#">Expense and Income Management</a></p> 
</footer>

</body>
</html>
