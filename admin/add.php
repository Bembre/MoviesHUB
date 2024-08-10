<?php

    // Start the session
    session_start();

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "movie";
    $conn = new mysqli($servername, $username, $password, $dbname);


    // Access user data from session variables
    $user_id = $_SESSION['user_id'];
    $user_name = $_SESSION['user_name'];
    // $user_email = $_SESSION['user_email'];
    $user_profile = $_SESSION['user_profile'];


	
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- CSS -->
	<link rel="stylesheet" href="css/bootstrap-reboot.min.css">
	<link rel="stylesheet" href="css/bootstrap-grid.min.css">
	<link rel="stylesheet" href="css/magnific-popup.css">
	<link rel="stylesheet" href="css/select2.min.css">
	<link rel="stylesheet" href="css/admin.css">

	
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="Dmitry Volkov">
	<title>MoviesHub</title>

</head>
<body>

	<!-- header -->
	<header class="header">
		<div class="header__content">
			<!-- header logo -->
			<a href="index.php" class="header__logo">
				<h1 style="color: #fff;">Movieshub</h1>
			</a>
			<!-- end header logo -->

			<!-- header menu btn -->
			<button class="header__btn" type="button">
				<span></span>
				<span></span>
				<span></span>
			</button>
			<!-- end header menu btn -->
		</div>
	</header>
	<!-- end header -->

	<!-- sidebar -->
	<div class="sidebar">
		<!-- sidebar logo -->
		<a href="index.php" class="sidebar__logo">
			<h1 style="color: #fff;">Movieshub</h1>
		</a>
		<!-- end sidebar logo -->
		
		<!-- sidebar user -->
		<div class="sidebar__user">
			<div class="sidebar__user-img">
				<img src="media/<?php echo $user_profile ?>" alt="">
			</div>

			<div class="sidebar__user-title">
				<span>Admin</span>
				<p><?php echo $user_name ?></p>
			</div>

			<button class="sidebar__user-btn" type="button">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M4,12a1,1,0,0,0,1,1h7.59l-2.3,2.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0l4-4a1,1,0,0,0,.21-.33,1,1,0,0,0,0-.76,1,1,0,0,0-.21-.33l-4-4a1,1,0,1,0-1.42,1.42L12.59,11H5A1,1,0,0,0,4,12ZM17,2H7A3,3,0,0,0,4,5V8A1,1,0,0,0,6,8V5A1,1,0,0,1,7,4H17a1,1,0,0,1,1,1V19a1,1,0,0,1-1,1H7a1,1,0,0,1-1-1V16a1,1,0,0,0-2,0v3a3,3,0,0,0,3,3H17a3,3,0,0,0,3-3V5A3,3,0,0,0,17,2Z"/></svg>
			</button>
		</div>
		<!-- end sidebar user -->

		<!-- sidebar nav -->
		<ul class="sidebar__nav">
			<li class="sidebar__nav-item">
				<a href="index.php" class="sidebar__nav-link"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M20,8h0L14,2.74a3,3,0,0,0-4,0L4,8a3,3,0,0,0-1,2.26V19a3,3,0,0,0,3,3H18a3,3,0,0,0,3-3V10.25A3,3,0,0,0,20,8ZM14,20H10V15a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1Zm5-1a1,1,0,0,1-1,1H16V15a3,3,0,0,0-3-3H11a3,3,0,0,0-3,3v5H6a1,1,0,0,1-1-1V10.25a1,1,0,0,1,.34-.75l6-5.25a1,1,0,0,1,1.32,0l6,5.25a1,1,0,0,1,.34.75Z"/></svg> <span>Dashboard</span></a>
			</li>

			<li class="sidebar__nav-item">
				<a href="catalog.php" class="sidebar__nav-link"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M10,13H3a1,1,0,0,0-1,1v7a1,1,0,0,0,1,1h7a1,1,0,0,0,1-1V14A1,1,0,0,0,10,13ZM9,20H4V15H9ZM21,2H14a1,1,0,0,0-1,1v7a1,1,0,0,0,1,1h7a1,1,0,0,0,1-1V3A1,1,0,0,0,21,2ZM20,9H15V4h5Zm1,4H14a1,1,0,0,0-1,1v7a1,1,0,0,0,1,1h7a1,1,0,0,0,1-1V14A1,1,0,0,0,21,13Zm-1,7H15V15h5ZM10,2H3A1,1,0,0,0,2,3v7a1,1,0,0,0,1,1h7a1,1,0,0,0,1-1V3A1,1,0,0,0,10,2ZM9,9H4V4H9Z"/></svg> <span>Catalog</span></a>
			</li>

			<!-- collapse -->
			<li class="sidebar__nav-item">
				<a class="sidebar__nav-link sidebar__nav-link--active" data-toggle="collapse" href="#collapseMenu" role="button" aria-expanded="true" aria-controls="collapseMenu"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M19,5.5H12.72l-.32-1a3,3,0,0,0-2.84-2H5a3,3,0,0,0-3,3v13a3,3,0,0,0,3,3H19a3,3,0,0,0,3-3V8.5A3,3,0,0,0,19,5.5Zm1,13a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V5.5a1,1,0,0,1,1-1H9.56a1,1,0,0,1,.95.68l.54,1.64A1,1,0,0,0,12,7.5h7a1,1,0,0,1,1,1Z"/></svg> <span>Add item</span></a>
			</li>
			<!-- end collapse -->

			

			<!-- <li class="sidebar__nav-item">
				<a href="comments.html" class="sidebar__nav-link"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M8,11a1,1,0,1,0,1,1A1,1,0,0,0,8,11Zm4,0a1,1,0,1,0,1,1A1,1,0,0,0,12,11Zm4,0a1,1,0,1,0,1,1A1,1,0,0,0,16,11ZM12,2A10,10,0,0,0,2,12a9.89,9.89,0,0,0,2.26,6.33l-2,2a1,1,0,0,0-.21,1.09A1,1,0,0,0,3,22h9A10,10,0,0,0,12,2Zm0,18H5.41l.93-.93a1,1,0,0,0,.3-.71,1,1,0,0,0-.3-.7A8,8,0,1,1,12,20Z"/></svg> <span>Comments</span></a>
			</li>

			<li class="sidebar__nav-item">
				<a href="reviews.html" class="sidebar__nav-link"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M22,9.67A1,1,0,0,0,21.14,9l-5.69-.83L12.9,3a1,1,0,0,0-1.8,0L8.55,8.16,2.86,9a1,1,0,0,0-.81.68,1,1,0,0,0,.25,1l4.13,4-1,5.68A1,1,0,0,0,6.9,21.44L12,18.77l5.1,2.67a.93.93,0,0,0,.46.12,1,1,0,0,0,.59-.19,1,1,0,0,0,.4-1l-1-5.68,4.13-4A1,1,0,0,0,22,9.67Zm-6.15,4a1,1,0,0,0-.29.88l.72,4.2-3.76-2a1.06,1.06,0,0,0-.94,0l-3.76,2,.72-4.2a1,1,0,0,0-.29-.88l-3-3,4.21-.61a1,1,0,0,0,.76-.55L12,5.7l1.88,3.82a1,1,0,0,0,.76.55l4.21.61Z"/></svg> <span>Reviews</span></a>
			</li>
			<li class="sidebar__nav-item">
				<a href="https://MoviesHub.volkovdesign.com/main/index.php" class="sidebar__nav-link"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M17,11H9.41l3.3-3.29a1,1,0,1,0-1.42-1.42l-5,5a1,1,0,0,0-.21.33,1,1,0,0,0,0,.76,1,1,0,0,0,.21.33l5,5a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42L9.41,13H17a1,1,0,0,0,0-2Z"/></svg> <span>Back to MoviesHub</span></a>
			</li> -->
		</ul>
		<!-- end sidebar nav -->
		
		<!-- sidebar copyright -->
		<div class="sidebar__copyright">© MoviesHub <br>Create by <strong>Prathamesh Bembre</strong></div>
		<!-- end sidebar copyright -->
	</div>
	<!-- end sidebar -->

	<!-- main content -->
	<main class="main">
		<div class="container-fluid">
			<div class="row">
				<!-- main title -->
				<div class="col-12">
					<div class="main__title">
						<h2>Add new item</h2>
					</div>
				</div>
				<!-- end main title -->

				<!-- form -->
				<div class="col-12">
					<form action="addb.php" method="post" class="form">
						<div class="row">
							<div class="col-12 col-md-5 form__cover">
								<div class="row">
									<div class="col-12 col-sm-6 col-md-12">
										<div class="form__img">
											<label for="form__img-upload">Upload cover</label>
											<input id="form__img-upload" name="img" type="file" >
											<img id="form__img" src="#" alt=" ">
										</div>
									</div>
								</div>
							</div>

							<div class="col-12 col-md-7 form__content">
								<div class="row">
									<div class="col-12">
										<div class="form__group">
											<input type="text" class="form__input" name="title" placeholder="Title">
										</div>
									</div>

									<div class="col-12">
										<div class="form__group">
											<textarea id="text" name="des" class="form__textarea" placeholder="Description"></textarea>
										</div>
									</div>
				
									<ul class="form__radio">
									    <li>
									        <span>Genre:</span>
									    </li>
									</ul>
									<div class="row">
									    <div class="col-12 col-sm-3 col-lg-3">
									        <div class="form__group">
									            <input type="text" class="form__input" name="t1">
									        </div>
									    </div>
									    <div class="col-12 col-sm-3 col-lg-3">
									        <div class="form__group">
									            <input type="text" class="form__input" name="t2">
									        </div>
									    </div>
									    <div class="col-12 col-sm-3 col-lg-3">
									        <div class="form__group">
									            <input type="text" class="form__input" name="t3">
									        </div>
									    </div>
									    <div class="col-12 col-sm-3 col-lg-3">
									        <div class="form__group">
									            <input type="text" class="form__input" name="t4">
									        </div>
									    </div>
									</div>

									<div class="col-12 col-lg-6">
									<div class="form__video">
											<label id="movie1" for="form__video-upload">Upload Movie</label>
											<input data-name="#movie1" id="form__video-upload" name="movie" class="form__video-upload" type="file" accept="video/mp4,video/x-m4v,video/*">
										</div>
									</div>

									<div class="col-12 col-lg-6">
									<div class="form__group form__group--link">
											<input type="text" class="form__input" name="link" placeholder="Add a trailer link">
										</div>
									</div>

									
								</div>
							</div>

							<div class="col-12">
								<ul class="form__radio">
									<li>
										<span>Screen Shoot</span>
									</li>
								</ul>
								<div class="row">
									<div class="col-6">
										<div class="form__gallery">
											<label id="gallery1" for="form__gallery-upload1">Upload Screen Shoot</label>
											<input data-name="#gallery1" id="form__gallery-upload1" name="s1" class="form__gallery-upload" type="file">
										</div>
									</div>
									<div class="col-6">
										<div class="form__gallery">
											<label id="gallery2" for="form__gallery-upload2">Upload Screen Shoot</label>
											<input data-name="#gallery2" id="form__gallery-upload2" name="s2" class="form__gallery-upload" type="file" >
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-6">
										<div class="form__gallery">
											<label id="gallery3" for="form__gallery-upload3">Upload Screen Shoot</label>
											<input data-name="#gallery3" id="form__gallery-upload3" name="s3" class="form__gallery-upload" type="file" >
										</div>
									</div>
									<div class="col-6">
										<div class="form__gallery">
											<label id="gallery4" for="form__gallery-upload4">Upload Screen Shoot</label>
											<input data-name="#gallery4" id="form__gallery-upload4" name="s4" class="form__gallery-upload" type="file" >
										</div>
									</div>
								</div>
							</div>
							
							
							<div class="col-12" style="display: flex; justify-content: center;">
    <!-- <button type="button" class="form__btn">publish</button> -->
	<input type="submit" value="Publish" class="form__btn">
</div>
							
						</div>
					</form>
				</div>
				<!-- end form -->
			</div>
		</div>
	</main>
	<!-- end main content -->

	<!-- JS -->
	<script src="js/jquery-3.5.1.min.js"></script>
	<script src="js/bootstrap.bundle.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/smooth-scrollbar.js"></script>
	<script src="js/select2.min.js"></script>
	<script src="js/admin.js"></script>
</body>

<!-- Mirrored from MoviesHub.volkovdesign.com/admin/add-item.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 04 Jun 2024 07:09:41 GMT -->
</html>