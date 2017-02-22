<?php
$dsn = 'mysql:host=us-cdbr-azure-northcentral-b.cloudapp.net;dbname=comp1006_lessons';
$userName = 'bb8dcf303771fa';
$password = 'b2eaac46';


try {
    // instantiates a new pdo - an db object
    $db = new PDO($dsn, $userName, $password);
}
catch(PDOException $e) {
    $message = $e->getMessage();
    echo("An error occurred: " . $message);
}
?>
