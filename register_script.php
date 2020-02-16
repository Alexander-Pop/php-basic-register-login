<?php 

$conn = mysqli_connect('localhost','root','','login_db') or die;

$username = $_POST['username'];
$email    = $_POST['email'];
$password = md5($_POST['password']);

$query = mysqli_query(
	$conn,
	"SELECT * FROM users WHERE email ='$email' "
);

if(mysqli_num_rows($query) > 0) {
	echo "email_exist";
} else {
	$register = mysqli_query(
		$conn,
		"INSERT INTO users(username,email,password) VALUES('$username','$email','$password')"
	);
	if ($register) {
		echo "done";
	}
}

 ?>