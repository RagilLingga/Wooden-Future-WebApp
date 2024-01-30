<!doctype html>
<?php
    include "includes/config.php";
    ob_start(); // Menyimpan data
    session_start(); //aktikan session data yg tersimpan
    if(!isset($_SESSION['nophone']))
    header("location:signin.php");
	echo $_SESSION['nophone'];
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

<?php
date_default_timezone_set('Asia/Jakarta');
?>

<?php
    include "includes/config.php";
    if(isset($_POST['Simpan']))
    {
        $namapemesan = $_POST['inputnama'];
        $alamat = $_POST['alamat'];
        $phone = $_POST['phone'];
        $kodekategori = $_POST['kodekategori'];
        $desk = $_POST['desk'];
        $est = $_POST['est'];
		$status = $_POST['status'];
		$tanggal = date("Y-m-d H:i:s");

        $nama = $_FILES['file']['name'];
        $file_tmp = $_FILES["file"]["tmp_name"];

        $ekstensifile = pathinfo($nama, PATHINFO_EXTENSION);

        // CEK FILE PNG
        if(($ekstensifile == "png") or ($ekstensifile == "jpeg"))
        {
            move_uploaded_file($file_tmp, 'images/'.$nama); //untuk upload file ke folder images
            mysqli_query($connection, "insert into custom values ('', '$kodekategori', '$namapemesan', '$alamat', '$phone', '$desk', '$est', '$nama', '$status', '$tanggal')");
			header("location: thanks.php");
        }
    }

    $datakategori = mysqli_query($connection, "select * from kategori");
	$datastatus = mysqli_query($connection, "select * from status");
?>

	<body>
		<!-- Start Header/Navigation -->
		<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

			<div class="container">
				<a class="navbar-brand" href="index.php">Kurnia Illahi<span>.</span></a>

				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarsFurni">
					<ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
						<li><a class="nav-link" href="index.php">Home</a></li>
						<li class="nav-item active">
							<a class="nav-link" href="shop.php">Shop</a>
						</li>
						<li><a class="nav-link" href="status.php">Status</a></li>
						<li><a class="nav-link" href="#">Contact us</a></li>
					</ul>

					<ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
						<li><a class="nav-link" href="cart.php"><img src="images/cart.svg"></a></li>
						<?php
						if (isset($_SESSION['nophone'])) {
							// Jika session 'kodecust' ada, artinya user sudah login
							echo '<li><a class="nav-link" href="signout.php">Logout</a></li>';
						} else {
							// Jika session 'kodecust' tZidak ada, artinya user belum login
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
						<h2 class="section-title">CUSTOMIZED PRODUCT</h2>
						<h2 class="section-title">---------------</h2>
					</div>
				</div>
			</div>
		</div>
		<!-- END -->

        <div class="untree_co-section">
		    <div class="container">
		      <div class="row">
			  <form method="POST" enctype="multipart/form-data">
		        <div class="col-md-12 mb-5 mb-md-0">
		          <h2 class="h3 mb-3 text-black">CUSTOM FORM</h2>
		          <div class="p-3 p-lg-5 border bg-white">

		            <div class="form-group row">
		              <div class="col-md-12">
		                <label for="namapemesan" class="text-black">Name <span class="text-danger">*</span></label>
		                <input type="text" class="form-control" id="namapemesan" name="inputnama" placeholder="Customer's Name" required="">
		              </div>
		            </div>

		            <div class="form-group row">
		              <div class="col-md-12">
                        <label for="alamat" class="text-black">Address <span class="text-danger">*</span></label>
		                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Street address" required="">
		              </div>
		            </div>

		            <div class="form-group row">
		              <div class="col-md-12">
		                <label for="phone" class="text-black">Phone Number <span class="text-danger">*</span></label>
		                <input type="phone" class="form-control" id="phone" name="phone" placeholder="08******" maxlength="13" required="">
		              </div>
		            </div>

					<div class="form-group row">
		              <div class="col-md-12">
		                <label for="kodekategori" class="text-black">Category Product <span class="text-danger">*</span></label>
		                <select class="form-control" id="kodekategori" name="kodekategori">
                            <?php while($row = mysqli_fetch_array($datakategori)) 
                            { ?>
                                <option value="<?php echo $row["kategoriid"]?>">
                                    <?php echo $row["kategorinama"]?>
                                </option>
                            <?php } ?>
                        </select>
		              </div>
		            </div>

                    <div class="form-group row">
		              <div class="col-md-12">
		                <label for="desk" class="text-black">Description <span class="text-danger">*</span></label>
		                <input type="text" class="form-control" id="desk" name="desk" placeholder="Size, Color, etc" required="">
		              </div>
		            </div>

                    <div class="form-group row">
		              <div class="col-md-12">
		                <label for="est" class="text-black">Desired Estimation <span class="text-danger">*</span></label>
		                <input type="text" class="form-control" id="est" name="est" placeholder="Days" required="">
		              </div>
		            </div>

                    <div class="form-group row">
		              <div class="col-md-12">
		                <label for="customfile" class="text-black">Picture<span class="text-danger">*</span></label> </div>
		                <div><input type="file" id="file" name="file" required="">
                        <p class="help-block">Field ini digunakan untuk upload file</p>
		              </div>
		            </div>

					<div class="form-group row" style="display:none">
		              <div class="col-md-12">
		                <label for="status" class="text-black">Status</label>
		                <select class="form-control" id="status" name="status">
                            <?php while($row = mysqli_fetch_array($datastatus)) 
                            { ?>
                                <option value="<?php echo $row["statusid"]?>">
                                    <?php echo $row["statusnama"]?>
                                </option>
                            <?php } ?>
                        </select>
		              </div>
		            </div>
                    
                    <div class="col-md-12" style="text-align: right">
						<input type="submit" name="Simpan" class="btn btn-dark" value="Simpan">
                    </div>

		          </div>
		        </div>
				</form>
		      </div>
		      <!-- </form> -->
							
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
							<p class="mb-2 text-center text-lg-start">Copyright &copy;<script>document.write(new Date().getFullYear());</script>. All Rights Reserved. &mdash; Designed with love by <a href="https://untree.co">Untree.co</a> <!-- License information: https://untree.co/license/ -->
            </p>
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
