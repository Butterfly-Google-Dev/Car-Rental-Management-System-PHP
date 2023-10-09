<?php

require 'connect.php';
$conn = Connect();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome to Car Rental </title>

  <!-- font awesome cdn link  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="css/userstyle.css">
  <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

  <style>
    .card-img-top {
      max-height: 150px;
      max-width: 230px;
      min-height: 150px;
      min-width: 230px;
      z-index: 0;
    }

    .menu-content {
      display: grid;
      grid-gap: 20px;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      justify-items: center;
    }

    .sub-menu {
      background: #fff;
      box-shadow: 0 1px 5px rgba(104, 104, 104, 0.8);
      width: 270px;
      height: 310px;
      padding: 1.5rem;
      text-align: center;
    }

    h3 {
      letter-spacing: 5px;
      text-transform: uppercase;
      font: 20px "Lato", sans-serif;
      color: #111;
    }


    h5,
    h6 {
      font-family: "Segoe UI", Arial, sans-serif;
      font-weight: 400;
      margin: 10px 0
    }

    h5 {
      font-size: 18px
    }

    h6 {
      font-size: 16px
    }
    a {
    color: inherit
}
  </style>

</head>

<body>

  <!-- header section starts  -->

  <header>

    <div class="header-1">

      <a href="#" class="logo"><i class="fas fa-car-side"></i>Car Rental</a>
  
      
        <h3>Welcome User</h3>
      
    </div>

    <div class="header-2">

      <div id="menu-bar"></div>

      <nav class="navbar">
        <a href="#home">home</a>
        <a href="#product">cars</a>
        <a href="#contact">contact</a>
      </nav>

      <div class="icons">
      <a href="index.php" class="las la-power-off"></a>
      </div>

    </div>

  </header>

  <!-- header section ends -->

  <!-- home section starts  -->

  <section class="home" id="home">

    <div class="image">
      <img src="img/bg1.jpg" alt="image of home">
    </div>

    <div class="content">
      <h3>find your dream car</h3>
      <br><br>
      <span>Welcome to the retal car website. Here we provide to you the best reliable cars for your journey</span>
      
    </div>

  </section>

  <!-- home section ends -->





  <!-- CAR SELECTION section starts  -->

  <h3 style="text-align:center;" id="product">Available Cars</h3>
  <br>
  <section class="menu-content">
    <?php
    $sql1 = "SELECT * FROM cars WHERE car_availability='yes'";
    $result1 = mysqli_query($conn, $sql1);

    if (mysqli_num_rows($result1) > 0) {
      while ($row1 = mysqli_fetch_assoc($result1)) {
        $car_id = $row1["car_id"];
        $car_name = $row1["car_name"];
        $ac_price = $row1["ac_price"];
        $ac_price_per_day = $row1["ac_price_per_day"];
        $non_ac_price = $row1["non_ac_price"];
        $non_ac_price_per_day = $row1["non_ac_price_per_day"];
        $car_img = $row1["car_img"];

    ?>
        <a href="booking.php?id=<?php echo ($car_id) ?>">
          <div class="sub-menu">


            <img class="card-img-top" src="<?php echo $car_img; ?>" alt="Card image car">
            <h5><b> <?php echo $car_name; ?> </b></h5>
            <h6> AC Fare: <?php echo ("Rs. " . $ac_price . "/km & Rs." . $ac_price_per_day . "/day"); ?></h6>
            <h6> Non-AC Fare: <?php echo ("Rs. " . $non_ac_price . "/km & Rs." . $non_ac_price_per_day . "/day"); ?></h6>


          </div>
        </a>
      <?php }
    } else {
      ?>
      <h1> No cars available :( </h1>
    <?php
    }
    ?>
  </section>


  <!-- car selection section ends -->






  <!-- contact section starts  -->

  <section class="contact" id="contact">

    <h1 class="heading"> <span>contact</span> us </h1>

    <h3>Email us :- RicsRac@gmail.com</h3>
    <h3>Contact us :- 9776321425</h3>

  </section>

  <!-- contact section ends -->

  <!-- footer section starts  -->

  <section class="footer">

    <div class="box-container">

      <div class="box">
        <a href="#" class="logo"><i class="fas fa-car-side"></i>car rental</a>
        <p>RICSRAC CARS INDIA PRIVATE LIMITED is a Private Company, who was incorporated 2 Year(s) 9 Month(s) 26 Day(s) ago on dated 19-Aug-2019 . RICSRAC CARS INDIA PRIVATE LIMITED is classified as Non-Governement and is registered at Registrar of Companies located in ROC-SHILLONG. As regarding the financial status on the time of registration of RICSRAC CARS INDIA PRIVATE LIMITED Company its authorized share capital is Rs. 1500000 and its paid up capital is Rs. 100000.</p>
        <div class="share">
          <a href="#" class="btn fab fa-facebook-f"></a>
          <a href="#" class="btn fab fa-twitter"></a>
          <a href="#" class="btn fab fa-instagram"></a>
          <a href="#" class="btn fab fa-linkedin"></a>
        </div>
      </div>


      <div class="box">
        <h3>quick links</h3>
        <div class="links">
          <a href="#" id="home">home</a>
          <a href="#" id="product">cars</a>
          <a href="#" id="contact">contact</a>
        </div>
      </div>

      <div class="box">
        <h3>download app</h3>
        <div class="links">
          <a href="#">google play</a>
          <a href="#">windows</a>
          <a href="#">app store</a>
        </div>
      </div>

    </div>

    <h1 class="credit"> created by <span> mrs. Lysanias Jungai </span> | all rights reserved! </h1>

  </section>

  <!-- footer section ends -->




  <!-- custom js   -->
  <script>
    let menu = document.querySelector('#menu-bar');
    let navbar = document.querySelector('.navbar');
    let header = document.querySelector('.header-2');

    menu.addEventListener('click', () => {
      navbar.classList.toggle('active');
    });

    window.onscroll = () => {

      navbar.classList.remove('active');

      if (window.scrollY > 150) {
        header.classList.add('active');
      } else {
        header.classList.remove('active');
      }

    }
  </script>

</body>

</html>