<div class="page-body">
	<div class="container-xl">
		<div class="row row-deck row-cards">
			<!-- Berita Section -->
			<div class="col-lg-9">
				<div class="card">
					<div class="card-header">
						<h1 class="">Berita</h1>
					</div>
					<div class="card-body row berita-container">
						<!-- Berita items will be injected here by JavaScript -->
					</div>

					<!-- Pagination Controls -->
					<div class="d-flex justify-content-between align-items-center mt-3">
						<button class="btn btn-outline-secondary prev-berita">&lt;&lt; Previous</button>
						<button class="btn btn-outline-secondary next-berita">Next &gt;&gt;</button>
					</div>
				</div>
			</div>

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
			</div>
			<!-- END LATEPOST -->
		</div>
	</div>
</div>

<script>
	// Berita Pagination
	var beritaData = <?php echo json_encode($berita); ?>;
	var beritaItemsPerPage = 5; // Set the number of berita items per page
	var beritaTotalPages = Math.ceil(beritaData.length / beritaItemsPerPage);
	var beritaCurrentPage = 1;

	function displayBerita(page) {
	const start = (page - 1) * beritaItemsPerPage;
	const end = start + beritaItemsPerPage;
	const beritaPage = beritaData.slice(start, end);

	const container = document.querySelector('.berita-container');
	container.innerHTML = ''; // Clear the existing content

	beritaPage.forEach(item => {
		container.innerHTML += `
			<div class="row mb-3 align-items-center">
				<a href="<?php echo site_url('home/beritadetail/'); ?>${item.id_berita}" class="text-decoration-none text-dark d-flex align-items-center">
					<div class="col-auto">
						<img src="<?php echo base_url('./uploads/'); ?>${item.avatar}" alt="Avatar ${item.id_berita}" class="avatar" style="width: 100px; height: 100px;">
					</div>
					<div class="col ms-3">
						<h5 class="card-text">${item.judul_berita}</h5>
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

	document.querySelector('.prev-berita').disabled = page === 1;
	document.querySelector('.next-berita').disabled = page === beritaTotalPages;
}


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

	displayBerita(beritaCurrentPage);

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
