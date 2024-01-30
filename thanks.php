<!doctype html>
<?php
    include "includes/config.php";
    ob_start(); // Menyimpan data
    session_start(); //aktikan session data yg tersimpan
    if(!isset($_SESSION['nophone']))
    header("location:signin.php");
?>

<?php
	include "includes/config.php";
	$kategori = mysqli_query($connection, "select * from kategori");
?>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">
  <link rel="shortcut icon" href="#">

  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, bootstrap4" />

		<!-- Bootstrap CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
		<link href="css/tiny-slider.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		<title>UD. Kurnia Illahi</title>
	</head>

	<body>

		<!-- Start Header/Navigation -->
		<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

			<div class="container">
				<a class="navbar-brand" href="index.html">Kurnia Illahi<span>.</span></a>

				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarsFurni">
					<ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
						<li class="nav-item active">
							<a class="nav-link" href="index.php">Home</a>
						</li>
						<li><a class="nav-link" href="shop.php">Shop</a></li>
						<li><a class="nav-link" href="status.php">Status</a></li>
						<li><a class="nav-link" href="#">Contact us</a></li>
					</ul>

					<ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
						<li><a class="nav-link" href="cart.php"><img src="images/cart.svg"></a></li>
						<?php
						if (!isset($_SESSION['nophone'])) {
							// Jika session 'kodecust' ada, artinya user sudah login
							echo '<li><a class="nav-link" href="signout.php">Logout</a></li>';
						} else {
							// Jika session 'kodecust' tidak ada, artinya user belum login
							echo '<li><a class="nav-link" href="signin.php"><img src="images/user.svg"></a></li>';
						}
						?>
					</ul>
				</div>
			</div>	
		</nav>
		<!-- End Header/Navigation -->

        <div class="untree_co-section">
			<div class="container">
			<div class="row">
				<div class="col-md-12 text-center pt-5">
				<span class="display-3 thankyou-icon text-primary">
					<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cart-check mb-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd" d="M11.354 5.646a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L8 8.293l2.646-2.647a.5.5 0 0 1 .708 0z"/>
					<path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
					</svg>
				</span>
				<h3 class="display-3 text-black">Order will be process!</h3>
				<p class="lead mb-5">Hi,  Dear! <span>Thank you for ordering from Kurnia Illahi.</span></p>
				<p><a href="index.php" class="btn btn-sm btn-outline-black">Back to Home Page</a></p>
				</div>
			</div>
			</div>
		</div>
        
		<!-- Start Footer Section -->
		<footer class="footer-section">
			<div class="container relative">

				<div class="sofa-img">
					<img src="images/dash.png" alt="Image" class="img-fluid">
				</div>

				<div class="row g-5 mb-5">
					<div class="col-lg-5">
						<div class="mb-4 footer-logo-wrap"><a href="#" class="footer-logo">Kurnia Illahi<span>.</span></a></div>
						<p class="mb-4">UD. Kurnia Illahi is one of the businesses that focuses on making furniture such as tables, chairs, wardrobes, and wooden frames located in the Special Capital Region of Jakarta.</p>
						<ul class="list-unstyled custom-social">
							<li><a href="#"><span class="fa fa-brands fa-whatsapp"></span></a></li>
						</ul>
					</div>

					<div class="col-lg-4">
						<div class="mb-4 footer-logo-wrap"><a href="#" class="footer-logo">Opening Time</a></div>
						<p>Weekdays: 09.00-18.00</p>
						<p>Weekdays: 10.00-15.00</p>
					</div>
				</div>

				<div class="border-top copyright">
					<div class="row pt-4">
						<div class="col-lg-6">
							<p class="mb-2 text-center text-lg-start">Copyright &copy;<script>document.write(new Date().getFullYear());</script>. All Rights Reserved. &mdash; Designed with love by <a href="https://untree.co">Untree.co</a> <!-- License information: https://untree.co/license/ --> </p>
						</div>
						<div class="col-lg-6 text-center text-lg-end">
							<ul class="list-unstyled d-inline-flex ms-auto">
								<li class="me-4"><a href="#">Terms &amp; Conditions</a></li>
								<li><a href="#">Privacy Policy</a></li>
							</ul>
						</div>
					</div>
				</div>

			</div>
		</footer>
		<!-- End Footer Section -->	

		<script src="js/bootstrap.bundle.min.js"></script>
		<script src="js/tiny-slider.js"></script>
		<script src="js/custom.js"></script>
	</body>
<?php 
mysqli_close($connection) ;
ob_end_flush();
?>

</html>