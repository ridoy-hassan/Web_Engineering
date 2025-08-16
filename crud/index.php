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

// Handle form submission
if (isset($_POST['submit'])) {
    $name = $conn->real_escape_string($_POST['name'] ?? '');
    $dob = $conn->real_escape_string($_POST['dob'] ?? '');
    $gender = $conn->real_escape_string($_POST['gender'] ?? '');
    $email = $conn->real_escape_string($_POST['email'] ?? '');
    $phone = $conn->real_escape_string($_POST['phone'] ?? '');
    $address = $conn->real_escape_string($_POST['address'] ?? '');

    if (!empty($_POST['id'])) {
        $id = intval($_POST['id']);
        $sql = "UPDATE users SET 
                name='$name', dob='$dob', gender='$gender', email='$email', phone='$phone', address='$address' 
                WHERE id=$id";
    } else {
        $sql = "INSERT INTO users (name, dob, gender, email, phone, address) 
                VALUES ('$name', '$dob', '$gender', '$email', '$phone', '$address')";
    }

    if ($conn->query($sql)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}

// Delete
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $conn->query("DELETE FROM users WHERE id=$id");
    header("Location: index.php");
    exit();
}

// Edit user
$edit_user = null;
if (isset($_GET['edit'])) {
    $id = intval($_GET['edit']);
    $result = $conn->query("SELECT * FROM users WHERE id=$id");
    if ($result && $result->num_rows > 0) {
        $edit_user = $result->fetch_assoc();
    }
}

// Fetch all users
$users = $conn->query("SELECT * FROM users ORDER BY id DESC");

include 'view.php';
?>