<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // التحقق من صحة البريد الإلكتروني
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) || !preg_match("/@gmail\.com$/", $email)) {
        echo json_encode(["status" => "error", "message" => "البريد الإلكتروني غير صحيح أو غير مدعوم!"]);
        exit;
    }

    // التحقق من قوة كلمة المرور
    if (strlen($password) < 8 || !preg_match("/[A-Za-z]/", $password) || !preg_match("/[0-9]/", $password)) {
        echo json_encode(["status" => "error", "message" => "يجب أن تحتوي كلمة المرور على 8 أحرف على الأقل، وتشمل أرقامًا وحروفًا."]);
        exit;
    }

    // محاكاة التحقق مما إذا كان البريد موجودًا في قاعدة بيانات (هنا نستخدم مثالًا بسيطًا)
    $existingEmails = ["test@gmail.com", "example@gmail.com"]; // قاعدة بيانات تجريبية
    if (in_array($email, $existingEmails)) {
        echo json_encode(["status" => "error", "message" => "البريد الإلكتروني مسجل مسبقًا."]);
        exit;
    }

    // إذا مر كل شيء بنجاح
    echo json_encode(["status" => "success", "message" => "تم إنشاء الحساب بنجاح!"]);
}
?>
