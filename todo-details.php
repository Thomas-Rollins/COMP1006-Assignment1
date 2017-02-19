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


$todoID = $_GET['todo_id'];

if($todoID == 0) {
    $todoID = null;
    $isAddition = 1;
} else {
    $isAddition = 0;
    $query = "SELECT * FROM todo_list WHERE id = :todo_id "; // SQL statement
    $statement = $db->prepare($query); // encapsulate the sql statement
    $statement->bindValue(':todo_id', $todoID);
    $statement->execute(); // run on the db server
    $todo = $statement->fetch(); // returns only one record
    $statement->closeCursor(); // close the connection
}
?>
<!DOCTYPE html>
 <html lang="en-ca">
 	<head>
 		<meta charset="utf-8" />
		<title>Todo Details</title>
		<link rel="stylesheet" href="assets/css/styles.css" />
	</head>
	<body>
		<header id="global-nav">
			<nav id="global">
				<ul class="nav">
					<li><a href="index.php" title="Home Page">Home Page</a></li>
					<li><a href="todo-list.php" title="Todo List">Todo List</a></li>
					<li><a class="active" href="todo-details.php" title="Todo Details">Todo Details</a></li>
					<li><a href="login-page.php" title="Login Page">Log In</a></li>
				</ul>
			</nav>
		</header>
		<main>
			<section>
				<article>

          <div class="container">
              <div class="row">
                  <div class="col-md-offset-3 col-md-6">
                      <h1>Game Details</h1>
                      <form action="update-db-entry.php" method="post" id="edit-todo">
                          <div class="form-group">
                              <label for="IDTextField" hidden>Game ID</label>
                              <input type="hidden" class="form-control" id="idTextField" name="idTextField"
                                      placeholder="Todo ID" value="<?php echo $todo['id']; ?>">
                          </div>
                          <div class="form-group">
                              <label for="NameTextField">Todo Item Name</label>
                              <input type="text" class="form-control" id="nameTextField"  name="nameTextField"
                                     placeholder="Todo Name" required  value="<?php echo $todo['name']; ?>">
                          </div>
                          <div class="form-group">
                              <label for="noteTextField">Todo Notes</label>
                          </div>
                          <div clas="form-group">
                            <label for="isComplete">Is completed?</label>
                            <input type="checkbox" class="form-control"
                            id="isComplete" name="isComplete" value="yes"
                            <?php echo($todo['completed']==1 ? 'checked' : ""); ?>/>
                            <!-- the above checks the checkbox if db lists as completed -->
                      <textarea form="edit-todo" name="noteTextField" id="noteTextField" rows ="5"
                      wrap="soft"><?php echo $todo['notes']; ?></textarea>

                      <input type="hidden" name="isAddition" hidden value="<?php echo $isAddition; ?>">
                      <button type="submit" id="submitButton" class="btn btn-primary">Submit</button>
</form>
                  </div>
              </div>
          </div>

				</article>
			</section>
		</main>
	</body>
</html>
<?php
try {

} catch ()
{

}
?>
