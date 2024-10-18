<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<title>Home</title>
	<!-- CSS files -->
	<link href="<?php echo base_url('/tabler/dist/css/tabler.min.css?1684106062') ?>" rel="stylesheet" />
	<link href="<?php echo base_url('/tabler/dist/css/tabler-flags.min.css?1684106062') ?>" rel="stylesheet" />
	<link href="<?php echo base_url('/tabler/dist/css/tabler-payments.min.css?1684106062') ?>" rel="stylesheet" />
	<link href="<?php echo base_url('/tabler/dist/css/tabler-vendors.min.css?1684106062') ?>" rel="stylesheet" />
	<link href="<?php echo base_url('/tabler/dist/css/demo.min.css?1684106062') ?>" rel="stylesheet" />

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5+zr/5qDI3h2mloR+e63i2K0p5fYYuKDI8oWIwag" crossorigin="anonymous">

	<style>
		@import url('https://rsms.me/inter/inter.css');

		:root {
			--tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
		}

		body {
			font-feature-settings: "cv03", "cv04", "cv11";
		}

		.text-justify {
			text-align: justify;
		}

		.list-group-item::before {
			content: counter(list-item) ". ";
			counter-increment: list-item;
		}

		::placeholder {
			font-style: italic;
		}

		.latepost-container {
			position: sticky;
			top: 180px;
			/* Sesuaikan dengan posisi yang diinginkan */
			z-index: 1000;
			/* Pastikan nilai z-index lebih tinggi dari elemen lain */
		}
	</style>
</head>

