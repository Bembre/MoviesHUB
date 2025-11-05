<?php
session_start();
include 'db.php';
// header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo'User not logged in';
    exit();
}

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['type'])) {
    $type = $_GET['type'];
    $start = date('Y-m-d H:i:s');
    $end = date('Y-m-d H:i:s', strtotime('+7 days'));

    $stmt = $conn->prepare("UPDATE users SET account_type=?, subscription_start=?, subscription_end=? WHERE id=?");
    $stmt->bind_param("sssi", $type, $start, $end, $user_id);
    if($stmt->execute()){
        $stmt->close();
        echo "<script>
    alert('Subscription updated to $type. Account Type: $type, Start: $start, End: $end');
    window.location.href = 'index.php';
</script>";
    } else {
        echo json_encode(['success'=>false, 'message'=>$stmt->error]);
    }
    $conn->close();
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $type = 'Paid';
    $transaction_id = $_POST['transaction_id'] ?? '';
    $screenshot = $_FILES['screenshot'] ?? null;

    if(empty($transaction_id) || !$screenshot){
        echo json_encode(['success'=>false, 'message'=>'Transaction ID or screenshot missing']);
        exit();
    }

    $upload_dir = '/xampp/htdocs/movies/media/screenshots/';
    if(!is_dir($upload_dir)) mkdir($upload_dir, 0777, true);

    $filename = time().'_'.basename($screenshot['name']);
    $target_file = $upload_dir.$filename;

    if(move_uploaded_file($screenshot['tmp_name'], $target_file)){
        $stmt = $conn->prepare("INSERT INTO payments (user_id, plan_type, transaction_id, screenshot, created_at) VALUES (?,?,?,?,NOW())");
        $stmt->bind_param("isss", $user_id, $type, $transaction_id, $filename);
        $stmt->execute();
        $stmt->close();

        $start = date('Y-m-d H:i:s');
        $end = date('Y-m-d H:i:s', strtotime('+1 month'));
        $stmt2 = $conn->prepare("UPDATE users SET account_type=?, subscription_start=?, subscription_end=? WHERE id=?");
        $stmt2->bind_param("sssi", $type, $start, $end, $user_id);
        if($stmt2->execute()){
            $_SESSION['account_type'] = $type;
            $stmt2->close();
            echo "<script>
    alert('Subscription updated to $type. Account Type: $type, Start: $start, End: $end');
    window.location.href = 'index.php';
</script>";
        } else {
            echo json_encode(['success'=>false, 'message'=>'Failed to update subscription: '.$stmt2->error]);
        }
    } else {
        echo json_encode(['success'=>false, 'message'=>'Screenshot upload failed.']);
    }
    $conn->close();
    exit();
}

echo json_encode(['success'=>false, 'message'=>'Invalid request']);
?>
