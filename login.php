<?php include "userDAO.php"; ?>
<?php include "dbconnect.php"; ?>
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
if (isset($_POST['email']) && isset($_POST['password'])) {
  // if the user has just tried to log in
  $email = $_POST['email'];
  $password = $_POST['password'];
  $password = md5($password);

  $query = "SELECT * 
            FROM `project_user` AS P
            WHERE P.email = '$email' AND P.password = '$password'";

  $result = $db->query($query);
  if ($result->num_rows >0 ) {
    $_SESSION['valid_user'] = $email;

    $user_email = $_SESSION['valid_user'];
    $userinfo_query = "SELECT * 
              FROM `project_user` AS P
              WHERE P.email = '$user_email' ";
    $userinfo_result = $db->query($userinfo_query);
    $row = $userinfo_result->fetch_assoc();
    $user_info = new UserDAO($row['email'], $row['name'], $row['phone'], $row['addr'], $row['postal']);
  }
  $db->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Pizza Cabin - Login</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="static/css/basic_layout.css">
  <link rel="stylesheet" href="static/css/login_form.css">
  <script src="static/js/form_validation.js"></script>
  <style>
    .form_table.edit{
      width: 30em;
    }
    .form_table.edit td:nth-child(1) {
      width: 11em;
    }
    .form_table.edit td:nth-child(2) {
      width: 11em;
    }
    .form_table.edit td:nth-child(3) {
      width: 8em;
    }
    .error_message {
      color: red;
      font-size: 12px;
      padding: 2px;
    }
    .login_wrapper {
      text-align: center;
    }
    .error {
      color: red;
    }
    .login_wrapper h1 {
      font-family: "Comic Sans MS", cursive, sans-serif;
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
          <a href="login.php">
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

      <div class="login_wrapper">
      <?php if(isset($_SESSION['valid_user'])) { ?>

        <h1>Welcome! <?php echo $user_info->get_username(); ?></h1>
        <h3>You are logged in using E-mail: <?php echo $_SESSION['valid_user']; ?></h3>
        <a href="logout.php">Log out</a><br><br>
        <h2>Edit your profile:</h2>
        <form action="update_info.php" method="POST">
          <input type="hidden" name="useremail" value="<?php echo $_SESSION['valid_user']; ?>">
          <table class="form_table edit">
            <tr>
              <td><label for="phone">*Phone number: </label></td>
              <td><input type="number" name="phone" id="phone" value="<?php echo $user_info->get_phone(); ?>" onchange="return phone_validate()" required></td><td>
                <span id="phone_message" class="error_message"></span></td>
            </tr>
            <tr>
              <td><label for="addr">*Address: </label></td>
              <td><textarea name="addr" id="addr" cols="30" rows="3" required><?php echo $user_info->get_address(); ?></textarea></td><td></td>
            </tr>
            <tr>
              <td><label for="postal">*Postal code: </label></td>
              <td><input type="number" name="postal" id="postal" value="<?php echo $user_info->get_postal(); ?>" onchange="return postal_validate()" required></td><td>
                <span id="postal_message" class="error_message"></span></td>
            </tr>
            <tr>
              <td></td>
              <td><input type="submit" value="Save"></td>
            </tr>
          </table>
        </form>
        

      <?php } else { ?>
        <?php if (isset($email)) { ?>
          <h3 class="error">Invalid email or password. Try again<h3>
        <?php } ?>
        <div class="formwrapper">
          <h1>Welcome to Pizza Cabin</h1>
          <form action="login.php" method="POST">
            <table class="form_table">
              <tr>
                <td><label for="email">*E-mail: </label></td>
                <td><input type="text" name="email" id="email" required></td>
              </tr>
              <tr>
                <td><label for="password">*Password: </label></td>
                <td><input type="password" name="password" id="password" required></td>
              </tr>
              <tr>
                <td></td>
                <td><input type="submit" value="Login"></td>
              </tr>
            </table>
          </form>
          <p>Don\'t have an account? <a href="signup.html">Sign up</a></p>
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