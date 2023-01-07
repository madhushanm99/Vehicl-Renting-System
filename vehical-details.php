<?php
session_start();
include('includes/config.php');
error_reporting(1);
if (isset($_POST['submitBook'])) {

  $vhid = intval($_GET['vhid']);
  $sql = "SELECT tblvehicles.status  from tblvehicles  where tblvehicles.id=:vhid";
  $query = $dbh->prepare($sql);
  $query->bindParam(':vhid', $vhid, PDO::PARAM_STR);
  $query->execute();
  $results = $query->fetch(PDO::FETCH_OBJ);



  if($results->status == 0){
    header("Refresh: 2; URL=" . $_SERVER['HTTP_REFERER']);
    die("Invalid request!");
    
  }

  

  $fromdate = $_POST['fromdate'];
  $todate = $_POST['todate'];
  $message1 = $_POST['bookingMessage'];
  $useremail = $_SESSION['login'];

  // if(check_date_range($fromdate,)){
  //   header("Refresh: 2; URL=" . $_SERVER['HTTP_REFERER']);
  //   die("Invalid request!");
    
  // }

  $status = 0;
  $vhid = $_GET['vhid'];
  $price = $_SESSION['price'];
  $sql = "INSERT INTO  tblbooking(userEmail,VehicleId,Price,FromDate,ToDate,message,Status) VALUES(:useremail,:vhid,:price,:fromdate,:todate,:message,:status)";
  $query = $dbh->prepare($sql);
  $query->bindParam(':useremail', $useremail, PDO::PARAM_STR);
  $query->bindParam(':vhid', $vhid, PDO::PARAM_STR);
  $query->bindParam(':price', $price,PDO::PARAM_STR);
  $query->bindParam(':fromdate', $fromdate, PDO::PARAM_STR);
  $query->bindParam(':todate', $todate, PDO::PARAM_STR);
  $query->bindParam(':message', $message1, PDO::PARAM_STR);
  $query->bindParam(':status', $status, PDO::PARAM_STR);
  $query->execute();
  $lastInsertId = $dbh->lastInsertId();
  if ($lastInsertId) {
    echo "<script>alert('Booking successfull.');</script>";
  } else {
    echo "<script>alert('Something went wrong. Please try again');</script>";
  }
  header("Refresh: 2; URL=" . $_SERVER['HTTP_REFERER']);

}

if (isset($_POST['submitMsg'])) {
  $message2 = $_POST['message'];
  $useremail = $_SESSION['login'];
  $status = 0;
  $vhid = $_GET['vhid'];
  $sql = "INSERT INTO   tblcontactowner(emailId,message,VehicleId,postingDate,Status) VALUES(:useremail,:message,:vhid,now(),:status)";
  $query = $dbh->prepare($sql);
  $query->bindParam(':useremail', $useremail, PDO::PARAM_STR);
  $query->bindParam(':vhid', $vhid, PDO::PARAM_STR);
  $query->bindParam(':message', $message2, PDO::PARAM_STR);
  $query->bindParam(':status', $status, PDO::PARAM_STR);
  $query->execute();
  $lastInsertId = $dbh->lastInsertId();
  if ($lastInsertId) {
    echo "<script>alert('Message Send successfully.');</script>";
  } else {
    echo "<script>alert('Something went wrong. Please try again');</script>";
  }
  header("Refresh: 2; URL=" . $_SERVER['HTTP_REFERER']);

}

?>


<!DOCTYPE HTML>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="keywords" content="">
  <meta name="description" content="">
  <title>Car Rental Port | Vehicle Details</title>
  <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
  <link rel="stylesheet" href="assets/css/style.css" type="text/css">
  <link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
  <link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
  <link href="assets/css/slick.css" rel="stylesheet">
  <link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
  <link href="assets/css/font-awesome.min.css" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">



  <style>
    .img-responsive {
      display: block;
      max-width: 100%;
      height: 200px;
      margin-left: auto;
      margin-right: auto;
    }
  </style>
  <!-- <script>
    
      var form = document.getElementById("book");
      var elements = form.elements;
      for (var i = 0, len = elements.length; i < len; ++i) {
        elements[i].readOnly = true;
      }
    

  </script> -->
</head>

