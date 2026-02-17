<?php
if (!isset($_GET['file'])) {
    die(" No file specified");
}

$filePath = $_GET['file'];

if (strpos($filePath, "uploads/") !== 0) {
    die(" Invalid file access");
}

if (!file_exists($filePath)) {
    die(" File not found");
}

header("Content-Description: File Transfer");
header("Content-Type: application/octet-stream");
header("Content-Disposition: attachment; filename=\"" . basename($filePath) . "\"");
header("Content-Length: " . filesize($filePath));
header("Cache-Control: must-revalidate");
header("Pragma: public");
header("Expires: 0");

ob_clean();
flush();

readfile($filePath);
exit;
?>
