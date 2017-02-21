<?php

//checks if cancel was selected and returns to todo-list if true
if($_GET['submit'] == "cancel")
{
  header('location: http://comp1006-assignment1.azurewebsites.net/todo-list.php');
}
include_once('http://comp1006-assignment1.azurewebsites.net/assets/php/database.php');

$isAddition = filter_input(INPUT_POST, "isAddition");
$todoName = filter_input(INPUT_POST, "nameTextField");
$todoNotes = filter_input(INPUT_POST, "noteTextField");
$todoIsComplete = filter_input(INPUT_POST, "isComplete");

if($todoIsComplete == 'yes')
{
	$todoIsComplete = '1';
}
else {
	$todoIsComplete = '0';
}

if($isAddition == "1")
{
	$query = "INSERT INTO todo_list (name, notes, completed) VALUES (:todo_name, :todo_notes, :todo_isComplete)";
	$statement = $db->prepare($query);
} else
{
	$todoID = filter_input(INPUT_POST, "idTextField");
	$query = "UPDATE todo_list SET name = :todo_name, notes = :todo_notes, completed = :todo_isComplete WHERE id = :todo_id ";
	$statement = $db->prepare($query);
	$statement->bindValue(':todo_id', $todoID);
}

$statement->bindValue(':todo_name', $todoName);
$statement->bindValue(':todo_notes', $todoNotes);
$statement->bindValue(':todo_isComplete', $todoIsComplete);
$statement->execute();
$statement->closeCursor();

header('location: http://comp1006-assignment1.azurewebsites.net/todo-list.php');

?>
