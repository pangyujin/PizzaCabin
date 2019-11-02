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

  $order_time = $_POST['order_time'];
  $status = $_POST['status'];

  $items_query = "SELECT F.category as 'food_type', F.name as 'food_name', F.price as 'price', O.qty as 'qty', O.option_1 as 'op1', O.option_2 as 'op2'
                  FROM `project_order` as O, `project_user` as U, `project_food` as F
                  WHERE O.user_id = U.ID AND O.food_id = F.ID AND O.order_time = '$order_time' AND U.email = '$user_email'";
  $items_result = $db->query($items_query);

  $items_list = array();
  for($j=0;$j<$items_result->num_rows;$j++) {
    $items_row = $items_result->fetch_assoc();
    $subtotal = (int)$items_row['qty'] * (float)$items_row['price']; 
    $items_list[] = new CartItem($items_row['food_type'], $items_row['food_name'], (float)$items_row['price'], (int)$items_row['qty'], $items_row['op1'], $items_row['op2'], $subtotal);
  }

  $message = 'Dear '.$user_info->get_username().",\n\n".
              'You have placed an order at '.$order_time."\n\n".
              "Deliver to: \n".$user_info->get_address()."\n\n".
              'Here is the detail of your order:'."\n\n".
              'Status: '.$status."\n\n".
              "\tItem\tPrice\tQTY\n".
              "------------------------------------------\n";
  $total = 0;
  foreach($items_list as $this_item) {
    $total += (float)$this_item->get_subtotal();
    $entry = $this_item->get_food_name()."\t$".number_format((float)$this_item->get_price(), 2, '.', '')."\tQty: ".$this_item->get_qty().
            "\n".(($this_item->get_op1()) == 1 ? "--add cheese;\n" : "").(($this_item->get_op2()) == 1 ? "--add chili;\n" : "")."\t\t\tSubtotal: $".$this_item->get_subtotal()."\n";
    $message .= $entry;
  }
  $message .= "\n\nTotal: $".$total;

  $to      = 'f34ee@localhost';
  $subject = 'Your order has been placed';
  $headers = 'From: f34ee@localhost' . "\r\n" .
      'Reply-To: f34ee@localhost' . "\r\n" .
      'X-Mailer: PHP/' . phpversion();

  mail($to, $subject, $message, $headers,'-ff34ee@localhost');
  // echo ("mail sent to : ".$to);
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
        echo "<h1>mail sent to : ".$to."</h1>";
        echo "<h2>Return to <a href=\"myorders.php\">my orders</a></h2>";
      }
      ?>
      
    </div>
  </div>
  <div class="global-footer">
    <i>Copyright &copy; 2019 Pizza Cabin</i><br />
  </div>
</body>
</html>
