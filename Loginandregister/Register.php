<?php include_once '../includes/admins.php'?>

<php
		session_start();
	?>
	<?php include_once '../includes/admins.php'?>

	<!DOCTYPE html>
	<html lang="en" dir = "ltr">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Login Project</title>
		<link rel="stylesheet" href = "Format/style.css">

	</head>

	<body>


	<div class="form-box" section class="signin/reg">
		<div class="button">
			<div id="blk"></div>
			<button type="button" class="toggle" onclick="login()">Log In</button>
			<button type="button" class="toggle" onclick="register()">Register</button>
		</div>

		<section id="register" class="register">
			<h1>Create New User</h1>
			<form action="sign.inc.php" method="post">
			<input type="text" autocomplete="off" name="name" placeholder="Full Name" />
			<input type="text" autocomplete="off" name="username" placeholder="Username" />
			<input type="email" autocomplete="on" name="email" placeholder="Email" />
			<input type="password" autocomplete="off" name="password" placeholder="Password" />
			<input type="password" autocomplete="off" name="passwordrepeat" placeholder="Repeat Password" />
			<button type="submit" name="submit" >Sign up</button>
			</form>
			<?php
			if(isset($_GET["error"])){
				if($_GET["error"]=="emtpyinput"){
					echo"<p>Fill in all Input</p>";
				}
				if($_GET["error"]=="password don't match"){
					echo"<p>password don't match</p>";
				}
				if($_GET["error"]=="username taken"){
					echo"<p>username taken</p>";
				}
				if($_GET["error"]=="stmtfailed"){
					echo"<p>Something went wrong</p>";
				}
			}
		?>
		
		</section>

		<section id="login" class="login">
			<h1>Login In</h1>
			<form action="login.inc.php" method="post">
			<input type="text" autocomplete="off" name="uid" placeholder="Username/Email" />
			<input type="password" autocomplete="off" name="pwd" placeholder="Password" />
			<button type="submit" name="login" >Log in</button>
			<div class="forget">
				<a href="resetpassword.php">Forget password</a>
			</div>
			</form>
			<?php
			if(isset($_GET["error"])){
			
				if($_GET["error"]=="bad password" || $_GET["error"]=="wronginput"){
					echo"<p>Password or Username don't match</p>";
				}
				if($_GET["error"]=="emtpyinput"){
					echo"<p>Fill in all Input</p>";
				}
				if($_GET["error"]=="password don't match"){
					echo"<p>password don't match</p>";
				}
				if($_GET["error"]=="username taken"){
					echo"<p>username taken</p>";
				}
				if($_GET["error"]=="stmtfailed"){
					echo"<p>Something went wrong</p>";
				}
			}
		?>
			
		</section>
	</div>
	<script>
				//Switch//
		var x=document.getElementById("login")
		var y=document.getElementById("register")
		var z=document.getElementById("blk")
		function register(){
			x.style.left = "-400px ";
			y.style.left="50px";
			z.style.left="110px ";
		}
		function login(){
			x.style.left = "50px ";
			y.style.left="450px";
			z.style.left="0px ";
		}

	</script>


<?php include_once 'Format/footer.php'?>
