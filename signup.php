<?php
$message = '';
$error = '';
//checking for empty input
if(isset($_POST["submit"])){

    $myFile = "user.json";
    $arr_data = array(); // create empty array

    // this function cleans the data collected from the user
		function cleanUsersTextInput($data)
		{
			$data = trim($data);
			$data = stripcslashes($data);
			$data = htmlspecialchars($data);
			return $data;
        }
        
        $username = cleanUsersTextInput($_POST['username']);
        $email = cleanUsersTextInput($_POST['password']);
		$password = cleanUsersTextInput($_POST['password']);
		

    // if the fields are empty, return to the index page with an error.
    if(empty($_POST["username"]) || empty($_POST["email"])
    || empty($_POST["password"])){
        echo "One or more  of your details are missing 
    <br>
    <a href='signup.html'> << Back to signUp </a>";
        exit();
            $error = "<label>fill the field</label>";
        //header("Location: signup.html?empty-fields");
			//exit();
    }elseif(filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "<label>Invalid email address</label>";
        //header("Location: signup.html?invalid-email");
        //exit();

    }elseif (file_exists('user.json')){

       
        //get formdata
        $formdata = array(
            'username'  =>   $username,
            'email'     =>	 $email,
			'password'  =>   $password,
			
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
        
    } else {
        echo "One or more  of your details are missing 
    <br>
    <a href='signUpLogic.php'> << Back to signUp </a>";
        exit();
    }
}