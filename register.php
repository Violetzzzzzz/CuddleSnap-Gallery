<?php
$conn = new mysqli("localhost", "root", "", "test");
$registerState = 'new';

$receivedVariable = isset($_GET['varToPass']) ? urldecode($_GET['varToPass']) : '';
if ($receivedVariable != null) {
    $registerState = $receivedVariable;
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
    <title>CuddleSnaps Gallery | Register</title>
    <link rel="icon" href="favicon.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="generalStyle.css">
    <link rel="stylesheet" type="text/css" href="register_login.css">
</head>

<body style="background-color:lavenderblush">
    <header>
        <a href="/index.php" style="text-decoration: none;">
            <h3>❏ CuddleSnaps Gallery | Register</h3>
        </a>
    </header>

    <main>
        <hr>
        <?php if ($registerState == 'new' || $registerState == 'error') { ?>
            <div class="form_position_container">
                <div class="form_container">
                    <?php if ($registerState == 'error') { ?>
                        <h3><b>Error. Please try again.</b></h3>
                    <?php } ?>
                    <h3>Create Your Account</h3>
                    <form id="createAccountForm" action="new_account_db.php" method="post">
                        <label for="firstname">First Name<sup>(*)</sup>:</label>
                        <input type="text" name="firstname" style="width: 200px;" maxlength="20" placeholder="First Name">
                        <label for="lastname">Last Name<sup>(*)</sup>:</label>
                        <input type="text" name="lastname" style="width: 200px;" maxlength="20" placeholder="Last Name">
                        <label for="emailaddress">Email Address<sup>(*)</sup>:</label>
                        <input type="text" name="emailaddress" style="width: 200px;" maxlength="40" placeholder="Email Address">
                        <label for="password">Password<sup>(*)</sup>:</label>
                        <input type="password" name="password" style="width: 200px;" maxlength="12" placeholder="Password">
                        <input class="header_button control_button" type="submit" value="Submit">
                        <a href="index.php"><button id="cancel_album_form" class="header_button control_button" type="button">Cancel</button></a>
                    </form>
                </div>
            </div>
        <?php } else { ?>
            <h3>Your Accrount Created Successfully</h3>
            <a href="login.php"><button class="header_button">Login</button></a>
        <?php } ?>

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