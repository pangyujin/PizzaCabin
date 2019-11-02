<?php include "dbconnect.php"; ?>
<?php 
$username = $_POST['username'];
$password = $_POST['password'];
$password2 = $_POST['password2'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$addr = $_POST['addr'];
$postal = $_POST['postal'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Pizza Cabin - Login</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="static/css/basic_layout.css">
  <link rel="stylesheet" href="static/css/login_form.css">
  <style>
    .result_message {
      text-align: center;
      padding: 30px 30px;
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
      if($password != $password2) {
        echo "Sorry. Passwords do not match";
        exit;
      } else {
        $password = md5($password);
        $sql = "INSERT INTO `project_user` (`ID`, `email`, `password`, `name`, `phone`, `addr`, `postal`)
                VALUES (NULL, '$email', '$password', '$username', '$phone', '$addr', '$postal');";
        $result = $db->query($sql);

        echo '<div class="result_message">';
        if(!$result) {
          echo "<h3>This email has been registered.</h3>";
          echo '<p>You can try to <a href="signup.html">Sign-up</a> again.</p>';
        } else {
          echo "<h3>Welcome ". $username . ". You are now registered</h3>";
          echo '<p>You can login now. <a href="login.php">Login</a></p>';
        }
        echo '</div>';
      }
      ?>

    </div>
  </div>
  <div class="global-footer">
    <i>Copyright &copy; 2019 Pizza Cabin</i><br />
  </div>
</body>
</html>