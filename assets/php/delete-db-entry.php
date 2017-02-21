<?php
include_once('http://comp1006-assignment1.azurewebsites.net/assets/php/database.php');

$todoID = $_GET['todo_id'];

	$query = "DELETE FROM todo_list WHERE id = :todo_id ";
	$statement = $db->prepare($query);
	$statement->bindValue(":todo_id", $todoID);
  $statement->execute();
	$statement->closeCursor();

  $query = "SELECT * FROM todo_list"; // SQL statement
  $statement = $db->prepare($query); // encapsulate the sql statement
  $statement->execute(); // run on the db server
  $todo = $statement->fetchAll(); // returns an array
  $statement->closeCursor(); // close the connection

include_once('http://comp1006-assignment1.azurewebsites.net/todo-list.php'); // prevents need for redirect and updates table

?>
