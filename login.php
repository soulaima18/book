<?php
session_start();
header("Content-Type: application/json");

// قاعدة بيانات وهمية للمستخدمين
$users = [
    ["email" => "user1@gmail.com", "password" => "password123"],
    ["email" => "test@gmail.com", "password" => "Test@1234"]
];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    foreach ($users as $user) {
        if ($user["email"] == $email && $user["password"] == $password) {
            $_SESSION["user"] = $email;
            echo json_encode(["status" => "success", "message" => "تم تسجيل الدخول بنجاح!"]);
            exit;
        }
    }
    echo json_encode(["status" => "error", "message" => "البريد الإلكتروني أو كلمة المرور غير صحيحة."]);
}
?>
