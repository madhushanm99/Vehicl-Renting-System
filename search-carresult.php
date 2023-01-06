<?php
session_start();
include('includes/config.php');
error_reporting(0);
?>

<!DOCTYPE HTML>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="keywords" content="">
  <meta name="description" content="">
  <title>Car Rental Portal | Car Listing</title>

  <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">

  <link rel="stylesheet" href="assets/css/style.css" type="text/css">

  <link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
  <link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">

  <link href="assets/css/slick.css" rel="stylesheet">

  <link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">

  <link href="assets/css/font-awesome.min.css" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
</head>

<body>



  <?php include('includes/header.php'); ?>

  <section class="page-header listing_page">
    <div class="container">
      <div class="page-header_wrap">
        <div class="page-heading">
          <h1>Car Listing</h1>
        </div>
        <ul class="coustom-breadcrumb">
          <li><a href="#">Home</a></li>
          <li>Car Listing</li>
        </ul>
      </div>
    </div>

    <div class="dark-overlay"></div>
  </section>

  <section class="listing-page">
    <div class="container">
      <div class="row">
        <div class="col-md-9 col-md-push-3">
          <div class="result-sorting-wrapper">
            <div class="sorting-count">
              <?php

$brand = $_POST['brand'];
$fueltype = $_POST['fueltype'];

?>


              <?php
if (isset($_POST['brand']) && isset($_POST['fueltype'])) {
  $brand = $_POST['brand'];
  $fueltype = $_POST['fueltype'];
  $sql = "SELECT *   from tblvehicles where VehiclesBrand=:brand and FuelType=:fueltype";
}
if (!isset($_POST['brand']) && !isset($_POST['fueltype'])) {
  $sql = "SELECT *   from tblvehicles";
}
if (isset($_POST['brand']) && !isset($_POST['fueltype'])) {
  $brand = $_POST['brand'];
  $sql = "SELECT *  from tblvehicles where VehiclesBrand=:brand";
}
if (isset($_POST['fueltype']) && !isset($_POST['brand'])) {
  $fueltype = $_POST['fueltype'];
  $sql = "SELECT *  from tblvehicles where FuelType=:fueltype";
}
$query = $dbh->prepare($sql);
if (isset($_POST['brand']))
  $query->bindParam(':brand', $brand, PDO::PARAM_STR);
if (isset($_POST['fueltype']))
  $query->bindParam(':fueltype', $fueltype, PDO::PARAM_STR);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);
$cnt = $query->rowCount();
?>
              <p><span>
                  <?php echo htmlentities($cnt); ?> Listings
                </span></p>
            </div>
          </div>
          <?php
if ($query->rowCount() > 0) {
  foreach ($results as $result) { ?>
          <div class="product-listing-m gray-bg">
            <div class="product-listing-img"><img src="<?php echo htmlentities($result->Vimage1); ?>"
                class="img-responsive" alt="Image" /> </a>
            </div>
            <div class="product-listing-content">
              <h5><a href="vehical-details.php?vhid=<?php echo htmlentities($result->id); ?>">
                  <?php echo htmlentities($result->BrandName); ?> ,
                  <?php echo htmlentities($result->VehiclesTitle); ?>
                </a></h5>
              <p class="list-price">$
                <?php echo htmlentities($result->PricePerDay); ?> Per Day
              </p>
              <ul>
                <li><i class="fa fa-user" aria-hidden="true"></i>
                  <?php echo htmlentities($result->SeatingCapacity); ?> seats
                </li>
                <li><i class="fa fa-calendar" aria-hidden="true"></i>
                  <?php echo htmlentities($result->ModelYear); ?> model
                </li>
                <li><i class="fa fa-car" aria-hidden="true"></i>
                  <?php echo htmlentities($result->FuelType); ?>
                </li>
                <li><i class="fa fa-star" aria-hidden="true"></i>
                  <?php
    $sql1 = "SELECT AVG(Rate) as AvgRate from tblreview where VehicleId= :VehicleId ;";
    $query1 = $dbh->prepare($sql1);
    $query1->bindParam(':VehicleId', $result->id, PDO::PARAM_STR);
    $query1->execute();
    $result1 = $query1->fetch(PDO::FETCH_OBJ);
    echo round($result1->AvgRate, 1);
                  ?>
                </li>

              </ul>
              <a href="vehical-details.php?vhid=<?php echo htmlentities($result->id); ?>" class="btn">View Details <span
                  class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
            </div>
          </div>
          <?php }
} ?>
        </div>


        <aside class="col-md-3 col-md-pull-9">
          <div class="sidebar_widget">
            <div class="widget_heading">
              <h5><i class="fa fa-filter" aria-hidden="true"></i> Find Your Car </h5>
            </div>
            <div class="sidebar_filter">
              <form action="search-carresult.php" method="post">
                <div class="form-group select">
                  <select class="form-control" name="brand">
                    <option value="" disabled selected>Select Brand</option>

                    <?php $sql = "SELECT * from  tblbrands ";
                  $query = $dbh->prepare($sql);
                  $query->execute();
                  $results = $query->fetchAll(PDO::FETCH_OBJ);
                  $cnt = 1;
                  if ($query->rowCount() > 0) {
                    foreach ($results as $result) { ?>
                    <option value="<?php echo htmlentities($result->id); ?>">
                      <?php echo htmlentities($result->BrandName); ?>
                    </option>
                    <?php }
                  } ?>

                  </select>
                </div>
                <div class="form-group select">
                  <select class="form-control" name="fueltype">
                    <option value="" disabled selected>Select Fuel Type</option>
                    <option value="Petrol">Petrol</option>
                    <option value="Diesel">Diesel</option>
                    <option value="CNG">CNG</option>
                  </select>
                </div>

                <div class="form-group">
                  <button type="submit" class="btn btn-block"><i class="fa fa-search" aria-hidden="true"></i> Search
                    Car</button>
                </div>
              </form>
            </div>
          </div>

          <div class="sidebar_widget">
            <div class="widget_heading">
              <h5><i class="fa fa-car" aria-hidden="true"></i> Recently Listed Cars</h5>
            </div>
            <div class="recent_addedcars">
              <ul>
                <?php

$sql = "SELECT tblvehicles.*,tblbrands.BrandName,tblbrands.id as bid  from tblvehicles join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand order by id desc limit 4";
$query = $dbh->prepare($sql);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);
$cnt = 1;
if ($query->rowCount() > 0) {
  foreach ($results as $result) { ?>

                <li class="gray-bg">
                  <div class="recent_post_img"> <a
                      href="vehical-details.php?vhid=<?php echo htmlentities($result->id); ?>"><img
                        src="<?php echo htmlentities($result->Vimage1); ?>" alt="image"></a> </div>
                  <div class="recent_post_title"> <a
                      href="vehical-details.php?vhid=<?php echo htmlentities($result->id); ?>">
                      <?php echo htmlentities($result->BrandName); ?> ,
                      <?php echo htmlentities($result->VehiclesTitle); ?>
                    </a>
                    <p class="widget_price">$
                      <?php echo htmlentities($result->PricePerDay); ?> Per Day
                    </p>
                  </div>
                </li>
                <?php }
} ?>

              </ul>
            </div>
          </div>
        </aside>

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