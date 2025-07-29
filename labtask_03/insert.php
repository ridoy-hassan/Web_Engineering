<?php
// Database credentials
$servername = "localhost";
$username = "root"; // Your MySQL username
$password = "";     // Your MySQL password
$dbname = "user_registration";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form data on POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (
        isset($_POST['name'], $_POST['email'], $_POST['age'], 
              $_POST['password'], $_POST['gender'], $_POST['course'])
    ) {
        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $age = (int)$_POST['age'];
        $plain_password = $_POST['password']; // Store password as plain text (not recommended)
        $gender = $_POST['gender'];
        $course = $_POST['course'];

        // Prepare SQL statement
        $stmt = $conn->prepare("INSERT INTO users (name, email, age, password, gender, course) VALUES (?, ?, ?, ?, ?, ?)");

        if ($stmt === false) {
            die("Prepare failed: " . $conn->error);
        }

        $stmt->bind_param("ssisss", $name, $email, $age, $plain_password, $gender, $course);

        if ($stmt->execute()) {
            echo "Record inserted successfully!";
        } else {
            echo "Error inserting record: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Please fill all fields!";
    }
} else {
    echo "Invalid request.";
}

$conn->close();
?>