<body>



  <?php include('includes/header.php'); ?>


  <?php
  $VehicleProviderid;
  $vhid = intval($_GET['vhid']);
  $sql = "SELECT tblvehicles.*,tblbrands.BrandName,tblbrands.id as bid  from tblvehicles join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand where tblvehicles.id=:vhid";
  $query = $dbh->prepare($sql);
  $query->bindParam(':vhid', $vhid, PDO::PARAM_STR);
  $query->execute();
  $results = $query->fetchAll(PDO::FETCH_OBJ);
  $cnt = 1;

  if ($query->rowCount() > 0) {
    foreach ($results as $result) {

      $_SESSION['brndid'] = $result->bid;
      ?>

      <section id="listing_img_slider">
        <div><img src="<?php echo htmlentities($result->Vimage1); ?>" class="img-responsive" alt="image1" width="900"
            height="560"></div>
        <div><img src="<?php echo htmlentities($result->Vimage2); ?>" class="img-responsive" alt="image2" width="900"
            height="560"></div>
        <div><img src="<?php echo htmlentities($result->Vimage3); ?>" class="img-responsive" alt="image3" width="900"
            height="560"></div>
        <div><img src="<?php echo htmlentities($result->Vimage4); ?>" class="img-responsive" alt="image4" width="900"
            height="560"></div>
        <?php if ($result->Vimage5 == "") {

        } else {
          ?>
          <div><img src="<?php echo htmlentities($result->Vimage5); ?>" class="img-responsive" alt="image5" width="900"
              height="560"></div>
        <?php }
        ?>
      </section>
      <?php
      $VehicleProviderid = $result->VehicleProviderid;
      ?>
      <section class="listing-detail">
        <div class="container">
          <div class="listing_detail_head row">
            <div class="col-md-9">
              <h2>
                <?php echo htmlentities($result->BrandName); ?> ,
                <?php echo htmlentities($result->VehiclesTitle); ?>
              </h2>
            </div>
            <div class="col-md-3">
              <div class="price_info">
                <p>Rs
                  <?php echo htmlentities($result->PricePerDay); ?>
                  <?php $_SESSION['price'] = ($result->PricePerDay); ?>
                </p>Per Day

              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-9">
              <div class="main_features">
                <ul>

                  <li> <i class="fa fa-calendar" aria-hidden="true"></i>
                    <h5>
                      <?php echo htmlentities($result->ModelYear); ?>
                    </h5>
                    <p>Reg.Year</p>
                  </li>
                  <li> <i class="fa fa-cogs" aria-hidden="true"></i>
                    <h5>
                      <?php echo htmlentities($result->FuelType); ?>
                    </h5>
                    <p>Fuel Type</p>
                  </li>

                  <li> <i class="fa fa-user-plus" aria-hidden="true"></i>
                    <h5>
                      <?php echo htmlentities($result->SeatingCapacity); ?>
                    </h5>
                    <p>Seats</p>
                  </li>

                  <li> <i class="fa fa-star" aria-hidden="true"></i>
                    <h5>
                      <?php
                      $sql1 = "SELECT AVG(Rate) as AvgRate from tblreview where VehicleId= :VehicleId ;";
                      $query1 = $dbh->prepare($sql1);
                      $query1->bindParam(':VehicleId', $vhid, PDO::PARAM_STR);
                      $query1->execute();
                      $result1 = $query1->fetch(PDO::FETCH_OBJ);
                      echo round($result1->AvgRate, 1);

                      ?>
                    </h5>
                    <p>Ratings</p>
                  </li>
                  <li>
                    <?php $avl = $result->status;
                    if ($avl == 1) { ?>
                      <i class="fa fa-thumbs-o-up " aria-hidden="true"></i>
                      <h5>
                        Available
                      </h5>
                      <?php
                    } elseif ($avl == 0) { ?>
                      <i class="fa fa-frown-o " aria-hidden="true"></i>
                      <h5>
                        Not-Available
                      </h5>
                      <?php
                    } ?>


                    <p>Availability</p>
                  </li>
                </ul>
              </div>
              <div class="listing_more_info">
                <div class="listing_detail_wrap">

                  <ul class="nav nav-tabs gray-bg" role="tablist">
                    <li role="presentation" class="active"><a href="#vehicle-overview " aria-controls="vehicle-overview"
                        role="tab" data-toggle="tab">Vehicle Overview </a></li>

                    <li role="presentation"><a href="#accessories" aria-controls="accessories" role="tab"
                        data-toggle="tab">Accessories</a></li>
                    <li role="presentation"><a href="#review" aria-controls="review" role="tab" data-toggle="tab">Review</a>
                    </li>
                    <li role="presentation"><a href="#contatOwner" aria-controls="contatOwner" role="tab"
                        data-toggle="tab">Contat the Owner</a></li>
                  </ul>


                  <div class="tab-content">

                    <div role="tabpanel" class="tab-pane active" id="vehicle-overview">

                      <p>
                        <?php echo htmlentities($result->VehiclesOverview); ?>
                      </p>
                    </div>



                    <div role="tabpanel" class="tab-pane" id="accessories">

                      <table>
                        <thead>
                          <tr>
                            <th colspan="2">Accessories</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>Air Conditioner</td>
                            <?php if ($result->AirConditioner == 1) {
                              ?>
                              <td><i class="fa fa-check" aria-hidden="true"></i></td>
                            <?php } else { ?>
                              <td><i class="fa fa-close" aria-hidden="true"></i></td>
                            <?php } ?>
                          </tr>

                          <tr>
                            <td>AntiLock Braking System</td>
                            <?php if ($result->AntiLockBrakingSystem == 1) {
                              ?>
                              <td><i class="fa fa-check" aria-hidden="true"></i></td>
                            <?php } else { ?>
                              <td><i class="fa fa-close" aria-hidden="true"></i></td>
                            <?php } ?>
                          </tr>

                          <tr>
                            <td>Power Steering</td>
                            <?php if ($result->PowerSteering == 1) {
                              ?>
                              <td><i class="fa fa-check" aria-hidden="true"></i></td>
                            <?php } else { ?>
                              <td><i class="fa fa-close" aria-hidden="true"></i></td>
                            <?php } ?>
                          </tr>


                          <tr>

                            <td>Power Windows</td>

                            <?php if ($result->PowerWindows == 1) {
                              ?>
                              <td><i class="fa fa-check" aria-hidden="true"></i></td>
                            <?php } else { ?>
                              <td><i class="fa fa-close" aria-hidden="true"></i></td>
                            <?php } ?>
                          </tr>

                          <tr>
                            <td>CD Player</td>
                            <?php if ($result->CDPlayer == 1) {
                              ?>
                              <td><i class="fa fa-check" aria-hidden="true"></i></td>
                            <?php } else { ?>
                              <td><i class="fa fa-close" aria-hidden="true"></i></td>
                            <?php } ?>
                          </tr>

                          <tr>
                            <td>Leather Seats</td>
                            <?php if ($result->LeatherSeats == 1) {
                              ?>
                              <td><i class="fa fa-check" aria-hidden="true"></i></td>
                            <?php } else { ?>
                              <td><i class="fa fa-close" aria-hidden="true"></i></td>
                            <?php } ?>
                          </tr>

                          <tr>
                            <td>Central Locking</td>
                            <?php if ($result->CentralLocking == 1) {
                              ?>
                              <td><i class="fa fa-check" aria-hidden="true"></i></td>
                            <?php } else { ?>
                              <td><i class="fa fa-close" aria-hidden="true"></i></td>
                            <?php } ?>
                          </tr>

                          <tr>
                            <td>Power Door Locks</td>
                            <?php if ($result->PowerDoorLocks == 1) {
                              ?>
                              <td><i class="fa fa-check" aria-hidden="true"></i></td>
                            <?php } else { ?>
                              <td><i class="fa fa-close" aria-hidden="true"></i></td>
                            <?php } ?>
                          </tr>
                          <tr>
                            <td>Brake Assist</td>
                            <?php if ($result->BrakeAssist == 1) {
                              ?>
                              <td><i class="fa fa-check" aria-hidden="true"></i></td>
                            <?php } else { ?>
                              <td><i class="fa fa-close" aria-hidden="true"></i></td>
                            <?php } ?>
                          </tr>

                          <tr>
                            <td>Driver Airbag</td>
                            <?php if ($result->DriverAirbag == 1) {
                              ?>
                              <td><i class="fa fa-check" aria-hidden="true"></i></td>
                            <?php } else { ?>
                              <td><i class="fa fa-close" aria-hidden="true"></i></td>
                            <?php } ?>
                          </tr>

                          <tr>
                            <td>Passenger Airbag</td>
                            <?php if ($result->PassengerAirbag == 1) {
                              ?>
                              <td><i class="fa fa-check" aria-hidden="true"></i></td>
                            <?php } else { ?>
                              <td><i class="fa fa-close" aria-hidden="true"></i></td>
                            <?php } ?>
                          </tr>

                          <tr>
                            <td>Crash Sensor</td>
                            <?php if ($result->CrashSensor == 1) {
                              ?>
                              <td><i class="fa fa-check" aria-hidden="true"></i></td>
                            <?php } else { ?>
                              <td><i class="fa fa-close" aria-hidden="true"></i></td>
                            <?php } ?>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <div role="tabpanel" class="tab-pane review-form " id="review">


                      <!-- Review form (START) -->
                      <?php
                      //$vhid ;
                      //$_SESSION['login'];
                  

                      ?>
                      <style>
                        .input-rating {
                          float: left;
                        }

                        .stars {
                          margin: 0 5px 10px 0;
                        }

                        .stars lable {
                          margin: 0 5px 10px 0;
                        }

                        .review-form .input-rating .stars input[type="radio"] {
                          display: none;
                        }

                        .review-form .input-rating .stars>label {
                          float: right;
                          cursor: pointer;
                          padding: 0px 3px;
                          margin: 0px;
                        }

                        .review-form .input-rating .stars>label:before {
                          content: "\f006";
                          font-family: FontAwesome;
                          color: #E4E7ED;
                          -webkit-transition: 0.2s all;
                          transition: 0.2s all;
                        }

                        .review-form .input-rating .stars>label:hover:before,
                        .review-form .input-rating .stars>label:hover~label:before {
                          color: #D10024;
                        }

                        .review-form .input-rating .stars>input:checked label:before,
                        .review-form .input-rating .stars>input:checked~label:before {
                          content: "\f005";
                          color: #D10024;
                        }
                      </style>
                      <?php
                      if (isset($_POST['submitReview'])) {

                        if (isset($_SESSION['login'])) {


                          $sql = "SELECT id from tblbooking where userEmail = :userEmail  and VehicleId= :VehicleId ;";
                          $query = $dbh->prepare($sql);
                          $query->bindParam(':userEmail', $_SESSION['login'], PDO::PARAM_STR);
                          $query->bindParam(':VehicleId', $_POST['vhid'], PDO::PARAM_STR);
                          $query->execute();


                          if ($query->rowCount() > 0) {

                            // INSERT INTO `tblreview` ( `UserEmail`, `VehicleId`, `Feedback`, `PostingDate`) VALUES ( 'Test', 1, 'Test', current_timestamp())
                            $sql2 = "INSERT INTO  tblreview(UserEmail,VehicleId,Rate,Feedback,PostingDate) VALUES(:UserEmail,:VehicleId,:Rate,:Feedback,now())";
                            //$sql2="INSERT INTO  tblreview(UserEmail,VehicleId,Feedback,PostingDate) VALUES('Test', 1, 'Test', now())";
                            $query2 = $dbh->prepare($sql2);


                            $query2->bindParam(':UserEmail', $_SESSION['login'], PDO::PARAM_STR);
                            $query2->bindParam(':VehicleId', $_POST['vhid'], PDO::PARAM_STR);
                            $query2->bindParam(':Feedback', $_POST['reviewMessage'], PDO::PARAM_STR);
                            $query2->bindParam(':Rate', $_POST['rating'], PDO::PARAM_STR);

                            $query2->execute();

                            //error_show('  Success message', 0);
                            echo "<script>alert('Review Added Successfully.');</script>";

                          } else {
                            //error_show('  You Need to Book this Vehcile Before Reviewing', 1);
                            echo "<script>alert('You Need to Book this Vehcile Before Reviewing.');</script>";

                          }
                        } else {
                          //error_show('  You Need to Logig Before Reviewing!', 1);
                          echo "<script>alert('You Need to Logig Before Reviewing!.');</script>";

                        }
                        header("Refresh: 2; URL=" . $_SERVER['HTTP_REFERER']);
                      }

                      ?>

                      <form name="reviewForm" method="POST" action="">
                        <input type="hidden" name="vhid" value="<?php echo $_GET['vhid'] ?>">
                        <div class="form-group">
                          <div class="input-rating">
                            <div class="stars">
                              <lable for="rating" class="left">Your Rating: </lable>
                              <input id="star5" name="rating" value="5" type="radio"><label for="star5"></label>
                              <input id="star4" name="rating" value="4" type="radio"><label for="star4"></label>
                              <input id="star3" name="rating" value="3" type="radio"><label for="star3"></label>
                              <input id="star2" name="rating" value="2" type="radio"><label for="star2"></label>
                              <input id="star1" name="rating" value="1" type="radio"><label for="star1"></label>
                            </div>
                          </div>

                          <textarea rows="4" class="form-control p-3 " name="reviewMessage" placeholder="Your Message"
                            required></textarea>
                        </div>
                        <div class="form-group center">
                          <?php if ($_SESSION['login']) { ?>

                            <input type="submit" class="btn p-3" name="submitReview" value="Review">
                            <input type="reset" class="btn p-3" name="submitReview" value="Clear">

                          <?php } else { ?>
                            <a href="#loginform" class="btn btn-xs uppercase" data-toggle="modal" data-dismiss="modal">Login
                              Before ReView</a>
                          <?php } ?>
                        </div>
                      </form>

                      <!-- Review form (FINISH) -->


                      <div>
                        <div id="reviews">
                          <ul class="reviews" style="list-style-type:none;">
                            <?php

                            $sql = "SELECT R.id,U.FullName,R.VehicleId,R.Rate,R.Feedback,R.PostingDate from tblreview R left join tblusers U on (R.UserEmail = U.EmailId) where R.VehicleId= :VehicleId and R.`status`=0 ORDER BY R.PostingDate desc LIMIT 5";
                            $query = $dbh->prepare($sql);
                            $query->bindParam(':VehicleId', $vhid, PDO::PARAM_STR);
                            $query->execute();
                            $results = $query->fetchALL(PDO::FETCH_OBJ);

                            foreach ($results as $result) {

                              ?>
                              <li>
                                <div class="row">
                                  <div class="col-md-4">
                                    <div class="review-heading">
                                      <P class="font-weight-bold">
                                        <?php echo htmlentities($result->FullName); ?>
                                      </p>
                                      <p class="date">
                                        <?php echo date_format(date_create($result->PostingDate), "d M Y h:m A"); ?>
                                      </p>
                                      <div class="review-rating">

                                        <?php
                                        for ($i = $result->Rate; $i > 0; $i--) {
                                          echo '<i class="fa fa-star"></i>';
                                        }
                                        for ($i = 5 - $result->Rate; $i > 0; $i--) {
                                          echo '<i class="fa fa-star-o empty"></i>';
                                        }
                                        ?>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="review-body">
                                    <p class="text-justify">
                                      <?php echo htmlentities($result->Feedback); ?>
                                    </p>
                                  </div>
                                </div>
                              </li>
                            <?php } ?>

                          </ul>

                        </div>
                      </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="contatOwner">
                      <div class="row">
                        <div class="col-md-3">
                          <?php

                          $VehicleProviderid;
                          if ($VehicleProviderid == 0) {
                            echo "Car Rental Company";
                            echo "info@carrent.com</br>";
                            echo "+94112456456</br>";
                            echo "Nugegoda";
                          } else {
                            $sql7 = "SELECT FullName,EmailID,ContactNo,City FROM tblusers WHERE id=:VehicleProviderid";
                            $query7 = $dbh->prepare($sql7);
                            $query7->bindParam(':VehicleProviderid', $VehicleProviderid, PDO::PARAM_STR);
                            $query7->execute();
                            $result7 = $query7->fetch(PDO::FETCH_OBJ);
                            echo ($result7->FullName);
                            echo ("</br>");
                            echo ($result7->EmailID);
                            echo ("</br>");
                            echo ($result7->ContactNo);
                            echo ("</br>");
                            echo ($result7->City);
                          } ?>
                        </div>
                        <div class="col-md-6">
                          <form id="msgbox" method="post">
                            <div class="form-group">
                              <textarea rows="4" class="form-control" name="message" placeholder="Message"
                                required></textarea>
                            </div>
                            <?php if ($_SESSION['login']) { ?>
                              <div class="form-group ">
                                <input type="submit" class="btn" name="submitMsg" value="Send">
                              </div>
                            <?php } else { ?>
                              <a href="#loginform" class="btn btn-xs uppercase" data-toggle="modal" data-dismiss="modal">Login
                                Before
                                Sent</a>

                            <?php } ?>
                          </form>
                        </div>
                      </div>


                    </div>

                  </div>

                </div>

              </div>
            <?php }
  } ?>


        </div>

        <!--Side-Bar-->
        <script>
          // function validateDate() {
          //   var dateOK = false;
          //   var today = new Date();
          //   var fromdate = new Date(document.getElementById("fromdate").value).getTime();
          //   var todate = new Date(document.getElementById("fromdate").value).getTime();

          //   if (fromdate < today || todate < today)
          //     alert('Cannot select a date in the past.');
          //   else if (fromdate > 2020 || todate > 2020)
          //     alert('Cannot select dates beyond 2020.');
          //   else if (fromdate > todate) {
          //     alert('Checkout date is greater than Checkin date.');
          //     dateOK = true;
          //   }
          // }
          // window.onload = function () {
          // var x = 1+1;
          // var bt = document.getElementById('btSubmit');
          // if (x==2) {
          //   bt.disabled = false;
          // }
          // else {
          //   bt.disabled = true;
          // }}
        </script>
        <aside class="col-md-3">

          <div class="sidebar_widget">
            <div class="widget_heading">
              <h5><i class="fa fa-envelope" aria-hidden="true"></i>Book Now</h5>
            </div>
            <form id="book" method="post">
              <input type="hidden" name="vhid" valuse="<?php echo $_GET['vhid']; ?>">
              <input type="hidden" name="price" valuse="<?php echo $_SESSION['price']; ?>">
              <div class="form-group">
                <input type="date" class="form-control" id="fromdate" name="fromdate"
                  placeholder="From Date(dd/mm/yyyy)" required>
              </div>
              <div class="form-group">
                <input type="date" class="form-control" id="todate" name="todate" placeholder="To Date(dd/mm/yyyy)"
                  required>
              </div>
              <div class="form-group">
                <textarea rows="4" class="form-control" name="bookingMessage" placeholder="Message"
                  onclick="validateDate()" required></textarea>
              </div>
              <?php if (isset($_SESSION['login'])) { ?>
                <div class="form-group">
                  <?php
                  if ($avl == 1) { ?>
                    <input type="submit" class="btn" id="btSubmit" name="submitBook" value="Book Now">
                    <?php
                  } elseif ($avl == 0) { ?>
                    <input type="reset" disabled class="btn" id="btSubmit" name="submitBook" value="Book Now">

                    <?php
                  } ?>

                </div>
              <?php } else { ?>
                <a href="#loginform" class="btn btn-xs uppercase" data-toggle="modal" data-dismiss="modal">Login For
                  Book</a>

              <?php } ?>

            </form>
          </div>
        </aside>

      </div>

      <div class="space-20"></div>
      <div class="divider"></div>




    </div>
  </section>
  <section class="related-vehicle">
    <div class="container">
      <div class="row">


        <div class="recent-tab">
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#resentnewcar" role="tab" data-toggle="tab">Related</a></li>
          </ul>
        </div>


        <div class="tab-content">
          <div role="tabpanel" class="tab-pane active" id="resentnewcar">

            <?php $sql = "SELECT tblvehicles.VehicleProviderid,tblvehicles.VehiclesTitle,tblbrands.BrandName,tblvehicles.PricePerDay,tblvehicles.FuelType,tblvehicles.ModelYear,tblvehicles.id,tblvehicles.SeatingCapacity,tblvehicles.VehiclesOverview,tblvehicles.Vimage1 from tblvehicles join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand WHERE tblvehicles.VehicleProviderid = :VehicleProviderid AND tblvehicles.id != :VehicleId order by id desc limit 6";
            $query = $dbh->prepare($sql);
            $query->bindParam(':VehicleProviderid', $VehicleProviderid, PDO::PARAM_STR);
            $query->bindParam(':VehicleId', $vhid, PDO::PARAM_STR);
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




  <?php include('includes/footer.php'); ?>

  <div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>

  <?php include('includes/login.php'); ?>

  <?php include('includes/registration.php'); ?>


  <?php include('includes/forgotpassword.php'); ?>

  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/interface.js"></script>
  <script src="assets/switcher/js/switcher.js"></script>
  <script src="assets/js/bootstrap-slider.min.js"></script>
  <script src="assets/js/slick.min.js"></script>
  <script src="assets/js/owl.carousel.min.js"></script>

</body>

</html>