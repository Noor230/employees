<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "employees_db";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$email = $_POST['email'];
$position = $_POST['position'];
$sql = "INSERT INTO employees (name, email, position) VALUES ('$name', '$email', '$position')";
if ($conn->query($sql) === TRUE) {
    echo "Employee added successfully";
} else {
    echo "Error adding employee: " . $conn->error;
}
$conn->close();
?>
