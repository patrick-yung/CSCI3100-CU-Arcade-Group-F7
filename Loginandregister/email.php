<?
/*
Author: Patrick Yung
Last Update:04/04/2022
Function: Frontend for users input email confirmation
*/
?>


<php
    session_start();
?>
<?php include_once 'Format/header.php'?>
<?php include_once '../includes/admins.php'?>


	<div class="form-box" section class="change">

		<section id="EmailConfrim" class="EmailConfrim">
			<h1>Email Confirmation</h1>
			<form action="email_function.php" method="post">
			<input type="hidden" name="email" value="<?php echo $_GET['email']; ?>" required>
			<input type="text" autocomplete="off" name="emailcode" placeholder="Enter Code" />
			<button type="submit" name="submit" >Confrim Email</button>
			</form>
		</section>
	</div>
	


<?php include_once 'Format/footer.php'?>