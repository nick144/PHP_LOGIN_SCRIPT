<?php

session_start();

include 'connect.php';



class User{
	private $_password;
	public $user;
	private $user_pass = array();
	public $email;
	private $_conn;
	private $_connStr;
	private $_table_users ='members';
	private $_sql;
	private $_result;
	private $_row;
	
	
	public function __construct(){
		$this->_conn = new connectDB();
		$this->_connStr = $this->_conn->getConnection();
	}
	
	function isUserExists($username) {
	$connect = $this->_connStr;
	$query = "SELECT username FROM  $this->_$table_users  WHERE username='$username'";
    $result = mysql_query($connect, $query);
	$row = mysql_fetch_array($result);
		if($row['username'] == $username)
		{
			return 1; //Username is already exists
		}
		else
		{
			return 0; //Username doesnot exists
		}
	}
	
	public function createUser($user, $pass, $email){
		$this->user = $user;
		$this->_password = md5($pass);
		$this->email = $email;
		
		$this->sql = "INSERT INTO $this->_table_users (username, email, password) VALUES ('$this->user', '$this->email', '$this->_password')";
		
			if (!mysqli_query($this->_connStr, $this->sql))
			  {
			  die('Error: ' . mysqli_error($this->_connStr));
			  }
			  
			mysqli_close($this->_connStr);
	}
	
	public function check_login($user, $pass){
		
		$this->_sql = "SELECT * FROM $this->_table_users WHERE username = '$user'";
		$this->_result = mysqli_query($this->_connStr,  $this->_sql);
		$this->_row = mysqli_fetch_array($this->_result);
		
		$pass = md5($pass);
		
		if($this->_row['username'] == $user && $this->_row['password'] == $pass){
			echo "User Name And Password are correct";
			$_SESSION['id'] = $this->_row['id'];
			return 1;
			
		}else{
			echo "Kindly enter the Correct Username & Password";
			return 0;
		}
		
		mysqli_close($this->_connStr);
	}
	
	public function get_user_details(){
	
		$sql = "SELECT * FROM members";
		
		$result = mysqli_query($this->_connStr,  $sql);
	
		while($row = mysqli_fetch_array($result)){
			$this->user_pass[$row['username']] =  $row['password'];
		}
	
		return $this->user_pass;
	}



}

$user = new User;
//$user->createUser("Dominic", "alfa@123", "d_nic14@yahoo.in");
echo "<pre>";
print_r($user->get_user_details());
echo "</pre>";

echo "<br />";

$user->check_login("Dominic", "alfa@123");

echo "<br />".$_SESSION['id'];