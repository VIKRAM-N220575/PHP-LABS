<?php
$name     = $_POST['name'];
$email    = $_POST['email'];
$location = $_POST['location'];
$reason   = $_POST['reason'];

$baseDir = "uploads/refunds/";
$paymentDir = $baseDir . "payment_proofs/";
$itemDir    = $baseDir . "item_photos/";

if (!is_dir($paymentDir)) mkdir($paymentDir, 0777, true);
if (!is_dir($itemDir)) mkdir($itemDir, 0777, true);

$maxSize = 5 * 1024 * 1024;

$payTmp  = $_FILES['payment_proof']['tmp_name'];
$paySize = $_FILES['payment_proof']['size'];

if ($paySize > $maxSize) {
    die("❌ Payment proof file is too large");
}

$payNewName = "payment_" . time() . "_" . uniqid();
$payPath = $paymentDir . $payNewName;

move_uploaded_file($payTmp, $payPath);

$itemTmp  = $_FILES['item_photo']['tmp_name'];
$itemSize = $_FILES['item_photo']['size'];

if ($itemSize > $maxSize) {
    die("❌ Item photo file is too large");
}

$itemNewName = "item_" . time() . "_" . uniqid();
$itemPath = $itemDir . $itemNewName;

move_uploaded_file($itemTmp, $itemPath);

echo "<h2>✅ Refund Request Submitted</h2>";
echo "<b>Name:</b> $name <br>";
echo "<b>Email:</b> $email <br>";
echo "<b>Location:</b> $location <br>";
echo "<b>Reason:</b> $reason <br><br>";

echo "<h3>Download Your Uploaded Files</h3>";
echo "<a href='download.php?file=$payPath'>⬇ Download Payment Proof</a><br><br>";
echo "<a href='download.php?file=$itemPath'>⬇ Download Item Photo</a><br><br>";

echo "<a href='refund.html'>⬅ Go Back</a>";
?>
