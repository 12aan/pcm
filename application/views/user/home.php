<!-- Page body -->
<style>
	.card-text {
		margin-bottom: 0;
		color: white;
		text-align: justify;
		font-size: auto;
		line-height: 1.5;
		/* Memastikan ada jarak antar baris teks */
		overflow: hidden;
		text-overflow: ellipsis;
		/* Menambahkan titik-titik jika teks terlalu panjang */
		display: -webkit-box;
		-webkit-line-clamp: 3;
		/* Batas jumlah baris teks, ubah sesuai kebutuhan */
		-webkit-box-orient: vertical;
	}
</style>

<div class="page-body">
	<div class="container-xl">
		<div class="row row-deck row-cards">

			<!-- START KABAR BERITA -->
			<div class="col-lg-8">
				<div class="row row-cards">
					<div class="col-20">
						<div class="card">
							<div class="card-body row">
								<div class="col-auto">
									<h1>Berita Masa Kini</h1>
								</div>
								<div class="col-auto ms-auto d-flex align-items-center">
									<button class="btn btn-outline-secondary prev-berita">&lt;&lt;</button>
									<button class="btn btn-outline-secondary next-berita">&gt;&gt;</button>
								</div>
							</div>
							<!-- Berita Utama -->
							<div class="card-body">
								<div class="berita-utama-container mb-4">
									<!-- Berita utama akan dimasukkan di sini oleh JavaScript -->
								</div>
							</div>
							<!-- Berita Lainnya -->
							<div class="card-body">
								<div class="divide-y berita-container">
									<!-- Konten berita lainnya akan dimasukkan di sini oleh JavaScript -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<script>
				var beritaData = <?php echo json_encode($berita); ?>;
				var beritaItemsPerPage = 5; // Jumlah berita per halaman
				var beritaTotalPages = Math.ceil((beritaData.length - 1) / beritaItemsPerPage);
				var beritaCurrentPage = 1;

				// Fungsi untuk menampilkan berita utama
				function displayBeritaUtama() {
					const beritaUtama = beritaData[0];
					const container = document.querySelector('.berita-utama-container');
					container.innerHTML = `
			<div class="position-relative" style="height: 300px;">
				<a href="<?php echo site_url('home/beritadetail/'); ?>${beritaUtama.id_berita}" class="text-decoration-none">
					<img src="<?php echo base_url('./uploads/'); ?>${beritaUtama.avatar}" alt="Berita Utama" style="width: 100%; height: 100%; object-fit: cover;">
					<div class="position-absolute bottom-0 start-0 p-3 text-white" style="background: rgba(0, 0, 0, 0.6); width: 100%;">
						<h3>${beritaUtama.judul_berita}</h3>
					</div>
				</a>
			</div>`;
				}

				// Fungsi untuk menampilkan berita lainnya
				function displayBerita(page) {
					const start = 1 + (page - 1) * beritaItemsPerPage;
					const end = start + beritaItemsPerPage;
					const beritaPage = beritaData.slice(start, end);

					const container = document.querySelector('.berita-container');
					container.innerHTML = '';

					beritaPage.forEach(item => {
						container.innerHTML += `
				<div class="row mb-3 align-items-start">
					<a href="<?php echo site_url('home/beritadetail/'); ?>${item.id_berita}" class="text-decoration-none text-dark-mode d-flex align-items-start">
						<div class="col-auto">
							<img src="<?php echo base_url('./uploads/'); ?>${item.avatar}" alt="Avatar ${item.id_berita}" class="avatar" style="width: 100px; height: 100px;">
						</div>
						<div class="col ms-3">
							<h4 class="card-text text-muted">${item.judul_berita}</h4>
							<ul class="list-unstyled mt-2">
								<li class="d-inline-block me-2">
									<small class="text-danger">&square;</small>
									<small class="text-muted">Berita</small>
								</li>
								<li class="d-inline-block me-3">
									<small class="text-muted text-dark-mode">${new Date(item.tanggal_upload).toLocaleDateString('id-ID')}</small>
								</li>
							</ul>
						</div>
					</a>
				</div>`;
					});

					document.querySelector('.prev-berita').disabled = page === 1;
					document.querySelector('.next-berita').disabled = page === beritaTotalPages;
				}

				// Event listener untuk navigasi
				document.querySelector('.prev-berita').addEventListener('click', function() {
					if (beritaCurrentPage > 1) {
						beritaCurrentPage--;
						displayBerita(beritaCurrentPage);
					}
				});

				document.querySelector('.next-berita').addEventListener('click', function() {
					if (beritaCurrentPage < beritaTotalPages) {
						beritaCurrentPage++;
						displayBerita(beritaCurrentPage);
					}
				});

				// Panggil fungsi untuk menampilkan berita utama dan berita lainnya
				displayBeritaUtama();
				displayBerita(beritaCurrentPage);
			</script>


			<!-- END KABAR BERITA -->


			<!-- START PENGUMUMAN -->
			<div class="col-lg-4">
				<div class="row row-cards">
					<div class="col-100">
						<div class="card d-flex">
							<div class="card-body d-flex justify-content-between align-items-center">
								<h2 class="m-0">Pengumuman</h2>
								<div class="d-flex align-items-center">
									<svg class="icon icon-tabler icons-tabler-outline icon-tabler-chevrons-left me-2 prev-page" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
										<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
										<path d="M11 7l-5 5l5 5"></path>
										<path d="M17 7l-5 5l5 5"></path>
									</svg>
									<svg class="icon icon-tabler icons-tabler-outline icon-tabler-chevrons-right next-page" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
										<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
										<path d="M7 7l5 5l-5 5"></path>
										<path d="M13 7l5 5l-5 5"></path>
									</svg>
								</div>
							</div>

							<!-- DATA -->
							<div class=" overflow-auto announcement-container" style="height: 1124px;">
								<!-- Content will be injected here by JavaScript -->
							</div>
							<!-- END DATA -->

						</div>
					</div>
				</div>
			</div>
			<!-- END PENGUMUMAN -->
			<?php
			// Assuming $pengumuman is your data array
			$items_per_page = 10; // Items per page
			$total_items = count($pengumuman);
			$total_pages = ceil($total_items / $items_per_page);
			?>

			<script>
				var pengumumanData = <?php echo json_encode($pengumuman); ?>;
				var itemsPerPage = <?php echo $items_per_page; ?>;
				var totalPages = <?php echo $total_pages; ?>;
				var currentPage = 1;
			</script>
			<script>
				function displayPengumuman(page) {
					const start = (page - 1) * itemsPerPage;
					const end = start + itemsPerPage;
					const pengumumanPage = pengumumanData.slice(start, end);

					const container = document.querySelector('.announcement-container');
					container.innerHTML = ''; // Clear the existing content

					pengumumanPage.forEach(item => {
						// Pisahkan judul menjadi array kata-kata
						let words = item.judul_berita.split(' ');
						// Ambil hanya 5 kata pertama
						let limitedTitle = words.slice(0, 9).join(' ');
						// Tambahkan "..." jika ada lebih dari 5 kata
						if (words.length > 5) {
							limitedTitle += '......';
						}
						container.innerHTML += `
							<div class="card-body">
								<a href="home/pengumumandetail/${item.id_pengumuman}" class="text-decoration-none">
									<div class="">
										<h4 class="card-text text-muted" data-toggle="tooltip" title="${item.judul_berita}">${limitedTitle}</h4>
									</div>
									<div class="col">
										<ul class="list-unstyled mt-2">
											<li class="d-inline-block me-2">
												<small class="text-danger">&square;</small>
												<small class="text-muted">Berita</small>
											</li>
											<li class="d-inline-block me-3">
												<small class="text-muted">${new Date(item.tanggal_upload).toLocaleDateString('id-ID')}</small>
											</li>
										</ul>
									</div>
								</a>
							</div>`;
					});
					// Update the state of pagination buttons
					document.querySelector('.prev-page').disabled = page === 1;
					document.querySelector('.next-page').disabled = page === totalPages;
				}

				// Event listeners for pagination buttons
				document.querySelector('.prev-page').addEventListener('click', function() {
					if (currentPage > 1) {
						currentPage--;
						displayPengumuman(currentPage);
					}
				});

				document.querySelector('.next-page').addEventListener('click', function() {
					if (currentPage < totalPages) {
						currentPage++;
						displayPengumuman(currentPage);
					}
				});

				// Initial call to display the first page
				displayPengumuman(currentPage);
			</script>

			<!-- KABAR RANTING -->
			<div class="col-lg-8">
				<div class="row row-cards">
					<div class="col-20">
						<div class="card">
							<div class="card-body row">
								<div class="col-auto">
									<h1>KABAR RANTING</h1>
								</div>
								<div class="col-auto ms-auto d-flex align-items-center">
									<button class="btn btn-outline-secondary prev-kabar">&lt;&lt;</button>
									<button class="btn btn-outline-secondary next-kabar">&gt;&gt;</button>
								</div>
							</div>
							<div class="card-body">
								<div class="divide-y kabar-container">
									<!-- Content will be injected here by JavaScript -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<script>
				var kabarData = <?php echo json_encode($kabar_ranting); ?>;
				console.log(kabarData);

				var kabarItemsPerPage = 5;
				var kabarTotalPages = Math.ceil(kabarData.length / kabarItemsPerPage);
				var kabarCurrentPage = 1;

				function displayKabar(page) {
					const start = (page - 1) * kabarItemsPerPage;
					const end = start + kabarItemsPerPage;
					const kabarPage = kabarData.slice(start, end);

					const container = document.querySelector('.kabar-container');
					container.innerHTML = '';

					kabarPage.forEach(item => {
						container.innerHTML += `
							<div class="row mb-3 align-items-start">
								<a href="<?php echo base_url('home/kabarrantingdetail/'); ?>${item.id_kabar_ranting}" class="text-decoration-none text-dark d-flex align-items-start" >
									<div class="col-auto">
										<img src="<?php echo base_url('./uploads/'); ?>${item.avatar}" alt="Avatar ${item.id_kabar_ranting}" class="avatar" style="width: 100px; height: 100px;">
									</div>
									<div class="col ms-3">
										<h4 class="card-text text-muted">${item.judul_berita}</h4>
									
										<ul class="list-unstyled mt-2">
											<li class="d-inline-block me-2">
												<small class="text-danger">&square;</small>
												<small class="text-muted">Berita</small>
											</li>
											<li class="d-inline-block me-3"><small class="text-muted">${new Date(item.tanggal_upload).toLocaleDateString('id-ID')}</small></li>
										</ul>
									</div>
								</a>
							</div>`;
					});
					document.querySelector('.prev-kabar').disabled = page === 1;
					document.querySelector('.next-kabar').disabled = page === kabarTotalPages;
				}

				document.querySelector('.prev-kabar').addEventListener('click', function() {
					if (kabarCurrentPage > 1) {
						kabarCurrentPage--;
						displayKabar(kabarCurrentPage);
					}
				});

				document.querySelector('.next-kabar').addEventListener('click', function() {
					if (kabarCurrentPage < kabarTotalPages) {
						kabarCurrentPage++;
						displayKabar(kabarCurrentPage);
					}
				});

				displayKabar(kabarCurrentPage);
			</script>

			<!-- END KABAR RANTING -->

			<div class="col-lg-4">
				<div class="card h-100">
					<div class="card-body">
						<h1>Facebook </h1>
						<div class="fb-page" data-href="https://www.facebook.com/pcmkasihanistimewa/?ref=embed_page" data-tabs="timeline" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
							<blockquote cite="https://www.facebook.com/pcmkasihanistimewa/?ref=embed_page" class="fb-xfbml-parse-ignore">
								<a href="https://www.facebook.com/pcmkasihanistimewa/?ref=embed_page">Facebook Profile Name</a>
							</blockquote>
						</div>
					</div>
				</div>
			</div>

			<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v14.0"></script>


			<div class="col-lg-8">
				<div class="card h-100">
					<div class="card-body">
						<h1>Instagram</h1>
						<blockquote class="instagram-media" data-instgrm-permalink="https://www.instagram.com/pcmkasihan/" data-instgrm-version="14"></blockquote>
						<script async defer src="//www.instagram.com/embed.js"></script>
					</div>
				</div>
			</div>



			<!-- LOKASI BERGUNA -->
			<div class="col-lg-4">
				<div class="card">
					<div class="card-body">
						<h3 class="card-title">Peta Miniatur Masjid Raya Aceh</h3>
						<div class="ratio ratio-21x9">
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2794.947287182443!2d110.34560687363621!3d-7.82656970246922!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a57c512053acf%3A0xf0937a7b18e8acbe!2sMiniatur+Masjid+Raya+Baiturrahman+Aceh+Yogyakarta!5e0!3m2!1sid!2s!4v1489567752613" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-12">
				<div class="card">
					<div class="card-body">
						<h3 class="card-title">Galeri</h3>
						<div class="gallery-container row">
							<!-- Gallery images will be injected here by JavaScript -->
						</div>

						<div class="d-flex justify-content-between align-items-center mt-3">
							<button class="btn btn-outline-secondary prev-gallery">&lt;&lt; Previous</button>
							<button class="btn btn-outline-secondary next-gallery">Next &gt;&gt;</button>
						</div>
					</div>
				</div>
			</div>

			<script>
				var galleryData = <?php echo json_encode($galeri); ?>;
				var galleryItemsPerPage = 6; // Set the number of images per page
				var galleryTotalPages = Math.ceil(galleryData.length / galleryItemsPerPage);
				var galleryCurrentPage = 1;

				function displayGallery(page) {
					const start = (page - 1) * galleryItemsPerPage;
					const end = start + galleryItemsPerPage;
					const galleryPage = galleryData.slice(start, end);

					const container = document.querySelector('.gallery-container');
					container.innerHTML = ''; // Clear previous images

					galleryPage.forEach(item => {
						container.innerHTML += `
                <div class="col-lg-2">
					<a href="<?php echo base_url('home/galeridetail/'); ?>${item.id_galeri}">
						<img src="<?php echo base_url('./uploads/'); ?>${item.avatar}" alt="Gallery Image" class="w-100" style="height: 200px; object-fit: cover;" data-toggle="tooltip" title="${item.judul_berita}" />
					</a>
                </div>`;
					});

					document.querySelector('.prev-gallery').disabled = page === 1;
					document.querySelector('.next-gallery').disabled = page === galleryTotalPages;
				}

				document.querySelector('.prev-gallery').addEventListener('click', function() {
					if (galleryCurrentPage > 1) {
						galleryCurrentPage--;
						displayGallery(galleryCurrentPage);
					}
				});

				document.querySelector('.next-gallery').addEventListener('click', function() {
					if (galleryCurrentPage < galleryTotalPages) {
						galleryCurrentPage++;
						displayGallery(galleryCurrentPage);
					}
				});

				displayGallery(galleryCurrentPage);
			</script>



		</div>
	</div>
</div>