<?php 
session_start();

$conn     = mysqli_connect('localhost','root','','login_db') or die;
$email    = $_POST['email'];
$password = md5($_POST['password']);
$query    = mysqli_query($conn,"SELECT * FROM users WHERE email='$email' AND password='$password' ");

if(mysqli_num_rows($query) > 0) {

	$_SESSION['user'] = $email;
	echo "login_done";
} else {
	echo"login_fail";
}
 ?>