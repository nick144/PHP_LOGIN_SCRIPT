<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Database Connextion</title>
<style>

.input-txt{
	width:50%;
	padding:10px;
	margin:10px;
	float:left;
	}

#form1{
	
	width:450px;
	float:left;
	
	}

.submit{
	width:50%
	maring:10px auto;
	
	}

label{
	width:50%;
	
	float:left;
	}

</style>
</head>

<body>

<?php if(isset($_POST["submit"])){
		process();	
	}


	function process(){
		
		$dbname = $_POST["input-txt"];
		$dbuser = $_POST["input-txt2"];
		$dbpass = $_POST["input-txt2"];
	
		
		$con=mysqli_connect("localhost","$dbuser","");
			// Check connection
			if (mysqli_connect_errno($con))
			  {
			  echo "Failed to connect to MySQL: " . mysqli_connect_error();
			  }
			
			
			// Create database
			$sql="CREATE DATABASE $dbname";
			if (mysqli_query($con,$sql))
			  {
			  echo "Database $dbname created successfully";
			  }
			else
			  {
			  echo "Error creating database: " . mysqli_error($con);
			  }
		
		}

?>




<form id="form1" name="form1" method="post" action="">
  <label for="input-txt">Database Name</label>
  <input type="text" name="input-txt" id="input-txt" />
  <label for="input-txt3">Database User</label>
  <input type="text" name="input-txt2" id="input-txt3" />
  <label for="input-txt4">Database password</label>
  <input type="text" name="input-txt3" id="input-txt4" />
  <input type="submit" name="submit" class="submit" valu="Submit" />
</form>





</body>
</html>