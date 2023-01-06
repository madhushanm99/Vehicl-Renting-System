
<header>
  <div class="default-header">
    <div class="container">
      <div class="row">
        <div class="col-sm-3 col-md-2">
          <div class="logo"> <a href="index.php"><img src="assets/images/logo.jpg" alt="image"/></a> </div>
        </div>
        <div class="col-sm-9 col-md-10">
          <div class="header_info">
            <div class="header_widgets">
              <div class="circle_icon"> <i class="fa fa-envelope" aria-hidden="true"></i> </div>
              <p class="uppercase_text">For All Inquires: </p>
              <a href="mailto:info@example.com">info@carrent.com</a> </div>
            <div class="header_widgets">
              <div class="circle_icon"> <i class="fa fa-phone" aria-hidden="true"></i> </div>
              <p class="uppercase_text">Hotline: </p>
              <a href="tel:61-1234-5678-09">+94112456456</a> </div>
            <div class="social-follow">
              
            </div>
   <?php   if(!isset($_SESSION['login']))
	{	
?>
 <div class="login_btn"> <a href="#loginform" class="btn btn-xs uppercase" data-toggle="modal" data-dismiss="modal">Login / Register</a> </div>
<?php }
else{ 

//echo "<h6>Welcome To Car rental portal</h6>";
 } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  
  <nav id="navigation_bar" class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <button id="menu_slide" data-target="#navigation" aria-expanded="false" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      </div>
      <div class="header_wrap">
        <div class="user_login">  <?php if(isset($_SESSION['login'])){?>
          <ul>
            <li class="dropdown"> <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle" aria-hidden="true"></i> 
<?php 
$email=$_SESSION['login'];
$sql ="SELECT FullName,UserType,id FROM tblusers WHERE EmailId=:email ";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
	{

	 echo htmlentities($result->FullName);
    $_SESSION['pid']=$result->id;

    //echo "<script>alert('$result->UserType');</script>";
    if($result->UserType == 1){
      //echo "<script type='text/javascript'> document.location = 'provider/dashboard.php'; </script>";
    }
   

   }}?><i class="fa fa-angle-down" aria-hidden="true"></i></a>
              <ul class="dropdown-menu">

            <li><a href="profile.php">Profile Settings</a></li>
            <!-- <?php if($result->UserType  == 1){
                //$_SESSION['plogin'] = $_SESSION['login']
                ?>
                    <li><a href="provider/">Dashbord</a></li>
                <?php
              } ?> -->
              <li><a href="update-password.php">Update Password</a></li>
              
            <li><a href="my-booking.php">My Booking</a></li>
            <li><a href="logout.php">Sign Out</a></li>
            
          </ul>
            </li>
          </ul><?php } ?>
        </div>
        <div class="header_search">
          <div id="search_toggle"><i class="fa fa-search" aria-hidden="true"></i></div>
          <form action="#" method="get" id="header-search-form">
            <input type="text" placeholder="Search..." class="form-control">
            <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
          </form>
        </div>
      </div>
      <div class="collapse navbar-collapse" id="navigation">
        <ul class="nav navbar-nav">
          <li><a href="index.php">Home</a>    </li>
          <li><a href="car-listing.php">Car Listing</a>
          <li><a href="aboutus.php">About Us</a></li>
          <li><a href="contact-us.php">Contact Us</a></li>


        </ul>
      </div>
    </div>
  </nav>
  
</header>