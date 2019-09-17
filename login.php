<?php
	session_start();

	// Check if the user is already logged in. If true, redirect to his dashboard.
	if (isset($_SESSION['user_logged_in']) == true) {
		header("Location: dashboard.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Codavengers Task</title>
</head>
<body>
	<?php
	    $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	    if(strpos($url, 'empty-fields') !== false){
	        echo "<span style='color: red; font-size: 18px; font-weight: bold;'>Please fill all fields.</span>";
	    }
	    if(strpos($url, 'invalid-email') !== false){
	        echo "<span style='color: red; font-size: 18px; font-weight: bold;'>Invalid Email, please try again.</span>";
	    }
	    if(strpos($url, 'invalid-login') !== false){
	        echo "<span style='color: red; font-size: 18px; font-weight: bold;'>Invalid login details, please try again or contact @Kazeem Asifat.</span>";
	    }  
	?>
	<form action="login_parser.php" method="post">
		<label for="Email">Email</label><br>
		<input type="text" name="email"><br>
		<label for="password">Password</label><br>
		<input type="text" name="password"><br>
		<input type="submit" name="submit">
	</form>
</body>
</html>