<?php
$file = basename($_GET['file']);
$filePath = "uploads/" . $file;

if (file_exists($filePath)) {
    unlink($filePath);
}

header("Location: index.php");
?>
