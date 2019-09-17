<?php
	if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] == 'POST') {

		// this gets the contents in our json file 
		$parser = file_get_contents("user.json");
		$decode_details = json_decode($parser, true);

		// this function cleans the data collected from the user
		function cleanUsersTextInput($data) {
			$data = trim($data);
			$data = stripcslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}

		$email = cleanUsersTextInput($_POST['email']);
		$password = cleanUsersTextInput($_POST['password']);

		// if the fields are empty, return to the index page with an error.
		if (empty($_POST['email']) || empty($_POST['password'])) {
			header("Location: login.php?empty-fields");
			exit();
		}
		//check if email is not correct
		elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			header("Location: login.php?invalid-email");
			exit();
		}
		// if everything is okay
		else {

			$user = null;
			$mail = null;

			// loop through the details in the json file for the user's details
			foreach ($decode_details['users'] as $result) {
				if ($result['email'] === $email && $result['password'] === $password) {
					$user = $result['username'];
					$mail = $result['email'];
				}
			}

			// if we can't fetch the data display error on the index page
			if (!$user && !$mail) {
				header("Location: login.php?invalid-login");
				exit();
			} else {
				// starts a session
				session_start();
				$_SESSION["user_logged_in"] = 'true';
				$_SESSION['user'] = $user;
				$_SESSION['email'] = $email;
				header('Location: dashboard.php');
			}
		}
	}	
?>