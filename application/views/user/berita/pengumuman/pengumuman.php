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
			<div class="col-lg-3">
				<div class="row row-cards">
					<div class="col-100">
						<div class="card" style="position: sticky; top: auto;">
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
	// Pengumuman Pagination
	var pengumumanData = <?php echo json_encode($pengumuman); ?>;
	var pengumumanItemsPerPage = 5; // Set the number of pengumuman items per page
	var pengumumanTotalPages = Math.ceil(pengumumanData.length / pengumumanItemsPerPage);
	var pengumumanCurrentPage = 1;

	function displayPengumuman(page) {
		const start = (page - 1) * pengumumanItemsPerPage;
		const end = start + pengumumanItemsPerPage;
		const pengumumanPage = pengumumanData.slice(start, end);

		const container = document.querySelector('.pengumuman-container');
		container.innerHTML = ''; // Clear the existing content

		pengumumanPage.forEach(item => {
			container.innerHTML += `
				<div class="row mb-6">
					<a href="<?php echo site_url('home/pengumumandetail/'); ?>${item.id_pengumuman}" class="text-decoration-none text-dark d-flex align-items-center"">
						<div class="col-auto">
							<img src="<?php echo base_url('./uploads/'); ?>${item.avatar}" alt="Avatar ${item.id_pengumuman}" class="avatar" style="width: 100px; height: 100px;">
						</div>
						<div class="col ms-4">
							<h5 class="card-text">${item.judul_berita}</h5>
							<ul class="list-unstyled mt-6">
								<li class="d-inline-block me-2">
									<small class="text-danger">&square;</small>
									<small class="text-muted">Pengumuman</small>
								</li>/
								<li class="d-inline-block me-3">
									<small class="text-muted">${new Date(item.tanggal_upload).toLocaleDateString('id-ID')}</small>
								</li>
							</ul>
						</div>
					</a>
				</div>`;
		});

		document.querySelector('.prev-pengumuman').disabled = page === 1;
		document.querySelector('.next-pengumuman').disabled = page === pengumumanTotalPages;
	}

	document.querySelector('.prev-pengumuman').addEventListener('click', function() {
		if (pengumumanCurrentPage > 1) {
			pengumumanCurrentPage--;
			displayPengumuman(pengumumanCurrentPage);
		}
	});

	document.querySelector('.next-pengumuman').addEventListener('click', function() {
		if (pengumumanCurrentPage < pengumumanTotalPages) {
			pengumumanCurrentPage++;
			displayPengumuman(pengumumanCurrentPage);
		}
	});

	displayPengumuman(pengumumanCurrentPage);

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