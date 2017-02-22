<?php
include_once('database.php');
session_start();

$username = filter_input(INPUT_POST, "username");
$password = filter_input(INPUT_POST, "password");

$query = "SELECT * FROM logins WHERE username = :username AND password = :password "; // SQL statement
$statement = $db->prepare($query); // encapsulate the sql statement
$statement->bindValue(':username', $username);
$statement->bindValue(':password', $password);
$statement->execute(); // run on the db server
$login = $statement->fetch(); // returns only one record
$statement->closeCursor(); // close the connection

if($login['username'] == $username)  //due to how the table is set up the username must be distinct
 {
   $_SESSION['login_user'] = $username;
   header('location: http://comp1006-assignment1.azurewebsites.net/todo-list.php');
 }else {
	header('location: http://comp1006-assignment1.azurewebsites.net/login-page.php?attempt=1');
}
 ?>
