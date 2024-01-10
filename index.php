<?php
session_start();
$conn = new mysqli("localhost", "root", "", "test");
$result = $conn->query("SELECT `theme` as imgTheme FROM `homepage_image` ORDER BY RAND() LIMIT 1;");
foreach ($result as $row) {
  $theme = $row['imgTheme'];
}
if (isset($_REQUEST['theme'])) {
  $theme = $_REQUEST['theme'];
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
  <title>CuddleSnaps Gallery</title>
  <link rel="icon" href="favicon.png" type="image/x-icon">
  <link rel="stylesheet" type="text/css" href="generalStyle.css">
  <link rel="stylesheet" type="text/css" href="indexStyle.css">
</head>

<body style="background-color:lavenderblush">
  <header>
    <h3>❏ CuddleSnaps Gallery | Your Online Gallery</h3>
    <?php if (!isset($_SESSION['user_id'])) {
    ?>
      <div class="header_button_container">
        <a href="login.php"><button class="header_button">Login</button></a>
        <a href="register.php"><button class="header_button">Register</button></a>
      </div>
    <?php } ?>
  </header>
  <main>
    <hr>
    <div id="homepage_heading">
      <img class="homepage_heading_item" id="violet_flower" width=400 src="/project1/violet_flower.png" alt="This is a bunch of violet flowers">
      <div class="homepage_heading_item">
        <h1 id="title0">CuddleSnaps Gallery</h1>
        <p id="title0_description">Cherishing Moments, Embracing Smiles: Your Personal Photo Haven!</p>
        <a <?php
            if (isset($_SESSION['user_id'])) {
            ?> href="/project1/build_your_gallery.php" <?php } else { ?> href="login.php" <?php } ?>><button class="header_button" id="startbutton">Build Your Gallery</button></a>
      </div>
    </div>
    <hr>
    <div class="header_button_container">
      <?php
      $result = $conn->query("SELECT DISTINCT `theme` as imgTheme FROM `homepage_image`;");
      foreach ($result as $row) {
        if ($row['imgTheme'] == $theme) { ?>
          <button id="theme_<?php echo $row['imgTheme']; ?>" class="clicked_header_button"><?php echo $row['imgTheme']; ?></button>
        <?php } else {
        ?>
          <a href="?theme=<?php echo $row['imgTheme']; ?>"><button id="theme_<?php echo $row['imgTheme']; ?>" class="header_button"><?php echo $row['imgTheme']; ?></button></a>
        <?php } ?>
      <?php
      }
      ?>
    </div>
    <hr>

    <div id="homepage_display1">
      <?php
      $stmt = $conn->prepare("SELECT `src_url` as imgURL, `alt_description` as imgDescription FROM `homepage_image` WHERE `theme` = ?");
      $stmt->bind_param("s", $theme);
      $stmt->execute();
      $result = $stmt->get_result();

      foreach ($result as $row) {
      ?>
        <img class="homepage_display1_item" width="420" src="<?php echo $row['imgURL']; ?>" alt="<?php echo $row['imgDescription']; ?>">
      <?php
      }
      ?>
    </div>

  </main>
  <footer>
    <hr>
    <br>
    <a href="https://www.linkedin.com/in/chi-zhang-7b16b9284">
      <img width="20" src="/Linkedin-icon-design-premium-vector-PNG.png" alt="This is a link to Violet's LinkedIn "></a>
    <p>Violet Zhang</p>
  </footer>
  <!-- <script type="module" src="indexJS.js"></script> -->
</body>


</html>