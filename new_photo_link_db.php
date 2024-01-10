<?php
$conn = new mysqli("localhost", "root", "", "test");
$useridValue = $_POST['userid'];
$albumnameValue = $_POST['albumName'];
$urlValue = $_POST['photoURL'];
$descriptionValue = $_POST['photoDescription'];
$tagValue = $_POST['photoTag'];

$sql = "INSERT INTO `violet_photos` (user_id, albumName, tags, src_url, alt_description) VALUES ('$useridValue', '$albumnameValue', '$tagValue', '$urlValue','$descriptionValue')";
if ($conn->query($sql) === TRUE) {
    echo "New Photoe uploaded successfully";
    header("Location: manage_your_album.php?varToPass=" . urlencode($albumnameValue));
    exit;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    // header("Location: manage_your_album.php");
    exit;
}
