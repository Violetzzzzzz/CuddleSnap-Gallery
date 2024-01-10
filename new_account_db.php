<?php
$conn = new mysqli("localhost", "root", "", "test");
$firstnameValue = $_POST['firstname'];
$lastnameValue = $_POST['lastname'];
$emailValue = $_POST['emailaddress'];
$passwordValue = $_POST['password'];
$hashed_password = password_hash($passwordValue, PASSWORD_DEFAULT);

$sql = "INSERT INTO `users` (firstname, lastname, email, `password`) VALUES ('$firstnameValue', '$lastnameValue', '$emailValue', '$hashed_password')";
if ($conn->query($sql) === TRUE) {
    echo "New Accrount Created Successfully";
    $varToPass = "done";
    header("Location: register.php?varToPass=" . urlencode($varToPass));
    exit;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    $varToPass = "error";
    header("Location: register.php?varToPass=" . urlencode($varToPass));
    exit;
}
