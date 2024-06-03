<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "employees_db";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_POST['delete-id'];
$sql = "DELETE FROM employees WHERE id=$id";
if ($conn->query($sql) === TRUE) {
    echo "Employee deleted successfully";
} else {
    echo "Error deleting employee: " . $conn->error;
}
$conn->close();
?>
