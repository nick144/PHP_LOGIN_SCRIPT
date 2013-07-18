<?php

session_start();

require_once('header.php');
include('function.php');
include('db_connect.php');

if(isset($_POST["submit"])){

$username = $_POST["user"];
$password = $_POST["pass"];
$email = $_POST["email"];


$sql = "INSERT INTO members (username, email, password) 
		VALUES ('$username', '$email', '$password')";
		
$result = mysqli_query($con,  $sql);

if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }else{
	  header("Location: login.php");
	  }

mysqli_close($con);

}else{


	user_registration();

}

require_once('footer.php');