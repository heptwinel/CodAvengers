<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 maximum-scale=1.0 user-scalable=0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Raleway|Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet"href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <title>CodAventers - Sign Up</title>
    <link rel="stylesheet" href="css/signup.css">
    <!-- 
        Designed by @StephanieOgbudu and @Faith Egwuenu,
        Front End Developed By @abby_joe, tekipharm, @localhost and @ElijahWale,
        Back End Developed By @Kazeem Asifat, @ibeFx, @Merit and @Queue
    -->
</head>
<body>
    <div class="wrapper">
        <div class="container">
            <div class="header">
                <menu>
                    <a href="index.php" class="login">Log In</a>
                    <!-- <a href="#" class="signup">Sign Up</a> -->
                </menu>
                <div id="logo"><img src="images/logo.svg" alt="logo"></div>
            </div>
            <!-- Appropriate error message here -->
            <?php
                $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
                if(strpos($url, 'signup-successful') !== false){
                    echo "
                        <span style='color: green; font-size: 18px; padding: 10px;'>Signup successful! <br> Click on the 'Log In' button above to sign in.</span>
                    ";
                }
                if(strpos($url, 'empty-fields') !== false){
                    echo "<span style='color: red; font-size: 18px;'>Please fill all fields.</span>";
                }
            ?>
            <form id="contact" action="backend/signup_processor.php" method="post">
                <fieldset>
                        <!-- <i class="fa fa-user icon"></i>  -->
                    <input placeholder="Username" type="text" name="username" tabindex="1" minlength="4" required autofocus>
                </fieldset>
                <fieldset>
                    <input placeholder="Example@gmail.com" type="email" name="email" tabindex="2" required>
                </fieldset>
                <fieldset>
                    <input type="password" name="password" id="password" placeholder="password" tabindex="2" required/>
                </fieldset>
                <fieldset class="checkbox">
                        <input type="checkbox" name="remember" id="remember" />I agree to the Terms & Conditions
                    </fieldset>
                <fieldset class="button">
                    <button name="submit" type="submit" id="contact-submit" data-submit="...Sending" >Sign Up</button>
                </fieldset>
               
            </form>
        </div>
    </div>
</body>
</html>
