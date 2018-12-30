<?php
session_start();
if(!isset($_SESSION['id'])){
  header('location:profile.php');
}
include('connection.php');
$id = $_SESSION['id'];
$sel_user = mysqli_query($conn, "select * from user_reg where id='".$id."'");
$data = mysqli_fetch_array($sel_user);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Expense Entry</title>
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
        
        <li><a href="expenseRecord.php">View Expense</a></li>
        <li><a href="incomeEntry.php">Create Income</a></li>
        <li><a href="incomeRecord.php">Income List</a></li>
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

<form action="" method="post" class="form-horizontal">

  <!-- Email input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput"></label>  
  <div class="col-md-4">
  <input class="vis" id="textinput" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" name="email" type="text" placeholder="E-mail" class="form-control input-md" value="<?php echo $data['email']; ?>"  readonly>
    
  </div>
</div>
<h2 align="center">Create an Expense</h3>
<!-- Date-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Date: </label>  
  <div class="col-md-4">
 <input id="dob" type="date" name="exdate" class="form-control datepicker" id="dob" required="">

  </div>
</div>

<!-- Amount-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Amount: </label>  
  <div class="col-md-4">
  <input id="phone" pattern="[0-9]+" name="amt" type="text" placeholder="In Rupees" class="form-control input-md" required="">
    
  </div>
</div>
<!-- Payee-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Payee:</label>  
  <div class="col-md-4">
  <input name="payee" type="text" placeholder="Payee Name" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Category -->
<div class="form-group">
  <label class="col-md-4 control-label" for="address">Category:</label>
  <div class="col-md-4">                     
     
      <input list="Category" name="excategory" class="form-control input-md" required="">
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
    <textarea class="form-control" id="description" name="desc"></textarea>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="reg"></label>
  <div class="col-md-4">
    <input type="submit" value="Create" name="create" class="btn btn-primary"></input>
  </div>
</div>

</form>
</div>

<?php
 $conn=mysqli_connect("localhost","root","","2701592_word");
 
 if(isset($_POST['create']))
 {
  $email=$_POST['email'];
   $exdate=$_POST['exdate'];
   $amt=$_POST['amt'];
   $payee=$_POST['payee'];
   $excategory=$_POST['excategory'];
   $desc=$_POST['desc'];
    
    $query=mysqli_query($conn,"insert into expensedata(email,exdate,amt,payee,excategory,description) values ('$email','$exdate','$amt','$payee','$excategory','$desc')") or die(mysqli_error($conn));
     
     if($query>0)
     {
       echo "<script>alert('Your Expense is Recorded successfully!! Please Check Expense Data.')</script>";
     }
     else
     {
       echo "Error";
     }
     
 }
 ?>


<footer class="container-fluid bg-4 text-center">
  <p>Powered By <a href="#">Expense and Income Management</a></p> 
</footer>




</body>
</html>
