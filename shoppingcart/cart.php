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
}

if (!isset($_SESSION['cart'])){
	$_SESSION['cart'] = array();
} else {
  $total_price = 0;
  foreach($_SESSION['cart'] as $order_item) {
    $total_price += $order_item->get_subtotal();
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
  <link rel="stylesheet" href="../static/css/cart.css">
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
          <li><a class="active" href="cart.php"><img src="../static/img/icon/cart_icon.png" alt="pizza" style="height: 40px; width: 40px;"><br />Cart</a></li>
          <li><a href="myorders.php" style="font-size: 25px"><img src="../static/img/icon/order_icon.png" alt="drink" style="height: 50px; width: 50px;"><br />My Orders</a></li>
        </ul>
      </div>
      <?php } ?>

      <div class="container">

        <?php if(!isset($_SESSION['valid_user'])) { ?>
        <div class="error_wrapper">
          <h1>You need to <a style="color: red;" href="../login.php">Login</a> before shopping!</h1>
        </div>
        <?php } else { ?>

        <div class="cart_wrapper">

          <div class="cart_list">

            <?php
            $i = 0;
            foreach($_SESSION['cart'] as $item) {
              echo '<div class="cart_item">
                      <div class="cart_item_desc">
                        <table>
                          <tr>
                            <td>'.$item->get_food_name().'</td>
                            <td class="to_right">$'.number_format((float)$item->get_price(), 2, '.', '').'</td>
                            <td class="to_right fix_qty">Qty: '.$item->get_qty().'</td>
                          </tr>
                          <tr>
                            <td colspan="2">'.(!is_null($item->get_op1()) ? '--add cheese;' : '').' '.
                            (!is_null($item->get_op2()) ? '--add chili;' : '').
                            '</td>
                            <td class="to_right">Sub-total: $'.number_format((float)$item->get_subtotal(), 2, '.', '').'</td>
                          </tr>
                        </table>
                      </div>
                      <div class="delete_btn">
                        <img src="../static/img/icon/trash_icon.png" alt="delete" onclick="location.href = \'delete_item.php?index='.$i.'\'">
                      </div>
                    </div>';
              $i += 1;
            }
            ?>

          </div>

          <?php if($total_price == 0) { ?>
          <div class="cart_footer" style="border: 0;">
            <h1 class="empty_msg">Your cart is empty</h1>
          </div>
          <?php } else { ?>
          <div class="cart_footer">
            <div class="show_tot">
              <h1>Total: &nbsp &nbsp $ <span id="tot_price"><?php echo number_format((float)$total_price, 2, '.', ''); ?></span> &nbsp</h1>
            </div>
            <div class="submit_order">
              <button type="button" onclick="location.href = 'place_order.php'">Place order</button>
            </div>
          </div>
          <?php } ?>
        </div>
          
        <?php } ?>

      </div>
    </div>
  </div>
  <div class="global-footer">
    <i>Copyright &copy; 2019 Pizza Cabin</i><br />
  </div>
</body>
</html>