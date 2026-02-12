<?php
echo "<h3>File Functions</h3>";
$file=fopen("sample-1.txt","r") or die("Unable to open file!");
echo fread($file,filesize("sample-1.txt"));
fclose($file);
$fw=fopen("write.txt","w") or die("Unable to open file!");
$txt="Hello World\n";
fwrite($fw,$txt);
$txt="Welcome to PHP Programming\n";
fwrite($fw,$txt);
fclose($fw);
$content=file_get_contents("sample-1.txt");
echo $content;
$puts=file_put_contents("write.txt","This is a new line.\n",FILE_APPEND);
echo "<br>";
echo "Number of bytes written: " . $puts . "<br>";
$lines = file("write.txt");
foreach ($lines as $line) {
    echo $line . "<br>";
}
echo "<br>";
echo "<h3>File Information:</h3><br>";
if (file_exists("write.txt")) {
    echo "The file write.txt exists.";
} else {
    echo "The file write.txt does not exist.";
}
$size = filesize("write.txt");
echo "<br>";
echo "File size: $size bytes";
echo "<br>";
$ftype = filetype("write.txt");
echo "File type: $ftype";
echo "<br>";
$fatime=fileatime("write.txt");
echo "File last accessed: " . date("F d Y H:i:s.", $fatime);
echo "<br>";
$fmtime=filemtime("write.txt");
echo "File last modified: " . date("F d Y H:i:s.", $fmtime);
echo "<br>";
$fctime=filectime("write.txt");
echo "File created: " . date("F d Y H:i:s.", $fctime);
echo "<br>";
$fperm=fileperms("write.txt");
echo "File permissions: " . substr(sprintf('%o', $fperm), -4);
echo "<br>";
$fowner=fileowner("write.txt");
echo "File owner: " . $fowner;
echo "<br>";
$fgroup=filegroup("write.txt");
echo "File group: " . $fgroup;
echo "<br>";
$finode=fileinode("write.txt");
echo "Finode :".$finode;
echo "<br>";

echo "<h3>File & Folder Management</h3><br>";
copy("sample-1.txt","copy-sample-1.txt");
rename("copy-sample-1.txt","renamed-sample-1.txt");
unlink("renamed-sample-1.txt");
mkdir("new_folder");
rmdir("new_folder");
if (is_file("sample-1.txt")) {
    echo "sample-1.txt is a file.";
} else {
    echo "sample-1.txt is not a file.";
}
echo "<br>";
if (is_dir("new_folder")) {
    echo "new_folder is a directory.";
} else {
    echo "new_folder is not a directory.";
}


echo "<h3>Directory Handling:</h3><br>";
echo getcwd() . "<br><br>";

if (!is_dir("uploads")) {
    mkdir("uploads");
}

$files = scandir("uploads");
foreach ($files as $file) {
    if ($file != "." && $file != "..") {
        echo $file . "<br>";
    }
}

echo "<br>";

$dir = opendir("uploads");
while (($file = readdir($dir)) !== false) {
    if ($file != "." && $file != "..") {
        echo $file . "<br>";
    }
}
closedir($dir);

chdir("uploads");
echo "<br>" . getcwd();
?>