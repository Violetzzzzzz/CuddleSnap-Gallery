<?php
$conn = new mysqli("localhost", "root", "", "test");
$useridValue = $_POST['userid'];
$albumnameValue = $_POST['albumname'];
$descriptionValue = $_POST['albumdescription'];
$sql = "INSERT INTO `violet_albums` (user_id, albumName, album_description) VALUES ('$useridValue', '$albumnameValue', '$descriptionValue')";
if ($conn->query($sql) === TRUE) {
    echo "New Album created successfully";
    header("Location: manage_your_album.php");
    exit;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    header("Location: manage_your_album.php");
    exit;
}
