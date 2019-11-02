<?php include "orderDAO.php"; ?>
<?php
session_start();
if (!isset($_SESSION['cart'])){
	$_SESSION['cart'] = array();
}
$food_type = $_POST['food_type'];
$food_name = $_POST['food_name'];
$qty = $_POST['qty'];
$option_1 = $_POST['option_1'];
$option_2 = $_POST['option_2'];
$price = $_POST['price'];
$subtotal = (float)$price * (int)$qty;

$item = new CartItem($food_type, $food_name, $price, (int)$qty, $option_1, $option_2, $subtotal);
var_dump($item);

$_SESSION['cart'][] = $item;

?>
<?php
header("Location: cart.php");
?>