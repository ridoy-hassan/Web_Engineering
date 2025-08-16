<?php
// Database connection
$host = "localhost";
$user = "root";
$pass = "";
$db = "crud_db";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission (Add only)
if (isset($_POST['submit'])) {
    $name = $conn->real_escape_string($_POST['name'] ?? '');
    $dob = $conn->real_escape_string($_POST['dob'] ?? '');
    $gender = $conn->real_escape_string($_POST['gender'] ?? '');
    $email = $conn->real_escape_string($_POST['email'] ?? '');
    $phone = $conn->real_escape_string($_POST['phone'] ?? '');
    $address = $conn->real_escape_string($_POST['address'] ?? '');

    $sql = "INSERT INTO users (name, dob, gender, email, phone, address) 
            VALUES ('$name', '$dob', '$gender', '$email', '$phone', '$address')";

    if ($conn->query($sql)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}

// Fetch all users
$users = $conn->query("SELECT * FROM users ORDER BY id DESC");

// Load frontend
include 'view.php';
?>
