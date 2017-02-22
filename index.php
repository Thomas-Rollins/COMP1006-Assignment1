<?php
include_once('http://comp1006-assignment1.azurewebsites.net/session-info.php');
include_once('database.php');
?>
<!DOCTYPE html>
 <html lang="en-ca">
 	<head>
 		<meta charset="utf-8" />
		<title>COMP1006 Assignment 1</title>
    <script src="http://comp1006-assignment1.azurewebsites.net/assets/lib/jquery/dist/jquery.min.js"></script>
    <script src="http://comp1006-assignment1.azurewebsites.net/assets/lib/bootstrap/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://comp1006-assignment1.azurewebsites.net/assets/css/styles.css" />
	</head>
	<body>
		<header id="global-nav">
			<nav id="global">
				<ul class="nav">
					<li><a class="active" href="http://comp1006-assignment1.azurewebsites.net/index.php" title="Home Page">Home Page</a></li>
          <?php if(isset($login_session)){
            echo('<li><a href=\'http://comp1006-assignment1.azurewebsites.net/todo-list.php\' title=\'Todo List\'>Todo List</a></li>
  					<li><a href=\'http://comp1006-assignment1.azurewebsites.net/todo-details.php?todo_id=0\' title=\'Add new Todo
            \'>Add New Todo</a></li><li><a href=\'http://comp1006-assignment1.azurewebsites.net/logout-page.php\' title=\'Logout Page\'>Log Out</a></li>');
          } else {
            echo('<li><a href=\'http://comp1006-assignment1.azurewebsites.net/login-page.php?attempt=0\' title=\'Login Page\'>Log In</a></li>');
          }?></li>
          </ul>
			</nav>
		</header>
		<main>
			<section>
				<article>
          <?php if(isset($login_session)){
            echo('<br><br><br><br><h2>Welcome to your TODO planner, ' . $login_session . '.</h2>');
            echo('<h3>Here you can view, edit, add, and delete your TODO entires. To start please view the TODO List page using the link above.</h3>');
          }else {
            echo('<br><br><br><br><h2>Welcome to the TODO planner. Please log in to begin.</h2>');
          }
            ?>
				</article>

        <?php
        $query = "SELECT * FROM todo_list WHERE userID =:userid ORDER BY id ASC"; // SQL statement
        $statement = $db->prepare($query); // encapsulate the sql statement
        $statement->bindValue(':userid', $login_session);
        $statement->execute(); // run on the db server
        $todo = $statement->fetchAll(); // returns an array
        $statement->closeCursor(); // close the connection
         ?>
        <div class="container">
          <div class="row">
            <div class="col-md-6 col-md-offset-3">
              <table class="table table-inverse">
                <thread>
                  <tr>
                    <th>Name</th>
                    <th>Notes</th>
                    <th>Completed</th>
                    <th> </th>
                    <th> </th>
            </tr>
          </thread>
          <tbody>
            <?php foreach($todo as $todo) : ?>
                <tr>
                  <?php if($todo['completed'] == 1){
                    echo('</del><td><del>'); // strikes through text if listed as completed
                  } else {
                    echo('<td>');
                  }?><?php echo $todo['name'] ?></td>
                  <?php if($todo['completed'] == 1){
                    echo('</del><td><del>');
                  } else {
                    echo('<td class=\'notes\'>');
                  }?><?php echo $todo['notes'] ?></td>
                  <?php if($todo['completed'] == 1){
                    echo('</del><td class=\'complete\'>');
                  } else {
                    echo('<td>');
                  }?><?php if($todo['completed'] == 1){
                    echo('YES');
                  } else {
                    echo('NO');
                  }?></td>
                    <td class="edit"><a class="btn btn-warning" href="http://comp1006-assignment1.azurewebsites.net/todo-details.php?todo_id=<?php echo $todo['id'] ?>"><i class=""></i> Edit</a></td>
                    <td class="delete"><a class="btn btn-danger" href="http://comp1006-assignment1.azurewebsites.net/delete-db-entry.php?todo_id=<?php echo $todo['id'] ?>"><i class=""></i> Delete</a></td>
                </tr>
            <?php endforeach; ?>
            <tr>
              <td colspan="5"><a class="btn btn-primary" id="newEntry" href="http://comp1006-assignment1.azurewebsites.net/todo-details.php?todo_id=0">Add new Entry</a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      </div>
      </div>

			</section>
		</main>
	</body>
</html>
