<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success'=>false,'message'=>'User not logged in']);
    exit();
}

$user_id = $_SESSION['user_id'];
$wish_id = $_POST['wish_id'] ?? 0;

if(!$wish_id) {
    echo json_encode(['success'=>false,'message'=>'Invalid request']);
    exit();
}

$sql = "DELETE FROM wish WHERE id = ? AND user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $wish_id, $user_id);

if($stmt->execute()) {
    echo json_encode(['success'=>true,'message'=>'Removed from wishlist']);
} else {
    echo json_encode(['success'=>false,'message'=>'Error removing from wishlist']);
}

$stmt->close();
$conn->close();
?>
