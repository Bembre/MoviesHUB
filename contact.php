<?php
include '/xampp/htdocs/movies/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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
        <h2>Contact Me</h2>
        <div class="view">
            <form class="form_sec" action="contact.php" method="post">
                <div class="main_frame">
                    <div class="name">
                        <input type="text" placeholder="Enter Your Name: " name="name">
                        <input type="email" placeholder="Enter Your Email: " name="email">
                    </div>
                    <textarea rows="4" cols="80" placeholder="Type your message"></textarea>
                    <input type="submit" value="Send" class="submit" style="width: 12%; background-color:#cbfc01;color:black;">
                </div>
            </form>

            <div class="profile_sec">
                <div class="one">
                    <div class="img">
                        <img src="media/photo.png">
                    </div>
                    <div class="Profile_name"><h1 style="padding-right: 10px;">Prathamesh Kailash Bembre</h1></div>
                </div>
                <div class="bio" style="padding: 0 40px; text-align: justify;
">
  <p style="color: #ddd; line-height: 1.6; font-size: 1rem;">
    Enthusiastic IT graduate with a strong foundation in Python and full-stack web development using Django (backend) 
    and modern frontend technologies (HTML, CSS, JavaScript, Bootstrap). Skilled in building scalable web applications 
    with MySQL and Git-based version control using GitHub. Experienced in developing and integrating backend services 
    through academic and personal projects. Eager to contribute to innovative, Python-based full-stack development 
    teams while continuously enhancing technical expertise.
  </p>

  <div class="contact_info" style="margin-top: 25px;">
    <h4 style="color: #fff; margin-bottom: 10px;">Contact Me</h4>
    <p style="color: #bbb; margin: 4px 0;">Email: <a href="mailto:prathameshbembre01@gmail.com" style="color: #ccc; text-decoration: none;">prathameshbembre01@gmail.com</a></p>
    <p style="color: #bbb; margin: 4px 0;">Phone: <a href="tel:+919022654357" style="color: #ccc; text-decoration: none;">+91 9022654357</a></p>
    
    <div style="margin-top: 12px;">
      <a href="#" style="color: #ccc; margin-right: 12px; font-size: 1.4rem;"><i class="bi bi-facebook"></i></a>
      <a href="#" style="color: #ccc; margin-right: 12px; font-size: 1.4rem;"><i class="bi bi-twitter"></i></a>
      <a href="#" style="color: #ccc; margin-right: 12px; font-size: 1.4rem;"><i class="bi bi-instagram"></i></a>
      <a href="#" style="color: #ccc; font-size: 1.4rem;"><i class="bi bi-youtube"></i></a>
    </div>
  </div>
</div>

            </div>

        </div>
    </section>


    <?php include '/xampp/htdocs/movies/footer.php'; ?>
</section>

<style>
    input {
        border: none;
        background-color: rgb(57, 54, 54);
        color: white;
        border-radius: 20px;
        display: block;
        padding: 10px;
        margin: 10px;
    }
input[type="text"],
input[type="email"]
{
    width: 330px;
    color: white;
    border-radius: 20px;
}
    input:focus {
        outline: none;
        border: 1px solid #cbfc01;
    }

    textarea {
        border: none;
        background-color: rgb(57, 54, 54);
        color: white;
        padding: 10px;
        margin: 10px;
        border-radius: 20px;
    }

    textarea:focus {
        outline: none;
         border: 1px solid #cbfc01;
    }


    .main_frame {
  display: flex;
  flex-direction: column;
  align-items: center; /* ✅ centers all child elements horizontally */
}

    .view {
        display: flex;
        width: 100%;
        gap: 2%;
        align-items: center;
    }

    .form_sec {
        height: 40vh;
        flex: 0 0 49%;
        border: 1px solid rgb(57, 54, 54);
        padding: 10px;
        box-sizing: border-box;
        border-radius: 30px;
    }

    .profile_sec {
        flex: 0 0 49%;
        padding: 10px;
        box-sizing: border-box;
    }

    .name {
        display: flex;
    }

    .one {
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 100%;
        color: white;
        border-radius: 12px;
        padding: 20px;
        box-sizing: border-box;
        gap: 20px;
    }

    .img {
        flex: 0 0 40%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .one .img img {
        border-radius: 50%;
        width: 150px;
        height: 150px;
        object-fit: cover;
    }

    .Profile_name {
        flex: 0 0 60%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        gap: 8px;
    }

    .Profile_name h2 {
        font-size: 1.8rem;
        margin: 0;
        font-weight: 600;
    }

    .Profile_name p {
        font-size: 1rem;
        color: #ccc;
        margin: 0;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>