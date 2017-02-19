<?php
// Connection to DB
// $dsn = 'mysql:host=us-cdbr-azure-northcentral-b.cloudapp.net;dbname=comp1006_assignment1';
// $userName = 'b9e8f2c430a4ad';
// $password = 'b54eca3a';
// exception handling

$dsn = 'mysql:host=localhost:8080;dbname=comp1006_assignment1';
$userName = 'thomas';
$password = '12345';

try {
    // instantiates a new pdo - an db object
    $db = new PDO($dsn, $userName, $password);
}
catch(PDOException $e) {
    $message = $e->getMessage();
    echo "An error occurred: " . $message;
}

?>
