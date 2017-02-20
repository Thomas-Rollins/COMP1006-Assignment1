<?php
include_once('session-info.php');
include_once('database.php');

if(!isset($_SESSION['login_user']))
{
	echo('You must Login to view this page.');
  header('location: index.php');
}

$query = "SELECT * FROM todo_list ORDER BY id ASC"; // SQL statement
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
					<li><a href="todo-details.php?todo_id=0" title="Add new Todo">Add New Todo</a></li>
					<li><?php if(!isset($login_session)){
            echo('<a href=\'login-page.php\' title=\'Login Page\'>Log In</a>');
          }else {
              echo('<a href=\'logout-page.php\' title=\'Logout Page\'>Log Out</a>');
            }?></li>
				</ul>
			</nav>
		</header>
		<main class="main">
			<section>
				<article>
          <br><br><br><br> <!-- force newlines -->
          <h1>Welcome: <i><?php echo $login_session; ?></i></h1>
          <table>
              <tr>
                  <th>Name</th>
                  <th>Notes</th>
                  <th>Completed</th>
                  <th></th>
              </tr>
              <?php foreach($todo as $todo) : ?>
                  <tr>
										<?php if($todo['completed'] == 1){
											echo('</del><td><del>');
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
                      <td class="edit"><a href="todo-details.php?todo_id=<?php echo $todo['id'] ?>"><i class=""></i> Edit</a></td>
                      <td class="delete"><a href="delete-db-entry.php?todo_id=<?php echo $todo['id'] ?>"><i class=""></i> Delete</a></td>
                  </tr>
              <?php endforeach; ?>

          </table>

          <a class="add new entry" id="newEntry" href="todo-details.php?todo_id=0">Add new Entry</a>
				</article>
			</section>
		</main>
	</body>
</html>
