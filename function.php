<?php


function login_form(){

$form = <<<END

		<div class="login_form">
		<h2>Member Login</h2>
        <form method="post" action="check_login.php" />
        <div class="usrName">
    		<label for="userName">User Name</label>
            <input type="text" name="userName" id="userName" />
        </div>
        
        <div class="pass">
            <label for = "user_pass">Password</label>
            <input type="password" name="user_pass" id="user_pass" />
        </div>
            <div class="submit">
            <input type="submit" name="submit" value=" Login " />
           </div>
        
		<p><a href="register.php">register</a></p>
		
        </div>
END;

echo $form;
}


function user_registration(){
	
	$registration = <<<END

	<div class="login_form">
		<h2>Registration</h2>
        <form method="post" action="" />
            <div class="usrName">
                <label for="user">User Name</label>
                <input type="text" name="user" id="user" />
            </div>
        
			<div class="usrName">
                <label for="userName">Password&nbsp;&nbsp;</label>
                <input type="password" name="pass" id="pass" />
           </div>
           
           <div class="usrName">
                <label for="email">Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input type="email" name="email" id="email" />
           </div>
           
            <div class="submit">
            <input type="submit" name="submit" value="Register" />
           </div>
        	<p><a href="login.php">login</a></p>
        </div>
END;

echo $registration;

}


function delete_table($username){

$del = "DELETE FROM members where username = '" . $username . "'";

$deletes = mysqli_query($con, $del );

header("Location: manage_user.php");
}

function logout(){
session_destroy();	
}


function user_update(){
	$sql = "SELECT * FROM members WHERE id = '".$_SESSION['id']."'";
	$result = mysqli_query($con,  $sql);
	$row = mysqli_fetch_array($result);
?>
	

	<div class="login_form">
		<h2>Registration</h2>
        <form method="post" action="" />
            <div class="usrName">
                <label for="user">User Name</label>
                <input type="text" name="user" id="user" value="<?php $row['username']; ?>" />
            </div>
        
			<div class="usrName">
                <label for="userName">Password&nbsp;&nbsp;</label>
                <input type="password" name="pass" id="pass" value="" />
           </div>
           
           <div class="usrName">
                <label for="email">Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input type="email" name="email" id="email" value="<?php $row['email']; ?>" />
           </div>
           
            <div class="submit">
            <input type="submit" name="submit" value="Register" />
           </div>
        	<p><a href="login.php">login</a></p>
        </div>


<?php

}

?>