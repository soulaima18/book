<?php
require_once "vendor/autoload.php";

$client = new Google_Client(["client_id" => "YOUR_GOOGLE_CLIENT_ID"]);
$payload = $client->verifyIdToken(json_decode(file_get_contents("php://input"))->credential);

if ($payload) {
    session_start();
    $_SESSION["user"] = $payload["email"];
    echo json_encode(["status" => "success", "message" => "تم تسجيل الدخول بنجاح باستخدام Google!"]);
} else {
    echo json_encode(["status" => "error", "message" => "فشل تسجيل الدخول عبر Google."]);
}
?>
