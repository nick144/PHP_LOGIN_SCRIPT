<?php
include('config.php');
class connectDB {
	private $dbStatus = NULL;	// If NULL or 0 , Connection not established.
	private $connactionString = NULL;	// If NULL Connection string is not set.
	private $isDBSelected = NULL; // If NULL Database is not selected.
	
	function __construct() {
		$this->connactionString = mysqli_connect(DBSERVER,DBUSER,DBPASS, DBNAME);
		if($this->connactionString != NULL)
		{
			if(mysqli_connect_errno($this->connactionString)){
			
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			
			}else{
			
			$this->dbStatus = 1;
			$this->isDBSelected = mysql_select_db(DBNAME);
			
			}
		}
		
	}
	
	function getStatus() {return $this->dbStatus;}
	function getConnection() {return $this->connactionString;}
	function isDBSelected() {return $this->isDBSelected;}
}
?>