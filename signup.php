<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $check_query = $conn->prepare('SELECT id FROM users WHERE email = ?');
    $check_query->bind_param('s', $email);
    $check_query->execute();
    $check_result = $check_query->get_result();

    if ($check_result->num_rows > 0) {
        echo 'User with this email already exists';
        $check_query->close();
        exit;
    }
    $check_query->close();

    $query = $conn->prepare('INSERT INTO users (full_name,email,password) values (?,?,?)');
    $query->bind_param('sss', $name, $email, $password);
    if ($query->execute()) {
        $user_id = $conn->insert_id;

        $_SESSION['user_id'] = $user_id;
        $_SESSION['user_name'] = $name;
        $_SESSION['user_email'] = $email;
        $_SESSION['logged_in'] = true;

       echo '<script>
        alert("User Created Successfully");
        window.location.href = "login.php";
        </script>';
    } else {
        echo 'Error: ' . $query->error;
    }
    $query->close();
}

$conn->close();

?>
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
                <p class="subtext">Create your account</p>
            </div>
            <form class="form" action="signup.php" method="post">
                <div class="field">
                    <label class="label" for="name">Full name</label>
                    <input type="text" name="name" placeholder="First_Name Last_Name" required>
                </div>

                <div class="field">
                    <label class="label" for="email">Email</label>
                    <input type="email" name="email" placeholder="example@gmail.com" required>
                </div>

                <div class="field">
                    <label class="label" for="password">Password</label>
                    <input type="password" name="password" placeholder="Create a password" minlength="8"  required>
                </div>
            
                <input type="submit" class="submit_btn" value="Create account">

                <hr>
                <p>Already have an account? <a href="login.php">Sign in</a></p>
            </form>
        </div>
    </div>

    <?php include 'footer.php'; ?>

</section>
</body>

</html>
