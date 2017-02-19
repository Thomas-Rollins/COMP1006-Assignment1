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

$todoID = $_GET['todo_id'];

if($todoID != false)
{
	$query = "DELETE FROM todo_list WHERE id = :todo_id ";
	$statement = $db->prepare($query);
	$statement->bindValue(":todo_id", $todoID);
  $statement->execute();
	$statement->closeCursor();
}

header('location : index.php');

?>
