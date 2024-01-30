<?php 
session_start();
$_SESSION["nophone"];
unset($_SESSION["nophone"]);

session_unset();
session_destroy();

echo '<script>alert("Logout Success!");</script>';
echo "<script type='text/javascript'> document.location = 'index.php'; </script>"; 

?>