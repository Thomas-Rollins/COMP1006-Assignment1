<?php

include_once('http://comp1006-assignment1.azurewebsites.net/assets/php/database.php');
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

$login_session = $username;
}
// if(!isset($login_session))
// {
//
// }
 ?>
