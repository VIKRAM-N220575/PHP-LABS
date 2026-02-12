<?php
include "db.php";

$username = $_POST['username'];
$email    = $_POST['email'];
$password = $_POST['password'];

$hashed = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO users(username,email,password)
        VALUES('$username','$email','$hashed')";

if(mysqli_query($conn,$sql)){
    // redirect to login page
    header("Location: login.html");
    exit();
}
else{
    echo "Registration Failed";
}
?>
