<?php
$dsn = 'mysql:host=us-cdbr-azure-northcentral-b.cloudapp.net;dbname=comp1006_assignment1';
$username = 'b9e8f2c430a4ad';
$password = 'b54eca3a';

try {
    // instantiates a new pdo - an db object
    $db = new PDO($dsn, $userName, $password);
}
catch(PDOException $e) {
    $message = $e->getMessage();
    echo("An error occurred: " . $message);
}
?>
