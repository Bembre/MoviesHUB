<?php
include 'db.php';

$title = $_GET['title'] ?? '';

$sql = "SELECT * FROM movie WHERE title=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $title);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
  $url = $row['movie'];
  $parts = explode('/', $url);
  $videoPart = end($parts);
  $videoId = explode('?', $videoPart)[0];
  $embedUrl = "https://www.youtube.com/embed/" . $videoId;
?>
  <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3" data-bs-dismiss="modal"></button>
  <img src="/movies/media/<?php echo htmlspecialchars($row['cover']); ?>" class="w-100 rounded-top" alt="">
  <section class="abc">
    <div style="margin: 15px 0;">
      <h3><?php echo htmlspecialchars($row['title']); ?></h3>
      <p><?php echo htmlspecialchars($row['description']); ?>...</p>
      <div class="mb-3">
        <?php for ($i = 1; $i <= 4; $i++):
          if (!empty($row["genre$i"])): ?>
            <span class="badge me-1" style="background-color: #cbfc01; color:black;"><?php echo $row["genre$i"]; ?></span>
        <?php endif;
        endfor; ?>
      </div>
      <a href="#" class="article__trailer open-video" data-link="<?php echo $embedUrl; ?>">
        <button style="background-color: #cbfc01; color:black;" aria-label="Watch Now">▶ Watch Now</button>
      </a>
      <button aria-label="Add to Watchlist" class="add" data-id="<?php echo $row['id']; ?>" style="background-color: #cbfc01; color:black;">
        <i class="bi bi-heart" style="font-size: 1.1rem;"></i>
      </button>
      <button class="download" data-id="<?php echo $videoId; ?>" style="background-color: #cbfc01; color:black;">
        <i class="bi bi-download" style="font-size: 1.1rem;"></i>
      </button>
    </div>

    <section>
      <h2 style="margin:20px 0;">Screenshot</h2>
      <div class="ss">
        <img src="/movies/media/<?php echo $row['s1']; ?>" alt="Screenshot 1">
        <img src="/movies/media/<?php echo $row['s2']; ?>" alt="Screenshot 2">
        <img src="/movies/media/<?php echo $row['s3']; ?>" alt="Screenshot 3">
        <img src="/movies/media/<?php echo $row['s4']; ?>" alt="Screenshot 4">
      </div>
    </section>


    <div>
      <section class="main_movie">
        <div class="title">
          <h2>Similar Movies</h2>
        </div>

        <div class="similar_container">
          <?php
          $sql = "SELECT * FROM movie 
                    WHERE genre1='Drama' OR genre2='Drama' 
                    OR genre3='Drama' OR genre4='Drama' 
                    LIMIT 6";
          $all = $conn->query($sql);
          if ($all) {
            while ($row = $all->fetch_assoc()) {
          ?>
              <div class="movie_card"
                data-id="<?php echo htmlspecialchars($row['title']); ?>">
                <img src="/movies/media/<?php echo htmlspecialchars($row['dp']); ?>"
                  class="movie_img" alt="<?php echo htmlspecialchars($row['title']); ?>">
              </div>
          <?php
            }
          }
          ?>
        </div>
      </section>
    </div>

    <!-- Bootstrap Modal -->
    <div class="modal fade" id="movieModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content bg-dark text-white">
          <div class="modal-body" id="movieContent">

          </div>
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

    <!-- Upgrade Modal -->
    <div class="modal fade" id="upgradeModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content text-center p-4">
          <h5>Preview Ended</h5>
          <p>Upgrade your account to watch the full movie.</p>
          <button class="btn btn-primary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </section>

  <style>
    .ss {
      display: grid;
      grid-template-columns: repeat(1fr);
      gap: 20px;
    }

    .ss img {
      width: 100%;
    }

    .abc {
      margin: 0 8%;
      width: 85%;
    }
  </style>

  <!-- JS Libraries -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
  <link href="https://vjs.zencdn.net/7.21.0/video-js.css" rel="stylesheet" />
  <script src="https://vjs.zencdn.net/7.21.0/video.min.js"></script>
  <script>
    $(document).ready(function() {
      $('.add').click(function() {
        var id = $(this).data('id');
        window.location.href = 'wish_list.php?id=' + encodeURIComponent(id);
      });

$('.download').click(function() {
  var videoId = $(this).data('id');

  navigator.clipboard.writeText(videoId).then(() => {
    // Show alert message
    alert("Video ID copied! Click OK to go to Y2Mate.com and paste it there.");

    // Redirect after alert
    window.open("https://v6.www-y2mate.com/convert", "_blank");
  }).catch(err => {
    console.error("Failed to copy:", err);
    alert("Copy failed. Please try again.");
  });
});

      $('.movie_card').click(function() {
        var title = $(this).data('id');

        // Load movie data from same page (via AJAX call to a PHP script)
        $.ajax({
          url: 'details.php', // small helper PHP to get movie info
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
  </div>
<?php
} else {
  echo "<div class='p-4 text-center text-muted'>Movie not found.</div>";
}
?>