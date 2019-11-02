<?php include '../dbconnect.php'; ?>
<?php include '../userDAO.php'; ?>
<?php include 'foodDAO.php';?>
<?php include 'orderDAO.php'; ?>
<?php
session_start();
if(isset($_SESSION['valid_user'])) {
  $user_email = $_SESSION['valid_user'];
  $userinfo_query = "SELECT * 
            FROM `project_user` AS P
            WHERE P.email = '$user_email' ";
  $userinfo_result = $db->query($userinfo_query);
  $row = $userinfo_result->fetch_assoc();
  $uid = $row['ID'];
  $user_info = new UserDAO($row['email'], $row['name'], $row['phone'], $row['addr'], $row['postal']);

  if (isset($_SESSION['cart'])) {
    $order_time = date_create()->format('Y-m-d H:i:s');
    $flag = TRUE;
    foreach($_SESSION['cart'] as $item) {
      $food_name = $item->get_food_name();

      $fid_query = "SELECT * 
                    FROM `project_food` AS F
                    WHERE F.name = '$food_name' ";
      $food_result = $db->query($fid_query);
      $food_row = $food_result->fetch_assoc();
      $fid = $food_row['ID'];
      $qty = $item->get_qty();
      $op1 = (is_null($item->get_op1()) ? 0 : 1);
      $op2 = (is_null($item->get_op2()) ? 0 : 1);

      $insert_order_query = "INSERT INTO `project_order` (`user_id`, `food_id`, `order_time`, `qty`, `status`, `option_1`, `option_2`) 
                            VALUES ('$uid', '$fid', '$order_time', '$qty', 'processing', '$op1', '$op2');";
      $insert_result = $db->query($insert_order_query);
      echo '<div class="result_message">';
      if(!$insert_result) {
        $flag = FALSE;
        echo $insert_order_query;
      }
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Pizza Cabin</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="../static/css/basic_layout.css">
  <link rel="stylesheet" href="../static/css/sidebar.css">
  <style>
    h1, h2 {
      text-align: center;
    }
  </style>
</head>
<body>
  <div class="wrapper">
    <div class="global-header">
      <div class="global-nav">
        <a href="../index.php" style="padding: 0;height: 100px;"><img id="logo" src="../static/img/logo.png" alt="Home"></a>
        <a href="../menu/pizza.php" style="margin-left: 25px;">Menu</a>
        <a class="active" href="../shoppingcart/cart.php">MyCart</a>
        <a href="../about.php">About us</a>
        <div class="login-btn">
          <a href="../login.php">
          <?php
          if(isset($_SESSION['valid_user'])) {
            echo $user_info->get_username();
          } else {
            echo "Login";
          }
          ?>
          </a>
        </div>
      </div>
    </div>
    <div class="main">
      
      <?php
      if(isset($_SESSION['valid_user'])) {
        if (isset($_SESSION['cart'])) {
          if(!$flag) {
            echo "<h1>Order failed.</h1>";
          } else {
            echo "<h1>Order has been placed</h1>";
            $_SESSION['cart'] = array();
          }
          echo "<h2>view <a href=\"myorders.php\">my orders</a></h2>";
        }
      }
      ?>
      
    </div>
  </div>
  <div class="global-footer">
    <i>Copyright &copy; 2019 Pizza Cabin</i><br />
  </div>
</body>
</html>