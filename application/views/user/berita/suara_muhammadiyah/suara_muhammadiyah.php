<style>
	.suara_muhammadiyah-container .row {
		display: flex;
		align-items: start;
		/* Menyelaraskan elemen di bagian atas */
		margin-bottom: 1rem;
	}


	.suara_muhammadiyah-container .col-auto img {
		width: 100px;
		height: 100px;
		/* Tetap tinggi gambar */
		object-fit: cover;
		/* Memastikan gambar dipotong agar pas */
	}


	.suara_muhammadiyah-container .col {
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
			<!-- Suara Muhammadiyah Section -->
			<div class="col-lg-9">
				<div class="card">
					<div class="card-header">
						<h1 class="">Suara Muhammadiyah</h1>
					</div>
					<div class="card-body row suara-muhammadiyah-container">
						<!-- Suara Muhammadiyah items will be injected here by JavaScript -->
					</div>

					<!-- Pagination Controls -->
					<div class="d-flex justify-content-between align-items-center mt-3">
						<button class="btn btn-outline-secondary prev-suara-muhammadiyah">&lt;&lt; Previous</button>
						<button class="btn btn-outline-secondary next-suara-muhammadiyah">Next &gt;&gt;</button>
					</div>
				</div>
			</div>

			<!-- Latepost Section -->
			<div class="col-lg-3">
				<div class="row row-cards">
					<div class="col-100">
						<div class="card" style="position: sticky; top: 20px;">
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
			</div>
			<!-- END LATEPOST -->
		</div>
	</div>
</div>


<script>
	// Suara Muhammadiyah Pagination
	var suaraMuhammadiyahData = <?php echo json_encode($suara_muhammadiyah); ?>;
	var suaraMuhammadiyahItemsPerPage = 5; // Set the number of Suara Muhammadiyah items per page
	var suaraMuhammadiyahTotalPages = Math.ceil(suaraMuhammadiyahData.length / suaraMuhammadiyahItemsPerPage);
	var suaraMuhammadiyahCurrentPage = 1;

	function displaySuaraMuhammadiyah(page) {
		const start = (page - 1) * suaraMuhammadiyahItemsPerPage;
		const end = start + suaraMuhammadiyahItemsPerPage;
		const suaraMuhammadiyahPage = suaraMuhammadiyahData.slice(start, end);

		const container = document.querySelector('.suara-muhammadiyah-container');
		container.innerHTML = ''; // Clear the existing content

		suaraMuhammadiyahPage.forEach(item => {
			container.innerHTML += `
			<div class="row mb-3 align-items-start">
				<a href="<?php echo site_url('home/suara_muhammadiyahdetail/'); ?>${item.id_suara}" class="text-decoration-none text-dark d-flex align-items-start">
					<div class="col-auto mb-4">
						<img src="<?php echo base_url('./uploads/'); ?>${item.avatar}" alt="Avatar ${item.id_suara}" class="avatar" style="width: 100px; height: 100px;">
					</div>
					<div class="col ms-3">

						<h4 class="card-text text-muted">${item.judul_berita}</h4>
						<ul class="list-unstyled mt-4">
							<li class="d-inline-block me-2">
								<small class="text-danger">&square;</small>
								<small class="text-muted mt-4">Suara Muhammadiyah</small>
							</li>/
							<li class="d-inline-block me-3">
								<small class="text-muted">${new Date(item.tanggal_upload).toLocaleDateString('id-ID')}</small>
							</li>
						</ul>
					</div>
				</a>
			</div>`;
		});


		document.querySelector('.prev-suara-muhammadiyah').disabled = page === 1;
		document.querySelector('.next-suara-muhammadiyah').disabled = page === suaraMuhammadiyahTotalPages;
	}

	document.querySelector('.prev-suara-muhammadiyah').addEventListener('click', function() {
		if (suaraMuhammadiyahCurrentPage > 1) {
			suaraMuhammadiyahCurrentPage--;
			displaySuaraMuhammadiyah(suaraMuhammadiyahCurrentPage);
		}
	});

	document.querySelector('.next-suara-muhammadiyah').addEventListener('click', function() {
		if (suaraMuhammadiyahCurrentPage < suaraMuhammadiyahTotalPages) {
			suaraMuhammadiyahCurrentPage++;
			displaySuaraMuhammadiyah(suaraMuhammadiyahCurrentPage);
		}
	});

	displaySuaraMuhammadiyah(suaraMuhammadiyahCurrentPage);

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

	displayLatepost(latepostCurrentPage);
</script>

<style>
	/* Make the Latepost section sticky */
	.card[style*="position: sticky;"] {
		top: 20px;
	}
</style>