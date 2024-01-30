<?php
session_start();

	$productid = $_GET['product'];
	if(isset($_SESSION['cart'][$productid])) {
		$_SESSION['cart'][$productid]++;
		echo "<script>alert('Quantity updated in the Cart');</script>";
	} else {
		// Check if there is already a product in the cart, show a message if yes
		if(isset($_SESSION['cart']) && count($_SESSION['cart']) == 1) {
			echo "<script>alert('Barang sudah penuh di keranjang');</script>";
		} else {
			$_SESSION['cart'][$productid] = 1;
			echo "<script>alert('Added to The Cart');</script>";
		}
	}
echo "<script>location='cart.php';</script>";

?>


