<!--
@author Thomas Rollins
comp1006_assignment1
Contains the current logged in user information
-->

<?php

include_once('database.php');
session_start();
if(isset($_SESSION['login_user']))
{
	$username = $_SESSION['login_user'];

	$query = "SELECT username FROM logins WHERE username = :username "; // SQL statement
	$statement = $db->prepare($query); // encapsulate the sql statement
	$statement->bindValue(':username', $username);
	$statement->execute(); // run on the db server
	$game = $statement->fetch(); // returns only one record
	$statement->closeCursor(); // close the connection

	// sets logged in username as $login_session
	$login_session = $username;
}
 ?>
