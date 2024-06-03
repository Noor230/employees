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

// استعلام SQL لاسترداد بيانات الموظفين
$sql = "SELECT id, name, email, position FROM employees";
$result = $conn->query($sql);

// تحويل نتائج الاستعلام إلى صيغة JSON
$rows = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
}
echo json_encode($rows);

// إغلاق الاتصال بقاعدة البيانات
$conn->close();
?>
