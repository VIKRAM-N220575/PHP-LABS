<?php
require_once 'config/config.php';
include "db.php";

/*
|--------------------------------------------------------------------------
| CASE 1: GOOGLE OAUTH CALLBACK
|--------------------------------------------------------------------------
| If Google redirects back, it sends ?code=....
*/
if (isset($_GET['code'])) {

    $code = $_GET['code'];

    // Exchange code for access token
    $token_url = "https://oauth2.googleapis.com/token";

    $data = [
        'code' => $code,
        'client_id' => $_ENV['GOOGLE_CLIENT_ID'],
        'client_secret' => $_ENV['GOOGLE_CLIENT_SECRET'],
        'redirect_uri' => $_ENV['GOOGLE_REDIRECT_URI'],
        'grant_type' => 'authorization_code'
    ];

    $options = [
        'http' => [
            'header'  => "Content-Type: application/x-www-form-urlencoded",
            'method'  => 'POST',
            'content' => http_build_query($data)
        ]
    ];

    $context = stream_context_create($options);
    $response = file_get_contents($token_url, false, $context);
    $token = json_decode($response, true);

    if (!isset($token['access_token'])) {
        echo "Google authentication failed";
        exit;
    }

    // Fetch user info from Google
    $user_info = file_get_contents(
        "https://www.googleapis.com/oauth2/v2/userinfo?access_token=" . $token['access_token']
    );

    $user = json_decode($user_info, true);

    $email = $user['email'];
    $name  = $user['name'];

    // Check if user already exists
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 0) {
        // New Google user → insert into DB
        $insert = "INSERT INTO users (email, password) VALUES ('$email', '')";
        mysqli_query($conn, $insert);
    }

    // Login successful
    session_start();
    $_SESSION['email'] = $email;

    header("Location: index.html");
    exit;
}

/*
|--------------------------------------------------------------------------
| CASE 2: NORMAL EMAIL + PASSWORD LOGIN
|--------------------------------------------------------------------------
*/
$email = $_POST['email'] ?? null;
$password = $_POST['password'] ?? null;

if (!$email || !$password) {
    echo "Invalid request";
    exit;
}

$sql = "SELECT * FROM users WHERE email='$email'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {

    $row = mysqli_fetch_assoc($result);

    if (password_verify($password, $row['password'])) {
        session_start();
        $_SESSION['email'] = $email;

        header("Location: index.html");
        exit();
    } else {
        echo "Wrong Password";
    }

} else {
    echo "User Not Found";
}

