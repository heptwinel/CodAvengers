<?php
    session_start();

    // Check if the user is already logged in. If true, redirect to his/her dashboard.
    if (isset($_SESSION['user_logged_in']) == true) {
        header("Location: dashboard.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/login.css">
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <title>CodeAvengers - Sign in</title>
    <!-- 
        Designed by @StephanieOgbudu and @Faith Egwuenu,
        Front End Developed By @abby_joe, tekipharm, @localhost, @Merit and @ElijahWale,
        Back End Developed By @Kazeem Asifat, @ibeFx and @Queue
    -->
</head>
<body>
    <div class="wrapper">
        <div class="container">
            <div class="header">
                <menu>
                    <!-- <a href="index.html" class="login">Log In</a> -->
                    <a href="signup.php" class="signup">Sign Up</a>
                </menu>
                <div id="logo"><img src="images/logo.svg" alt="logo"></div>
            </div>
            <!-- We display the error messages here -->
            <?php
                $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
                if(strpos($url, 'empty-fields') !== false){
                    echo "<span style='color: red; font-size: 18px;'>Please fill all fields.</span>";
                }
                if(strpos($url, 'invalid-email') !== false){
                    echo "<span style='color: red; font-size: 18px;'>Invalid Email, please try again.</span>";
                }
                if(strpos($url, 'invalid-login') !== false){
                    echo "<span style='color: red; font-size: 18px;'>Invalid login details, please try again.</span>";
                }  
            ?>
            <form id="contact" action="backend/login_processor.php" method="post">
                <fieldset>
                    <input placeholder="Example@gmail.com" type="email" name="email" tabindex="2" required>
                </fieldset>
                <fieldset>
                    <input type="password" name="password" id="password" placeholder="password" tabindex="2" required/>
                </fieldset>
                <fieldset class="checkbox">
                    <input type="checkbox" name="remember" id="remember" />Remember Password 
                </fieldset>
                
                <fieldset class="button">
                    <button name="submit" type="submit" id="contact-submit" data-submit="...Sending" >LogIn</button>
                </fieldset>
            </form>
        </div>
    </div>
</body>
</html>
