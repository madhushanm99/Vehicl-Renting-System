<?php
session_start();
error_reporting(0);

include('includes/config.php');
if (strlen($_SESSION['plogin']) == 0) {
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
<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">

	<title>Car Rental Portal | Admin Profile</title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">
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
		.pr-center{
			display: flex;
    		justify-content: space-evenly;
		}
	</style>

</head>

<body>
	<?php include('includes/header.php'); ?>
	<div class="ts-main-content">
		<?php include('includes/leftbar.php'); ?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">Profile</h2>
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



						<div class="row pr-center">
							<div class="col-md-8">
								<div class="panel panel-default">
									<div class="panel-heading">Basic Info</div>
									<?php if ($error) { ?>
									<div class="errorWrap"><strong>ERROR</strong>:
										<?php echo htmlentities($error); ?>
									</div>
									<?php } else if ($msg) { ?>
									<div class="succWrap"><strong>SUCCESS</strong>:
										<?php echo htmlentities($msg); ?>
									</div>
									<?php } ?>

									<div class="panel-body">
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
													value="<?php echo htmlentities($result->FullName); ?>" id="fullname"
													type="text" required>
											</div>
											<div class="form-group">
												<label class="control-label">Email Address</label>
												<input class="form-control white_bg"
													value="<?php echo htmlentities($result->EmailId); ?>" name="emailid"
													id="email" type="email" required readonly>
											</div>
											<div class="form-group">
												<label class="control-label">Phone Number</label>
												<input class="form-control white_bg" name="mobilenumber"
													value="<?php echo htmlentities($result->ContactNo); ?>"
													id="phone-number" type="text" maxlength="10" required>
											</div>
											<div class="form-group">
												<label class="control-label">Date of
													Birth&nbsp;(dd/mm/yyyy)</label>
												<input class="form-control white_bg"
													value="<?php echo htmlentities($result->dob); ?>" name="dob"
													placeholder="dd/mm/yyyy" id="birth-date" type="text">
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
												<button type="submit" name="updateprofile" class="btn">Save
													Changes
													<span class="angle_arrow"><i class="fa fa-angle-right"
															aria-hidden="true"></i></span></button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>



					</div>
					
				</div>



			</div>
		</div>
	</div>

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
</body>

</html>
<?php } ?>