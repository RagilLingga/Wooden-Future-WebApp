<!doctype html>
<?php
	include "includes/config.php";
	$kategori = mysqli_query($connection, "select * from kategori");
	session_start();
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
						<li><a class="nav-link" href="https://api.whatsapp.com/send/?phone=6281381648467&text&type=phone_number&app_absent=0">Contact us</a></li>
					</ul>

					<ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
						<li><a class="nav-link" href="cart.php"><img src="images/cart.svg"></a></li>
						<?php
						if (isset($_SESSION['nophone'])) {
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

		<!-- Start Hero Section -->
			<div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-4">
							<div class="intro-excerpt">
								<h4 style="text-align:center; color:#ffffff">Wooden Furniture</h4>
								<h1 style="text-align:center; color:#ffffff">Kurnia Illahi</h1>
								<p class="mb-4">Discover your dream furniture on the Kurnia Illahi website now! You can place an order online and enjoy free delivery of your dream furniture to your home.</p>
								<a href="#" class="btn btn-white-outline">Explore</a></p>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="hero-img-wrap">
								<img src="images/dash.png" class="img-fluid" width="610px">
							</div>
						</div>
					</div>
				</div>
			</div>
		<!-- End Hero Section -->

		<!-- Start Popular Product -->
		<div class="popular-product">
			<div class="container">
				<div class="row">
					<div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
						<div class="product-item-sm d-flex">
							<div class="thumbnail">
								<img src="images/shipped.png" width="100px" alt="...">
							</div>
							<div class="pt-3">
								<h3>Free Delivery</h3>
								<p>Max. 20 Km </p>
							</div>
						</div>
					</div>

					<div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
						<div class="product-item-sm d-flex">
							<div class="thumbnail">
								<img src="images/product-development.png" width="100px" alt="...">
							</div>
							<div class="pt-3">
								<h3>Custom Product</h3>
								<p>Free Custom </p>
							</div>
						</div>
					</div>

					<div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
						<div class="product-item-sm d-flex">
							<div class="thumbnail">
								<img src="images/best-price.png" width="100px" alt="...">
							</div>
							<div class="pt-3">
								<h3>Reasonable Price</h3>
								<p>Good Price & Product</p>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
		<!-- End Popular Product -->

		<!-- Start Testimonial Slider -->
		<div class="category-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-7 mx-auto text-center">
						<h2 class="section-title">OUR CATEGORY</h2>
						<h2 class="section-title">PRODUCT</h2>
						<h2 class="section-title">---------------</h2>
					</div>
				</div>
				<div class="row">
					<?php if(mysqli_num_rows($kategori)>0) {
						while ($row = mysqli_fetch_array($kategori))
					{?>

						<div class="col-sm-3">
							<div class="card mb-4" style="width: 18rem; text-align: center; background-color: #f5f5f5">
								<img src="images/<?php echo $row["kategoripic"]?>" class="card-img-top" alt="...">
								<div class="card-body">
									<h5 class="card-title" name="nama"><?php echo $row["kategorinama"]?></h5>
									<a href="product.php?category=<?php echo $row['kategoriid']?>" class="btn btn-dark">EXPLORE</a>
								</div>
							</div>
						</div>
					<?php } } ?>
				</div>
			</div>
		</div>
		<!-- END -->

		<!-- Start Testimonial Slider -->
		<div class="testimonial-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-7 mx-auto text-center">
						<h2 class="section-title">ARTICLE</h2>
						<h2 class="section-title">---------------</h2>
					</div>
				</div>

				<div class="row justify-content-center">
					<div class="col-lg-12">
						<div class="testimonial-slider-wrap text-center">

							<div id="testimonial-nav">
								<span class="prev" data-controls="prev"><span class="fa fa-chevron-left"></span></span>
								<span class="next" data-controls="next"><span class="fa fa-chevron-right"></span></span>
							</div>

							<div class="testimonial-slider">
								
								<div class="item">
									<div class="row justify-content-center">
										<div class="col-lg-8 mx-auto">

											<div class="testimonial-block text-center">
												<h3 class="font-weight-bold">Customized Product</h3>
												<blockquote class="mb-5">
													<p>&ldquo;Custom products are initially created to address and fulfill the problems arising from the dissatisfaction and incongruity of a product with its users. Product customization can also provide added value to the product and a competitive advantage for businesses. These custom products benefit both sides as user needs are met, and businesses can create products that are different from other competitors. Custom products are detailed by users, users are engaged in the business process, and the scope is limited because the product is tailored to specific users.&rdquo;</p>
												</blockquote>
												<div class="author-info">
													<h3 class="font-weight-bold">J. Kurniasih, A. Prasetyo, Y. A. Arif, and D. E. Profesi</h3>
													<span class="position d-block mb-3">Journal Author.</span>
												</div>
											</div>

										</div>
									</div>
								</div> 
								<!-- END item -->

								<div class="item">
									<div class="row justify-content-center">
										<div class="col-lg-8 mx-auto">

											<div class="testimonial-block text-center">
											<h3 class="font-weight-bold">Furniture</h3>
												<blockquote class="mb-5">
													<p>&ldquo;Furniture, often referred to as household furnishings, is equipment for the home, such as chairs, tables, and cabinets. In general, furniture refers to items found within a house or room and serves a function for the occupants of the house. Furniture is a household fixture that is highly sought after by all consumers. Each design in furniture has its own function.&rdquo;</p>
												</blockquote>

												<div class="author-info">
													<h3 class="font-weight-bold">S. Ardiansyah, M. Sofyan, and H. Asman.</h3>
													<span class="position d-block mb-3">Journal Author</span>
												</div>
											</div>

										</div>
									</div>
								</div> 
								<!-- END item -->

								<div class="item">
									<div class="row justify-content-center">
										<div class="col-lg-8 mx-auto">

											<div class="testimonial-block text-center">
											<h3 class="font-weight-bold">UD. Kurnia Illahi</h3>
												<blockquote class="mb-5">
													<p>&ldquo;UD. Kurnia Illahi is one of the businesses that focuses on furniture manufacturing, such as tables, chairs, cabinets, and wooden door frames, located in the Special Capital Region of Jakarta. This business has been established since 1997 at Jalan Bahagia, Block D3, No. 18/19, RT 005, RW 007, Tegal Alur Village, Kalideres District, West Jakarta, Special Capital Region of Jakarta, 11820. This business is inspired by the owner's parents' business, which was a wooden furniture manufacturing business located in Solo. The business owner migrated to Jakarta and started building the furniture business from scratch to the present day.&rdquo;</p>
												</blockquote>

												<div class="author-info">
													<h3 class="font-weight-bold">Widodo</h3>
													<span class="position d-block mb-3">Owner UD. Kurnia Illahi</span>
												</div>
											</div>

										</div>
									</div>
								</div> 
								<!-- END item -->

							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Testimonial Slider -->

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