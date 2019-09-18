<?php

if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
	$myFile = "../user.json";
	$arr_data = array(); // create empty array

	// check if any of the fields are empty
	if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])) {
		header("Location: ../signup.php?empty-fields");
		exit();
	} else {
		function cleanUsersTextInput($data) {
			$data = trim($data);
			$data = stripcslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}

		$username = cleanUsersTextInput($_POST['username']);
		$password = cleanUsersTextInput($_POST['password']);
		$email = cleanUsersTextInput($_POST['email']);
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
		$writeDetails = file_put_contents($myFile, $jsondata);

		if ($writeDetails) {
			header("Location: ../signup.php?signup-successful");
			exit();
		}
		else {
			header("Location: ../signup.php?signup-error");
			exit();
		}
	}
}

?>