<?php
require_once '../config/config.php';
include "../db.php";

$code = $_GET['code'] ?? null;

if (!$code) {
    echo "GitHub login failed";
    exit;
}

// Exchange code for access token
$token_url = "https://github.com/login/oauth/access_token";

$data = [
    'client_id' => $_ENV['GITHUB_CLIENT_ID'],
    'client_secret' => $_ENV['GITHUB_CLIENT_SECRET'],
    'code' => $code,
    'redirect_uri' => $_ENV['GITHUB_REDIRECT_URI']
];

$options = [
    'http' => [
        'header' => "Accept: application/json\r\nContent-Type: application/x-www-form-urlencoded",
        'method' => 'POST',
        'content' => http_build_query($data)
    ]
];

$context = stream_context_create($options);
$response = file_get_contents($token_url, false, $context);
$token = json_decode($response, true);

if (!isset($token['access_token'])) {
    echo "GitHub token error";
    exit;
}

// Get user info
$user_info = file_get_contents(
    "https://api.github.com/user",
    false,
    stream_context_create([
        'http' => [
            'header' => "User-Agent: PHP-App\r\nAuthorization: token " . $token['access_token']
        ]
    ])
);

$user = json_decode($user_info, true);
$email = $user['email'] ?? $user['login'] . "@github.com";

// Insert or login user
$sql = "SELECT * FROM users WHERE email='$email'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 0) {
    mysqli_query($conn, "INSERT INTO users (email, password) VALUES ('$email','')");
}

session_start();
$_SESSION['email'] = $email;

header("Location: ../index.html");
exit;
?>