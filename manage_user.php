<?php

session_start();

include('header.php');
include('function.php');
include('db_connect.php');
include('session.php');

$con = mysqli_connect(HOST, USER, PASSWORD, DATABASE);

if(mysqli_connect_errno($con)){
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if(isset($_GET['delete'])){
	$del_var = $_GET['delete'];
	delete_table($del_var);
}

if(isset($_GET['action'])){
	logout();
	header("Location: login.php");

}

$result = mysqli_query($con, "SELECT * FROM members" );



?>

<p><a href="manage_user.php?action='logout'">Log Out</a></p>

<table width="100%" cellpadding="5">
<thead>
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Action</th>
  </tr>
</thead>
<tbody>
<?php

while($row = mysqli_fetch_array($result)){

 	echo "<tr>";
	echo "<td>" . $row['id'] . "</td>";
	echo "<td>" . $row['username'] . "</td>";
	echo "<td>" . $row['email'] . "</td>";
	echo '<td><a href="manage_user.php?delete=' . $row['username'] . '">Delete</a></td>';
	echo "</tr>";
  

}

?>
<tr>
<td colspan="2"><p><a href="register.php">Register</a></p></td>
<td colspan="2"><p><a href="login.php">Login</a></p></td>
</tr>
</tbody>
</table>



<?php


mysqli_close($con);


include('footer.php'); ?>