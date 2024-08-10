<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "movie";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set header to application/json
header('Content-Type: application/json');

// Check if the request method is DELETE and 'id' is set
if ($_SERVER["REQUEST_METHOD"] === "DELETE" && isset($_GET['id']) && is_numeric($_GET['id'])) {
    $recordId = intval($_GET['id']);

    // SQL to delete a record based on ID
    $sql = "DELETE FROM movies WHERE id = $recordId";

    if ($conn->query($sql) === TRUE) {
        $response = array("message" => "Record deleted successfully");
        echo json_encode($response);
    } else {
        $response = array("error" => "Error deleting record: " . $conn->error);
        echo json_encode($response);
    }
} else {
    $response = array("error" => "Invalid request");
    echo json_encode($response);
}

$conn->close();
?>
