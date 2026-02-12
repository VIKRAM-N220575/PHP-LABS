<?php
echo "<h3>File Operation Modes</h3>";
$fread = fopen("file.txt", "r");
if ($fread) {
    echo "File opened successfully in read mode.";
    fclose($fread);
} else {
    echo "Failed to open the file in read mode.";
}
echo "<br>";
$fwrite = fopen("file.txt", "w");
if ($fwrite) {
    echo "File opened successfully in write mode.";
    fclose($fwrite);
} else {
    echo "Failed to open the file in write mode.";
}
echo "<br>";
$fappend = fopen("file.txt", "a");
if ($fappend) {
    echo "File opened successfully in append mode.";
    fclose($fappend);
} else {
    echo "Failed to open the file in append mode.";
}
echo "<br>";
$fxread = fopen("file.txt", "x");
if ($fxread) {
    echo "File opened successfully in exclusive create mode.";
    fclose($fxread);
} else {
    echo "Failed to open the file in exclusive create mode (file may already exist).";
}
echo "<br>";
$freadwrite = fopen("file.txt", "r+");
if ($freadwrite) {
    echo "File opened successfully in read/write mode.";
    fclose($freadwrite);
} else {
    echo "Failed to open the file in read/write mode.";
}
echo "<br>";
$fwriteonly = fopen("file.txt", "w+");
if ($fwriteonly) {
    echo "File opened successfully in write/read mode.";
    fclose($fwriteonly);
} else {
    echo "Failed to open the file in write/read mode.";
}
echo "<br>";
$fappendread = fopen("file.txt", "a+");
if ($fappendread) {
    echo "File opened successfully in append/read mode.";
    fclose($fappendread);
} else {
    echo "Failed to open the file in append/read mode.";
}
$fxreadwrite = fopen("file.txt", "x+");
if ($fxreadwrite) {
    echo "File opened successfully in exclusive create read/write mode.";
    fclose($fxreadwrite);
} else {
    echo "Failed to open the file in exclusive create read/write mode (file may already exist).";
}
?>