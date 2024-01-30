<!doctype html>
<?php
    include_once "includes/config.php";
    ob_start(); // Menyimpan data
    session_start(); // Mengaktifkan session data yang tersimpan
    if (!isset($_SESSION['nophone'])) {
        header("location:signin.php");
    }
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

include_once "includes/config.php";
if (isset($_POST['Simpan'])) {
    $kodeuser = $_SESSION['kodecust'];
    $nama = $_POST['inputnama'];
    $phone = $_POST['phone'];
    $alamat = $_POST['alamat'];
    $nobank = $_POST['nobank'];
    $jumlah = $_POST['jumlah'];
    $status = $_POST['status'];
    $tanggal = date("Y-m-d H:i:s");

    $total = 0; // Inisialisasi total

    // Memastikan ada item di keranjang sebelum menghitung total
    if (!empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $productid => $jumlahProduk) {
            $query = mysqli_query($connection, "select * from product where productid = '$productid'");
            $row = mysqli_fetch_assoc($query);
            $total += $row['price'] * $jumlahProduk;
        }
    }

    $_SESSION['checkout_completed'] = true;


    $namaFile = $_FILES['file']['name'];
    $file_tmp = $_FILES["file"]["tmp_name"];
    $ekstensifile = pathinfo($namaFile, PATHINFO_EXTENSION);

    // CEK FILE PNG
    if (($ekstensifile == "png") or ($ekstensifile == "jpeg")) {
        move_uploaded_file($file_tmp, 'images/' . $namaFile);
        mysqli_query($connection, "INSERT INTO pesanan VALUES ('','$kodeuser','$productid', '$nama','$total', '$tanggal', '$alamat', '$nobank', '$jumlahProduk', '$namaFile', '$phone', '$status')");

        header("location: thanks.php");
    }
}



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
                    if (!isset($_SESSION['kodecust'])) {
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
                    <h2 class="section-title">CHECKOUT</h2>
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
                        <div class="p-3 p-lg-5 border bg-white">

                        <h2 class="h3 mb-3 text-black">Detail Order</h2>
						<table class="table site-block-order-table mb-5">
							<thead>
								<th>Product</th>
								<th>Total</th>
							</thead>
							<tbody>
								<?php foreach ($_SESSION['cart'] as $productid => $jumlah): ?>
								<?php 
								$query = mysqli_query($connection, "select * from product where productid = '$productid'");
								$row = mysqli_fetch_assoc($query);
								?>
								<tr>
									<td><?php echo $row["productnama"]?> <strong class="mx-2">x</strong> <?php echo $jumlah;?> </td>
									<td>Rp. <?php echo number_format($row['price'])?></td>
								</tr>
								<tr>
									<td class="text-black font-weight-bold"><strong>Order Total</strong></td>
									<td class="text-black font-weight-bold"><strong>Rp. <?php echo number_format($row['price']*$jumlah)?></strong></td>
								</tr>
								<?php endforeach ?>
							</tbody>
		                </table>

                            <h2 class="h3 mb-3 text-black">Billing Detail</h2>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="namapemesan" class="text-black">Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="namapemesan" name="inputnama" placeholder="Customer's Name" required="">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="phone" class="text-black">Phone Number <span class="text-danger">*</span></label>
                                    <input type="phone" class="form-control" id="phone" name="phone" placeholder="08******" maxlength="13" required="">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12 mb-5">
                                    <label for="alamat" class="text-black">Address <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Street address" required="">
                                </div>
                            </div>

                            <h2 class="h3 mb-3 text-black">Payment</h2>
                            <h4 class="text-black">Dear, you can Transfer to this Bank Acc -> A.N: Kurnia Illahi xxxxxxxx (BCA)</h4>
                            <h5 class="text-black">Please, upload your proof transfer!</h5>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="customfile" class="text-black">Proof Transfer<span class="text-danger">*</span></label>
                                </div>
                                <div>
                                    <input type="file" id="file" name="file" required="">
                                    <p class="help-block">This field is used to upload a file</p>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12 mb-5">
                                    <label for="nobank" class="text-black">Bank Acc Number <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="nobank" name="nobank" placeholder="0033****" required="">
                                </div>
                            </div>

                            <div class="form-group row" style="display:none">
                                <div class="col-md-12">
                                    <label for="status" class="text-black">Status</label>
                                    <select class="form-control" id="status" name="status">
                                        <?php while ($row = mysqli_fetch_array($datastatus)): ?>
                                            <option value="<?php echo $row["statusid"] ?>">
                                                <?php echo $row["statusnama"] ?>
                                            </option>
                                        <?php endwhile ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12" style="text-align: right">
                                <input type="submit" name="Simpan" class="btn btn-dark" value="Save">
                            </div>

                        </div>
                    </div>
                </form>
            </div>
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
