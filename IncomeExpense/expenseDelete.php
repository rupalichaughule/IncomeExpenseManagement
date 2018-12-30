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
$id=$_GET['del'];
$del=mysqli_query($conn,"delete from expensedata where id='$id'") or die(mysqli_error());
if($del>0)
{
	echo "<script>window.alert('Expense deleted!!!!!!!!')</script>";
	echo "<script>window.location.href='expenseRecord.php'</script>";
}
else
 {
	  echo "<script>window.alert('error..!!')</script>";
 }
?>