<?php
include_once('database.php');

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

header('location: ../../todo-list.php'); // prevents need for redirect and updates table

?>
