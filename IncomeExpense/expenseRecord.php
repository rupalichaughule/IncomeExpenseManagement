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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#search").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#searchTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

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
        <li><a href="home1.php">Home</a></li>
        <li><a href="profile.php">My Profile</a></li>
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
        Total Expense:
    <?php 
      $q=mysqli_query($conn,"select SUM(amt) from expensedata where email='".$data['email']."'") or die(mysqli_error());
      while($row=mysqli_fetch_assoc($q))
      {
    
          echo $row['SUM(amt)']; 
     
  
      }
    ?>
    </span>&nbsp

  <a class="btn btn-info btn-lg" href="exByDate.php">Search by Date</a>
  <a class="btn btn-info btn-lg" href="exByCategory.php">Search by Category</a>
  <div class="col-xs-2">
        <input class="form-control" id="search" type="text" placeholder="Search...">
  </div>
  
  </div>  
 </div>


 <div class="container">        
  <table class="table table-hover table-bordered">
    <thead>
      <tr class="danger">
        <th>Expense Date</th>
        <th>Amount</th>
        <th>Payee</th>
        <th>Category</th>
        <th>Description</th>
        <th colspan="2"></th>
      </tr>
    </thead>
    <?php
        $query=mysqli_query($conn,"select * from expensedata where email='".$data['email']."'") or die(mysqli_error());
        while($row=mysqli_fetch_assoc($query))
        {
    ?>
    <tbody id="searchTable">
      <tr>
        <td><?php echo $row['exdate'];?></td>
        <td><?php echo $row['amt'];?></td>
        <td><?php echo $row['payee'];?></td>
        <td><?php echo $row['excategory'];?></td>
        <td><?php echo $row['description'];?></td>
        <td><a class="btn btn-warning" href="expenseEdit.php?edt=<?php echo $row['id']; ?>">EDIT</a></td>
        <td><a class="btn btn-danger" href="expenseDelete.php?del=<?php echo $row['id']; ?>">DELETE</a></td>
      </tr>
    </tbody>
    <?php
      }
    ?>
  </table>
</div>

 
<footer class="container-fluid bg-4 text-center">
  <p>Powered By <a href="#">Expense and Income Management</a></p> 
</footer>
</body>
</html>