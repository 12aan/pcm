<style>
	.pengumuman-container .row {
		display: flex;
		align-items: start;
		/* Menyelaraskan elemen di bagian atas */
		margin-bottom: 1rem;
	}


	.pengumuman-container .col-auto img {
		width: 100px;
		height: 100px;
		/* Tetap tinggi gambar */
		object-fit: cover;
		/* Memastikan gambar dipotong agar pas */
	}


	.pengumuman-container .col {
		flex: 1;
		/* Kolom ini akan mengambil ruang yang tersedia */
		margin-left: 1rem;
		overflow: hidden;
		/* Memastikan konten tidak melebihi batas */
	}

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
			<!-- Pengumuman Section -->
			<div class="col-lg-9">
				<div class="card">
					<div class="card-header">
						<h1 class="">Pengumuman</h1>
					</div>
					<div class="card-body row pengumuman-container">
						<!-- Pengumuman items will be injected here by JavaScript -->
					</div>

					<!-- Pagination Controls -->
					<div class="d-flex justify-content-between align-items-center mt-3">
						<button class="btn btn-outline-secondary prev-pengumuman">&lt;&lt; Previous</button>
						<button class="btn btn-outline-secondary next-pengumuman">Next &gt;&gt;</button>
					</div>
				</div>
			</div>

			<!-- Latepost Section -->
			<!-- Latepost Section -->
			<div class="col-lg-3">
				<div class="row row-cards">
					<div class="col-100">
						<div class="card" style="height: 15rem; position: sticky; top: 20px;">
							<div class="card-body d-flex justify-content-between align-items-center">
								<h2 class="m-0">Latepost</h2>
								<div class="d-flex align-items-center">
									<svg class="icon icon-tabler icons-tabler-outline icon-tabler-chevrons-left me-2 prev-latepost" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
										<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
										<path d="M11 7l-5 5l5 5"></path>
										<path d="M17 7l-5 5l5 5"></path>
									</svg>
									<svg class="icon icon-tabler icons-tabler-outline icon-tabler-chevrons-right next-latepost" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
										<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
										<path d="M7 7l5 5l-5 5"></path>
										<path d="M13 7l5 5l-5 5"></path>
									</svg>
								</div>
							</div>

							<!-- DATA -->
							<div class="overflow-auto latepost-container" style="height: 500px;">
								<!-- Content will be injected here by JavaScript -->
							</div>
							<!-- END DATA -->

							<!-- Pagination Controls -->
							<!-- <div class="d-flex justify-content-between align-items-center mt-3">
								<button class="btn btn-outline-secondary prev-latepost">&lt;&lt; Previous</button>
								<button class="btn btn-outline-secondary next-latepost">Next &gt;&gt;</button>
							</div> -->
						</div>
					</div>
				</div>
				<!-- END LATEPOST -->
			</div>
		</div>
	</div>
</div>

<script>
	// Pengumuman Pagination
	var pengumumanData = <?php echo json_encode($konten); ?>;
	var pengumumanItemsPerPage = 5; // Set the number of pengumuman items per page
	var pengumumanCurrentPage = 1;
	var filteredPengumumanData = pengumumanData.filter(item => item.nama_kategori === 'Pengumuman');
	var totalPages = Math.ceil(filteredPengumumanData.length / pengumumanItemsPerPage);

	function displayPengumuman(page) {
		const start = (page - 1) * pengumumanItemsPerPage;
		const end = start + pengumumanItemsPerPage;
		const pengumumanPage = filteredPengumumanData.slice(start, end);

		const container = document.querySelector('.pengumuman-container');
		container.innerHTML = ''; // Clear the existing content

		pengumumanPage.forEach(item => {
			container.innerHTML += `
				<div class="row mb-3 align-items-start">
					<a href="<?php echo site_url('home/pengumumandetail/'); ?>${item.id_konten}" class="text-decoration-none text-dark d-flex align-items-start">
						<div class="col-auto mb-4">
							<img src="<?php echo base_url('./uploads/'); ?>${item.gambar}" alt="gambar ${item.id_konten}" class="gambar" style="width: 100px; height: 100px;">
						</div>
						<div class="col ms-3">
							<h3 class="card-text text-muted">${item.judul}</h3>
							<ul class="list-unstyled mt-2">
								<li class="d-inline-block me-2">
									<small class="text-danger">&square;</small>
									 <small class="text-muted">${item.nama_kategori}</small>
								</li>
								<li class="d-inline-block me-3">
									<small class="text-muted">${new Date(item.tanggal_posting).toLocaleDateString('id-ID')}</small>
								</li>
							</ul>
						</div>
					</a>
				</div>`;
		});

		document.querySelector('.prev-pengumuman').disabled = page === 1;
		document.querySelector('.next-pengumuman').disabled = page === totalPages;
	}

	document.querySelector('.prev-pengumuman').addEventListener('click', function() {
		if (pengumumanCurrentPage > 1) {
			pengumumanCurrentPage--;
			displayPengumuman(pengumumanCurrentPage);
		}
	});

	document.querySelector('.next-pengumuman').addEventListener('click', function() {
		if (pengumumanCurrentPage < totalPages) {
			pengumumanCurrentPage++;
			displayPengumuman(pengumumanCurrentPage);
		}
	});

	// Latepost Pagination
	var latepostData = <?php echo json_encode($latepost_photos); ?>;
	var latepostItemsPerPage = 1; // Set the number of latepost items per page
	var latepostTotalPages = Math.ceil(latepostData.length / latepostItemsPerPage);
	var latepostCurrentPage = 1;

	function displayLatepost(page) {
		const start = (page - 1) * latepostItemsPerPage;
		const end = start + latepostItemsPerPage;
		const latepostPage = latepostData.slice(start, end);

		const container = document.querySelector('.latepost-container');
		container.innerHTML = ''; // Clear the existing content

		latepostPage.forEach(item => {
			container.innerHTML += `
				<div class="card-body">
					<img src="${item.url}" class="d-block w-100" alt="Latepost Photo">
				</div>`;
		});

		document.querySelector('.prev-latepost').disabled = page === 1;
		document.querySelector('.next-latepost').disabled = page === latepostTotalPages;
	}

	document.querySelector('.prev-latepost').addEventListener('click', function() {
		if (latepostCurrentPage > 1) {
			latepostCurrentPage--;
			displayLatepost(latepostCurrentPage);
		}
	});

	document.querySelector('.next-latepost').addEventListener('click', function() {
		if (latepostCurrentPage < latepostTotalPages) {
			latepostCurrentPage++;
			displayLatepost(latepostCurrentPage);
		}
	});

	// Initial page load for both Pengumuman and Latepost
	displayPengumuman(pengumumanCurrentPage);
	displayLatepost(latepostCurrentPage);
</script>


<style>
	/* Make the Latepost section sticky */
	.card[style*="position: sticky;"] {
		top: 20px;
	}
</style>