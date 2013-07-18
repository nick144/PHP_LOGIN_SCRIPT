<?php
session_start();

require_once('header.php');

include('function.php');
include('db_connect.php');

if(isset($_POST["submit"])){

	if(isset($_POST["userName"]) == "" || isset($_POST["user_pass"]) == ""){
	
		echo "<p>Kindly Enter User name or Password</p>";
		login_form();		
	
	}else{

		$username = $_POST["userName"];
		$password = $_POST["user_pass"];
		
		
		$sql = "SELECT * FROM members WHERE username = '$username'";
		
		$result = mysqli_query($con,  $sql);
		
		if(!$row = mysqli_fetch_array($result)){
				echo "Kindly Enter the correct Username";
				login_form();
			}else{
					if($row['password'] == $password){
						$_SESSION['id'] = $row['id'];
						header("Location: manage_user.php");
					}else{
						echo "password is incorrect";
						login_form();
						}
					
				}
		
		
		mysqli_close($con);

	}
	
}else{
	
	login_form();
	
}


require_once('footer.php');