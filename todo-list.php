<?php
//include_once ('database.php');

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

$query = "SELECT * FROM todo_list"; // SQL statement
$statement = $db->prepare($query); // encapsulate the sql statement
$statement->execute(); // run on the db server
$todo = $statement->fetchAll(); // returns an array
$statement->closeCursor(); // close the connection
?>

<!DOCTYPE html>
 <html lang="en-ca">
 	<head>
 		<meta charset="utf-8" />
		<title>Todo List</title>
		<link rel="stylesheet" href="assets/css/styles.css" />
	</head>
	<body>
		<header id="global-nav">
			<nav id="global">
				<ul class="nav">
					<li><a href="index.php" title="Home Page">Home Page</a></li>
					<li><a class="active" href="todo-list.php" title="Todo List">Todo List</a></li>
					<li><a href="todo-details.php" title="Todo Details">Todo Details</a></li>
					<li><a href="login-page.php" title="Login Page">Log In</a></li>
				</ul>
			</nav>
		</header>
		<main>
			<section>
				<article>
<br><br><br><br>
          <table class="">
              <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Notes</th>
                  <th>Completed</th>
                  <th></th>
              </tr>
              <?php foreach($todo as $todo) : ?>
                  <tr>
                      <td><?php echo $todo['id'] ?></td>
                      <td><?php echo $todo['name'] ?></td>
                      <td><?php echo $todo['notes'] ?></td>
                      <td><?php echo $todo['completed'] ?></td>
                      <td><a class="" href="todo-details.php?todo_id=<?php echo $todo['id'] ?>"><i class="fa fa-pencil-square-o"></i> Edit</a></td>
                      <td><a class="btn btn-danger" href="delete-db-entry.php?todo_id=<?php echo $todo['id'] ?>"><i class="fa fa-trash-o"></i> Delete</a></td>
                  </tr>
              <?php endforeach; ?>

          </table>

          <a class="add new entry" id="newEntry" href="todo-details.php?todo_id=0">Add new Entry</a>
				</article>
			</section>
		</main>
	</body>
</html>
