<?php
// connection string
 // DB connection info
 // $host = "us-cdbr-azure-southcentral-f.cloudapp.net";
 // $user = "b214b79747fa6d";
 // $pwd = "fa88c766";
 // $db = "comp1006_lesson4";
 // Database=comp1006_assignment1;Data Source=us-cdbr-azure-northcentral-b.cloudapp.net;User Id=b9e8f2c430a4ad;Password=b54eca3a
 $dsn = 'mysql:us-cdbr-azure-northcentral-b.cloudapp.net;dbname=comp1006_assignment1';
 $userName = 'b9e8f2c430a4ad';
 $password = 'b54eca3a';
 // exception handling - use a try / catch
 try {
     // instantiates a new pdo - an db object
     $db = new PDO($dsn, $userName, $password);
 }
 catch(PDOException $e) {
     $message = $e->getMessage();
     echo "An error occurred: " . $message;
 }

 $query = "SHOW DATABASES"; // SQL statement
 $statement = $db->prepare($query); // encapsulate the sql statement
 $statement->execute(); // run on the db server
 $dbs = $statement->fetchAll(); // returns an array
 $statement->closeCursor(); // close the connection
 ?>

 <h1>List Databases (test)</h1>

           <ul>
               <?php
               foreach($dbs as $dbs) {
                   echo '<li>';
                   echo "Name of Databse: " . $dbs;
                   echo '</li>';
               }
               ?>
           </ul>
