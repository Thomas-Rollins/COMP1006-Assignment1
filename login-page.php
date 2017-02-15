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
					<li><a href="todo-list.php" title="Todo List">Todo List</a></li>
					<li><a href="todo-details.php" title="Todo Details">Todo Details</a></li>
					<li><a class="active" href="login-page.php" title="Login Page">Log In</a></li>
				</ul>
			</nav>
		</header>
		<main>
      <h2>Put login form here...</h2>
      <form id=login action="./assets/php/process-login-form.php" method="post">
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