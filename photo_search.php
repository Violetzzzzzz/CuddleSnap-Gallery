<?php
$searchValue = $_POST['q'];
if ($searchValue != null) {
    header("Location: photos_page.php?varToPass=" . urlencode($searchValue));
} else {
    echo "Error: empty search term ";
    $searchValue = "emmpppttttyyyyy";
    header("Location: photos_page.php?varToPass=" . urlencode($searchValue));
    exit;
}
