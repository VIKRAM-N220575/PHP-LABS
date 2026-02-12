<?php
// Get file name safely
if (!isset($_GET['file'])) {
    die("❌ No file specified");
}

$file = basename($_GET['file']);   // prevents ../ attacks
$filePath = "uploads/" . $file;

// Check if file exists
if (!file_exists($filePath)) {
    die("❌ File not found");
}

// Send headers to force download
header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="' . basename($filePath) . '"');
header('Content-Length: ' . filesize($filePath));
header('Pragma: public');
header('Cache-Control: must-revalidate');
header('Expires: 0');

// Clear output buffer (important)
ob_clean();
flush();

// Read the file
readfile($filePath);
exit;
?>
