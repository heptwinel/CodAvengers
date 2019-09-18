<?php
    session_start();

    if (isset($_SESSION['user_logged_in']) == false) {
        header('Location: index.php');
    } else {
        $username = $_SESSION['user'];
        $mail = $_SESSION['email'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/dashboard.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway|Roboto&display=swap" rel="stylesheet">
    <title>Welcome to CodAvengers</title>
    <!-- 
        Designed by @StephanieOgbudu and @Faith Egwuenu,
        Front End Developed By @abby_joe, tekipharm, @localhost and @ElijahWale,
        Back End Developed By @Kazeem Asifat, @ibeFx and @Queue
    -->
</head>
<body>
    <header>
        <img src="images/logo.svg" alt="logo">  
    </header>
    <section>
        <p>Welcome <span class="user"><?php echo $username; ?></span>,</p>
        <h2>This is the Codavengers Hub</h2>
        <h3>Playground for Designers, Front-End Developers & <br> Back-End Developers.</h3>
        <p>Your Email is: <?php echo $mail; ?></p>
        <a href="logout.php">Logout</a>
    </section>
</body>
</html>
