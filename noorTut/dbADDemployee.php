<?php
// معلومات الاتصال بقاعدة البيانات
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "employees_db";

// إنشاء الاتصال
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// استلام بيانات الموظف من النموذج
$name = $_POST['name'];
$email = $_POST['email'];
$position = $_POST['position'];

// إضافة الموظف إلى قاعدة البيانات    here different employees on add from admin only added  but in employees json encode , decoded ok 
$sql = "INSERT INTO employees (name, email, position) VALUES ('$name', '$email', '$position')";
if ($conn->query($sql) === TRUE) {
    echo json_encode(array('message' => 'Employee added successfully'));
} else {
    echo json_encode(array('message' => 'Error adding employee: ' . $conn->error));
}

// إغلاق الاتصال بقاعدة البيانات
$conn->close();
?>
