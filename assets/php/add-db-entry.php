<?php
include_once('database.php');

$isAddition = filter_input(INPUT_POST, "isAddition");
$todoName = filter_input(INPUT_POST, "nameTextField");
$todoNotes = filter_input(INPUT_POST, "noteTextField");
$todoIsComplete = filter_input(INPUT_POST, "isComplete");

$query = "INSERT INTO todo_list (name, notes, completed) VALUES (:todo_name, :todo_notes, :todo_isComplete)";
$statement = $db->prepare($query);
$statement->bindValue(':todo_name', $todoName);
$statement->bindValue(':todo_notes', $todoNotes);
$statement->bindValue(':todo_isComplete', $todoIsComplete);
$statement->execute();
$statement->closeCursor();
