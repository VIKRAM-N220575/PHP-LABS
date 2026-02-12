<?php
$fileName = $_FILES['file']['name'];
$tmpName  = $_FILES['file']['tmp_name'];

$destination = "uploads/" . basename($fileName);

move_uploaded_file($tmpName, $destination);
header("Location: index.php");
?>
