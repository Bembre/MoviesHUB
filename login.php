<?php
session_start();
include 'db.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = $conn->prepare('SELECT id, full_name, email, account_type FROM users where email = ? AND password = ?');
    $query->bind_param('ss', $email, $password);
    $query->execute();
    $result = $query->get_result();

    $admin = $conn->prepare('SELECT * FROM admin where email = ? AND password = ?');
    $admin->bind_param('ss', $email, $password);
    $admin->execute();
    $result1 = $admin->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['full_name'];
        $_SESSION['user_email'] = $user['email'];
        $_SESSION['account_type'] = $user['account_type'];
        $_SESSION['logged_in'] = true;

        echo '<script>
        alert("Welcome ' . $user['full_name'] . '");
        window.location.href = "index.php";
        </script>';
        exit();
    } elseif ($result1->num_rows > 0) {
        $user1 = $result1->fetch_assoc();

        echo '<script>
        alert("Welcome Admin");
        window.location.href = "/movies/admin/dashboard.php";
        </script>';
    } else {
        echo 'Invalid Login';
    }
    $query->close();
    $admin->close();
}
$conn->close();
?>
<!-- <section class="body">
        <div class="login_card">
            <h1>Login</h1>
            <form action="login.php" method="post">
                <input type="text" placeholder="Enter Your Email" name="email" required>
            <input type="password" placeholder="Enter Your Password" name="password" required>
            <input type="submit" value="Login">
            </form>
            <a href="signup.php">Don't have account</a>
        </div>

        <?php include 'footer.php'; ?>
    </section>
 -->

<!-- try  -->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MoviesHub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="./style.css">
    <link href="https://vjs.zencdn.net/7.21.0/video-js.css" rel="stylesheet" />
    <script src="https://vjs.zencdn.net/7.21.0/video.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/videojs-contrib-hls@5.15.0/dist/videojs-contrib-hls.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/mkv.js"></script>
<section class="body">
    <div class="signup-card">
        <div class="auth-card">
            <div class="header">
                <h1 class="title">MoviesHub</h1>
                <p class="subtext">Sign in to continue</p>
            </div>

            <form class="form" action="login.php" method="post">
                <div class="field">
                    <label class="label" for="email">Email</label>
                    <input type="email" name="email" placeholder="example@gmail.com" required>
                </div>

                <div class="field">
                    <label class="label" for="password">Password</label>
                    <input type="password" name="password" placeholder="••••••••" minlength="8" required>
                </div>

                <input type="submit" class="submit_btn" value="Sign in">

                <hr>
                <p>New to MoviesHub? <a href="signup.php">Create an account</a></p>
            </form>
        </div>
    </div>

    <?php include 'footer.php'; ?>

</section>

</body>

</html>