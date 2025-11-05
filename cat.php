<?php
session_start();
include 'db.php';
include 'side_bar.php';

if (!isset($_SESSION['user_id'])) {
    echo "<p style='color:red; text-align:center;'>You must log in to access movies.</p>";
    exit();
}

$user_id = $_SESSION['user_id'];
$accountType = $_SESSION['account_type'];
?>

<section class="body">
     <section class="main_movie" id="action">
        <div class="title">
            <h2 style="margin:0;">Action Movies</h2>
            <a href="#" class="click" data-id="Action">
                See All
            </a>
        </div>
        <div class="movie_container">
            <?php
            $sql = "SELECT * FROM movie WHERE genre1='Action' OR genre2='Action' OR genre3='Action' OR genre4='Action' limit 6";
            $all = $conn->query($sql);
            if ($all) {
                while ($row = $all->fetch_assoc()) {
            ?>
                    <div class="movie_card " data-id='<?php echo $row['title'] ?>' >
                        <img src="/movies/media/<?php echo $row['dp']; ?>" class="movie_img">
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </section>

    <section class="main_movie" id="action">
        <div class="title">
            <h2 style="margin:0;">Drama Movies</h2>
            <a href="#" class="click" data-id="Drama">
                See All
            </a>
        </div>
        <div class="movie_container">
            <?php
            $sql = "SELECT * FROM movie WHERE genre1='Drama' OR genre2='Drama' OR genre3='Drama' OR genre4='Drama' limit 6";
            $all = $conn->query($sql);
            if ($all) {
                while ($row = $all->fetch_assoc()) {
            ?>
                    <div class="movie_card " data-id='<?php echo $row['title'] ?>' >
                        <img src="/movies/media/<?php echo $row['dp']; ?>" class="movie_img">
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </section>

    <section class="main_movie" id="thriller">
        <div class="title">
            <h2 style="margin:0;">Thriller Movies</h2>
            <a href="#" class="click" data-id="Thriller">
                See All
            </a>
        </div>
        <div class="movie_container">
            <?php
            $sql = "SELECT * FROM movie WHERE genre1='Thriller' OR genre2='Thriller' OR genre3='Thriller' OR genre4='Thriller' limit 6";
            $all = $conn->query($sql);
            if ($all) {
                while ($row = $all->fetch_assoc()) {
            ?>
                    <div class="movie_card " data-id='<?php echo $row['title'] ?>'>
                        <img src="/movies/media/<?php echo $row['dp']; ?>" class="movie_img">
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </section>

    <section class="main_movie" id="comedy">
        <div class="title">
            <h2 style="margin:0;">Comedy Movies</h2>
            <a href="#" class="click" data-id="Comedy">
                See All
            </a>
        </div>
        <div class="movie_container">
            <?php
            $sql = "SELECT * FROM movie WHERE genre1='Comedy' OR genre2='Comedy' OR genre3='Comedy' OR genre4='Comedy' limit 6";
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

    <section class="main_movie" id="mystry">
        <div class="title">
            <h2 style="margin:0;">Mystery Movies</h2>
            <a href="#" class="click" data-id="Mystery">
                See All
            </a>
        </div>
        <div class="movie_container">
            <?php
            $sql = "SELECT * FROM movie WHERE genre1='Mystery' OR genre2='Mystery' OR genre3='Mystery' OR genre4='Mystery' limit 6";
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
    
    <section class="main_movie" id="marathi">
        <div class="title">
            <h2 style="margin:0;">Marathi Movies</h2>
            <a href="#" class="click" data-id_lang="Marathi">
                See All
            </a>
        </div>
        <div class="movie_container">
            <?php
            $sql = "SELECT * FROM movie WHERE lang='Marathi' limit 6";
            $all = $conn->query($sql);
            if ($all) {
                while ($row = $all->fetch_assoc()) {
            ?>
                    <div class="movie_card " data-id='<?php echo $row['title'] ?>' >
                        <img src="/movies/media/<?php echo $row['dp']; ?>" class="movie_img">
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </section>

    <section class="main_movie" id="action">
        <div class="title">
            <h2 style="margin:0;">Hindi Movies</h2>
            <a href="#" class="click" data-id="Hindi">
                See All
            </a>
        </div>
        <div class="movie_container">
            <?php
            $sql = "SELECT * FROM movie WHERE lang='Hindi' limit 6";
            $all = $conn->query($sql);
            if ($all) {
                while ($row = $all->fetch_assoc()) {
            ?>
                    <div class="movie_card " data-id='<?php echo $row['title'] ?>' >
                        <img src="/movies/media/<?php echo $row['dp']; ?>" class="movie_img">
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </section>

    <?php include 'footer.php';?>
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
    $('.click').click(function() {
            var type = $(this).data('id');
            var lang = $(this).data('id_lang');
            window.location.href = 'all.php?type=' + encodeURIComponent(type)+'&lang=' + encodeURIComponent(lang);
        });
  $(document).ready(function() {
    const accountType = "<?php echo $accountType; ?>";

    $('.movie_card').click(function() {
      if (accountType === 'Paid') {
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
