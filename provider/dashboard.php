<?php
    session_start();
    error_reporting(1);
    include('includes/config.php');
    if (strlen($_SESSION['plogin']) == 0) {
	    header('location:index.php');
    } else {
		
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

	<title>Vehicle Rental Portal | Provider Dashboard</title>

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
</head>

<body>
	<?php include('includes/header.php'); ?>

	<div class="ts-main-content">
		<?php include('includes/leftbar.php'); ?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">Dashboard</h2>

						<div class="row">
							<div class="col-md-12">
								<div class="row">

									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-success text-light">
												<div class="stat-panel text-center">
													<?php
	    $sql1 = "SELECT id from tblvehicles where tblvehicles.VehicleProviderid=:VehicleProviderid";
	    $query1 = $dbh->prepare($sql1);
	    $query1->bindParam(':VehicleProviderid', $_SESSION['plogin'], PDO::PARAM_STR);
	    $query1->execute();
	    $results1 = $query1->fetchAll(PDO::FETCH_OBJ);
	    $totalvehicle = $query1->rowCount();
                                                    ?>
													<div class="stat-panel-number h1 ">
														<?php echo htmlentities($totalvehicle); ?>
													</div>
													<div class="stat-panel-title text-uppercase">Listed Vehicles</div>
												</div>
											</div>
											<a href="manage-vehicles.php"
												class="block-anchor panel-footer text-center">Full Detail &nbsp; <i
													class="fa fa-arrow-right"></i></a>
										</div>
									</div>
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-info text-light">
												<div class="stat-panel text-center">
													<?php
	    $sql2 = "SELECT tblbooking.id from tblbooking join tblvehicles on tblvehicles.id = tblbooking.VehicleId where tblvehicles.VehicleProviderid=:VehicleProviderid";
		//$sql2 = "SELECT * FROM tblbooking";
		$query2 = $dbh->prepare($sql2);
	    $query2->bindParam(':VehicleProviderid', $_SESSION['plogin'], PDO::PARAM_STR);
	    $query2->execute();
	    $results2 = $query2->fetchAll(PDO::FETCH_OBJ);
	    $bookings = $query2->rowCount();
		
                                                        ?>

													<div class="stat-panel-number h1 ">
														<?php echo htmlentities($bookings); ?>
													</div>
													<div class="stat-panel-title text-uppercase">Total Bookings</div>
												</div>
											</div>
											<a href="manage-bookings.php"
												class="block-anchor panel-footer text-center">Full Detail &nbsp; <i
													class="fa fa-arrow-right"></i></a>
										</div>
									</div>


									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-info text-light">
												<div class="stat-panel text-center">
													<?php
	    //$sql5 = "SELECT id from tblreview ";
		$sql5 = "SELECT R.id,R.VehicleId,U.FullName from tblreview R left join tblusers U on (R.UserEmail = U.EmailId) join tblvehicles on tblvehicles.id=R.VehicleId where tblvehicles.VehicleProviderid=:VehicleProviderid";
		//"SELECT tblreview.id from tblreview join tblvehicles on tblvehicles.id = tblreview.VehicleId where tblvehicles.VehicleProviderid=:VehicleProviderid";
	    $query5 = $dbh->prepare($sql5);
		$query5->bindParam(':VehicleProviderid', $_SESSION['plogin'], PDO::PARAM_STR);
	    $query5->execute();
	    $results5 = $query5->fetchAll(PDO::FETCH_OBJ);
	    $feedbacks = $query5->rowCount();
                                                        ?>

													<div class="stat-panel-number h1 ">
														<?php echo htmlentities($feedbacks); ?>
													</div>
													<div class="stat-panel-title text-uppercase">feedbacks</div>
												</div>
											</div>
											<a href="feedback.php" class="block-anchor panel-footer text-center">Full
												Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
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

	<script>

		window.onload = function () {

			// Line chart from swirlData for dashReport
			var ctx = document.getElementById("dashReport").getContext("2d");
			window.myLine = new Chart(ctx).Line(swirlData, {
				responsive: true,
				scaleShowVerticalLines: false,
				scaleBeginAtZero: true,
				multiTooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %>",
			});

			// Pie Chart from doughutData
			var doctx = document.getElementById("chart-area3").getContext("2d");
			window.myDoughnut = new Chart(doctx).Pie(doughnutData, { responsive: true });

			// Dougnut Chart from doughnutData
			var doctx = document.getElementById("chart-area4").getContext("2d");
			window.myDoughnut = new Chart(doctx).Doughnut(doughnutData, { responsive: true });

		}
	</script>
</body>

</html>
<?php } ?>