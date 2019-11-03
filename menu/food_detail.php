<?php include '../dbconnect.php'; ?>
<?php include '../userDAO.php'; ?>
<?php include 'foodDAO.php'; ?>
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

$item_name = $_GET['pizza'];
$item_query = "SELECT * 
                FROM `project_food` AS F
                WHERE F.name = '$item_name' ";
$item_result = $db->query($item_query);
$row = $item_result->fetch_assoc();
$item = new FoodDAO($row['category'], $row['name'], $row['photo'], $row['price'], $row['description']);

$date_string = date("Y-m-d H:i:s");

if ($item->get_type() == 'sides') {
  $menu_back = 'sides.php';
} elseif ($item->get_type() == 'beverage') {
  $menu_back = 'beverage.php';
} else {
  $menu_back = 'pizza.php';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Pizza Cabin</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="../static/css/basic_layout.css">
  <link rel="stylesheet" href="../static/css/sidebar.css">
  <link rel="stylesheet" href="../static/css/food_card.css">
  <link rel="stylesheet" href="../static/css/food_detail.css">
  <script src="../static/js/qty_button.js"></script>
  <style>
    .error_wrapper {
      text-align: center;
      margin-top: 10%;
    }
  </style>
</head>
<body>
  <div class="wrapper">
    <div class="global-header">
      <div class="global-nav">
        <a href="../index.php" style="padding: 0;height: 100px;"><img id="logo" src="../static/img/logo.png" alt="Home"></a>
        <a class="active" href="../menu/pizza.php" style="margin-left: 25px;">Menu</a>
        <a href="../shoppingcart/cart.php">MyCart</a>
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

      <?php if(!isset($_SESSION['valid_user'])) { ?>

      <div class="error_wrapper">
        <h1>You need to <a style="color: red;" href="../login.php">Login</a> before ordering!</h1>
      </div>

      <?php } else { ?>

      <div class="detail_wrapper">
        <div class="food_desc">
          <img alt=<?php echo $item->get_name(); ?> src=<?php echo $item->get_imgpath(); ?>>
          <div>
            <h1><?php echo $item->get_name(); ?></h1>
            <h2>$ <?php echo number_format((float)$item->get_price(), 2, '.', ''); ?></h2>
            <p><?php echo $item->get_desc(); ?></p>
          </div>
        </div>
        <hr>
        <form class="selection" method="POST" action="../shoppingcart/add_cart.php">
          <div class="select_qty">
            <h2>Choose quantity:</h2>
            <button type="button" id="minus" onclick="return btn_minus()">-</button>
            <input type="hidden" name="food_type" value=<?php echo '"'.$item->get_type().'"'; ?>>
            <input type="hidden" name="food_name" value=<?php echo '"'.$item_name.'"'; ?>>
            <input type="hidden" name="price" value=<?php echo '"'.$item->get_price().'"'; ?>>
            <input id="qty" type="number" name="qty" min="1" step="1" value="1">
            <button type="button" id="plus" onclick="return btn_plus()">+</button>
          </div>

        <?php if($item->get_type() == 'pizza') { ?>

          <hr>
          <div class="select_option">
            <h2>Customise:</h2>
            <p><input type="checkbox" name="option_1" id="option_1">Add Cheese</p>
            <p><input type="checkbox" name="option_2" id="option_2">Add Chili</p>
          </div>

        <?php } ?>

          <div class="submit_btn">
            <button type="button" class="backtomenu" onclick="location.href=<?php echo '\''.$menu_back.'\''; ?>">Back to Menu</button>
            <button type="submit" class="addtocart">Add to Cart</button>
          </div>
        </form>
      </div>

      <?php } ?>

    </div>
  </div>
  <div class="global-footer">
    <i>Copyright &copy; 2019 Pizza Cabin</i><br />
  </div>
</body>
<script>
document.getElementById("qty").addEventListener("change", check_qty, false);
</script>
</html>