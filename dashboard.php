<?php
	session_start();

	if (isset($_SESSION['user_logged_in']) == false) {
		header('Location: login.php');
	} else {
		$username = $_SESSION['user'];
		$mail = $_SESSION['email'];
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>User Dashboard</title>
</head>
<body>
	<div class="box">
		<h3>Hello <?php echo $username; ?>, welcome to Codavengers Task</h3>
		<p>Your Email is: <?php echo $mail; ?></p>
	</div>

	<a href="<?php session_destroy(); ?>">Logout</a>
</body>
</html>