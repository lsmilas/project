<?php
// الاتصال بقاعدة البيانات
$servername = "localhost";
$username = "root"; // اسم المستخدم لقاعدة البيانات
$password = ""; // كلمة المرور (قد تكون فارغة في بيئات التطوير)
$dbname = "portfolio_db"; // اسم قاعدة البيانات
$port = 3307; // رقم المنفذ

// إنشاء الاتصال مع تحديد المنفذ
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}


// التحقق من وجود البيانات المرسلة عبر النموذج
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // جمع البيانات
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // التحقق من أن الحقول غير فارغة
    if (empty($name) || empty($email) || empty($message)) {
        echo "الرجاء ملء جميع الحقول.";
    } 
    // التحقق من صحة البريد الإلكتروني
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "الرجاء إدخال بريد إلكتروني صالح.";
    } 
    else {
        // استعلام لإدخال البيانات في قاعدة البيانات
        $sql = "INSERT INTO contacts (name, email, message) VALUES ('$name', '$email', '$message')";

        if ($conn->query($sql) === TRUE) {
            echo "تم إرسال الرسالة بنجاح!";
        } else {
            echo "خطأ في الإدخال: " . $conn->error;
        }
    }
}

// إغلاق الاتصال بقاعدة البيانات
$conn->close();
?>
