<?php
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

// Check if the registration form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO user (name,email, password) VALUES (?, ?, ?)");

    // Bind parameters and execute the statement
    $stmt->bind_param("sss", $name,$email,$password);
    
    if ($stmt->execute()) {
        // Registration completed
        echo "Registration completed successfully!";
        
        // Redirect to login page after a delay
        header("refresh:3; url=signin.html");
        exit;
    } else {
        // An error occurred while storing credentials
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>