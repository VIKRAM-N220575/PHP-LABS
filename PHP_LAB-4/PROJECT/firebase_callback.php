<?php
$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data['token'])) {
    http_response_code(400);
    exit("No token");
}

session_start();
$_SESSION['firebase_user'] = true;

http_response_code(200);
?>