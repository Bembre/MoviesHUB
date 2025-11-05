<?php
session_start();

include 'db.php';
include 'side_bar.php';

$accountType = $_SESSION['account_type'];

?>

<section class="body" style="width:87%;">
  <section class="index_hero">
    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
      <div class="carousel-inner">
        <?php
        $sql = 'SELECT * FROM movie';
        $all = $conn->query($sql);
        if ($all) {
          $isFirst = true;
          while ($row = $all->fetch_assoc()) {
            $url = $row['link'];
            $parts = explode('/', $url);
            $videoPart = end($parts);
            $videoId = explode('?', $videoPart)[0];
            $embedUrl = "https://www.youtube.com/embed/" . $videoId;

            $url1 = $row['movie'];
            $parts1 = explode('/', $url1);
            $videoPart1 = end($parts1);
            $videoId1 = explode('?', $videoPart1)[0];
            $embedUrl1 = "https://www.youtube.com/embed/" . $videoId1;

        ?>
            <div class="carousel-item <?php echo $isFirst ? 'active' : ''; ?>" style=" margin:20px 0;">
              <iframe src="<?php echo $embedUrl; ?>"
                title="Trailer"
                frameborder="0"
                allowfullscreen></iframe>
              <div class="carousel-caption d-none d-md-block" style="width:30%;height:100%;align-content:center; background:transparent;color:white;text-shadow:2px 2px 5px black;text-align: justify;padding:20px;position: absolute; left:0;top:0">
                <h1><?php echo $row['title']; ?></h1>
                <p>
                  <?php echo $row['description'] ?>
                </p>
                <p>
                  <?php echo $row['genre1']; ?> | <?php echo $row['genre2']; ?> |
                  <?php echo $row['genre3']; ?> | <?php echo $row['genre4']; ?> • 2024
                </p>
                <a href="#" class="article__trailer open-video" data-link="<?php echo $embedUrl1; ?>">
        <button style="background-color: #cbfc01; color:black;" aria-label="Watch Now">▶ Watch Now</button>
      </a>
      <button aria-label="Add to Watchlist" class="add" data-id="<?php echo $row['id']; ?>" style="background-color: #cbfc01; color:black;">
        <i class="bi bi-heart" style="font-size: 1.1rem;"></i>
      </button>
              </div>
            </div>
        <?php
            $isFirst = false;
          }
        }
        ?>
      </div>

     <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">

        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">

        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </section>


  <section class="main_movie">
    <div class="title">
      <h2 style="margin:0;">Latest Movies</h2>
    </div>

    <div class="movie_container">
      <?php
      $sql = "SELECT * FROM movie Order by id desc Limit 6;";
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

  <section class="main_movie">
    <div class="title">
      <h2 style="margin:0;">Trending Movies</h2>
    </div>

    <div class="movie_container" style="gap:5%;">
      <?php
      $sql = "SELECT * FROM movie WHERE genre1='Thriller' OR genre2='Thriller' OR genre3='Thriller' OR genre4='Thriller' limit 6";
      $all = $conn->query($sql);
      if ($all) {
        $count = 1;
        while ($row = $all->fetch_assoc()) {

      ?>
          <div class="movie_card" data-id='<?php echo $row['title'] ?>' style="position: relative;">
             <div class="rank_number"><?php echo $count; ?></div>
            <img src="/movies/media/<?php echo $row['dp']; ?>" class="movie_img">
          </div>
      <?php
       $count++;
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

    <!-- Video Modal -->
    <div class="modal fade" id="videoModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content bg-dark text-white">
          <div class="modal-body position-relative">
            <button type="button" class="btn-close btn-close-white position-absolute to p-0 end-0 m-3" data-bs-dismiss="modal"></button>
            <div class="ratio ratio-16x9">
              <iframe id="videoPlayer" src="" allowfullscreen></iframe>
            </div>
            <p id="countdown" class="text-center mt-3 text-warning" style="display:none;"></p>
          </div>
        </div>
      </div>
    </div>


<style>
  .genre_img {
    display: flex;
    justify-content: space-evenly;
    height: 10vh;
    /* background-color: #fff; */
  }

  .genre_img img {
    border-radius: 50%;
    width: 80px;
    height: 80px;
  }

  .carousel-control-prev {
    left: -6.5% !important;
  }

  .carousel-control-next {
    right: -6.5% !important;
  }

  .carousel-control-prev-icon,
  .carousel-control-next-icon {
    width: 40px;
    height: 40px;
    background-size: 100%, 100%;
    filter: drop-shadow(0 0 5px #000);
  }
  .carousel,
.carousel-inner,
.carousel-item {
  height: 84vh;        
  overflow: hidden;
  border-radius: 30px;
}
  .carousel-item iframe {
  width: 100%;
  height: 100%;
  border: none;
  border-radius: 30px;
  object-fit: cover;    
}
.rank_number {
  position: absolute;
  align-content: center;
  bottom: -10px;
  left: -78px;
  font-size: 200px;
  font-weight: 900;
  color: transparent;
  -webkit-text-stroke: 2px #cbfc01;
  opacity: 0.8;
  z-index: 0;
}

.movie_card img {
  position: relative;
  z-index: 1;
}
</style>

<!-- JS Libraries -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

<script>
  $('.add').click(function() {
        var id = $(this).data('id');
        window.location.href = 'wish_list.php?id=' + encodeURIComponent(id);
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
  document.querySelectorAll('.open-video').forEach(btn => {
      btn.addEventListener('click', function(e) {
        e.preventDefault();

        const videoUrl = this.getAttribute('data-link');
        const iframe = document.getElementById('videoPlayer');
        iframe.src = videoUrl;

        const modal = new bootstrap.Modal(document.getElementById('videoModal'));
        modal.show();

        const countdownEl = document.getElementById('countdown');
        countdownEl.style.display = "none";
      });
    });

    document.getElementById('videoModal').addEventListener('hidden.bs.modal', () => {
      document.getElementById('videoPlayer').src = "";
    });

    document.getElementById('videoModal').addEventListener('hidden.bs.modal', () => {
      player.pause();
    });

    
</script>
</body>

</html>