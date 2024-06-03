<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "employees_db";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_POST['update-id'];
$name = $_POST['update-name'];
$email = $_POST['update-email'];
$position = $_POST['update-position'];
$sql = "UPDATE employees SET name='$name', email='$email', position='$position' WHERE id=$id";
if ($conn->query($sql) === TRUE) {
    echo "Employee updated successfully";
} else {
    echo "Error updating employee: " . $conn->error;
}
$conn->close();
?>

// here سنقوم الآن بإنشاء ملف PHP لمعالجة تحديث بيانات الموظف (update_employee.p