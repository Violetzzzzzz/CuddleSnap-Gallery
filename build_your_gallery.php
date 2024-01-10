<?php
session_start();
$conn = new mysqli("localhost", "root", "", "test");
$displayMode = 'none';
$userid;

if (isset($_SESSION['user_id'])) {
    $userid = $_SESSION['user_id'];
} else {
    header("Location: login.php");
    exit();
}

if (isset($_REQUEST['displayMode'])) {
    $displayMode = $_REQUEST['displayMode'];
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
    <title>CuddleSnaps Gallery | Welcome</title>
    <link rel="icon" href="favicon.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="generalStyle.css">
    <link rel="stylesheet" type="text/css" href="galleryStyle.css">
</head>

<body style="background-color:lavenderblush">
    <header>
        <a href="/project1/index.php" style="text-decoration: none;">
            <h3>❏ CuddleSnaps Gallery | Welcome
                <?php if ($userid != null) {
                    $result0 = $conn->query("SELECT `firstname` as username FROM `users` WHERE `id` = '$userid';");
                    $row = $result0->fetch_assoc();
                    $username = $row['username'];
                    echo $username;
                }  ?></h3>
        </a>
        <div class="header_button_container">
            <button class="clicked_header_button">Gallery</button>
            <a href="manage_your_album.php"><button class="header_button">Albums</button></a>
            <a href="photos_page.php"><button class="header_button">Photos</button></a>
            <button style="cursor: not-allowed;" class="header_button">Videos</button>
            <a href="logout.php"><button class="header_button" id="profile_button"></button></a>
        </div>
    </header>
    <main>
        <hr>
        <div class="header_button_container">
            <div id="gallery_displays_dropdown">
                <button style="cursor: not-allowed;" class="header_button">Current Display</button>
                <div class="dropdown-content">
                    <a href="#">Item 1</a>
                    <a href="#">Item 2</a>
                    <a href="#">Item 3</a>
                </div>
            </div>
            <!-- <a href="?displayMode=createNewDisplay"> -->
            <button style="cursor: not-allowed;" class="header_button">New Display</button>
            <!-- </a> -->
        </div>
        <br>
        <?php
        if ($displayMode === 'none') { ?>
            <div class="scroll_container">
                <?php
                $result2 = $conn->query("SELECT `src_url` as photoURL, 
                `alt_description` as photoDescription FROM `violet_photos` WHERE `user_id` = '$userid' ORDER BY RAND() LIMIT 6;");
                if ($result2->num_rows > 0) {
                    foreach ($result2 as $row2) {
                ?>
                        <img class="gallery_display_item gallery_display1_item" width="420" src="<?php echo $row2['photoURL']; ?>" alt="<?php echo $row2['photoDescription']; ?>">
                <?php }
                } ?>
            </div>
        <?php } else if ($displayMode === 'createNewDisplay') { ?>
            <h3>Choose a album to get photo</h3>
            <div class="header_button_container">
                <?php
                $result1 = $conn->query("SELECT `albumName` as albumName FROM `violet_albums`;");
                if ($result1->num_rows > 0) {
                    foreach ($result1 as $row1) { ?>
                        <a href=""><button class="header_button control_button"><?php echo $row1['albumName']; ?></button></a>
                <?php }
                } ?>
            </div>
        <?php } ?>


    </main>
    <footer>
        <hr>
        <br>
        <a href="https://www.linkedin.com/in/chi-zhang-7b16b9284">
            <img width="20" src="/Linkedin-icon-design-premium-vector-PNG.png" alt="This is a link to Violet's LinkedIn "></a>
        <p>Violet Zhang</p>
    </footer>
    <script type="module" src="galleryJS.js"></script>
</body>

</html>