<?php
session_start();
error_reporting(1);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
	header('location:index.php');
} else {
	if (isset($_REQUEST['mrid'])) {
		$mrid = intval($_GET['mrid']);
		$sql = "UPDATE tblcontactowner SET `status`=1 WHERE  id=:mrid";
		$query = $dbh->prepare($sql);
		$query->bindParam(':mrid', $mrid, PDO::PARAM_STR);
		$query->execute();

		$msg = "";
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

	<title>Car Rental Portal |Admin Recived Messages </title>

	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
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

						<h2 class="page-title">Message Box</h2>

						<!-- Zero Configuration Table -->
						<div class="panel panel-default">
							<div class="panel-heading">User Messages</div>
							<div class="panel-body">
								<?php if ($error) { ?>
								<div class="errorWrap"><strong>ERROR</strong>:
									<?php echo htmlentities($error); ?>
								</div>
								<?php } else if ($msg) { ?>
								<div class="succWrap"><strong>SUCCESS</strong>:
									<?php echo htmlentities($msg); ?>
								</div>
								<?php } ?>
								<table id="zctb" class="display table table-striped table-bordered table-hover"
									cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>#</th>
											<th>Email</th>
											<th>Message</th>
											<th>VehicleId</th>
											<th>Posting date</th>
											<th>Action</th>
										</tr>
									</thead>
									
									<tbody>

										<?php
										$VehicleProviderid=0;
	$sql = "SELECT M.id, M.emailId,M.message,M.vehicleId,M.postingDate,M.status from tblcontactowner M  join tblvehicles on tblvehicles.id=M.vehicleId where tblvehicles.VehicleProviderid=:VehicleProviderid ORDER BY M.PostingDate desc" ;
	// $sql = "R.id,R.VehicleId,U.FullName,R.VehicleId,R.UserEmail,R.Rate,R.Feedback,R.PostingDate,R.status, U.UserType c SELECT * from tblcontactowner M join tblvehicles on tblvehicles.id=M.VehicleId where tblvehicles.VehicleProviderid=:VehicleProviderid";
	$query = $dbh->prepare($sql);
	$query->bindParam(':VehicleProviderid',$VehicleProviderid , PDO::PARAM_STR);
	$query->execute();
	$results = $query->fetchAll(PDO::FETCH_OBJ);
	$cnt = 1;
	if ($query->rowCount() > 0) {
		foreach ($results as $result) { ?>
										<tr>
											<td>
												<?php echo htmlentities($cnt); ?>
											</td>
											<td><a href="mailto:<?php echo htmlentities($result->emailId); ?>">
												<?php echo htmlentities($result->emailId); ?></a>
											</td>
											<td>
												<?php echo htmlentities($result->message); ?>
											</td>
											<td>
												<?php echo htmlentities($result->vehicleId); ?>
											</td>
											<td>
												<?php echo htmlentities($result->postingDate); ?>
											</td>
											<td>
												<?php if (intval($result->status) == 0) {
                                            ?><a href="messages.php?mrid=<?php echo htmlentities($result->id); ?>"> Mark as Read</a>
												<?php } else { ?>
													Read
												<?php } ?>
											</td>
										</tr>
										<?php $cnt = $cnt + 1;
		}
	} ?>

									</tbody>
								</table>



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