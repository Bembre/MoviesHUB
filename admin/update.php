<?php
include '/xampp/htdocs/movies/db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM movie WHERE id = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

if (isset($_POST['update'])) {
    $dp = $_POST['dp'];
    $cover = $_POST['cover'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $genre1 = $_POST['genre1'];
    $genre2 = $_POST['genre2'];
    $genre3 = $_POST['genre3'];
    $genre4 = $_POST['genre4'];
    $lang = $_POST['lang'];
    $movie = $_POST['movie'];
    $link = $_POST['link'];
    $s1 = $_POST['s1'];
    $s2 = $_POST['s2'];
    $s3 = $_POST['s3'];
    $s4 = $_POST['s4'];

    $sql = "UPDATE movie SET 
                title='$title', 
                dp='$dp',
                cover='$cover',
                title='$title',
                description='$description',
                genre1='$genre1',
                genre2='$genre2',
                genre3='$genre3',
                genre4='$genre4',
                lang='$lang',
                movie='$movie',
                link='$link',
                s1='$s1',
                s2='$s2',
                s3='$s3',
                s4='$s4'

            WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Movie updated successfully!');window.location.href='index.php';</script>";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
include 'side_bar.php';

?>
<section class="body">
    <section class="main">
        <form action="update.php?id=<?php echo $row['id']; ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <div class="one_frame">
                <div class="left">
                    <div class="left_con">
                        <span>Upload DP Photo</span>
                        <img id="preview-dp" 
                     src="http://localhost/movies/media/<?php echo $row['dp']; ?>" 
                     style="width:150px; margin-top:10px; border-radius:10px; <?php echo $row['dp'] ? '' : 'display:none;'; ?>">
                        <img id="preview-dp" style="width:150px; display:none; margin-top:10px; border-radius:10px;">
                        <input type="file" name="dp" id="dp" accept="image/*" onchange="previewDP(event)">
                    </div>
                    <div class="left_con">
                        <span>Upload Cover Photo</span>
                        <img id="preview-cover" style="width:280px; display:none; margin-top:10px; border-radius:10px;">
                        <input type="file" value="<?php echo $row['cover']; ?>" name="cover" id="cover" accept="image/*" onchange="previewDP(event)">
                    </div>
                </div>
                <div class="right">
                    <input type="text" value="<?php echo $row['title']; ?>" placeholder="Title" name="title">
                    <textarea placeholder="Description" rows="5" name="description" style="width: 98%;"><?php echo $row['description']; ?></textarea>
                    <span style="margin-left:10px;">Genre</span>
                    <div class="Genre" style="margin-bottom:-15px;">
                        <input type="text" class="genre1" value="<?php echo $row['genre1']; ?>" name="genre1">
                        <input type="text" class="genre2" value="<?php echo $row['genre2']; ?>" name="genre2">
                        <input type="text" class="genre3" value="<?php echo $row['genre3']; ?>" name="genre3">
                        <input type="text" class="genre4" value="<?php echo $row['genre4']; ?>" name="genre4">
                    </div>
                    <input type="text" value="<?php echo $row['lang']; ?>" placeholder="Enter the Language" name="lang">
                    <input type="text" value="<?php echo $row['movie']; ?>" placeholder="Add Movie link" name="movie">
                    <input type="text" value="<?php echo $row['link']; ?>" placeholder="Add trailer link" name="link">
                </div>
            </div>
            <div class="bottom">
                <span>Screen Shoot</span>
                <div class="ss">
                    <div class="s1">
                        <img id="preview-s1" style="width:260px; display:none; margin:5px; border-radius:10px;">
                    <input type="file" name="s1" id="s1" value="<?php echo $row['s1']; ?>" accept="image/*" onchange="previewDP(event)">
                    </div>
                    <div class="s2">
                        <img id="preview-s2" style="width:260px; display:none; margin:5px; border-radius:10px;">
                    <input type="file" name="s2" id="s2" value="<?php echo $row['s2']; ?>" accept="image/*" onchange="previewDP(event)">
                    </div>
                    <div class="s3">
                        <img id="preview-s3" style="width:260px; display:none; margin:5px; border-radius:10px;">
                    <input type="file" name="s3" id="s3" value="<?php echo $row['s3']; ?>" accept="image/*" onchange="previewDP(event)">
                    </div>
                    <div class="s4">
                        <img id="preview-s4" style="width:260px; display:none; margin:5px; border-radius:10px;">
                    <input type="file" name="s4" id="s4" value="<?php echo $row['s4']; ?>" accept="image/*" onchange="previewDP(event)">
                    </div>
                </div>
                <div style="display: flex; justify-content: center; margin-top: 20px;">
                        <input type="submit" name="update" value="Update Movie">    
                </div>

            </div>
        </form>
    </section>


    <?php include '/xampp/htdocs/movies/footer.php'; ?>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

<script>
function previewDP(event) { 
    const input = event.target;
    const previewId = 'preview-' + input.id;
    const preview = document.getElementById(previewId);
    const file = input.files[0];

    if (file) {
        const reader = new FileReader();
        reader.onload = e => {
            preview.src = e.target.result;
            preview.style.display = 'block';
        }
        reader.readAsDataURL(file);
    } else {
        preview.src = '';
        preview.style.display = 'none';
    }
}
</script>



</body>

</html>

