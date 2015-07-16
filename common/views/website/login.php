<?php require_once('includes/header.php'); ?>

<?php
if ($is_valid == 1) {
	echo 'is not valid username or password';
}
?>
<br><br>
<form action="" method="post">
	<input type="text" name="username" placeholder="Username">
	<br><br>
	<input type="password" name="password" placeholder="Password">
	<br><br>
    <a href="index.php?frontcontroller=webusers&frontaction=add">create account</a>
	<br><br>
	<button type="submit">Login</button>
</form>

<?php require_once('includes/footer.php'); ?>