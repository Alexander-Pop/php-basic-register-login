<!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>
	<body>
		<?php 
		session_start();
		if (isset($_SESSION['user'])) {
		} else {
			header('Refresh:0; url=index.php');
		}
		?>
		<h1>Welcome to Homepage</h1> 
		<br><br>
		<a href="logout.php">Log Out</a>
	</body>
</html>