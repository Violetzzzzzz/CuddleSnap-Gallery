<?php
session_start();
$conn = new mysqli("localhost", "root", "", "test");
$chosenAlbum = 'none';
$userid;
if (isset($_SESSION['user_id'])) {
    $userid = $_SESSION['user_id'];
} else {
    header("Location: login.php");
    exit();
}

if (isset($_REQUEST['chosenAlbum'])) {
    $chosenAlbum = $_REQUEST['chosenAlbum'];
}

$receivedVariable = isset($_GET['varToPass']) ? urldecode($_GET['varToPass']) : '';
if ($receivedVariable != null) {
    $chosenAlbum = "Album: " . $receivedVariable;
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
    <title>CuddleSnaps Gallery | Manage Your Albums</title>
    <link rel="icon" href="favicon.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="generalStyle.css">
    <link rel="stylesheet" type="text/css" href="albumStyle.css">
</head>

<body style="background-color:lavenderblush">
    <header>
        <a href="/project1/index.php" style="text-decoration: none;">
            <h3>❏ CuddleSnaps Gallery | Manage Your Albums</h3>
        </a>
        <div class="header_button_container">
            <a href="build_your_gallery.php"><button class="header_button">Gallery</button></a>
            <button class="clicked_header_button">Albums</button>
            <a href="photos_page.php"><button class="header_button">Photos</button></a>
            <button style="cursor: not-allowed;" class="header_button">Videos</button>
            <a href="logout.php"><button class="header_button" id="profile_button"></button></a>
        </div>
    </header>
    <main>
        <hr>
        <?php if ($chosenAlbum == 'none') { ?>
            <div id="albums_container" class="albumpage_scroll_container">
                <div id="add_album" class="album_container">
                    <div class="album_image_container"><img width="100" src="addImage.png" alt="Plus icon image"></div>
                    <h5 class="album_title">New Album</h5>
                </div>
                <?php
                $result1 = $conn->query("SELECT `albumName` as albumName FROM `violet_albums` WHERE `user_id` = '$userid';");
                if ($result1->num_rows > 0) {
                    foreach ($result1 as $row1) {
                        $albumName = $row1['albumName'];
                        $result2 = $conn->query("SELECT DISTINCT `src_url` as imgURL FROM `violet_photos` WHERE `user_id` = '$userid' AND `albumName` = '$albumName' LIMIT 1;");
                ?>
                        <a href="?chosenAlbum=<?php echo 'Album: ', $row1['albumName']; ?>">
                            <div id="<?php echo $row1['albumName']; ?>_album_detail" class="album_container">
                                <?php if ($result2->num_rows > 0) {
                                    foreach ($result2 as $row2) { ?>
                                        <div class="album_image_container"><img width="100" src="<?php echo $row2['imgURL']; ?>" alt="Plus icon image"></div>
                                <?php }
                                } ?>
                                <h5 class="album_title"><?php echo $row1['albumName']; ?></h5>
                            </div>
                        </a>
                <?php
                    }
                }
                ?>
            </div>
        <?php } ?>



        <div id="new_album_form">
            <div class="new_album_container">
                <h3>Create a new album</h3>
                <form id="newAlbumForm" action="new_album_db.php" method="post">
                    <label style="display: none;" for="userid">User ID:</label>
                    <input style="display: none;" type="text" name="userid" value="<?php echo $userid; ?>" readonly>
                    <label for="albumname">Album Name<sup>(*)</sup>:</label>
                    <input type="text" name="albumname" style="width: 200px;" placeholder="Enter your album name">
                    <label for="albumdescription">Album Description:</label>
                    <textarea name="albumdescription" rows="4" cols="50" placeholder="Enter your album description"></textarea>
                    <input class="header_button control_button" type="submit" value="Submit">
                    <button id="cancel_album_form" class="header_button control_button" type="button">Cancel</button>
                </form>
            </div>
        </div>

        <?php if (strpos($chosenAlbum, 'Album: ') !== false) { ?>
            <h3><?php echo $chosenAlbum; ?></h3>
            <div id="album_detail_container" class="albumpage_scroll_container">
                <a href="?chosenAlbum=addPhoto_<?php echo substr($chosenAlbum, strlen('Album: ')); ?>">
                    <div id="add_photo" class="photo_container">
                        <img class="album_image_icon" width="200" src="addImage.png" alt="Plus icon image">
                        <h5 class="photo_tags">New Photo</h5>
                    </div>
                </a>
                <?php
                $album = substr($chosenAlbum, strlen('Album: '));
                $stmt = $conn->prepare("SELECT `tags` as photoTags, `src_url` as photoURL, 
                         `alt_description` as photoDescription FROM `violet_photos` WHERE `albumName` = ?;");
                $stmt->bind_param("s", $album);
                $stmt->execute();
                $result = $stmt->get_result();
                if ($result->num_rows > 0) {
                    foreach ($result as $row) {
                ?>
                        <div class="photo_container">
                            <img class="album_image_icon" width="200" src="<?php echo $row['photoURL']; ?>" alt="<?php echo $row['photoDescription']; ?>">
                            <h5 class="photo_tags">Tag: /<?php echo $row['photoTags']; ?></h5>
                        </div>
                <?php
                    }
                }
                ?>


            </div>
            <br>
            <a href="?chosenAlbum=none">
                <button id="back_to_albums_button" class="header_button control_button" type="button">Back</button>
            </a>
        <?php } ?>

        <?php if (strpos($chosenAlbum, 'addPhoto') !== false) { ?>
            <div id="add_photo_container">
                <h3>Add A New Photo</h3>

                <a href="?chosenAlbum=<?php echo 'add_local_photo_', substr($chosenAlbum, strlen('addPhoto_')); ?>">
                    <button id="add_local_photo_button" class="header_button control_button" type="button">Local Photo</button>
                </a>

                <a href="?chosenAlbum=<?php echo 'add_link_photo_', substr($chosenAlbum, strlen('addPhoto_')); ?>">
                    <button id="add_external_photo_button" class="header_button control_button" type="button">Web Photo (by link)</button>
                </a>

                <a href="?chosenAlbum=<?php echo 'Album: ', substr($chosenAlbum, strlen('addPhoto_')); ?>">
                    <button id="add_back_button" class="header_button control_button" type="button">Back</button>
                </a>
            </div>
        <?php } ?>

        <?php if (strpos($chosenAlbum, 'add_local_photo_') !== false) {
            $albumName = substr($chosenAlbum, strlen('add_local_photo_'));
        ?>
            <div style="display:flex; flex-direction:column; text-align:center; align-items:center;">
                <div id="upload_photo_container">
                    <h3>Upload A New Photo</h3>
                    <form action="new_photo_db.php" method="post" enctype="multipart/form-data">
                        <label style="display: none;" for="userid">User ID:</label>
                        <input style="display: none;" type="text" name="userid" value="<?php echo $userid; ?>" readonly>
                        <label for="albumName">Album:</label>
                        <input type="text" name="albumName" value="<?php echo $albumName; ?>" readonly>
                        <label for="fileUpload">Choose a local image<sup>(*)</sup>:</label>
                        <input type="file" name="fileUpload" accept="image/jpeg, image/png, image/gif">
                        <label for="photoDescription">Photo Description:</label>
                        <textarea name="photoDescription" rows="4" cols="50" placeholder="Enter your photo description"></textarea>
                        <label for="photoTag">Photo Tag:</label>
                        <input type="text" name="photoTag" style="width: 200px;" placeholder="Enter your photo tag">
                        <input class="header_button control_button" type="submit" value="Submit">
                        <a href="?chosenAlbum=<?php echo 'addPhoto_', substr($chosenAlbum, strlen('add_local_photo_')); ?>">
                            <button id="cancel_photo_form" class="header_button control_button" type="button">Cancel</button>
                        </a>
                    </form>
                </div>
            </div>
        <?php } ?>

        <?php if (strpos($chosenAlbum, 'add_link_photo_') !== false) {
            $albumName = substr($chosenAlbum, strlen('add_link_photo_'));
        ?>
            <div style="display:flex; flex-direction:column; text-align:center; align-items:center;">
                <div id="link_photo_container">
                    <h3>Add A New Photo By Link</h3>
                    <form action="new_photo_link_db.php" method="post">
                        <label style="display: none;" for="userid">User ID:</label>
                        <input style="display: none;" type="text" name="userid" value="<?php echo $userid; ?>" readonly>
                        <label for="albumName">Album:</label>
                        <input type="text" name="albumName" value="<?php echo $albumName; ?>" readonly>
                        <label for="photoURL">Photo URL<sup>(*)</sup>:</label>
                        <textarea name="photoURL" rows="10" cols="50" placeholder="Enter your photo url"></textarea>
                        <label for="photoDescription">Photo Description:</label>
                        <textarea name="photoDescription" rows="4" cols="50" placeholder="Enter your photo description"></textarea>
                        <label for="photoTag">Photo Tag:</label>
                        <input type="text" name="photoTag" style="width: 200px;" placeholder="Enter your photo tag">
                        <input class="header_button control_button" type="submit" value="Submit">
                        <a href="?chosenAlbum=<?php echo 'addPhoto_', substr($chosenAlbum, strlen('add_link_photo_')); ?>">
                            <button id="cancel_photo_form" class="header_button control_button" type="button">Cancel</button>
                        </a>
                    </form>
                </div>
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
    <script type="module" src="albumJS.js"></script>
</body>


</html>