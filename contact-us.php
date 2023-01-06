<?php
session_start();
//error_reporting(1);
include('includes/config.php');

if (isset($_POST['send'])) {

  $fName = $_POST['fullname'];
  $email = $_POST['email'];
  $mobile = $_POST['contactno'];
  $message = $_POST['message'];
  $status = 0;

  $sql = "INSERT INTO tblcontactusquery(Fname,EmailID,ContactNumber,Message,PostingDate,status) VALUES(:fname,:email,:mobile,:message,now(),:status)";
  $query = $dbh->prepare($sql);
  $query->bindParam(':fname', $fName, PDO::PARAM_STR);
  $query->bindParam(':email', $email, PDO::PARAM_STR);
  $query->bindParam(':mobile', $mobile, PDO::PARAM_STR);
  $query->bindParam(':message', $message, PDO::PARAM_STR);
  $query->bindParam(':status', $status, PDO::PARAM_STR);
  $query->execute();
  $lastInsertId = $dbh->lastInsertId();
  if ($lastInsertId) {
    $msg = "Vehicle posted successfully";
    header("Refresh: 2; URL=" . $_SERVER['HTTP_REFERER']);
  } else {
    $error = "Something went wrong. Please try again";
    header("Refresh: 2; URL=" . $_SERVER['HTTP_REFERER']);
  }

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
  <title>contact_us</title>

  <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">

  <link rel="stylesheet" href="assets/css/style.css" type="text/css">

  <link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
  <link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">

  <link href="assets/css/slick.css" rel="stylesheet">

  <link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">

  <link href="assets/css/font-awesome.min.css" rel="stylesheet">


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

    .contact {
      width: 50%;
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
    function checkvalidity() {
      $("#loaderIcon").show();
      jQuery.ajax({
        url: "check_email_validity.php",
        data: 'emailaddress=' + $("#emailaddress").val(),
        type: "POST",
        success: function (data) {
          $("#email-validity-status").html(data);
          $("#loaderIcon").hide();
        },
        error: function () { }
      });
    }
    </script>
  </style >
</head >

      <body>



        <?php include('includes/header.php'); ?>

        <section class="page-header contactus_page">
          <div class="container">
            <div class="page-header_wrap">
              <div class="page-heading">
                <h1>Contact Us</h1>
              </div>
              <ul class="coustom-breadcrumb">
                <li><a href="#">Home</a></li>
                <li>Contact Us</li>
              </ul>
            </div>
          </div>

          <div class="dark-overlay"></div>
        </section>

        <section class="contact_us section-padding">
          <div class="container">
            <div class="row">
              <div class="col-md-6 contact">
                <?php if (isset($error)) { ?>
                  <div class="errorWrap"><strong>ERROR</strong>:
                    <?php echo htmlentities($error);
            header("Refresh: 2; URL=" . $_SERVER['HTTP_REFERER']); ?>
                  </div>
                  <?php } else if (isset($msg)) { ?>
                    <div class="succWrap"><strong>SUCCESS</strong>:
                      <?php echo htmlentities($msg);
            header("Refresh: 2; URL=" . $_SERVER['HTTP_REFERER']); ?>
                    </div>
                    <?php } ?>
                <h3>Get in touch using the form below</h3>

                <div class="contact_form gray-bg">
                  <form method="post" name="contactUs" action="">
                    <div class="form-group">
                      <label class="control-label">Full Name <span>*</span></label>
                      <input type="text" name="fullname" class="form-control white_bg" id="fullname" required>
                    </div>
                    <div class="form-group">
                      <label class="control-label">Email Address <span>*</span></label>
                      <input type="email" name="email" class="form-control white_bg" id="emailaddress" onBlur="checkvalidity()" required>
                      <span id="email-validity-status" style="font-size:12px;"></span>
                    </div>
                    <div class="form-group">
                      <label class="control-label">Phone Number <span>*</span></label>
                      <input type="text" name="contactno" class="form-control white_bg" id="phonenumber" maxlength="10" required>
                    </div>
                    <div class="form-group">
                      <label class="control-label">Message <span>*</span></label>
                      <textarea class="form-control white_bg" name="message" rows="4" required></textarea>
                    </div>
                    <div class="form-group">
                      <button class="btn" type="submit" name="send" type="submit">Send Message <span class="angle_arrow"><i
                        class="fa fa-angle-right" aria-hidden="true"></i></span></button>
                    </div>
                  </form>
                </div>
              </div>
              <div class="col-md-6 contact">
                <h3>Contact Info</h3>
                <div class="contact_detail">

                  <ul>
                    <li>
                      <div class="icon_wrap"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                      <div class="contact_info_m">High Level Raod, Nugegoda</div>
                    </li>
                    <li>
                      <div class="icon_wrap"><i class="fa fa-phone" aria-hidden="true"></i></div>
                      <div class="contact_info_m"><a href="tel:+94112456456">+94112456456</a></div>
                    </li>
                    <li>
                      <div class="icon_wrap"><i class="fa fa-envelope-o" aria-hidden="true"></i></div>
                      <div class="contact_info_m"><a href="mailto:info@carrent.com">info@carrent.com</a></div>
                    </li>
                  </ul>

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