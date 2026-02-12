<?php
$file = basename($_GET['file']);
$filePath = "uploads/" . $file;

if (!file_exists($filePath)) {
    die("File not found");
}

header("Content-Type: application/octet-stream");
header("Content-Disposition: attachment; filename=\"$file\"");
header("Content-Length: " . filesize($filePath));

readfile($filePath);
exit;
?>
