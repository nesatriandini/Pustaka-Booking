<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Aplikasi Pengaduan Masyarakat</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<meta content="" name="keywords">
	<meta content="" name="description">

	<!-- Favicons -->
	<link href="<?= base_url() ?>assets/landing/img/bsi.png" rel="icon">
	<link href="<?= base_url() ?>assets/landing/img/apple-touch-icon.png" rel="apple-touch-icon">

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,500,600,700,700i|Montserrat:300,400,500,600,700" rel="stylesheet">

	<!-- Bootstrap CSS File -->
	<link href="<?= base_url() ?>assets/landing/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- Libraries CSS Files -->
	<link href="<?= base_url() ?>assets/landing/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link href="<?= base_url() ?>assets/landing/lib/animate/animate.min.css" rel="stylesheet">
	<link href="<?= base_url() ?>assets/landing/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
	<link href="<?= base_url() ?>assets/landing/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
	<link href="<?= base_url() ?>assets/landing/lib/lightbox/css/lightbox.min.css" rel="stylesheet">

	<!-- Main Stylesheet File -->
	<link href="<?= base_url() ?>assets/landing/css/style.css" rel="stylesheet">

	<!-- =======================================================
    Theme Name: Rapid
    Theme URL: https://bootstrapmade.com/rapid-multipurpose-bootstrap-business-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
  	<style>
  		#header a:hover span{
            color: #1bb1dc;
        }
  	</style>
</head>

