<?php
session_start();
include 'db.php';
include 'side_bar.php';

if (!isset($_SESSION['user_id'])) {
    echo '  <section class="body">

    <section class="hero">
      <div class="login">
        <h3>Login to MoviesHub</h3>
        Start watching from where you left off, personalise for kids and more<br><br>
        <a href="login.php"><input type="button" value="Login In"></a>
      </div>
    </section>
    </section>
';
    include 'footer.php';
    exit();
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT full_name, account_type, email, subscription_start, subscription_end FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();
?>

<section class="body">
    <section class="center" style="display:flex; justify-content:center; align-items:center; flex-direction:column;">
        <i class="bi bi-person-circle" style="font-size:100px; "></i>
        <h3>Welcome, <?php echo htmlspecialchars($user['full_name']); ?> 👋</h3>
        <p>Email: <?php echo htmlspecialchars($user['email']); ?></p>
        <p>
            Account Type:
            <span style="display:inline-block; padding:5px 12px; border-radius:20px; font-weight:bold; color:#fff; background-color: <?php echo strtolower($user['account_type']) === 'paid' ? '#28a745' : '#dc3545'; ?>;">
                <?php echo ucfirst($user['account_type']); ?>
            </span>
        </p>
        <?php if (strtolower($user['account_type']) === 'paid'): ?>
            <p>Subscription Start: <?php echo htmlspecialchars($user['subscription_start']); ?></p>
            <p>Subscription Expiry: <?php echo htmlspecialchars($user['subscription_end']); ?></p>
        <?php endif; ?>
    </section>

    <section class="main_movie">
    <h2 style="color:white;">My Wishlist</h2>

    <div class="movie_container">
        <?php
        $sql = "SELECT movie.*, wish.id AS wish_id 
                FROM movie 
                INNER JOIN wish ON movie.id = wish.movie_id 
                WHERE wish.user_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $all = $stmt->get_result();

        if ($all->num_rows === 0) {
            echo "<p style='color:#ccc;'>Your wishlist is empty.</p>";
        }

        while ($row = $all->fetch_assoc()):
        ?>
            <div class="movie_card" 
                 data-id="<?php echo $row['wish_id']; ?>" 
                 data-title="<?php echo htmlspecialchars($row['title']); ?>" 
                 style="position:relative;">
                <img src="/movies/media/<?php echo htmlspecialchars($row['dp']); ?>" class="movie_img">
                <i class="bi bi-trash remove-wish" style="position:absolute; top:5px; right:5px; color:red; font-size:18px; cursor:pointer;" title="Remove from Wishlist"></i>
            </div>
        <?php endwhile; ?>

        <?php
        $stmt->close();
        $conn->close();
        ?>
    </div>
</section>


    <?php include 'footer.php'; ?>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('.movie_card img').click(function() {
        var title = $(this).closest('.movie_card').data('title');
        window.location.href = 'details.php?title=' + encodeURIComponent(title);
    });

    $('.remove-wish').click(function(e) {
        e.stopPropagation();
        var wishCard = $(this).closest('.movie_card');
        var wish_id = wishCard.data('id');

        $.ajax({
            url: 'remove_wishlist.php',
            type: 'POST',
            data: { wish_id: wish_id },
            success: function(response) {
                try {
                    var res = JSON.parse(response);
                    if (res.success) {
                        alert('Removed from wishlist');
                        wishCard.remove();
                    } else {
                        alert(res.message);
                    }
                } catch (e) {
                    alert('Unexpected response from server.');
                }
            },
            error: function() {
                alert('Something went wrong!');
            }
        });
    });
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>