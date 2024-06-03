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
$id = $_POST['update-id'];
$name = $_POST['update-name'];
$email = $_POST['update-email'];
$position = $_POST['update-position'];

// تحديث بيانات الموظف في قاعدة البيانات
$sql = "UPDATE employees SET name='$name', email='$email', position='$position' WHERE id=$id";
if ($conn->query($sql) === TRUE) {
    echo json_encode(array('message' => 'Employee updated successfully'));
} else {
    echo json_encode(array('message' => 'Error updating employee: ' . $conn->error));
}

// إغلاق الاتصال بقاعدة البيانات
$conn->close();
?>
