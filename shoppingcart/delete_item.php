<?php
session_start();
if (isset($_SESSION['cart'])) {
  \array_splice($_SESSION['cart'], $_GET['index'], 1);
  // var_dump($_SESSION['cart']);
  // echo "<br>";
  // var_dump($_GET['index']);
}
?>
<?php
header("Location: cart.php");
?>