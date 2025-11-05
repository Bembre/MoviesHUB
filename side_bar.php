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
    <style>
        .nav_bar {
            display: flex;
            justify-content: space-around;
            background-color: black;
            align-items:center;
            height: 10vh;
            position: sticky;
            top: 0;
            z-index: 111;
        }
        .nav_bar .logo a.title_div {
            display: flex;
             text-decoration: none;
            gap: 10px;
            align-items: center;
        }
        .nav_bar .logo i {
    font-size: 1.8rem;
    color: white;
}
        .nav_bar .menu ul {
            display: flex;
             /* justify-content: center; */
    align-items: center;
    margin: 0;
    padding: 0;  
            gap: 20px;
        }
        ul {
            
            list-style-type: none;
        }
        .titile {
            color: white;
             margin: 0;               
    padding: 0;
            /* text-shadow:2px 2px 2px #cbfc01; */
        }
        .search_header {
    width: 100%;
    position: relative;
    top: 10;
    left: 0;
    right: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 1000;
}

.search-bar {
    display: flex;
    align-items: center;
    background-color: rgb(57, 54, 54);
    border-radius: 10px;
    padding: 10px;
    height: 40px;
}

.search-bar input {
    width: 25vw;
    flex: 1;
    background: transparent;
    border: none;
    color: white;
    font-size: 1rem;
}

.search-bar input:focus {
    outline: none;
}

.search-bar i {
    margin-right: 10px;
    color: #bbb;
}
    </style>

</head>

<body>
    <section class="nav_bar">
        <div class="logo">
            <a href="index.php" class="title_div">
                <i class="bi bi-camera-reels"></i>
                <h2 class="titile">MoviesHub</h2>
            </a>
        </div>
        <div class="menu">
            <ul>
                <li class="home">
                    <a href="index.php"><i class="bi bi-house-door"></i> <span>Home</span></a>
                </li>
                <li class="cat">
                    <a href="cat.php"><i class="bi bi-columns-gap"></i> <span>Categories</span></a>
                </li>
                <li class="Contact">
                    <a href="contact.php"><i class="bi bi-phone"></i> <span>Contact</span></a>
                </li>
            </ul>
        </div>
        <div class="search"><div class="search_header">
        <form method="get" action="search.php" class="search-bar">
            <i class="bi bi-search"></i>
            <input type="search" name="search" placeholder="Movies, series, and more">
        </form>
    </div></div>

        <div class="profile">
           
             <span class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Profile</a>
    <ul class="dropdown-menu" style="background-color: #cbfc01; color:black;">
       <a class="dropdown-item" href="profile.php"><i class="bi bi-person-circle"></i> <span>Profile</span></a>

            
      <li><hr class="dropdown-divider"></li>
      <a class="dropdown-item logout" href="logout.php"><i class="bi bi-box-arrow-right"></i> <span>Logout</span></a>
    </ul>
  </span>
        </div>
    </section>