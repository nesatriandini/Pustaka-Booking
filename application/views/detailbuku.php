<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Aplikasi Pengaduan Masyarakat</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<meta content="" name="keywords">
	<meta content="" name="description">

	<!-- Favicons -->
	<link href="<?= base_url() ?>assets/landing/img/bogor.png" rel="icon">
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

	

		<section id="intro" class="">
		<div class="container d-flex h-100">
			<div class="row justify-content-center align-self-center mt-5">
				<div class="col-md-4">
					<img src="" alt="" class="img-fluid">
				</div>
				<div class="col-md-7">
					<h4 class="fw-bold">Ada Pertanyaan?</h4>
					<h6 class="mb-3">Silahkan kirimkan pesan jika ada yang ingin disampaikan.</h6>
					<form action="#" method="post">
						<div class="row">
							<div class="col-md-6 mb-3">
								<input type="text" class="form-control" placeholder="First name..." name="nama_depan">
							</div>
							<div class="col-md-6 mb-3">
								<input type="text" class="form-control" placeholder="Second name..." name="nama_belakang">
							</div>
							<div class="col-md-12 mb-3">
								<input type="email" class="form-control" placeholder="E-mail..." name="email">
							</div>
							<div class="col-md-12 mb-3">
								<textarea name="komentar" class="form-control" rows="10" placeholder="Your Comment..."></textarea>
							</div>
							<div class="col-sm-12">
								<button type="submit" class="btn btn-primary" style="font-size: 12px;">POST COMMENT</button>
							</div>
						</div>
					</form>
				</div>
				
			</div>

		</div>
	</section><!-- #intro -->


		<footer id="footer" class="section-bg">
			

			<div class="container">
				<div class="copyright">
					&copy; Copyright <strong>Website Pengaduan Masyarakat</strong>. All Rights Reserved
				</div>
				<div class="credits">
					<!--
          All the links in the footer should remain intact.
          You can delete the links only if you purchased the pro version.
          Licensing information: https://bootstrapmade.com/license/
          Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Rapid
        -->
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