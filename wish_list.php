<?php
session_start();
include 'db.php';

$user_id = $_SESSION['user_id'];
if (!isset($_SESSION['user_id'])) {
    echo "<p style='color:red; text-align:center;'>You must log in to access movies.</p>";
    exit();
}

$movie_id = $_GET['id'];
$sql = "INSERT INTO wish(user_id, movie_id) VALUES(?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param('ii', $user_id, $movie_id);

if ($stmt->execute()) {
echo '<script>
        alert("Movie added to wishlist successfully");
        window.location.href = "profile.php";
    </script>';
    exit();
} else {
    echo '<script>
        alert("Movie Not added to wishlist");
        window.location.href = "details.php";
    </script>';
}

$stmt->close();
$conn->close();
?>