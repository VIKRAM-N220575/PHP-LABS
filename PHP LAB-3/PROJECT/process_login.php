<?php
include "db.php";

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email='$email'";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result)==1){

    $row = mysqli_fetch_assoc($result);

    if(password_verify($password,$row['password'])){
        // redirect to home page
        header("Location: index.html");
        exit();
    }
    else{
        echo "Wrong Password";
    }

}else{
    echo "User Not Found";
}
?>
