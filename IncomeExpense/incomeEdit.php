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

 <?php
   include("connection.php");
error_reporting(0);

$edt=$_GET['edt'];

$fetch=mysqli_query($conn,"select * from incomedata where id='$edt'") or die(mysqli_error());
while($row=mysqli_fetch_assoc($fetch))

{
	$email=$row['email'];
   $indate=$row['indate'];
   $amt=$row['amt'];
   $incategory=$row['incategory'];
   $description=$row['description'];
}
 ?>
 
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Income Entry</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
  <style>
    .vis
    {
      visibility: hidden;
    }
  </style>
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
        <li><a href="incomeRecord.php">Income List</a></li>
        <li><a href="profile.php">My Profile</a></li>
        <li><a class="btn btn-danger" href="logout.php" style="color: #000000">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
  <div class="row">
<span style="float: left; color: green; font-weight: bold; font-size: 25px;"><?php echo $data['fname']; ?>
  </span>
</div>
<h2 align="center">Update an Income</h3>
<form action="" method="post" class="form-horizontal">

  <!-- Email input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput"></label>  
  <div class="col-md-4">
  <input class="vis" id="textinput" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" name="email" type="text" placeholder="E-mail" class="form-control input-md" required="" value="<?php echo $data['email']; ?>"  readonly>
    
  </div>
</div>

<!-- Date-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Date: </label>  
  <div class="col-md-4">
 <input id="dob" type="date" name="indate" class="form-control datepicker" id="dob" required="" value="<?php echo $indate;?>">

  </div>
</div>

<!-- Amount-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Amount: </label>  
  <div class="col-md-4">
  <input id="phone" pattern="[0-9]+" name="amt" type="text" placeholder="In Rupees" class="form-control input-md" required="" value="<?php echo $amt;?>">
    
  </div>
</div>


<!-- Category -->
<div class="form-group">
  <label class="col-md-4 control-label" for="address">Category:</label>
  <div class="col-md-4">                     
      <input list="Category" name="incategory" class="form-control input-md" required="" value="<?php echo $incategory;?>">
<datalist id="Category">
<option value="Education">
<option value="Personal">
<option value="Training">
<option value="Meals and Entertainment">
<option value="Travel">
  <option value="Maintenance">
<option value="Depreciation">
<option value="Supplies">
  <option value="Interest">
<option value="Taxes">
<option value="Wages">
  <option value="Fees">
<option value="Insurance">
<option value="Utilities">
<option value="Rent">
</datalist> 
  </div>
</div>

<!-- Description -->
<div class="form-group">
  <label class="col-md-4 control-label" for="address">Description:</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="description" name="desc" rows="1"><?php echo $description;?></textarea>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="reg"></label>
  <div class="col-md-4">
    <input type="submit" value="Create" name="create" class="btn btn-primary"></input>
    <input type="submit" value="Cancel" name="cancel" class="btn btn-primary"></input>
  </div>
</div>

</form>
<?php
include('connection.php');

if(isset($_POST['cancel']))
 {
   echo "<script>window.location.href='incomeRecord.php'</script>";
 }
 
 if(isset($_POST['create']))
 {
  $email=$_POST['email'];
   $indate=$_POST['indate'];
   $amt=$_POST['amt'];
   $incategory=$_POST['incategory'];
   $desc=$_POST['desc'];

$query=mysqli_query($conn,"update incomedata set email='$email',indate='$indate',amt='$amt',incategory='$incategory',description='$desc' where id='$edt'") or die(mysqli_error($conn));
     
     if($query>0)
     {
       echo "<script>alert('Your Income is Updated successfully!! Please Check Income Data.')</script>";
       echo "<script>window.location.href='incomeRecord.php'</script>";
     }
     else
     {
       echo "Error";
     }
     
 }
 ?>
</div>


<footer class="container-fluid bg-4 text-center">
  <p>Powered By <a href="#">Expense and Income Management</a></p> 
</footer>
</body>
</html>
