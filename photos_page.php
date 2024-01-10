<?php
session_start();
$conn = new mysqli("localhost", "root", "", "test");
$userid;
if (isset($_SESSION['user_id'])) {
    $userid = $_SESSION['user_id'];
} else {
    header("Location: login.php");
    exit();
}

$keyWord = 'none';
$receivedVariable = isset($_GET['varToPass']) ? urldecode($_GET['varToPass']) : '';
if ($receivedVariable != null) {
    $keyWord = $receivedVariable;
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
    <title>CuddleSnaps Gallery | Photos</title>
    <link rel="icon" href="favicon.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="generalStyle.css">
    <link rel="stylesheet" type="text/css" href="photoStyle.css">
</head>

<body style="background-color:lavenderblush">
    <header>
        <a href="/project1/index.php" style="text-decoration: none;">
            <h3>❏ CuddleSnaps Gallery | Photos</h3>
        </a>
        <div class="header_button_container">
            <a href="build_your_gallery.php"><button class="header_button">Gallery</button></a>
            <a href="manage_your_album.php"><button class="header_button">Albums</button></a>
            <button class="clicked_header_button">Photos</button>
            <button style="cursor: not-allowed;" class="header_button">Videos</button>
            <a href="logout.php"><button class="header_button" id="profile_button"></button></a>
        </div>
    </header>
    <main>
        <hr>
        <div class="header_button_container">
            <form action="photo_search.php" method="post">
                <label style="display: none;" for="userid">User ID:</label>
                <input style="display: none;" type="text" name="userid" value="<?php echo $userid; ?>" readonly>
                <label for="search">
                    <h3>Search photos:</h3>
                </label>
                <input style="font-size: 60px;" type="search" id="search" name="q" placeholder="Search tags or description to get photos">
                <input class="header_button control_button" type="submit" value="Search">
            </form>
        </div>
        <div id="photos_display_container">
            <?php if ($keyWord !== 'none') {
                $searchTerm = $keyWord;
                echo $keyWord;
                $result1 = $conn->query("SELECT `src_url` as imgURL, `alt_description` as imgDes FROM `violet_photos` WHERE `user_id` = '$userid' AND (`albumName` LIKE '%$searchTerm%' 
                OR `tags` LIKE '%$searchTerm%' OR `alt_description` LIKE '%$searchTerm%');");
                if ($result1->num_rows > 0) {
                    foreach ($result1 as $row1) { ?>
                        <img class="photo_search_item" width="420" src="<?php echo $row1['imgURL']; ?>" alt="<?php echo $row1['imgDes']; ?>">
                    <?php }
                } else {
                    echo "<p>No photos found.</p>";
                }
            } else {
                $result2 = $conn->query("SELECT `src_url` as imgURL, `alt_description` as imgDes FROM `violet_photos` WHERE `user_id` = '$userid' ;");
                if ($result2->num_rows > 0) {
                    foreach ($result2 as $row2) { ?>
                        <img class="photo_search_item" width="420" src="<?php echo $row2['imgURL']; ?>" alt="<?php echo $row2['imgDes']; ?>">
            <?php }
                }
            } ?>
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