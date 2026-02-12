<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "userdb";

$conn = mysqli_connect("localhost","root","","userdb",3307);

if(!$conn){
    die("Database connection failed");
}
?>
