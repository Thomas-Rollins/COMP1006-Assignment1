<?php
include_once('http://comp1006-assignment1.azurewebsites.net/assets/php/session-info.php');
include_once('http://comp1006-assignment1.azurewebsites.net/assets/php/database.php');

if(!isset($_SESSION['login_user']))
{
  header('location: http://comp1006-assignment1.azurewebsites.net/index.php');
}

$query = "SELECT * FROM todo_list WHERE userID =:userid ORDER BY id ASC"; // SQL statement
$statement = $db->prepare($query); // encapsulate the sql statement
$statement->bindValue(':userid', $login_session);
$statement->execute(); // run on the db server
$todo = $statement->fetchAll(); // returns an array
$statement->closeCursor(); // close the connection
?>

<!DOCTYPE html>
 <html lang="en-ca">
 	<head>
 		<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Todo List</title>

    <script src="http://comp1006-assignment1.azurewebsites.net/assets/lib/bootstrap/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://comp1006-assignment1.azurewebsites.net/assets/css/styles.css" />

	</head>
	<body>
		<header id="global-nav">
			<nav id="global">
				<ul class="nav">
					<li><a href="http://comp1006-assignment1.azurewebsites.net/index.php" title="Home Page">Home Page</a></li>
					<li><a class="active" href="http://comp1006-assignment1.azurewebsites.net/todo-list.php" title="Todo List">Todo List</a></li>
					<li><a href="http://comp1006-assignment1.azurewebsites.net/todo-details.php?todo_id=0" title="Add new Todo">Add New Todo</a></li>
					<li><?php if(!isset($login_session)){
            echo('<a href=\'http://comp1006-assignment1.azurewebsites.net/login-page.php\' title=\'Login Page\'>Log In</a>');
          }else {
              echo('<a href=\'http://comp1006-assignment1.azurewebsites.net/logout-page.php\' title=\'Logout Page\'>Log Out</a>');
            }?></li>
				</ul>
			</nav>
		</header>
		<main class="main">
			<section>
				<article>
          <br><br><br><br> <!-- force newlines -->
          <h1>Welcome: <i><?php echo $login_session; ?></i></h1>
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
                      <td class="delete"><a class="btn btn-danger" href="http://comp1006-assignment1.azurewebsites.net/assets/php/delete-db-entry.php?todo_id=<?php echo $todo['id'] ?>"><i class=""></i> Delete</a></td>
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

				</article>
			</section>
		</main>
	</body>
</html>
