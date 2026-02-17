<?php
require_once '../config/config.php';

$params = [
    'client_id' => $_ENV['GITHUB_CLIENT_ID'],
    'redirect_uri' => $_ENV['GITHUB_REDIRECT_URI'],
    'scope' => 'user:email'
];

$url = "https://github.com/login/oauth/authorize?" . http_build_query($params);

header("Location: " . $url);
exit;
?>