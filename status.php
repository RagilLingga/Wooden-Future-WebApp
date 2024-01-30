<!doctype html>
<?php
    include "includes/config.php";
    ob_start(); // Menyimpan data
    session_start(); //aktikan session data yg tersimpan
    if(!isset($_SESSION['nophone']))
    header("location:signin.php");

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
						<li><a class="nav-link" href="index.php">Home</a></li>
						<li><a class="nav-link" href="shop.php">Shop</a></li>
						<li class="nav-item active">
							<a class="nav-link" href="status.php">Status</a>
						</li>
						<li><a class="nav-link" href="#">Contact us</a></li>
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

        <!-- Start Testimonial Slider -->
		<div class="category-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-7 mx-auto text-center">
						<h2 class="section-title">STATUS ORDER</h2>
						<h2 class="section-title">---------------</h2>
					</div>
                </div>
			</div>
        </div>

            <div class="container">
				<div class="row mb-5">
				<h2 class="section-title">REGULAR ORDER</h2>
                <form class="col-md-12" method="post">
                  <div class="site-blocks-table">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Order Code</th>
                          <th>Status</th>
                          <th>Order Date</th>
                        </tr>
                      </thead>
                      <tbody>
    <?php
    $query = mysqli_query($connection, "SELECT pesanan.*, konsumen.nama, status.statusnama FROM pesanan
                                         INNER JOIN status ON pesanan.statusid = status.statusid
                                         INNER JOIN konsumen ON pesanan.custid = konsumen.custid");
    $nomor = 1;
    while ($row = mysqli_fetch_array($query)) { ?>
        <tr>
            <td><?php echo $nomor; ?></td>
            <td><?php echo $row['nama']; ?></td>
            <td><?php echo $row['pesananid']; ?></td>
            <td><?php echo $row['statusnama']; ?></td>
            <td><?php echo $row['date']; ?></td>
        </tr>
        <?php $nomor = $nomor + 1;
    } ?>
</tbody>
                    </table>
                  </div>
                </form>
				</div>
            </div>

            <div class="container">
				<div class="row mb-5">
				<h2 class="section-title">CUSTOM ORDER</h2>
                <form class="col-md-12" method="post">
                  <div class="site-blocks-table">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Order Code</th>
                          <th>Status</th>
                          <th>Order Date</th>
                        </tr>
                      </thead>
                      <tbody>
                    <?php
                        $query = mysqli_query($connection, "select custom.*, statusnama from custom, status where custom.statusid = status.statusid");
                        while ($row = mysqli_fetch_array($query))
                        { ?>
                            <tr>
                                <td><?php echo $row['nama']?></td>
                                <td><?php echo $row['customid']?></td>
                                <td><?php echo $row['statusnama']?></td>
								<td><?php echo $row['date']?></td>
                            </tr>
                    <?php } ?>
                </tbody>
                    </table>
                  </div>
                </form>
				</div>
            </div>



        		<!-- Start Footer Section -->
		<footer class="footer-section">
			<div class="container relative">

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

</html>