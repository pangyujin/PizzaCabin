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
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Pizza Cabin</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="static/css/basic_layout.css">
  <style>
    .about_wrapper {
      margin-top: -10px;
    }
    .introduction{
      margin: -100px 0px 0px 0px;
      padding: 10px 50px;
      height: 75px;
      background-color: rgba(192, 192, 192, 0.75);
      z-index: 1;
      position: relative;
    }
    .introduction p {
      margin-top: 0;
      margin-bottom: 0;
      font-size: 18px;
      color: rgb(75, 33, 9);
      font-family: "Comic Sans MS", cursive, sans-serif;
    }
    .contact_us{
      padding: 0 50px 50px 50px;
      font-size: 15px
    }
    .contact_us_header{
      text-align: center;
      font-family: "Comic Sans MS", cursive, sans-serif;
    }
    .contact_us table {
      margin-left: auto;
      margin-right: auto;
      width:60%;
    }
    .contact_us table tr {
      border: 0;
    }
    .contact_us table td {
      font-size: 20px;
      border: 0;
      padding: 10px;
    }
    .contact_us table td:first-child {
      border-radius: 5px;
      background-color: wheat;
      font-family: "Comic Sans MS", cursive, sans-serif;
      font-weight: bold;
      text-align: center;
    }

    .contact_us table td:first-child + td {
      border-radius: 5px;
      background-color: wheat;
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
        <a class="active" href="about.php">About us</a>
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


      <div class="about_wrapper">
        <img src="static/img/about.jpg" alt="aboutus">
        <div class="introduction">
          <p>
            Pizza Cabin is a web portal for online food catering service. There are various kinds of foods available:
            a variety of pizza, fries, nuggets, and beverages. As a user, you can easily find your desired 
            food in different categories. You can even customize your favourite pizza. Pizza Cabin also supports online payment 
            and offers delivery service. 
          </p>
        </div>
        <div class="contact_us">
          <h1 class="contact_us_header">Contact Us</h1>
          <table>
            <tr>
              <td class="contact_method">Email</td>
              <td><a href="mailto:contactus@pizzacabin.com">contactus@pizzacabin.com</a></td>
            </tr>
            <tr>
              <td class="contact_method">Phone Number</td>
              <td>(+65) 1234 5678</td>
            </tr>
            <tr>
              <td class="contact_method">Address</td>
              <td>
                Nanyang Technological University Canteen 2,<br />
                41 Student Walk,<br />
                639549
              </td>
            </tr>
          </table>
        </div>

      </div>
      

    </div>
  </div>
  <div class="global-footer">
    <i>Copyright &copy; 2019 Pizza Cabin</i><br />
  </div>
</body>
</html>