<body>
	<!--==========================
  Header
  ============================-->
	<header id="header">

		<!-- <div id="topbar">
			<div class="container">
				<div class="social-links">
					<a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
					<a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
					<a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
					<a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
				</div>
			</div>
		</div> -->

		<div class="container">

			<div class="logo float-left">
				<!-- Uncomment below if you prefer to use an image logo -->
				<h3><a href="<?= base_url('Landing') ?>" class="scrollto text-dark"><span>e-Perpus</span></a></h3>
				<!-- <a href="#header" class="scrollto"><img src="img/logo.png" alt="" class="img-fluid"></a> -->
			</div>

			<nav class="main-nav float-right d-none d-lg-block">
				<ul>
					<li class="active"><a href="#intro">Beranda</a></li>
					<li><a href="#about">Tentang</a></li>
					<li><a href="#services">Daftar Buku</a></li>
					<li><a href="#why-us">Data Perpustakaan</a></li>
					<li><a href="<?= base_url('Autentifikasi') ?>">Login</a></li>
					<li><a href="<?= base_url('Autentifikasi/register') ?>">Daftar</a></li>
				</ul>
			</nav><!-- .main-nav -->

		</div>
	</header><!-- #header -->

	<!--==========================
    Intro Section
  ============================-->
	<section id="intro" class="clearfix">
		<div class="container d-flex h-100">
			<div class="row justify-content-center align-self-center">
				<div class="col-md-6 intro-info order-md-first order-last wow bounceInUp" data-wow-duration="2s">

					<h2>Website<br>Perpustakaan<br><span>Online</span></h2>
					
					<div>
						<a href="#about" class="btn-get-started scrollto">Masuk Halaman Beranda</a>
					</div>
				</div>

				<div class="col-md-6 intro-img order-md-last order-first">
					<img src="<?= base_url() ?>assets/landing/img/intro-img.svg" alt="" class="img-fluid wow zoomIn" data-wow-duration="2s">
				</div>
			</div>

		</div>
	</section><!-- #intro -->

	<main id="main">

		<!--==========================
      About Us Section
    ============================-->
		<section id="about">

			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<div class="about-content">
							<h2>Tentang</h2>
							<h3>Apakah Web Perpustakaan Online itu?</h3>
							<p>Web Perpustakaan Online itu adalah layanan perpustakaan digital dengan konsep B2B (business-to-business). Kami hadir untuk memudahkan pengelolaan perpustakaan digital Anda.
							</p>
							<p>Baca buku, berbagi koleksi bacaan dan bersosialisasi secara bersamaan. Di mana pun, kapan pun dengan nyaman bersama setiap orang.<br><br>

							Di mana pun kamu berada, iPusnas selalu hadir untuk menghubungkan dan merekomendasikan buku favoritmu kepada teman dan sahabatmu.
							</p>
						</div>
					</div>
					<div class="col-md-6">
						<img src="<?= base_url() ?>assets/landing/img/tabs-2.png" alt="" class="img-fluid wow bounceInUp" data-wow-duration="3s">
					</div>
				</div>
			</div>

		</section><!-- #about -->

		<section id="why-us" class="section-bg wow fadeIn">
			<div class="container-fluid">

				<header class="section-header">
					<h3>Data Perpustakaan</h3>
				</header>

				<div class="container">
					<div class="row counters">

						<div class="col-lg-4 col-6 text-center">
							<span data-toggle="counter-up">
								<?php
		                          $where = ['stok != 0'];
		                          $totalstok = $this->ModelBuku->total('stok',$where);
		                          echo $totalstok;
		                        ?>
							</span>
							<p>Total Buku Ready</p>
						</div>

						<div class="col-lg-4 col-6 text-center">
							<span data-toggle="counter-up">
								<?= $this->ModelBuku->bukuWhere(['judul_buku'])->num_rows(); ?>
							</span>
							<p>Total Judul Buku</p>
						</div>

						<div class="col-lg-4 col-6 text-center">
							<span data-toggle="counter-up">
								<?= $this->ModelBuku->kategoriWhere(['kategori'])->num_rows(); ?>
							</span>
							<p>Total Kategori Buku</p>
						</div>

					</div>

				</div>
		</section>



		<!--==========================
      Services Section
    ============================-->
		<section id="services" class="">
			<div class="container">

				<header class="section-header">
					<h3 class="mb-5">Daftar Buku</h3>
					<br>
				</header>

				

		        <div class="row">
		        	<?php
			        
			        foreach ($buku as $b) { ?>

			        <div class="col-md-4 wow bounceInUp" data-wow-duration="1s">
								<div class="box h-75">
									<img src="<?= base_url('./assets/img/upload/' . $b['image']) ?>" class="card-img h-50 mb-4" alt="img user">
									<h4 class="title mb-2"><?= $b['judul_buku']; ?></h4>
										<table class="" cellpadding="10" border="0" align="" style="font-size:75% ;">
									        <tr>
									          <td>Pengarang</td>
									          <td>:</td>
									          <td><?= $b['pengarang']; ?></td>
									        </tr>
									        <tr>
									          <td>Penerbit</td>
									          <td>:</td>
									          <td><?= $b['penerbit']; ?></td>
									        </tr>
									        <tr>
									          <td>Stok</td>
									          <td>:</td>
									          <td><?= $b['stok']; ?></td>
									        </tr>
									        <tr>
									          <td>Stok</td>
									          <td>:</td>
									          <td><?= $b['tahun_terbit']; ?></td>
									        </tr>
									        <tr>
									        	<td>
									        		<a href="<?= base_url('Landing/detailBuku') ?>" class="badge badge-info"><i class="fas fa-edit"></i> Detail</a>
									        	</td>
									        </tr>
									    </table>
									</div>
								</div>

					<?php } ?>

		        </div>

			</div>
		</section><!-- #services -->
		
		<!--==========================
    Footer
  ============================-->
		<footer id="footer" class="section-bg">
			

			<div class="container">
				<div class="copyright">
					&copy; Copyright <strong>Website Perpustakaan Online</strong>. All Rights Reserved
				</div>
				<div class="credits">
					Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
				</div>
			</div>
		</footer><!-- #footer -->

		<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
		<!-- Uncomment below i you want to use a preloader -->
		<!-- <div id="preloader"></div> -->

		<!-- JavaScript Libraries -->
		<script src="<?= base_url() ?>assets/landing/lib/jquery/jquery.min.js"></script>
		<script src="<?= base_url() ?>assets/landing/lib/jquery/jquery-migrate.min.js"></script>
		<script src="<?= base_url() ?>assets/landing/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src="<?= base_url() ?>assets/landing/lib/easing/easing.min.js"></script>
		<script src="<?= base_url() ?>assets/landing/lib/mobile-nav/mobile-nav.js"></script>
		<script src="<?= base_url() ?>assets/landing/lib/wow/wow.min.js"></script>
		<script src="<?= base_url() ?>assets/landing/lib/waypoints/waypoints.min.js"></script>
		<script src="<?= base_url() ?>assets/landing/lib/counterup/counterup.min.js"></script>
		<script src="<?= base_url() ?>assets/landing/lib/owlcarousel/owl.carousel.min.js"></script>
		<script src="<?= base_url() ?>assets/landing/lib/isotope/isotope.pkgd.min.js"></script>
		<script src="<?= base_url() ?>assets/landing/lib/lightbox/js/lightbox.min.js"></script>
		<!-- Contact Form JavaScript File -->
		<script src="<?= base_url() ?>assets/landing/contactform/contactform.js"></script>

		<!-- Template Main Javascript File -->
		<script src="<?= base_url() ?>assets/landing/js/main.js"></script>

</body>

</html>