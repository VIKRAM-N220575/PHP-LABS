<?php
$fileName = $_FILES['file']['name'];
$tmpName  = $_FILES['file']['tmp_name'];

$destination = "uploads/" . basename($fileName);

if (move_uploaded_file($tmpName, $destination)) {

    echo "<h2>Upload Successful</h2>";
    echo "File: $fileName <br><br>";

    echo "<a href='download.php?file=$fileName'>⬇ Download File</a>";
}
?>
