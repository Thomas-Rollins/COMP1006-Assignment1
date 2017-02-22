<?php
include_once('session-info.php');
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
					<li><a class="active" href="index.php" title="Home Page">Home Page</a></li>
          <?php if(isset($login_session)){
            echo('<li><a href=\'todo-list.php\' title=\'Todo List\'>Todo List</a></li>
  					<li><a href=\'todo-details.php?todo_id=0\' title=\'Add new Todo
            \'>Add New Todo</a></li><li><a href=\'logout-page.php\' title=\'Logout Page\'>Log Out</a></li>');
          } else {
            echo('<li><a href=\'login-page.php?attempt=0\' title=\'Login Page\'>Log In</a></li>');
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
			</section>
		</main>
	</body>
</html>
