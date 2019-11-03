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
    .home_heading {
      text-align: center;
    }
    .home_heading h1 {
      margin: 10px 0px 20px 0px;
      font-size: 50px;
      color: #74441e;
      font-family: "Comic Sans MS", cursive, sans-serif;
    }

     * {box-sizing:border-box}
    .slideshow-container {
      max-width: 1000px;
      position: relative;
      margin: auto;
    }

    .mySlides {
      display: none;
    }

    .prev, .next {
      cursor: pointer;
      position: absolute;
      top: 50%;
      width: auto;
      margin-top: -22px;
      padding: 16px;
      color: white;
      font-weight: bold;
      font-size: 18px;
      transition: 0.6s ease;
      border-radius: 0 3px 3px 0;
      user-select: none;
      background-color: rgba(255,255,255,0.3);
      outline: none;
    }

    .next {
      right: 0;
      border-radius: 3px 0 0 3px;
    }

    .prev:hover, .next:hover {
      background-color: rgba(0,0,0,0.8);
    }

    .slides_text {
      color: #f2f2f2;
      background-color: #2a17078f;
      font-size: 25px;
      padding: 8px 12px;
      position: absolute;
      bottom: 8px;
      text-align: center;
      width:100px;
      margin-left:450px;
      margin-right:450px;
    }

    .dot {
      cursor: pointer;
      height: 15px;
      width: 15px;
      margin: 0 2px;
      background-color: #bbb;
      border-radius: 50%;
      display: inline-block;
      transition: background-color 0.6s ease;
    }

    .active, .dot:hover {
      background-color: #717171;
    }

    .fade {
      -webkit-animation-name: fade;
      -webkit-animation-duration: 1.5s;
      animation-name: fade;
      animation-duration: 1.5s;
    }

    @-webkit-keyframes fade {
      from {opacity: .4}
      to {opacity: 1}
    }

    @keyframes fade {
      from {opacity: .4}
      to {opacity: 1}
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
    
      <div class="home_heading">
        <h1>Welcome to Pizza Cabin!</h1>
      </div>

      <div class="slideshow-container">
        <div class="mySlides fade">
          <a href="menu/pizza.php"><img src="static/img/slideshow/pizza.jpg" width="1000px" height="650px"></a>
          <div class="slides_text">Pizza</div>
        </div>
        <div class="mySlides fade">
          <a href="menu/sides.php"><img src="static/img/slideshow/sides.jpg" width="1000px" height="650px"></a>
          <div class="slides_text">Sides</div>
        </div>
        <div class="mySlides fade">
          <a href="menu/beverage.php"><img src="static/img/slideshow/drink.jpg" width="1000px" height="650px"></a>
          <div class="slides_text">Drink</div>
        </div>

        <button class="prev" onclick="plusSlides(-1)">&#10094;</button>
        <button class="next" onclick="plusSlides(1)">&#10095;</button>
      </div>

      <div style="text-align:center; padding: 20px 0;">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
      </div>


    </div>
  </div>
  <div class="global-footer">
    <i>Copyright &copy; 2019 Pizza Cabin</i><br />
  </div>
</body>
<script>
  var slideIndex = 1;
  showSlides(slideIndex);

  function plusSlides(n){
      showSlides(slideIndex += n);
  }

  function currentSlide(n){
      showSlides(slideIndex = n);
  }

  function showSlides(n){
      var i;
      var slides = document.getElementsByClassName("mySlides");
      var dots = document.getElementsByClassName("dot");
      if (n > slides.length) {slideIndex = 1}
      if (n < 1) {slideIndex = slides.length}
      for (i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";  
      }
      for(i = 0; i < dots.length; i++){
        dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex-1].style.display = "block";  
      dots[slideIndex-1].className += " active";
  }
</script>
</html>