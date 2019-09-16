<!DOCTYPE html>
<?php

if (isset($_POST['submit'])) {
	$myFile = "user.json";
	$arr_data = array(); // create empty array

	if ($_POST['username'] != "" && $_POST['password'] != "" && $_POST['email'] != "") {


		function cleanUsersTextInput($data)
		{
			$data = trim($data);
			$data = stripcslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}

		$username = cleanUsersTextInput($_POST['username']);
		$password = cleanUsersTextInput($_POST['password']);
		$email = cleanUsersTextInput($_POST['password']);
		//Get form data
		$formdata = array(
			'username' => $username,
			'password' => $password,
			'email' =>	$email
		);

		//Get data from existing json file
		$jsondata = file_get_contents($myFile);

		// converts json data into array
		$arr_data = json_decode($jsondata, true);

		// Push user data to array
		array_push($arr_data['users'], $formdata);

		//Convert updated array to JSON
		$jsondata = json_encode($arr_data, JSON_PRETTY_PRINT);

		//write json data into data.json file
		if (file_put_contents($myFile, $jsondata)) {
			echo "Data successfully saved 
		<br>
		Hello " . $username . ", You are welcome
		";
		}
		exit();
	} else {
		echo "One or more  of your details are missing 
	<br>
	<a href='signUpLogic.php'> << Back to signUp </a>";
		exit();
	}
}

?>

<html>

<head>
	<!-- <script src="https://code.juery.com/jquery-2.1.4.js"></script> -->

</head>

<body>

	<form action="" method="POST">
		Username:<br>
		<input type="text" name="username">
		<br><br />

		Email:<br>
		<input type="text" name="email">
		<br><br>

		Password:<br>
		<input type="text" name="password">
		<br><br>
		<input type="submit" name="submit" value="submit">
	</form>

</body>

</html>