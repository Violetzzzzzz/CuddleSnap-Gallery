<?php
$conn = new mysqli("localhost", "root", "", "test");
$loginState = 'logout';

$receivedVariable = isset($_GET['varToPass']) ? urldecode($_GET['varToPass']) : '';
if ($receivedVariable != null) {
    $loginState = $receivedVariable;
}


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Web App, Assignment, Student, html, css, javaScript, php, SQL">
    <meta name="description" content="THIS IS AN ASSIGNMENT">
    <meta name="author" content="Violet Zhang">
    <meta name="copyright" content="Copyright © 2023">
    <title>CuddleSnaps Gallery | LogIn</title>
    <link rel="icon" href="favicon.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="generalStyle.css">
    <link rel="stylesheet" type="text/css" href="register_login.css">
</head>

<body style="background-color:lavenderblush">
    <header>
        <a href="/index.php" style="text-decoration: none;">
            <h3>❏ CuddleSnaps Gallery | LogIn</h3>
        </a>
    </header>

    <main>
        <hr>
        <div class="form_position_container">
            <div class="form_container">
                <?php if ($loginState == 'wrongpassword') { ?>
                    <h3><b>Wrong Password. Please try again.</b></h3>
                <?php } else if ($loginState == 'wrongemail') { ?>
                    <h3><b>Email doesn't exist. Please try again.</b></h3>
                <?php } else if ($loginState == 'error') { ?>
                    <h3><b>Error. Please try again.</b></h3>
                <?php } ?>
                <h3>Log In</h3>
                <form id="createAccountForm" action="login_db.php" method="post">
                    <label for="emailaddress">Email Address<sup>(*)</sup>:</label>
                    <input type="text" name="emailaddress" style="width: 200px;" maxlength="40" placeholder="Email Address">
                    <label for="password">Password<sup>(*)</sup>:</label>
                    <input type="password" name="password" style="width: 200px;" maxlength="12" placeholder="Password">
                    <input class="header_button control_button" type="submit" value="Submit">
                    <a href="index.php"><button id="cancel_album_form" class="header_button control_button" type="button">Cancel</button></a>
                </form>
                <h6><a href="register.php">Create Your Account</a></h6>
            </div>
        </div>


    </main>
    <footer>
        <hr>
        <br>
        <a href="https://www.linkedin.com/in/chi-zhang-7b16b9284">
            <img width="20" src="/Linkedin-icon-design-premium-vector-PNG.png" alt="This is a link to Violet's LinkedIn "></a>
        <p>Violet Zhang</p>
    </footer>
</body>


</html>