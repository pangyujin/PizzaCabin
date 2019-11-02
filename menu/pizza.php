<?php include '../dbconnect.php'; ?>
<?php include '../userDAO.php'; ?>
<?php include 'foodDAO.php';?>
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Pizza Cabin</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="../static/css/basic_layout.css">
  <link rel="stylesheet" href="../static/css/sidebar.css">
  <link rel="stylesheet" href="../static/css/food_card.css">
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
      <div class="sidebar">
        <ul>
          <li><a class="active" href="pizza.php"><img src="../static/img/icon/pizza_icon.png" alt="pizza" style="height: 50px; width: 50px;"><br />Pizza</a></li>
          <li><a href="sides.php"><img src="../static/img/icon/fries_icon.png" alt="sides" style="height: 50px; width: 50px;"><br />Sides</a></li>
          <li><a href="beverage.php"><img src="../static/img/icon/drink_icon.png" alt="drink" style="height: 50px; width: 40px;"><br />Beverage</a></li>
        </ul>
      </div>
      <div class="container">

        <?php
          $pizza_query = "SELECT * 
                          FROM `project_food` AS F
                          WHERE F.category = 'pizza' ";
          $pizza_result = $db->query($pizza_query);

          $pizza_list = array();
          for($i=0; $i<$pizza_result->num_rows; $i++) {
            $row = $pizza_result->fetch_assoc();
            $item = new FoodDAO($row['category'], $row['name'], $row['photo'], $row['price'], $row['description']);
            $pizza_list[] = $item;
          }

          foreach($pizza_list as $pizza) {
            $pizza->render_food();
          }
        ?>

      </div>
    </div>
  </div>
  <div class="global-footer">
    <i>Copyright &copy; 2019 Pizza Cabin</i><br />
  </div>
</body>
</html>