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
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
<title> Expense Record </title>
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
       
       
         <li><a href="incomeEntry.php">Add Income</a></li>
         <li><a href="incomeRecord.php">Income List</a></li>
        <li><a href="expenseEntry.php">Add Expense</a></li>
        <li><a href="expenseRecord.php">Expense List</a></li>
        <li><a class="btn btn-danger" href="logout.php" style="color: #000000">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
  <div class="row">
<span style="float: left; color: green; font-weight: bold; font-size: 25px;"><?php echo $data['fname']; ?>
  </span>
    <span style="float: right; color: blue; font-weight: bold; font-size: 20px;"">
    <span>Total Expense:
    <?php 
  $q=mysqli_query($conn,"select SUM(amt) from expensedata where email='".$data['email']."'") or die(mysqli_error());
  while($row=mysqli_fetch_assoc($q))
  {
    $a=$row['SUM(amt)'];
     echo $a; 
     
  
  }
 
  ?>
  </span>&nbsp
  <a class="btn btn-info btn-lg" href="exByDate.php">Search by Date</a>
  
  </span>
  
  
<br></br>

  
  <form align="center" class="form-inline" action="" method="post">
    <div class="form-group">
      <input list="Category" name="inputcat" class="form-control" placeholder="Enter Category">
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
    <input type="submit" class="btn btn-info" name="search" value="Search"/>
  </form>




 <div class="row">
 <span style="float: left; margin-left: 350px; color: blue; font-weight: bold; font-size: 25px;">Expense By Category</span>
 </div>

 <div class="table-responsive">    
<table border="1" class="table table-hover">
<tr class="danger">

<th>Expense Date</th>
<th>Amount</th>
<th>Payee</th>
<th>Category</th>
<th>Description</th>

<th colspan="2"></th>
</tr>





<?php
 
 $conn = mysqli_connect("localhost","root","","2701592_word");

if(isset($_POST['search']))
{    

  $inputcat=$_POST['inputcat'];
  

  $query=mysqli_query($conn,"select * from expensedata where email='".$data['email']."' AND  excategory='".$inputcat."' ")or die (mysqli_error($conn)); ;

if (mysqli_num_rows($query) > 0) 
{
  while($row=mysqli_fetch_assoc($query))
  {
?>
<tr>
  
 
  <td><?php echo $row['exdate'];?></td>
    <td><?php echo $row['amt'];?></td>
     <td><?php echo $row['payee'];?></td>
      <td><?php echo $row['excategory'];?></td>
       <td><?php echo $row['description'];?></td>
       
             

   <td><a class="btn btn-warning" href="expenseEdit.php?edt=<?php echo $row['id']; ?>">EDIT</a></td>
    <td><a class="btn btn-danger" href="expenseDelete.php?del=<?php echo $row['id']; ?>">DELETE</a></td>
</tr>
<?php
  }
}
else
{
    echo "No Data Found<br><br>";
}
}
else
{
?>



<?php
 
 $query=mysqli_query($conn,"select * from expensedata where email='".$data['email']."' order by exdate") or die(mysqli_error());
  while($row=mysqli_fetch_assoc($query))
  {
?>
<tr>
  
 
  <td><?php echo $row['exdate'];?></td>
    <td><?php echo $row['amt'];?></td>
     <td><?php echo $row['payee'];?></td>
      <td><?php echo $row['excategory'];?></td>
       <td><?php echo $row['description'];?></td>
       
             

   <td><a class="btn btn-warning" href="expenseEdit.php?edt=<?php echo $row['id']; ?>">EDIT</a></td>
    <td><a class="btn btn-danger" href="expenseDelete.php?del=<?php echo $row['id']; ?>">DELETE</a></td>
</tr>
<?php
  }
}
?>
</table>
</div>
</div>
</div>
<footer class="container-fluid bg-4 text-center">
  <p>Powered By <a href="#">Expense and Income Management</a></p> 
</footer>
</body>
</html>