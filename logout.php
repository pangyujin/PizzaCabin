<?php
session_start();

$old_user = $_SESSION['valid_user'];  
unset($_SESSION['valid_user']);
unset($_SESSION['cart']);
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Pizza Cabin - Login</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="static/css/basic_layout.css">
  <link rel="stylesheet" href="static/css/login_form.css">
  <style>
    .logout_wrapper {
      text-align: center;
    }
  </style>
</head>
<body>
  <div class="wrapper">
    <div class="global-header">
      <div class="global-nav">
        <a href="index.php" style="padding: 0;height: 100px;"><img id="logo" src="static/img/logo.png" alt="Home"></a>
        <a href="menu/pizza.php" style="margin-left: 25px;">Menu</a>
        <a href="shoppingcart/cart.php">MyCart</a>
        <a href="about.php">About us</a>
        <div class="login-btn">
          <a href="login.php">Login</a>
        </div>
      </div>
    </div>
    <div class="main">

      <?php
      echo '<div class="logout_wrapper">';
      echo '<h3>You are now logged out.</h3>';
      echo '</div>';
      ?>

    </div>
  </div>
  <div class="global-footer">
    <i>Copyright &copy; 2019 Pizza Cabin</i><br />
  </div>
</body>
</html>