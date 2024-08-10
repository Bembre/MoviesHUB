<?php

// Start the session
session_start();


// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "movie";

// Create a new MySQLi instance
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the login form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Prepare the SQL statement
    $stmt = $conn->prepare("SELECT * FROM user WHERE email = ? AND password = ?");
    // $abcd = $conn->prepare("SELECT * FROM admin WHERE email = ? AND password = ?");

    // Bind parameters and execute the statement
$stmt->bind_param("ss", $email, $password);
$stmt->execute();

// Get the result
$result = $stmt->get_result();

if ($result->num_rows == 1) {
    // Login successful
    // Fetch user data
    $row = $result->fetch_assoc();

    // Store user data in session variables
    $_SESSION['user_id'] = $row['id'];
    $_SESSION['user_name'] = $row['name'];
    $_SESSION['user_profile'] = $row['profile'];
    
    // Redirect based on user type
    header("Location: admin/index.php");
    exit;
}
     else {
        // Login failed
        echo "<h1>Invalid Username or password</h1>";
    }

// Close the statements
$stmt->close();
$abcd->close();
}
?>