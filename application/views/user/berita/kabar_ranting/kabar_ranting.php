<div class="page-body">
	<div class="container-xl">
		<div class="row row-deck row-cards">
			<!-- Kabarranting Section -->
			<div class="col-lg-9">
				<div class="card">
					<div class="card-header">
						<h1 class="">Kabarranting</h1>
					</div>
					<div class="card-body row kabarranting-container">
						<!-- Kabarranting items will be injected here by JavaScript -->
					</div>

					<!-- Pagination Controls -->
					<div class="d-flex justify-content-between align-items-center mt-3">
						<button class="btn btn-outline-secondary prev-kabarranting">&lt;&lt; Previous</button>
						<button class="btn btn-outline-secondary next-kabarranting">Next &gt;&gt;</button>
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
	// Kabarranting Pagination
	var kabarrantingData = <?php echo json_encode($kabar_ranting); ?>;
	var kabarrantingItemsPerPage = 5; // Set the number of kabarranting items per page
	var kabarrantingTotalPages = Math.ceil(kabarrantingData.length / kabarrantingItemsPerPage);
	var kabarrantingCurrentPage = 1;

	function displayKabarranting(page) {
		const start = (page - 1) * kabarrantingItemsPerPage;
		const end = start + kabarrantingItemsPerPage;
		const kabarrantingPage = kabarrantingData.slice(start, end);

		const container = document.querySelector('.kabarranting-container');
		container.innerHTML = ''; // Clear the existing content

		kabarrantingPage.forEach(item => {
			container.innerHTML += `
                <div class="row mb-6 align-items-center">
                    <a href="<?php echo site_url('home/kabarrantingdetail/'); ?>${item.id_kabar_ranting}" class="text-decoration-none text-dark d-flex align-items-center">
                        <div class="col-auto">
                            <img src="<?php echo base_url('./uploads/'); ?>${item.avatar}" alt="Avatar ${item.id_kabar_ranting}" class="avatar" style="width: 100px; height: 100px;">
                        </div>
                        <div class="col ms-4">
                            <h3 class="card-text">${item.judul_berita}</h3>
                            <ul class="list-unstyled mt-4">
                                <li class="d-inline-block me-2">
                                    <small class="text-danger">&square;</small>
                                    <small class="text-muted">Kabarranting</small>
                                </li>/
                                <li class="d-inline-block me-3">
                                    <small class="text-muted">${new Date(item.tanggal_upload).toLocaleDateString('id-ID')}</small>
                                </li>
                            </ul>
                        </div>
                    </a>
                </div>`;
		});

		document.querySelector('.prev-kabarranting').disabled = page === 1;
		document.querySelector('.next-kabarranting').disabled = page === kabarrantingTotalPages;
	}

	document.querySelector('.prev-kabarranting').addEventListener('click', function() {
		if (kabarrantingCurrentPage > 1) {
			kabarrantingCurrentPage--;
			displayKabarranting(kabarrantingCurrentPage);
		}
	});

	document.querySelector('.next-kabarranting').addEventListener('click', function() {
		if (kabarrantingCurrentPage < kabarrantingTotalPages) {
			kabarrantingCurrentPage++;
			displayKabarranting(kabarrantingCurrentPage);
		}
	});

	displayKabarranting(kabarrantingCurrentPage);

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