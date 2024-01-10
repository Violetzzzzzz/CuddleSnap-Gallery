<?php
$conn = new mysqli("localhost", "root", "", "test");
$useridValue = $_POST['userid'];
$albumnameValue = $_POST['albumName'];
$descriptionValue = $_POST['photoDescription'];
$tagValue = $_POST['photoTag'];
if (isset($_FILES["fileUpload"]) && $_FILES["fileUpload"]["error"] == UPLOAD_ERR_OK) {
?>

    <?php
    $fileName = $_FILES["fileUpload"]["name"];
    $tempFilePath = $_FILES["fileUpload"]["tmp_name"];
    $imageInfo = getimagesize($tempFilePath);
    if ($imageInfo !== false && in_array($imageInfo["mime"], array("image/jpeg", "image/png", "image/gif"))) {
        $targetDirectory = "uploads/";
        if (!file_exists($targetDirectory)) {
            mkdir($targetDirectory, 0777, true);
        }
        $targetFilePath = $targetDirectory . $fileName;
        if (move_uploaded_file($tempFilePath, $targetFilePath)) {
            echo "File uploaded successfully! <br>";
        } else {
            echo "File upload failed.";
        }
    }
    ?>
    
<?php
    $sql = "INSERT INTO `violet_photos` (user_id, albumName, tags, src_url, alt_description) VALUES ('$useridValue','$albumnameValue', '$tagValue', '$targetFilePath','$descriptionValue')";
    if ($conn->query($sql) === TRUE) {
        echo "New Photoe uploaded successfully";
        header("Location: manage_your_album.php?varToPass=" . urlencode($albumnameValue));
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        // header("Location: manage_your_album.php");
        exit;
    }
} ?>