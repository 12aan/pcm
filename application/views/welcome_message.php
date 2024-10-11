<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Website Berita</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<!-- Font Awesome CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
	<style>
		body {
			margin: 0;
			padding: 0;
		}

		.container .navbar {
			max-width: 1200px;
			/* Adjust the maximum width of the container */
			padding-left: 10px;
			/* Add padding to the left */
			padding-right: 1000px;
			/* Add padding to the right */
		}


		.header {
			background-color: #fff;
			transition: background-color 0.3s ease;
			padding: 10px 0;
			position: fixed;
			width: 100%;
			z-index: 1001;
		}

		.header img {
			height: 50px;
		}

		.navbar {
			background-color: #343a40;
			transition: background-color 0.3s ease;
			margin-top: 60px;
			/* Adjust the margin-top value as needed */
		}

		.navbar.fixed-top {
			position: fixed;
			top: 10px;
			/* Height of the fixed header */
			width: 100%;
			z-index: 1000;
		}

		.dtkframebar__search {
			width: 100%;
			text-align: center;
			position: fixed;
			left: 0;
			top: 0;
			z-index: 1;
			background-color: #f8f9fa;
		}

		.search-form {
			border-radius: 20px;
		}

		.content {
			margin-top: 80px;
			/* Adjust the margin-top value based on your navbar height */
		}

		.news-item {
			display: flex;
		}

		.custom-image {
			max-width: 20%;
		}

		.news-content {
			padding: 10px;
		}

		.image-container {
			flex: 1;
			margin-right: 15px;
		}

		.image-container img {
			width: 100%;
			border-radius: 8px;
		}

		.text-container {
			flex: 2;
		}

		.news-item h5 {
			margin-bottom: 5px;
		}

		.news-item p {
			margin-bottom: 15px;
		}

		.announcement-item h5 {
			margin-bottom: 10px;
		}

		.box-left,
		.box-right {
			background-color: #f8f9fa;
			border-radius: 10px;
			padding: 15px;
			margin-top: 10px;
		}

		.box-left {
			float: left;
			width: 100%;
			box-sizing: border-box;
		}

		.box-right {
			float: right;
			width: 100%;
			box-sizing: border-box;
		}

		@media (max-width: 768px) {

			.box-left,
			.box-right {
				width: 100%;
				float: none;
			}
		}

		/* Tambahkan margin-top untuk menyesuaikan dengan navbar */
		@media (min-width: 768px) {

			.box-left,
			.box-right {
				margin-top: 20px;
			}
		}




		.footer {
			background-color: #f8f9fa;
			padding: 20px 0;
		}

		.article {
			margin-bottom: 20px;
		}

		/* Media queries for responsiveness */
		@media (max-width: 576px) {
			.header .col-4 {
				text-align: center;
			}

			.header .col-4 img {
				display: block;
				margin: 0 auto;
			}

			.header .col-4.text-right {
				text-align: center;
			}
		}

		@media (max-width: 768px) {
			.header .col-4 {
				width: 100%;
			}
		}
	</style>
</head>

<body>
	<!-- Header -->
	<div class="header dtkframebar__search">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-4 text-left">
					<img src="assets/images/logomuh.png" alt="Logo" class="img-fluid">
				</div>


				<div class="col-4 text-center">
					<form class="search-form br-20">
						<div class="input-group">
							<input class="form-control search-input" type="search" placeholder="Cari" aria-label="Cari">
						</div>
					</form>
				</div>


				<div class="col-4 text-right">
					<div class="social-icons">
						<i class="fab fa-facebook text-primary"></i>
						<i class="fab fa-instagram text-danger"></i>
						<i class="fab fa-youtube text-danger"></i>
						<i class="fab fa-twitter text-info"></i>
						<i class="fas fa-user text-dark"></i>
					</div>
				</div>
			</div>
		</div>
	</div>



	<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
		<div class="container">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav">
					<li class="nav-item active">
						<a class="nav-link" href="#">HOME<span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">KAJIAN</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">AMAL USAHA</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">PRM</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">ORTOM</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">SEKOLAH</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">ADMINOR</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">PUSTAKA</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<!-- Main Content -->
	<div class="row mt-2">
		<!-- Left Container for News -->
		<div class="col-md-8 overflow-auto" style="max-height: 500px;">
			<div class="card">
				<div class="card-body">
					<div class="news-content d-flex align-items-start">
						<img src="assets/images/berita.jpg" class="custom-image card-img-top mr-3" alt="News Image">
						<!-- Kontainer besar untuk judul dan berita -->
						<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
					</div>
					<div class="news-content d-flex align-items-start">
						<img src="assets/images/berita.jpg" class="custom-image card-img-top mr-3" alt="News Image">
						<!-- Kontainer besar untuk judul dan berita -->
						<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
					</div>
					<div class="news-content d-flex align-items-start">
						<img src="assets/images/berita.jpg" class="custom-image card-img-top mr-3" alt="News Image">
						<!-- Kontainer besar untuk judul dan berita -->
						<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
					</div>
					<div class="news-content d-flex align-items-start">
						<img src="assets/images/berita.jpg" class="custom-image card-img-top mr-3" alt="News Image">
						<!-- Kontainer besar untuk judul dan berita -->
						<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
					</div>
					<div class="news-content d-flex align-items-start">
						<img src="assets/images/berita.jpg" class="custom-image card-img-top mr-3" alt="News Image">
						<!-- Kontainer besar untuk judul dan berita -->
						<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
					</div>
					<div class="news-content d-flex align-items-start">
						<img src="assets/images/berita.jpg" class="custom-image card-img-top mr-3" alt="News Image">
						<!-- Kontainer besar untuk judul dan berita -->
						<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
					</div>
					<div class="news-content d-flex align-items-start">
						<img src="assets/images/berita.jpg" class="custom-image card-img-top mr-3" alt="News Image">
						<!-- Kontainer besar untuk judul dan berita -->
						<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
					</div>
					<div class="news-content d-flex align-items-start">
						<img src="assets/images/berita.jpg" class="custom-image card-img-top mr-3" alt="News Image">
						<!-- Kontainer besar untuk judul dan berita -->
						<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
					</div>
					<div class="news-content d-flex align-items-start">
						<img src="assets/images/berita.jpg" class="custom-image card-img-top mr-3" alt="News Image">
						<!-- Kontainer besar untuk judul dan berita -->
						<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
					</div>
					<div class="news-content d-flex align-items-start">
						<img src="assets/images/berita.jpg" class="custom-image card-img-top mr-3" alt="News Image">
						<!-- Kontainer besar untuk judul dan berita -->
						<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
					</div>
				</div>
			</div>
		</div>

		<!-- Right Container for Announcements -->
		<div class="col-md-4">
			<div class="card">
				<div class="card-body">
					<h5 class="card-title">Announcement Title</h5>
					<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
				</div>
			</div>
		</div>
	</div>
	</div>

	<!-- Footer -->
	<footer class="footer mt-5">
		<div class="container">
			<p>&copy; 2023 Website Berita</p>
		</div>
	</footer>

	<!-- Bootstrap JS and FontAwesome Icons -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@2.10.2/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>