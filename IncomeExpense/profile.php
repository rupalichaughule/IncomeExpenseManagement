<?php
session_start();
if(!isset($_SESSION['id'])){
	header('location:login.php');
}
include('connection.php');
$id = $_SESSION['id'];
$sel_user = mysqli_query($conn, "select * from user_reg where id='".$id."'");
$data = mysqli_fetch_array($sel_user);
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>profile</title>
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
      <a class="navbar-brand" href="home1.php">Expense and Income Management</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="home1.php">Home</a></li>
        <li><a href="expenseRecord.php">Expense List</a></li>
        <li><a href="incomeRecord.php">Income List</a></li>
        <li><a class="btn btn-danger" href="logout.php" style="color: #000000">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
	<span style="float: left; color: green; font-weight: bold; font-size: 25px;"><?php echo $data['fname']; ?>
	</span>
        
        <span style="float: right; font-weight: bold; font-size: 20px;"">
    Total Expense:
    <?php 
  $q=mysqli_query($conn,"select SUM(amt) from expensedata where email='".$data['email']."'") or die(mysqli_error());
  while($row=mysqli_fetch_assoc($q))
  {
    $a=$row['SUM(amt)'];
     echo $a; 
  }
   
  $q1=mysqli_query($conn,"select SUM(amt) from incomedata where email='".$data['email']."'") or die(mysqli_error());
  while($row=mysqli_fetch_assoc($q1))
  {
    echo "---- Total income: ";
     $b=$row['SUM(amt)'];
     echo "".$b;
     
  
  }
  
  echo "---- Available Balance: ";
    echo $b-$a;
  ?>
  &nbsp
</span>
        
	<br></br>
	<br></br>

	<div class="row" align="center">
	<div class="btn-group-vertical">
   <a class="btn btn-primary btn-lg" href="expenseEntry.php">Create Expense</a>
    <a class="btn btn-primary btn-lg" href="incomeEntry.php">Create Income</a>
    <a class="btn btn-primary btn-lg" href="expenseRecord.php">Expense List</a>
    <a class="btn btn-primary btn-lg" href="incomeRecord.php">Income List</a>
  </div>
	</div>


  
</div>
<br></br>
<br></br>
<br></br>
<footer class="container-fluid bg-4 text-center">
  <p>Powered By <a href="#">Expense and Income Management</a></p> 
</footer>

</body>
</html>
