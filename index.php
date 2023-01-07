<?php
session_start();
include('includes/config.php');
error_reporting(0);
//Test 2
?>

<!DOCTYPE HTML>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="keywords" content="">
  <meta name="description" content="">
  <title>Vehicle Rental Portal</title>
  <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">

<link rel="stylesheet" href="assets/css/style.css" type="text/css">

<link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">

<link href="assets/css/slick.css" rel="stylesheet">

<link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">

<link href="assets/css/font-awesome.min.css" rel="stylesheet">
  <link href="assets/css/font-awesome.min.css" rel="stylesheet">
  <style>
    .img-responsive {
      display: block;
      max-width: 100%;
      height: 200px;
      margin-left: auto;
      margin-right: auto;
    }
  </style>

  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
</head>

<body>


<?php include('includes/header.php');?>

  <section id="banner" class="banner-section">
    <div class="container">
      <div class="div_zindex">
        <div class="row">
          <div class="col-md-5 col-md-push-7">
            <div class="banner_content">
              <h1>Find the right car for you.</h1>

            </div>
          </div>
        </div>
      </div>
  </section>

  <section class="section-padding gray-bg">
    <div class="container">
      <div class="section-header text-center">
        <h2>Find the Best <span>Vehicle For You</span></h2>
        <p>We offer a wide range of Sri Lanka vehicle hire facilities ranging from economy to luxury. The fleet consists
          of cars, sports utility,
          and 4WD vehicles, vans and buses. There is also a range of classic and vintage cars available for weddings,
          commercials and other special occasions.</p>
      </div>
      <div class="row">


        <div class="recent-tab">
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#resentnewcar" role="tab" data-toggle="tab">Recents</a></li>
          </ul>
        </div>


        <div class="tab-content">
          <div role="tabpanel" class="tab-pane center active" id="resentnewcar"
          style="display: flex;justify-content: space-evenly;">

            <?php $sql = "SELECT tblvehicles.VehicleProviderid,tblvehicles.VehiclesTitle,tblbrands.BrandName,tblvehicles.PricePerDay,tblvehicles.FuelType,tblvehicles.ModelYear,tblvehicles.id,tblvehicles.SeatingCapacity,tblvehicles.VehiclesOverview,tblvehicles.Vimage1 from tblvehicles join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand order by id desc limit 4";
            $query = $dbh->prepare($sql);
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_OBJ);
            $cnt = 1;
            if ($query->rowCount() > 0) {
              foreach ($results as $result) {

                $path;
                if ($result->VehicleProviderid == 0) {
                  $path = "admin/img/vehicleimages/";
                } else {
                  //C:\xampp\htdocs\Online_Vehi_Rent\Online_Vehi_Rental\provider\img\vehicleimages
                  //assets/vimg/
                  $path = "provider/";

                }

            ?>



            <div class="col-list-3">
              <div class="recent-car-list">
                <div class="car-info-box"> <a
                    href="vehical-details.php?vhid=<?php echo htmlentities($result->id); ?>"><img
                      src="<?php echo htmlentities($result->Vimage1); ?>" class="img-responsive" alt="Image" /> </a>
                  <ul>
                    <li><i class="fa fa-car" aria-hidden="true"></i>
                      <?php echo htmlentities($result->FuelType); ?>
                    </li>
                    <li><i class="fa fa-calendar" aria-hidden="true"></i>
                      <?php echo htmlentities($result->ModelYear); ?> Model
                    </li>
                    <li><i class="fa fa-user" aria-hidden="true"></i>
                      <?php echo htmlentities($result->SeatingCapacity); ?> Seats
                    </li>
                    <li>
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <?php
                $sql1 = "SELECT AVG(Rate) as AvgRate from tblreview where VehicleId= :VehicleId ;";
                $query1 = $dbh->prepare($sql1);
                $query1->bindParam(':VehicleId', $result->id, PDO::PARAM_STR);
                $query1->execute();
                $result1 = $query1->fetch(PDO::FETCH_OBJ);
                echo round($result1->AvgRate, 1);
                      ?>
                      Stars
                    </li>
                  </ul>
                </div>
                <div class="car-title-m">
                  <h6><a href="vehical-details.php?vhid=<?php echo htmlentities($result->id); ?>">
                      <?php echo htmlentities($result->BrandName); ?> ,
                      <?php echo htmlentities($result->VehiclesTitle); ?>
                    </a></h6>
                  <span class="price">Rs
                    <?php echo htmlentities($result->PricePerDay); ?>/= /Day
                  </span>
                </div>
                <div class="inventory_info_m">
                  <p>
                    <?php echo substr($result->VehiclesOverview, 0, 70); ?>
                  </p>
                </div>
              </div>
            </div>
            <?php }
            } ?>

          </div>
        </div>
      </div>
  </section>

  <section class="section-padding feedback-section parallex-bg">
    <div class="container div_zindex">
      <div class="section-header white-text text-center">
        <h2>Our Satisfied <span>Customers</span></h2>
      </div> -->
      <div class="row">
        <div id="feedback-slider">
          <?php
          $tid = 1;
          $sql = "SELECT tblfeedback.Feedback,tblusers.FullName from tblfeedback join tblusers on tblfeedback.UserEmail=tblusers.EmailId where tblfeedback.status=:tid";
          $query = $dbh->prepare($sql);
          $query->bindParam(':tid', $tid, PDO::PARAM_STR);
          $query->execute();
          $results = $query->fetchAll(PDO::FETCH_OBJ);
          $cnt = 1;
          if ($query->rowCount() > 0) {
            foreach ($results as $result) { ?>


          <div class="feedback-m">
            <div class="feedback-content">
              <div class="feedback-heading">
                <h5>
                  <?php echo htmlentities($result->FullName); ?>
                </h5>
                <p>
                  <?php echo htmlentities($result->Feedback); ?>
                </p>
              </div>
            </div>
          </div>
          <?php
            }
          } ?>
        </div>
      </div>
    </div>

    <div class="dark-overlay"></div>
  </section>




  <?php include('includes/footer.php'); ?>

  <?php include('includes/login.php'); ?>
  <?php include('includes/registration.php'); ?>
  <?php include('includes/forgotpassword.php'); ?>


  <div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>






  <script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/interface.js"></script> 
 
<script src="assets/js/bootstrap-slider.min.js"></script> 

<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/owl.carousel.min.js"></script>

</body>

</html>