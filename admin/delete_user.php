<?php
include '/xampp/htdocs/movies/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $userId = intval($_POST['id']);

    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $userId);

    if ($stmt->execute()) {
        header("Location: users.php?msg=deleted");
        exit;
    } else {
        echo "Error deleting user.";
    }

    $stmt->close();
}
$conn->close();
?>
