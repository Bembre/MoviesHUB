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
    $img = $_POST["img"];
    $title = $_POST["title"];
    $s1 = $_POST["s1"];
    $s2 = $_POST["s2"];
    $s3 = $_POST["s3"];
    $s4 = $_POST["s4"];
    $movie = $_POST["movie"];
    $t1 = $_POST["t1"];
    $t2 = $_POST["t2"];
    $t3 = $_POST["t3"];
    $t4 = $_POST["t4"];
    $link = $_POST["link"];
    $des = $_POST["des"];
    
    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO movies (img,title,s1,s2,s3,s4,movie,t1,t2,t3,t4,link,des) VALUES (?,?,?,?,?,?,?,?,?,?,?, ?, ?)");

    // Bind parameters and execute the statement
    $stmt->bind_param("sssssssssssss", $img,$title,$s1,$s2,$s3,$s4,$movie,$t1,$t2,$t3,$t4,$link,$des);
    
    if ($stmt->execute()) {
        // Registration completed
        echo "Registration completed successfully!";
        
        // Redirect to login page after a delay
        header("refresh:2; url=index.php");
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