<?php
include '/xampp/htdocs/movies/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $target_dir = "/xampp/htdocs/movies/media/";

function uploadFile($fileInput, $target_dir) {
    if (isset($_FILES[$fileInput]) && $_FILES[$fileInput]['error'] === UPLOAD_ERR_OK) {
            $fileTmpPath = $_FILES[$fileInput]['tmp_name'];
            $fileName = basename($_FILES[$fileInput]['name']);
            $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
            $newFileName = uniqid() . '.' . $fileExt; // make unique filename
            $dest_path = $target_dir . $newFileName;

            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                return $newFileName;
            }
        }
        return null;
    }

    // Upload each file (store only file name in DB)
    $dp = uploadFile('dp', $target_dir);
    $cover = uploadFile('cover', $target_dir);
    $s1 = uploadFile('s1', $target_dir);
    $s2 = uploadFile('s2', $target_dir);
    $s3 = uploadFile('s3', $target_dir);
    $s4 = uploadFile('s4', $target_dir);




    // $dp = $_POST['dp'];
    // $cover = $_POST['cover'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $genre1 = $_POST['genre1'];
    $genre2 = $_POST['genre2'];
    $genre3 = $_POST['genre3'];
    $genre4 = $_POST['genre4'];
    $lang = $_POST['lang'];
    $movie = $_POST['movie'];
    $link = $_POST['link'];
    // $s1 = $_POST['s1'];
    // $s2 = $_POST['s2'];
    // $s3 = $_POST['s3'];
    // $s4 = $_POST['s4'];

    $query = $conn->prepare('insert into movie(dp,cover,title,description,genre1,genre2,genre3,genre4,lang,movie,link,s1,s2,s3,s4) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');

    $query->bind_param('sssssssssssssss', $dp, $cover, $title, $description, $genre1, $genre2, $genre3, $genre4, $lang, $movie, $link, $s1, $s2, $s3, $s4);

    if ($query->execute()) {
        echo '<script>alert("Movie Added Successfully");</script>';
        header('refresh:2; url=dashboard.php');
        exit;
    } else {
        echo '<script>alert("Error: ' . $query->error . '");</script>';
    }
    $query->close();
}

$conn->close();

include 'side_bar.php';

?>

<section class="body">
    <section class="main">
        <form action="add.php" method="post" enctype="multipart/form-data">
            <div class="one_frame">
                <div class="left">
                    <div class="left_con">
                        <span>Upload DP Photo</span>
                        <img id="preview-dp" style="width:150px; display:none; margin-top:10px; border-radius:10px;">
                        <input type="file" name="dp" id="dp" accept="image/*" onchange="previewDP(event)">
                    </div>
                    <div class="left_con">
                        <span>Upload Cover Photo</span>
                        <img id="preview-cover" style="width:280px; display:none; margin-top:10px; border-radius:10px;">
                        <input type="file" name="cover" id="cover" accept="image/*" onchange="previewDP(event)">
                    </div>
                </div>
                <div class="right">
                    <input type="text" placeholder="Title" name="title">
                    <textarea placeholder="Description" rows="5" name="description" style="width: 98%;"></textarea>
                    <span style="margin-left:10px;">Genre</span>
                    <div class="Genre" style="margin-bottom:-15px;">
                        <input type="text" class="genre1" name="genre1">
                        <input type="text" class="genre2" name="genre2">
                        <input type="text" class="genre3" name="genre3">
                        <input type="text" class="genre4" name="genre4">
                    </div>
                    <input type="text" placeholder="Enter the Language" name="lang">
                    <input type="text" placeholder="Add Movie link" name="movie">
                    <input type="text" placeholder="Add trailer link" name="link">
                </div>
            </div>
            <div class="bottom">
                <span>Screen Shoot</span>
                <div class="ss">
                    <div class="s1">
                        <img id="preview-s1" style="width:260px; display:none; margin:5px; border-radius:10px;">
                    <input type="file" name="s1" id="s1" accept="image/*" onchange="previewDP(event)">
                    </div>
                    <div class="s2">
                        <img id="preview-s2" style="width:260px; display:none; margin:5px; border-radius:10px;">
                    <input type="file" name="s2" id="s2" accept="image/*" onchange="previewDP(event)">
                    </div>
                    <div class="s3">
                        <img id="preview-s3" style="width:260px; display:none; margin:5px; border-radius:10px;">
                    <input type="file" name="s3" id="s3" accept="image/*" onchange="previewDP(event)">
                    </div>
                    <div class="s4">
                        <img id="preview-s4" style="width:260px; display:none; margin:5px; border-radius:10px;">
                    <input type="file" name="s4" id="s4" accept="image/*" onchange="previewDP(event)">
                    </div>
                </div>
                <div style="display: flex; justify-content: center; margin-top: 20px;">
                    <input type="submit" value="Publish" class="submit" style="width: 10%;;">
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