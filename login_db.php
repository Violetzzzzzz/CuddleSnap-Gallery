<?php
$conn = new mysqli("localhost", "root", "", "test");
$emailValue = $_POST['emailaddress'];
$passwordValue = $_POST['password'];

$stmt = $conn->prepare("SELECT `password` AS hashedpassword, `id` AS userid FROM `users` WHERE `email` = ?");
$stmt->bind_param("s", $emailValue);
$stmt->execute();
$stmt->bind_result($hashedPassword, $userid);
if ($stmt->fetch()) {
    if (password_verify($passwordValue, $hashedPassword)) {
        session_start();
        $_SESSION['user_id'] = $userid;
        echo "Log In Successfully";
        header("Location: build_your_gallery.php");
        exit;
    } else {
        echo "Error: wrong password.";
        $varToPass = "wrongpassword";
        header("Location: login.php?varToPass=" . urlencode($varToPass));
        exit;
    }
} else {
    echo "Error: invalid email.";
    $varToPass = "wrongemail";
    header("Location: login.php?varToPass=" . urlencode($varToPass));
    exit;
}
$stmt->close();
