<?php
include_once('session-info.php');
?>
<!DOCTYPE html>
 <html lang="en-ca">
 	<head>
 		<meta charset="utf-8" />
		<title>COMP1006 Assignment 1</title>
		<link rel="stylesheet" href="assets/css/styles.css" />
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

				</article>
			</section>
		</main>
	</body>
</html>
