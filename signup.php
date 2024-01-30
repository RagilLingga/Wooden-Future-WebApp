<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>UD. Kurnia Illahi</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/css/style.css" rel="stylesheet">
</head>

<?php
date_default_timezone_set('Asia/Jakarta');
?>


<?php
    include "includes/config.php";
    if(isset($_POST['submit']))
    {
        $nama = $_POST['inputnama'];
        $inphone = $_POST['phone'];
        $inemail = $_POST['email'];
        $indom = $_POST['dom'];
        $inpass = $_POST['pass'];
        $tanggal = date("Y-m-d H:i:s");

        mysqli_query($connection, "insert into konsumen values ('','$nama','$inemail', '$inpass', '$inphone', '$indom', '$tanggal')");
        header("location: signin.php");
    }
?>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Sign Up Start -->
        <div class="container-fluid">
        <form method="POST" enctype="multipart/form-data">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="index.html" class="">
                                <h2 class="text-primary"><i class="fa fa-hashtag me-2"></i>UD. Kurnia Illahi</h2>
                                <h3 style="text-align: right">REGISTER</h3>
                            </a>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" name="inputnama" class="form-control" id="nama" required="">
                            <label for="nama">Name</label>
                        </div>
                    
                        <div class="form-floating mb-3">
                            <input type="text" name="phone" class="form-control" id="inphone" maxlength="12" required="">
                            <label for="inphone">Phone Number</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" name="email" class="form-control" id="inemail" required="">
                            <label for="inemail">Email address</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="dom" class="form-control" id="indom" required="">
                            <label for="indom">Domicile</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" name="pass" class="form-control" id="inpass" required="" maxlength="8">
                            <label for="inpass">Password</label>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary py-3 w-100 mb-4">REGISTER</button>
                        <p class="text-center mb-0">Back? <a href="signin.php">LOGIN</a></p>
                    </div>
                </div>
            </div>
        </form>
        </div>
        <!-- Sign Up End -->
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>


    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>