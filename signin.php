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
    include "includes/config.php";
    session_start(); //aktikan session data yg tersimpan

    if(isset($_POST["submit"]))
    {
        $nophone = $_POST["phone"];
        $password = $_POST["pass"];
        $sql_login = mysqli_query($connection, "select * from konsumen where nophone = '$nophone' and password = '$password'");

        if(mysqli_num_rows($sql_login)>0)
        {
            $row_admin = mysqli_fetch_assoc($sql_login);
            $_SESSION['kodecust'] = $row_admin['custid'];
            $_SESSION['nophone'] = $row_admin['nophone'];
            header("location: index.php");
        } else {
            // Invalid credentials
            echo '<script>alert("Phone number or password is incorrect");</script>';
        }
    }
?>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Sign In Start -->
        <div class="container-fluid">
        <form method="POST">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="" class="">
                                <h2 class="text-primary"><i class="fa fa-hashtag me-2"></i>UD. Kurnia Illahi</h2>
                                <h3 style="text-align: right">LOGIN</h3>
                            </a>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="phone" name="phone" class="form-control" id="floatingInput" placeholder="08******" maxlength="12" required="">
                            <label for="floatingInput">Phone Number</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" name="pass" class="form-control" id="floatingPassword" placeholder="Password" maxlength="8" required="">
                            <label for="floatingPassword">Password</label>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary py-3 w-100 mb-4">LOGIN</button>
                        <p class="text-center mb-0">Don't have an Account? <a href="signup.php">REGISTER</a></p>
                    </div>
                </div>
            </div>
            </form>
        </div>
        
        
        <!-- Sign In End -->
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