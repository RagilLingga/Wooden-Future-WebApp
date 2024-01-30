<?php 
session_start();
$productid=$_GET["product"];
unset($_SESSION["cart"][$productid]);

echo "<script>alert('dihapus');</script>";
echo "<script>location='index.php';</script>";
?>