<!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>
	<body>
		<h2>Create new login Account</h2>
		<input type="text" id="username" placeholder="Enter the username">
		<br><br>
		<input type="text" id="email" placeholder="Enter the email">
		<br><br>
		<input type="password" id="password" placeholder="Enter password">
		<br><br>
		<input type="password" id="confirm_password" placeholder="Confirm password">
		<br><br>
		<button id="btn_reg">Register</button>
		<br><br>
		<a href="index.php">back to login</a>

		<script src="./js/jquery.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){

				$('#btn_reg').click(function(){
					var username = $('#username').val();
					var email    = $('#email').val();
					var password = $('#password').val();
					var confirm_password = $('#confirm_password').val();

					if (username == "" && email == "" && password == "" && confirm_password == "") {
						alert('Please fill all the fields !!')
					} else if (username == ""){
						alert('Username is required !!')
					} else if (email == ""){
						alert('Email is required !!')
					} else if (password == ""){
						alert('Password is required !!')
					} else if (confirm_password == ""){
						alert('Confirm Password is required !!')
					} else {
						checkemail();
					}

					function checkemail(){
						var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
						if (regex.test(email)) {
							checkPassword();
						} else {
							alert('Invalid Email !\n Please enter valid email address.')
						}
					}

					function checkPassword(){
						if (password == confirm_password) {
							register();
						} else {
							alert('Please Enter matching password !')
						}
					}

					function register(){
						$.ajax({
							type:'POST',
							url:'register_script.php',
							data:{'username':username,'email':email,'password':confirm_password},
							success:function(data){
								if (data == "email_exist") {
									alert('This Email address Exist !\n Please Enter another email.')
								}
								if (data == "done") {
									alert('Registration has been done Successfully !')
								}
							}
						})
					} 
				})
			})
		</script>
	</body>
</html>