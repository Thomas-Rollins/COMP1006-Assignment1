<?php
$dsn = 'mysql:host=localhost:3307;dbname=comp1006_assignment1';
$userName = 'root';
$password = '';


try {
    // instantiates a new pdo - an db object
    $db = new PDO($dsn, $userName, $password);
}
catch(PDOException $e) {
    $message = $e->getMessage();
    echo "An error occurred: " . $message;
}
