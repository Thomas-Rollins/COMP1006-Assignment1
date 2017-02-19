<?php
//include_once ('database.php');

$dsn = 'mysql:host=localhost:3307;dbname=comp1006_assignment1';
$userName = 'root';
$password = '';


try
{
    // instantiates a new pdo - an db object
    $db = new PDO($dsn, $userName, $password);
}
catch(PDOException $e)
{
    $message = $e->getMessage();
    echo "An error occurred: " . $message;
}

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

header('location: todo-list.php');

?>
