<div class="page-body">
	<div class="container-xl">
		<div class="row">
			<div class="col-lg-9">
				<div class="card">
					<div class="card-header">
						<h1 class=""><?php echo $item['judul_berita']; ?></h1>
					</div>
					<!-- Social Media Sharing Buttons -->
					<div class="mt-4" style="margin-left: 40px;">
						<h5>Share :</h5>
						<div class="d-flex flex-wrap gap-2">
							<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(current_url()); ?>" target="_blank" class="btn btn-primary d-flex align-items-center">
								<i class="bi bi-facebook me-2"></i> Facebook
							</a>
							<a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(current_url()); ?>&text=<?php echo urlencode($item['judul_berita']); ?>" target="_blank" class="btn btn-info d-flex align-items-center">
								<i class="bi bi-twitter me-2"></i> Twitter
							</a>
							<a href="https://plus.google.com/share?url=<?php echo urlencode(current_url()); ?>" target="_blank" class="btn btn-danger d-flex align-items-center">
								<i class="bi bi-google me-2"></i> Google+
							</a>
							<a href="mailto:?subject=<?php echo urlencode($item['judul_berita']); ?>&body=<?php echo urlencode(current_url()); ?>" class="btn btn-secondary d-flex align-items-center">
								<i class="bi bi-envelope me-2"></i> Email
							</a>
						</div>
					</div>
					<div class="card-body">
						<img src="<?php echo base_url('./uploads/' . $item['avatar']); ?>" alt="Avatar <?php echo $item['id_galeri']; ?>" class="img-fluid mb-4">
						<p class="text-muted"><?= date('d-m-Y', strtotime($item['tanggal_upload'])); ?></p>
						<div class="card-text" style="line-height: 2; text-align: justify;">
							<?php echo $item['isi_content']; ?>
						</div>

						<div class="mt-4">
							<h5>Comments:</h5>
							<?php if (!empty($komen)): ?>
								<?php foreach ($komen as $comment): ?>
									<div class="border p-3 mb-3">
										<p><strong><?php echo htmlspecialchars($comment['name']); ?></strong> (<?php echo htmlspecialchars($comment['email']); ?>):</p>
										<p><?php echo htmlspecialchars($comment['komentar']); ?></p>
									</div>
								<?php endforeach; ?>
							<?php else: ?>
								<p>No comments yet.</p>
							<?php endif; ?>
						</div>

						<!-- Comment Form -->
						<div class="mt-4">
							<h5>Leave a Comment:</h5>
							<form action="<?php echo site_url('home/post_galeri_comment/' . $item['id_galeri']); ?>" method="post">
								<div class="mb-3">
									<label for="comment" class="form-label">Comment</label>
									<textarea id="comment" name="comment" class="form-control" rows="4" required></textarea>
								</div>
								<div class="mb-3">
									<label for="email" class="form-label">Email</label>
									<input type="email" id="email" name="email" class="form-control" required>
								</div>
								<div class="mb-3">
									<label for="name" class="form-label">Name</label>
									<input type="text" id="name" name="name" class="form-control" required>
								</div>
								<button type="submit" class="btn btn-primary">Submit Comment</button>
							</form>
						</div>
					</div>
				</div>
			</div>

			<!-- Latepost Section -->
			<!-- START LATEPOST -->
			<div class="col-lg-3">
				<div class="row row-cards">
					<div class="col-100">
						<div class="card" style="position: sticky; top: 20px; height: 25rem;">
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

						</div>
					</div>
				</div>
			</div>
			<!-- END LATEPOST -->

			<?php
			$latepost_items_per_page = 1; // Items per page
			$latepost_total_items = count($latepost_photos);
			$latepost_total_pages = ceil($latepost_total_items / $latepost_items_per_page);
			?>

			<script>
				var latepostData = <?php echo json_encode($latepost_photos); ?>;
				var latepostItemsPerPage = <?php echo $latepost_items_per_page; ?>;
				var latepostTotalPages = <?php echo $latepost_total_pages; ?>;
				var latepostCurrentPage = 1;
				var latepostInterval;

				function displayLatepost(page) {
					const start = (page - 1) * latepostItemsPerPage;
					const end = start + latepostItemsPerPage;
					const latepostPage = latepostData.slice(start, end);

					const container = document.querySelector('.latepost-container');
					container.innerHTML = ''; // Clear the existing content

					latepostPage.forEach(item => {
						container.innerHTML += `
                <div class="card-body">
                    <img src="${item.url}" class="d-block w-100" alt="Latepost Photo" style="height: 300px; object-fit: cover;">
                </div>`;
					});

					// Update the state of pagination buttons
					document.querySelector('.prev-latepost').disabled = page === 1;
					document.querySelector('.next-latepost').disabled = page === latepostTotalPages;
				}

				function nextLatepost() {
					if (latepostCurrentPage < latepostTotalPages) {
						latepostCurrentPage++;
					} else {
						latepostCurrentPage = 1; // Reset to the first page if we reach the end
					}
					displayLatepost(latepostCurrentPage);
				}

				// Event listeners for pagination buttons
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

				latepostInterval = setInterval(nextLatepost, 5000);

				// Initial call to display the first page
				displayLatepost(latepostCurrentPage);
			</script>
		</div>
	</div>
</div>

<!-- Add Bootstrap Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css">