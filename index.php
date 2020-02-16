<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
	</head>
	<body>
		<h2>Login to your account</h2>
		<input type="text" id="email" placeholder="Enter the Email">
		<br><br>
		<input type="password" id="password" placeholder="Enter the password">
		<br><br>
		<button id="btn_login">Login</button>
		<br><br>
		<a href="register.php">register</a>

		<script src="./js/jquery.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$('#btn_login').click(function(){
					var email = $('#email').val();
					var password = $('#password').val();

					if (email == "" && password == "") {
						alert('Please Enter Email and Password field !!')
					} else if(email == ""){
						alert('Email is required !!')
					} else if(password == ""){
						alert('Password is required !!')
					} else {
							login();
					}

					function login(){

						$.ajax({
							type:'POST',
							url:'login_script.php',
							data:{'email':email,'password':password},
							success:function(data)
							{
								if (data == "login_done") {
									window.location.href='home.php';
								}
								if (data == "login_fail") {
									alert('Login fail \n Invalid Email or Password')
								}
							}
						})
					}
				})
			})
		</script>
	</body>
</html>