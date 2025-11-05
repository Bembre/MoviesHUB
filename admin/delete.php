<?php
include '/movies/db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM movie WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Movie deleted successfully!');window.location.href='dashboard.php';</script>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "Invalid request!";
}
?>
