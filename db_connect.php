<?php

define("HOST", "localhost"); // The host you want to connect to.
define("USER", "dom"); // The database username.
define("PASSWORD", "alfa@123"); // The database password. 
define("DATABASE", "secure_login"); // The database name.

$con = mysqli_connect(HOST, USER, PASSWORD, DATABASE);
		
			if(mysqli_connect_errno($con)){
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}