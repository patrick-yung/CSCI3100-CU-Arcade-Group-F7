<?php
    session_start();
?>
<?php include_once 'Format/header.php'
?>


<body>
<div class="form-box" section class="signin/reg">

<form action="contact.php" method="post">
			<input type="text" autocomplete="off" name="qwer" placeholder="Message" />
			<button type="send" name="send" >Send</button>
            </form>
</div>
</body>



<?php include_once 'Format/footer.php'?>

