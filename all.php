<?php
session_start();
include 'db.php';
include 'side_bar.php';

$type = $_GET['type']??"";
$lang = $_GET['lang']??"";

$user_id = $_SESSION['user_id'];
if (!isset($_SESSION['user_id'])) {
    echo "<p style='color:red; text-align:center;'>You must log in to access movies.</p>";
    exit();
}

$accountType = $_SESSION['account_type'];
?>


<section class="body">
    <section class="main_movie">
        <h2><?php if($type=="undefined")
        { echo $lang;}
        else {
          echo $type;
        } ?> Movies</h2>
        <div class="movie_container">
            <?php
            $sql = "SELECT * FROM movie WHERE genre1='$type' or genre2='$type' or genre3='$type' or genre4='$type' or lang='$lang'";
            $all = $conn->query($sql);
            if ($all) {
                while ($row = $all->fetch_assoc()) {
            ?>
                    <div class="movie_card" data-id='<?php echo $row['title'] ?>'>
                        <img src="/movies/media/<?php echo $row['dp']; ?>" class="movie_img">
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </section>

    <?php include 'footer.php'; ?>
</section>

<!-- Details Modal -->
<div class="modal fade" id="movieModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content bg-dark text-white">
      <div class="modal-body" id="movieContent">

      </div>
    </div>
  </div>
</div>

<!-- Payment Modal -->
<div class="modal fade" id="upgradeModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="background:#111; color:#fff; text-align:center; padding:20px;">
      <h2>Upgrade Required</h2>
      <p>To unlock full movie access, please upgrade to our Paid Plan (₹10/month).</p>
      <button class="btn btn-danger" onclick="window.location.href='payment.php'">Upgrade Now</button>
    </div>
  </div>
</div>

<!-- JS Libraries -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

<script>
  $(document).ready(function() {
    const accountType = "<?php echo $accountType; ?>";

    $('.movie_card').click(function() {
      if (accountType == 'Paid') {
        var title = $(this).data('id');
        $.ajax({
          url: 'details.php',
          method: 'GET',
          data: {
            title: title
          },
          success: function(response) {
            $('#movieContent').html(response);
            var modal = new bootstrap.Modal(document.getElementById('movieModal'));
            modal.show();
          },
          error: function() {
            alert('Failed to load movie details.');
          }
        });
      } else {
        var upgradeModal = new bootstrap.Modal(document.getElementById('upgradeModal'));
        upgradeModal.show();
      }
    });
  });
</script>
</body>

</html>