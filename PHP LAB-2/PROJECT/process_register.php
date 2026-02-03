<?php
include "db.php";

/* -------- CLEAN INPUT -------- */
$username = trim($_POST['username']);
$email    = trim($_POST['email']);
$password = trim($_POST['password']);

/* -------- FORMAT DATA -------- */
$username = ucwords(strtolower($username));   // Proper name format

/* -------- VALIDATION -------- */
if(strlen($username) < 3){
    die("Username must be at least 3 characters long");
}

if(strlen($password) < 5){
    die("Password must be at least 5 characters long");
}

if(strpos($email,"@") === false){
    die("Invalid Email Format");
}

/* -------- SECURITY -------- */
$username = addslashes($username);
$email = addslashes($email);
$hashed = password_hash($password, PASSWORD_DEFAULT);

/* -------- INSERT -------- */
$sql = "INSERT INTO users(username,email,password)
        VALUES('$username','$email','$hashed')";

if(mysqli_query($conn,$sql)){
    header("Location: login.html");
    exit();
}
else{
    die("Registration Failed");
}
?>
