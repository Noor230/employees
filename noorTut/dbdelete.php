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

// استلام معرف الموظف المراد حذفه من الجسم
$data = json_decode(file_get_contents("php://input"));
$id = $data->id;

// حذف الموظف من قاعدة البيانات
$sql = "DELETE FROM employees WHERE id=$id";
if ($conn->query($sql) === TRUE) {
    echo json_encode(array('message' => 'Employee deleted successfully'));
} else {
    echo json_encode(array('message' => 'Error deleting employee: ' . $conn->error));
}

// إغلاق الاتصال بقاعدة البيانات
$conn->close();
?>