<body>
	<script src="<?php echo base_url('/tabler/dist/js/demo-theme.min.js?1684106062') ?>"></script>

	<div class="page d-flex">
		<div class="sticky-top">
			<!-- Navbar -->
			<header class="navbar navbar-expand-md sticky-top d-print-none">
				<div class="container-xl">
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<h1 class="navbar-brand pe-0 pe-md-1 me-8 mt-0">
						<a href=".">
							<img src="<?php echo base_url('/tabler/static/BANNER-removebg-preview.png') ?>" width="180" height="60" alt="Tabler" class="navbar-brand">
						</a>
					</h1>
					<div class="collapse navbar-collapse justify-content-end" id="navbar-menu">
						<div class="d-none d-md-flex m-2">
							<a href="?theme=dark" class="nav-link px-0 hide-theme-dark" title="Enable dark mode" data-bs-toggle="tooltip" data-bs-placement="bottom">
								<!-- Download SVG icon from http://tabler-icons.io/i/moon -->
								<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
									<path stroke="none" d="M0 0h24v24H0z" fill="none" />
									<path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" />
								</svg>
							</a>
							<a href="?theme=light" class="nav-link px-0 hide-theme-light" title="Enable light mode" data-bs-toggle="tooltip" data-bs-placement="bottom">
								<!-- Download SVG icon from http://tabler-icons.io/i/sun -->
								<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
									<path stroke="none" d="M0 0h24v24H0z" fill="none" />
									<path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
									<path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" />
								</svg>
							</a>

						</div>
						<div class="d-flex align-items-center">
							<!-- Facebook Icon -->
							<a href="https://www.facebook.com/pcmkasihanistimewa" class="btn btn-facebook btn-icon me-2" aria-label="Facebook">
								<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="20" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
									<path stroke="none" d="M0 0h24v24H0z" fill="none" />
									<path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3" />
								</svg>
							</a>
							<!-- Instagram Icon -->
							<a href="https://www.instagram.com/pcmkasihan?igsh=amd1dGJubjVxdW1x" class="btn btn-instagram btn-icon me-2" aria-label="Instagram">
								<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
									<path stroke="none" d="M0 0h24v24H0z" fill="none" />
									<path d="M4 4m0 4a4 4 0 0 1 4 -4h8a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-8a4 4 0 0 1 -4 -4z" />
									<path d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
									<path d="M16.5 7.5l0 .01" />
								</svg>
							</a>
							<!-- Youtube Icon -->
							<a href="https://youtube.com/@pcmkasihan3579?si=JujUaQFI_yi4YASJ" class="btn btn-youtube btn-icon me-2" aria-label="Youtube">
								<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
									<path stroke="none" d="M0 0h24v24H0z" fill="none" />
									<path d="M3 5m0 4a4 4 0 0 1 4 -4h10a4 4 0 0 1 4 4v6a4 4 0 0 1 -4 4h-10a4 4 0 0 1 -4 -4z" />
									<path d="M10 9l5 3l-5 3z" />
								</svg>
							</a>
							<!-- Twitter Icon -->
							<a href="https://x.com/pcm_kasihan?t=7oib8ankMs8jMJvr6tBfCw&s=09" class="btn btn-twitter btn-icon" aria-label="Twitter">
								<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
									<path stroke="none" d="M0 0h24v24H0z" fill="none" />
									<path d="M22 4.01c-1 .49 -1.98 .689 -3 .99c-1.121 -1.265 -2.783 -1.335 -4.38 -.737s-2.643 2.06 -2.62 3.737v1c-3.245 .083 -6.135 -1.395 -8 -4c0 0 -4.182 7.433 4 11c-1.872 1.247 -3.739 2.088 -6 2c3.308 1.803 6.913 2.423 10.034 1.517c3.58 -1.04 6.522 -3.723 7.651 -7.742a13.84 13.84 0 0 0 .497 -3.753c0 -.249 1.51 -2.772 1.818 -4.013z" />
								</svg>
							</a>
						</div>
					</div>
				</div>
			</header>

			<header class="navbar-expand-md">
				<div class="collapse navbar-collapse" id="navbar-menu">
					<div class="navbar">
						<div class="container-xl">
							<ul class="navbar-nav">

								<?php
								// Get menu data
								$datamenu = $this->db->from('menu')->get()->result_array();
								$current_page = basename($_SERVER['REQUEST_URI']);

								// Function to determine if the link is active
								function is_active($page_names, $current_page)
								{
									// Ensure $page_names is an array
									if (!is_array($page_names)) {
										$page_names = array($page_names);
									}

									// Check if the current page matches any of the page names
									foreach ($page_names as $page_name) {
										if ($page_name == $current_page) {
											return 'active'; // Return 'active' class if page matches
										}
									}

									// Check if any page names partially match the current page
									foreach ($page_names as $page_name) {
										if (!empty($page_name) && !empty($current_page) && strpos($current_page, $page_name) !== false) {
											return 'active'; // Return 'active' class if page partially matches
										}
									}

									return ''; // Return empty string if no match
								}

								// Process menu items
								foreach ($datamenu as $menu) {
									// Get submenu data for each menu
									$datasubmenu = $this->db->from('submenu')
										->where('idmenu', $menu['idmenu'])
										->get()
										->result_array();

									// Check if the menu has submenus
									if (!empty($datasubmenu)) {
										// Menu has submenus
								?>
										<li class="nav-item dropdown <?php echo is_active(array_column($datasubmenu, 'url'), $current_page) ? 'active' : ''; ?>">
											<a class="nav-link dropdown-toggle" href="#navbar-<?php echo $menu['idmenu']; ?>" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
												<span class="nav-link-title"><?php echo htmlspecialchars($menu['judul']); ?></span>
											</a>
											<ul class="dropdown-menu" aria-labelledby="navbar-<?php echo $menu['idmenu']; ?>">
												<?php foreach ($datasubmenu as $submenu): ?>
													<li>
														<a class="dropdown-item <?php echo is_active($submenu['url'], $current_page); ?>" href="<?php echo base_url($submenu['url']); ?>">
															<?php echo htmlspecialchars($submenu['judul']); ?>
														</a>
													</li>
												<?php endforeach; ?>
											</ul>
										</li>
									<?php
									} else {
										// Menu does not have submenus
									?>
										<li class="nav-item <?php echo is_active($menu['url'], $current_page); ?>">
											<a class="nav-link" href="<?php echo base_url($menu['url']); ?>">
												<span class="nav-link-title"><?php echo htmlspecialchars($menu['judul']); ?></span>
											</a>
										</li>
								<?php
									}
								}
								?>

							</ul>



							<div class="my-2 my-md-0 flex-grow-1 flex-md-grow-0 order-first order-md-last">
								
							</div>
						</div>
					</div>
				</div>
			</header>
		</div>