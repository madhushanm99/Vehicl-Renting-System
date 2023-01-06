<?php
session_start();
include('includes/config.php');
error_reporting(1);

?>

<!DOCTYPE HTML>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="keywords" content="">
  <meta name="description" content="">
  <title>Car Rental Portal</title>

  <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
  <link rel="stylesheet" href="assets/css/style.css" type="text/css">
  <link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
  <link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
  <link href="assets/css/slick.css" rel="stylesheet">
  <link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
  <link href="assets/css/font-awesome.min.css" rel="stylesheet">


</head>

<body>


  <!--Header-->
  <?php include('includes/header.php'); ?>

  <section class="page-header aboutus_page">
    <div class="container">
      <div class="page-header_wrap">
        <div class="page-heading">
          <h1>About Us </h1>
        </div>
        <ul class="coustom-breadcrumb">
          <li><a href="index.php">Home</a></li>
          <li>About Us </li>
        </ul>
      </div>
    </div>


    <div class="dark-overlay"></div>
  </section>

  <section class="about_us section-padding">
    <div class="container">
      <div class="section-header text-center">


        <h2>About Us </h2>
        <p>
          <span
            style="color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;">We
            offer a wide range of Sri Lanka
            vehicle hire facilities ranging from economy to luxury. The fleet consists of cars, sports utility,
            and 4WD vehicles, vans and buses. There is also a range of classic and vintage cars available for weddings,
            commercials and other special occasions.</span>
        </p>
      </div>
    </div>
  </section>



  <?php include('includes/footer.php'); ?>


  <div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>



  <?php include('includes/login.php'); ?>
  <?php include('includes/registration.php'); ?>
  <?php include('includes/forgotpassword.php'); ?>



  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/interface.js"></script>


  <script src="assets/js/bootstrap-slider.min.js"></script>

  <script src="assets/js/slick.min.js"></script>
  <script src="assets/js/owl.carousel.min.js"></script>

</body>

</html>