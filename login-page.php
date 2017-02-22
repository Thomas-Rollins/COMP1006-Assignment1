<?php

if(isset($_SESSION['login_user'])){
  header('http://comp1006-assignment1.azurewebsites.net/todo-list.php');
}
if(isset($_GET['attempt']))
{
    $attempt = $_GET['attempt'];
} else {
  $attempt = 0;
}

 ?>

<!DOCTYPE html>
 <html lang="en-ca">
 	<head>
 		<meta charset="utf-8" />
		<title>Login</title>
    <script src="http://comp1006-assignment1.azurewebsites.net/assets/lib/jquery/dist/jquery.min.js"></script>
    <script src="http://comp1006-assignment1.azurewebsites.net/assets/lib/bootstrap/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://comp1006-assignment1.azurewebsites.net/assets/css/styles.css" />
	</head>
	<body>
		<header id="global-nav">
			<nav id="global">
				<ul class="nav">
					<li><a href="index.php" title="Home Page">Home Page</a></li>
          <?php if(isset($login_session)){
            echo('<li><a href=\'http://comp1006-assignment1.azurewebsites.net/todo-list.php\' title=\'Todo List\'>Todo List</a></li>
  					<li><a href=\'http://comp1006-assignment1.azurewebsites.net/todo-details.php?todo_id=0\' title=\'Add new Todo
            \'>Add New Todo</a></li><li><a href=\'http://comp1006-assignment1.azurewebsites.net/logout-page.php\' title=\'Logout Page\'>Log Out</a></li>');
          } else {
            echo('<li><a class=\'active\' href=\'http://comp1006-assignment1.azurewebsites.net/login-page.php\' title=\'Login Page\'>Log In</a></li>');
          }?></li>
				</ul>
			</nav>
		</header>
		<main>
      <br><br><br><br>
      <?php if(!$attempt == 0)
      echo('<h2 class=\'error\'>Invalid Username and/or Password</h2>');?>
      <div class="container">
      <form id=login action="http://comp1006-assignment1.azurewebsites.net/login.php" method="post">
        <input type="hidden" name="form-sent" value="1" />
        <fieldset>
          <legend>Login Credentials</legend>
          <div class="form-group row">
            <label for"username">User Name</label>
            <div class="col-10">
            <input type="text" name="username" id="username" required size="25" maxlength="30" placeholder="User Name" />
          </div>
        </div>
          <div class="form-group row">
            <label for"password">Password</label>
            <div class="col-10">
            <input type="password" name="password" id="password" required size="25" maxlength="30" placeholder="Password" />
          </div>
        </div>
        </fieldset>
        <div class="col-10">
        <button type="submit">Log in</button>
      </div>
      </form>
    </div>

			<section>
				<article>

				</article>
			</section>
		</main>
	</body>
</html>
