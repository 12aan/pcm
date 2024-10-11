<div class="page-body">
	<div class="container-xl">
		<div class="row row-deck row-cards">
			<!-- Breaking News Section -->
			<div class="col-lg-9">
				<div class="card">
					<div class="card-header">
						<h1 class="">Breaking News</h1>
					</div>
					<div class="card-body row berita-container">
						<!-- Breaking News items will be injected here by JavaScript -->
					</div>

					<!-- Pagination Controls -->
					<div class="d-flex justify-content-between align-items-center mt-3">
						<button class="btn btn-outline-secondary prev-breaking-news">&lt;&lt; Previous</button>
						<button class="btn btn-outline-secondary next-breaking-news">Next &gt;&gt;</button>
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
	// Breaking News Pagination
	var breakingNewsData = <?php echo json_encode($breaking_news); ?>;
	var breakingNewsItemsPerPage = 5; // Set the number of breaking news items per page
	var breakingNewsTotalPages = Math.ceil(breakingNewsData.length / breakingNewsItemsPerPage);
	var breakingNewsCurrentPage = 1;

	function displayBreakingNews(page) {
		const start = (page - 1) * breakingNewsItemsPerPage;
		const end = start + breakingNewsItemsPerPage;
		const breakingNewsPage = breakingNewsData.slice(start, end);

		const container = document.querySelector('.berita-container');
		container.innerHTML = ''; // Clear the existing content

		breakingNewsPage.forEach(item => {
			container.innerHTML += `
            <div class="row mb-6 align-items-center">
                <a href="<?php echo site_url('home/breakingnewsdetail/'); ?>${item.id_news}" class="text-decoration-none text-dark d-flex align-items-center">
                    <div class="col-auto">
                        <img src="<?php echo base_url('./uploads/'); ?>${item.avatar}" alt="Avatar ${item.id_news}" class="avatar" style="width: 100px; height: 100px;">
                    </div>
                    <div class="col ms-4">
                        <h3 class="card-text">${item.judul_berita}</h3>
                        <ul class="list-unstyled mt-4">
                            <li class="d-inline-block me-2">
                                <small class="text-danger">&square;</small>
                                <small class="text-muted">Breaking News</small>
                            </li>/
                            <li class="d-inline-block me-3">
                                <small class="text-muted">${new Date(item.tanggal_upload).toLocaleDateString('id-ID')}</small>
                            </li>
                        </ul>
                    </div>
                </a>
            </div>`;
		});

		document.querySelector('.prev-breaking-news').disabled = page === 1;
		document.querySelector('.next-breaking-news').disabled = page === breakingNewsTotalPages;
	}

	document.querySelector('.prev-breaking-news').addEventListener('click', function() {
		if (breakingNewsCurrentPage > 1) {
			breakingNewsCurrentPage--;
			displayBreakingNews(breakingNewsCurrentPage);
		}
	});

	document.querySelector('.next-breaking-news').addEventListener('click', function() {
		if (breakingNewsCurrentPage < breakingNewsTotalPages) {
			breakingNewsCurrentPage++;
			displayBreakingNews(breakingNewsCurrentPage);
		}
	});

	displayBreakingNews(breakingNewsCurrentPage);

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