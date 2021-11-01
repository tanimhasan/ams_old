<?php
session_start();
if (isset($_SESSION['email']) AND isset($_SESSION['user_type']) AND isset($_SESSION['key']) )
	echo " ";
else {
	header("location:index.php");

}

include ('db_connect.php');

$id=$_GET['id'];

$delete=mysqli_query($con,"DELETE FROM apartments  WHERE apartment_id='$id'");

if($delete)
{
	echo "<script>alert('Apartments Deleted!')</script>";
	echo "<script>window.open('apartments.php','_self')</script>";
}

else
{
	echo "<script>alert('Failed!')</script>";
	echo "<script>window.open('apartments.php','_self')</script>";
}


?>
