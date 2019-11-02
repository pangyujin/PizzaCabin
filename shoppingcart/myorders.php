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
  $user_info = new UserDAO($row['email'], $row['name'], $row['phone'], $row['addr'], $row['postal']);

  $query_num_orders = "SELECT O.order_time as 'order_time', O.status as 'order_status'
                      FROM `project_order` as O,  `project_food` as F, `project_user` as U
                      WHERE O.user_id = U.ID AND O.food_id = F.ID AND U.email = '$user_email'
                      GROUP BY O.order_time
                      ORDER BY order_time DESC";
  $num_orders_result = $db->query($query_num_orders);

  $order_list = array();
  for($i=0;$i<$num_orders_result->num_rows;$i++) {
    $num_order_row = $num_orders_result->fetch_assoc();
    $order_status = $num_order_row['order_status'];
    $order_time = $num_order_row['order_time'];

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

    $order_list[] = new Order($user_email, $order_time, $order_status, $items_list);
    
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
  <link rel="stylesheet" href="../static/css/order.css">
  <style>
    .error_wrapper {
      margin-top: 10%;
      margin-left: 100px;
    }
    .empty_msg {
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

      <?php if(isset($_SESSION['valid_user'])) { ?>
      <div class="sidebar">
        <ul>
          <li><a href="cart.php"><img src="../static/img/icon/cart_icon.png" alt="pizza" style="height: 40px; width: 40px;"><br />Cart</a></li>
          <li><a class="active" href="myorders.php" style="font-size: 25px"><img src="../static/img/icon/order_icon.png" alt="drink" style="height: 50px; width: 50px;"><br />My Orders</a></li>
        </ul>
      </div>
      <?php } ?>

      <div class="container">

        <?php if(!isset($_SESSION['valid_user'])) { ?>
          <div class="error_wrapper">
            <h1>You need to <a style="color: red;" href="../login.php">Login</a> before shopping!</h1>
          </div>
        <?php } else { ?>

        <?php foreach($order_list as $this_order): ?>
        <div class="order_list">

          <div class="order_item">
            <div class="order_header">
              <p>Order time:&nbsp&nbsp <?php echo $this_order->get_order_time(); ?></p>
            </div>
            <hr>
            <div class="order_body">
              <h4>Status: <?php echo $this_order->get_status(); ?></h4>
              <?php
              $total_price = 0;
              ?>
              <?php foreach($this_order->get_item_list() as $this_item): ?>
              <?php
              $total_price += (float)$this_item->get_subtotal();
              ?>
              <table class="item_in_order">
                <tr>
                  <td><?php echo $this_item->get_food_name(); ?></td>
                  <td class="to_right">$<?php echo number_format((float)$this_item->get_price(), 2, '.', ''); ?></td>
                  <td class="to_right fix_qty">Qty: <?php echo $this_item->get_qty(); ?></td>
                </tr>
                <tr>
                  <td colspan="2">
                    <?php echo (($this_item->get_op1()) == 1 ? '--add cheese;' : '')?>
                    <?php echo (($this_item->get_op2()) == 1 ? '--add chili;' : '')?>
                  </td>
                  <td class="to_right">Sub-total: $<?php echo $this_item->get_subtotal(); ?></td>
                </tr>
              </table>
              <?php endforeach; ?>
              <div class="email_btn_wrapper">
                <div><h2>Total:&nbsp $<?php echo number_format((float)$total_price, 2, '.', ''); ?></h2></div>
                <form action="send_email.php" method="POST">
                  <input type="hidden" name="order_time" value=<?php echo '"'.$this_order->get_order_time().'"'; ?>>
                  <input type="hidden" name="status" value=<?php echo '"'.$this_order->get_status().'"'; ?>>
                  <button type="submit">Send to email</button>
                </form>
              </div>
            </div>
          </div>
          
        </div>
        <?php endforeach; ?>

        <?php } ?>

      </div>
    </div>
  </div>
  <div class="global-footer">
    <i>Copyright &copy; 2019 Pizza Cabin</i><br />
  </div>
</body>
</html>