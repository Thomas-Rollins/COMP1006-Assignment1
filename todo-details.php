<?php
include_once('http://comp1006-assignment1.azurewebsites.net/assets/php/session-info.php');
include_once('http://comp1006-assignment1.azurewebsites.net/assets/php/database.php');


$todoID = $_GET['todo_id'];

if($todoID == 0) {
    $todo = null;
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
    <script src="http://comp1006-assignment1.azurewebsites.net/assets/lib/bootstrap/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://comp1006-assignment1.azurewebsites.net/assets/css/styles.css" />
	</head>
	<body>
		<header id="global-nav">
			<nav id="global">
				<ul class="nav">
					<li><a href="http://comp1006-assignment1.azurewebsites.net/index.php" title="Home Page">Home Page</a></li>
					<li><a href="http://comp1006-assignment1.azurewebsites.net/todo-list.php" title="Todo List">Todo List</a></li>
					<li><a class="active" href="http://comp1006-assignment1.azurewebsites.net/todo-details.php?todo_id=0" title="Add new Todo">Add New Todo</a></li>
          <li><?php if(!isset($login_session)){
            echo('<a href=\'http://comp1006-assignment1.azurewebsites.net/login-page.php\' title=\'Login Page\'>Log In</a>');
          }else {
              echo('<a href=\'http://comp1006-assignment1.azurewebsites.net/logout-page.php\' title=\'Logout Page\'>Log Out</a>');
            }?></li>
				</ul>
			</nav>
		</header>
		<main>
			<section>
				<article>

          <div class="container">
                      <h1>TODO Details</h1>
                      <form action="http://comp1006-assignment1.azurewebsites.net/assets/php/update-db-entry.php" method="post" id="edit-todo">
                          <div class="form-group row">
                              <label for="IDTextField" class="col-lg-2 col-form-label" hidden>TODO ID</label>
                              <div class="col-sm-10">
                              <input type="hidden" class="form-control" id="idTextField" name="idTextField"
                                      placeholder="Todo ID" value="<?php echo $todo['id']; ?>">
                          </div>
                        </div>
                          <div class="form-group row">
                              <label for="NameTextField" class="col-lg-2 col-form-label">Todo Item Name</label>
                              <div class="col-sm-10">
                              <input type="text" class="form-control" id="nameTextField"  name="nameTextField"
                                     placeholder="Todo Name" required  value="<?php echo $todo['name']; ?>">
                          </div>
                        </div>
                          <div class="form-group">
                              <label for="noteTextField" class="col-lg-2 col-form-label">Todo Notes</label>
                    <textarea form="edit-todo" class="form-control" name="noteTextField" id="noteTextField" rows ="5"
                    wrap="soft"><?php echo $todo['notes']; ?>
                  </textarea>
                  </div>


                          <div clas="form-group">
                            <label for="isComplete" class="col-lg-2 col-form-label">Is completed?</label>
                            <div class="col-lg-10">
                            <input type="checkbox" class="form-check-input"
                            id="isComplete" name="isComplete" value="yes"
                            <?php echo($todo['completed']==1 ? 'checked' : ""); ?>/></div></div>
                            <!-- the above checks the checkbox if db lists as completed -->
                            <div clas="form-group">
                      <input type="hidden" name="isAddition" hidden value="<?php echo $isAddition; ?>">
                      <button type="submit" id="submitButton" name="submit">Submit</button>
                      <button type="submit" id="cancel" name="submit" value="cancel">Cancel</button>
                      </div>
                    </form>
                  </div>
            </article>
			</section>
		</main>
	</body>
</html>
