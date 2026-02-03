<?php
include "db.php";

/* -------- CLEAN INPUT -------- */
$email = trim($_POST['email']);
$password = trim($_POST['password']);

/* -------- QUERY -------- */
$sql = "SELECT * FROM users WHERE email='$email'";
$result = mysqli_query($conn,$sql);

if(!$result){
    die("Database Error");
}

/* -------- CHECK USER -------- */
if(mysqli_num_rows($result)==1){

    $row = mysqli_fetch_assoc($result);

    if(password_verify($password,$row['password'])){
        echo "Login Successful<br>";
        header("Location: index.html");
        exit();
    }
    else{
        print "Wrong Password";
    }

}
else{
    die("User Not Found");
}
?>
