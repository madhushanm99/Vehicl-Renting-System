<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['login']) == 0) {
  header('location:index.php');
} else {
  if (isset($_POST['updateprofile'])) {
    $name = $_POST['fullname'];
    $mobileno = $_POST['mobilenumber'];
    $dob = $_POST['dob'];
    $adress = $_POST['address'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $email = $_SESSION['login'];
    $sql = "update tblusers set FullName=:name,ContactNo=:mobileno,dob=:dob,Address=:adress,City=:city,Country=:country where EmailId=:email";
    $query = $dbh->prepare($sql);
    $query->bindParam(':name', $name, PDO::PARAM_STR);
    $query->bindParam(':mobileno', $mobileno, PDO::PARAM_STR);
    $query->bindParam(':dob', $dob, PDO::PARAM_STR);
    $query->bindParam(':adress', $adress, PDO::PARAM_STR);
    $query->bindParam(':city', $city, PDO::PARAM_STR);
    $query->bindParam(':country', $country, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->execute();
    $msg = "Profile Updated Successfully";
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
  <title>Car Rental Portal | My Profile</title>

  <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">

  <link rel="stylesheet" href="assets/css/style.css" type="text/css">

  <link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
  <link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">

  <link href="assets/css/slick.css" rel="stylesheet">

  <link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">

  <link href="assets/css/font-awesome.min.css" rel="stylesheet">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script
    src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>


  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
  <style>
    .errorWrap {
      padding: 10px;
      margin: 0 0 20px 0;
      background: #fff;
      border-left: 4px solid #dd3d36;
      -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
      box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
    }

    .succWrap {
      padding: 10px;
      margin: 0 0 20px 0;
      background: #fff;
      border-left: 4px solid #5cb85c;
      -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
      box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
    }
  </style>
  <script>
    // Data Picker Initialization
    $('.datepicker').datepicker({
      inline: true
    });
  </script>
</head>

<body>




  <?php include('includes/header.php'); ?>

  <section class="page-header profile_page">
    <div class="container">
      <div class="page-header_wrap">
        <div class="page-heading">
          <h1>Your Profile</h1>
        </div>
        <ul class="coustom-breadcrumb">
          <li><a href="#">Home</a></li>
          <li>Profile</li>
        </ul>
      </div>
    </div>

    <div class="dark-overlay"></div>
  </section>



  <?php

  $useremail = $_SESSION['login'];
  $sql = "SELECT * from tblusers where EmailId=:useremail";
  $query = $dbh->prepare($sql);
  $query->bindParam(':useremail', $useremail, PDO::PARAM_STR);
  $query->execute();
  $results = $query->fetchAll(PDO::FETCH_OBJ);
  $cnt = 1;
  if ($query->rowCount() > 0) {
    foreach ($results as $result) { ?>
  <section class="user_profile inner_pages">
    <div class="container">
      <div class="user_profile_info gray-bg padding_4x4_40">
        <div class="upload_user_logo"> <img src="assets/images/dealer-logo.jpg" alt="image">
        </div>

        <div class="dealer_info">
          <h5>
            <?php echo htmlentities($result->FullName); ?>
          </h5>
          <p>
            <?php echo htmlentities($result->Address); ?><br>
            <?php echo htmlentities($result->City); ?>&nbsp;
            <?php echo htmlentities($result->Country); ?>
          </p>
        </div>
      </div>

      <div class="row">
        <div class="col-md-3 col-sm-3">
          <?php include('includes/sidebar.php'); ?>
          <div class="col-md-6 col-sm-8">
            <div class="profile_wrap">
              <h5 class="uppercase underline">Genral Settings</h5>
              <?php
      if ($msg) { ?>
              <div class="succWrap"><strong>SUCCESS</strong>:
                <?php echo htmlentities($msg); ?>
              </div>
              <?php } ?>
              <form method="post">
                <div class="form-group">
                  <label class="control-label">Reg Date -</label>
                  <?php echo htmlentities($result->RegDate); ?>
                </div>
                <?php if ($result->UpdationDate != "") { ?>
                <div class="form-group">
                  <label class="control-label">Last Update at -</label>
                  <?php echo htmlentities($result->UpdationDate); ?>
                </div>
                <?php } ?>
                <div class="form-group">
                  <label class="control-label">Full Name</label>
                  <input class="form-control white_bg" name="fullname"
                    value="<?php echo htmlentities($result->FullName); ?>" id="fullname" type="text" required>
                </div>
                <div class="form-group">
                  <label class="control-label">Email Address</label>
                  <input class="form-control white_bg" value="<?php echo htmlentities($result->EmailId); ?>"
                    name="emailid" id="email" type="email" required readonly>
                </div>
                <div class="form-group">
                  <label class="control-label">Phone Number</label>
                  <input class="form-control white_bg" name="mobilenumber"
                    value="<?php echo htmlentities($result->ContactNo); ?>" id="phone-number" type="text" maxlength="10"
                    required>
                </div>
                <!-- <div class="form-group">
                  <div class='input-group date' id='datetimepicker1'>
                    <input type='text' class="form-control" />
                    <span class="input-group-addon">
                      <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                  </div>
                </div>
                <script type="text/javascript">
                  $(function () {
                    $('#datetimepicker1').datetimepicker();
                  });
                  value=" 2000-01-01<?php //echo htmlentities($result->dob); ?>"
                </script> -->
                  
                <div class="form-group">
                  <label class="control-label">Date of Birth&nbsp;(dd/mm/yyyy)</label>
                  <input class="form-control white_bg" name="dob" value="<?php echo htmlentities($result->dob); ?>"
                     id="birth-date" type="date" min="1930-01-01" max="<?php echo date_create()->format("Y-m-d"); ?>">  
                </div>
                <div class="form-group">
                  <label class="control-label">Your Address</label>
                  <textarea class="form-control white_bg" name="address"
                    rows="4"><?php echo htmlentities($result->Address); ?></textarea>
                </div>
                <div class="form-group">
                  <label class="control-label">City</label>
                  <input class="form-control white_bg" id="city" name="city"
                    value="<?php echo htmlentities($result->City); ?>" type="text">
                </div>
                <div class="form-group">
                  <label class="control-label">Country</label>
                  <input class="form-control white_bg" id="country" name="country"
                    value="<?php echo htmlentities($result->Country); ?>" type="text">
                </div>
                <?php }
  } ?>

                <div class="form-group">
                  <button type="submit" name="updateprofile" class="btn">Save Changes <span class="angle_arrow"><i
                        class="fa fa-angle-right" aria-hidden="true"></i></span></button>
                </div>
              </form>
            </div>
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


  <script src="assets/js/bootstrap-slider.min.js"></script>

  <script src="assets/js/slick.min.js"></script>
  <script src="assets/js/owl.carousel.min.js"></script>

</body>

</html>
<?php } ?>