<?php

if(isset($_SESSION['login_user'])){
  header('todo-list.php');
}
$attempt = $_GET['attempt'];
?>
<!DOCTYPE html>
 <html lang="en-ca">
 	<head>
 		<meta charset="utf-8" />
		<title>Login</title>
		<link rel="stylesheet" href="assets/css/styles.css" />
	</head>
	<body>
		<header id="global-nav">
			<nav id="global">
				<ul class="nav">
					<li><a href="index.php" title="Home Page">Home Page</a></li>
          <?php if(isset($login_session)){
            echo('<li><a href=\'todo-list.php\' title=\'Todo List\'>Todo List</a></li>
  					<li><a href=\'todo-details.php?todo_id=0\' title=\'Add new Todo
            \'>Add New Todo</a></li><li><a href=\'logout-page.php\' title=\'Logout Page\'>Log Out</a></li>');
          } else {
            echo('<li><a class=\'active\' href=\'login-page.php\' title=\'Login Page\'>Log In</a></li>');
          }?></li>
				</ul>
			</nav>
		</header>
		<main>
      <br><br><br><br>
      <?php if(!$attempt == 0)
      echo('<h2 class=\'error\'>Invalid Username and/or Password</h2>');?>
      <form id=login action="login.php" method="post">
        <input type="hidden" name="form-sent" value="1" />
        <fieldset>
          <legend>Login credentials</legend>
          <div>
            <label for"username">User Name</label>
            <input type="text" name="username" id="username" required size="25" maxlength="63" placeholder="User Name" />
          </div>
          <div>
            <label for"password">Password</label>
            <input type="password" name="password" id="password" required size="25" maxlength="63" placeholder="Password" />
          </div>
        </fieldset>
        <button type="submit">Log in</button>
      </form>

      </form>
			<section>
				<article>

				</article>
			</section>
		</main>
	</body>
</html>
