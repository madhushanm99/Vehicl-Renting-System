<?php
session_start();
error_reporting(1);

function _get_mostBooked_vehicle($dbh, $start, $end)
{ ?>
	<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th>#</th>
				<th>V Image</th>
				<th>VehicleID</th>
				<th>Vehicle Title</th>
				<th>Vehicel brand</th>
				<th>Bookings</th>

			</tr>
		</thead>
		<tbody>
			<?php
			$sql = "SELECT tblvehicles.Vimage1,tblvehicles.id,tblvehicles.VehiclesTitle,tblbrands.BrandName,count(*) as `bookings`FROM `tblbooking` LEFT JOIN `tblvehicles` ON (`tblbooking`.`VehicleId` = `tblvehicles`.`id`) left join `tblbrands` on `tblbrands`.id=`tblvehicles`.`VehiclesBrand` WHERE `tblbooking`.`PostingDate` between :StartD and :EndD group by `tblbooking`.`VehicleId` order by bookings DESC;";
			$query = $dbh->prepare($sql);
			$query->bindParam(':StartD', $start, PDO::PARAM_STR);
			$query->bindParam(':EndD', $end, PDO::PARAM_STR);
			$query->execute();
			$results = $query->fetchALL(PDO::FETCH_OBJ);
			$cnt = 1;
			if ($query->rowCount() > 0) {
				foreach ($results as $result) { ?>
					<tr>
						<td>
							<?php echo htmlentities($cnt); ?>
						</td>
						<td>
							<?php echo htmlentities($result->Vimage1); ?>
						</td>
						<td>
							<?php echo htmlentities($result->id); ?>
						</td>
						<td>
							<?php echo htmlentities($result->VehiclesTitle); ?>
						</td>
						<td>
							<?php echo htmlentities($result->BrandName); ?>
						</td>
						<td>
							<?php echo htmlentities($result->bookings); ?>
						</td>
					</tr>
					<?php $cnt = $cnt + 1;
				}
			}


}
function _get_mostOut_customer($dbh, $start, $end)
{ ?>
			<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>#</th>
						<th>ID</th>
						<th>Customer Name</th>
						<th>Email</th>
						<th>City</th>
						<th>Bookings</th>

					</tr>
				</thead>
				<tbody>
					<?php
					$sql = "SELECT tblusers.id,tblusers.FullName,tblusers.EmailId,tblusers.City ,count(*) as `bookings`FROM `tblbooking` LEFT JOIN `tblusers` ON (`tblbooking`.`userEmail` = `tblusers`.`EmailId`)  WHERE `tblbooking`.`PostingDate`  between :StartD and :EndD group by `tblbooking`.`userEmail` order by bookings DESC;";
					//$sql = "SELECT tblvehicles.Vimage1,tblvehicles.id,tblvehicles.VehiclesTitle,tblbrands.BrandName,count(*) as `bookings`FROM `tblbooking` LEFT JOIN `tblvehicles` ON (`tblbooking`.`VehicleId` = `tblvehicles`.`id`) left join `tblbrands` on `tblbrands`.id=`tblvehicles`.`VehiclesBrand` WHERE `tblbooking`.`PostingDate` between :StartD and :EndD group by `tblbooking`.`VehicleId` order by bookings DESC;";
					$query = $dbh->prepare($sql);
					$query->bindParam(':StartD', $start, PDO::PARAM_STR);
					$query->bindParam(':EndD', $end, PDO::PARAM_STR);
					$query->execute();
					$results = $query->fetchALL(PDO::FETCH_OBJ);
					$cnt = 1;
					if ($query->rowCount() > 0) {
						foreach ($results as $result) { ?>
							<tr>
								<td>
									<?php echo htmlentities($cnt); ?>
								</td>
								<td>
									<?php echo htmlentities($result->id); ?>
								</td>
								<td>
									<?php echo htmlentities($result->FullName); ?>
								</td>
								<td>
									<?php echo htmlentities($result->EmailId); ?>
								</td>
								<td>
									<?php echo htmlentities($result->City); ?>
								</td>
								<td>
									<?php echo htmlentities($result->bookings); ?>
								</td>
							</tr>
							<?php $cnt = $cnt + 1;
						}
					}

}
function _get_cansaledBooking($dbh, $start, $end)
{
	?>
					<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0"
						width="100%">
						<thead>
							<tr>
								<th>#</th>
								<th>ID</th>
								<th>Customer Name</th>
								<th>Email</th>
								<th>City</th>
								<th>Bookings</th>

							</tr>
						</thead>
						<tbody>
							<?php
							$sql = "SELECT tblusers.id,tblusers.FullName,tblusers.EmailId,tblusers.City ,count(*) as `bookings`FROM `tblbooking` LEFT JOIN `tblusers` ON (`tblbooking`.`userEmail` = `tblusers`.`EmailId`)  WHERE `tblbooking`.`PostingDate`  between :StartD and :EndD group by `tblbooking`.`userEmail` order by bookings DESC;";
							//$sql = "SELECT tblvehicles.Vimage1,tblvehicles.id,tblvehicles.VehiclesTitle,tblbrands.BrandName,count(*) as `bookings`FROM `tblbooking` LEFT JOIN `tblvehicles` ON (`tblbooking`.`VehicleId` = `tblvehicles`.`id`) left join `tblbrands` on `tblbrands`.id=`tblvehicles`.`VehiclesBrand` WHERE `tblbooking`.`PostingDate` between :StartD and :EndD group by `tblbooking`.`VehicleId` order by bookings DESC;";
							$query = $dbh->prepare($sql);
							$query->bindParam(':StartD', $start, PDO::PARAM_STR);
							$query->bindParam(':EndD', $end, PDO::PARAM_STR);
							$query->execute();
							$results = $query->fetchALL(PDO::FETCH_OBJ);
							$cnt = 1;
							if ($query->rowCount() > 0) {
								foreach ($results as $result) { ?>
									<tr>
										<td>
											<?php echo htmlentities($cnt); ?>
										</td>
										<td>
											<?php echo htmlentities($result->id); ?>
										</td>
										<td>
											<?php echo htmlentities($result->FullName); ?>
										</td>
										<td>
											<?php echo htmlentities($result->EmailId); ?>
										</td>
										<td>
											<?php echo htmlentities($result->City); ?>
										</td>
										<td>
											<?php echo htmlentities($result->bookings); ?>
										</td>
									</tr>
									<?php $cnt = $cnt + 1;
								}
							}

}
function _get_topProvider($dbh, $start, $end)
{
	?>
					<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0"
						width="100%">
						<thead>
							<tr>
								<th>#</th>
								<th>ID</th>
								<th>Customer Name</th>
								<th>Email</th>
								<th>City</th>
								<th>Bookings</th>

							</tr>
						</thead>
						<tbody>
							<?php
							$sql = "SELECT tblusers.id,tblusers.FullName,tblusers.EmailId,tblusers.City ,count(*) as `bookings`FROM `tblbooking` LEFT JOIN `tblusers` ON (`tblbooking`.`userEmail` = `tblusers`.`EmailId`)  WHERE `tblbooking`.`PostingDate`  between :StartD and :EndD group by `tblbooking`.`userEmail` order by bookings DESC;";
							//$sql = "SELECT tblvehicles.Vimage1,tblvehicles.id,tblvehicles.VehiclesTitle,tblbrands.BrandName,count(*) as `bookings`FROM `tblbooking` LEFT JOIN `tblvehicles` ON (`tblbooking`.`VehicleId` = `tblvehicles`.`id`) left join `tblbrands` on `tblbrands`.id=`tblvehicles`.`VehiclesBrand` WHERE `tblbooking`.`PostingDate` between :StartD and :EndD group by `tblbooking`.`VehicleId` order by bookings DESC;";
							$query = $dbh->prepare($sql);
							$query->bindParam(':StartD', $start, PDO::PARAM_STR);
							$query->bindParam(':EndD', $end, PDO::PARAM_STR);
							$query->execute();
							$results = $query->fetchALL(PDO::FETCH_OBJ);
							$cnt = 1;
							if ($query->rowCount() > 0) {
								foreach ($results as $result) { ?>
									<tr>
										<td>
											<?php echo htmlentities($cnt); ?>
										</td>
										<td>
											<?php echo htmlentities($result->id); ?>
										</td>
										<td>
											<?php echo htmlentities($result->FullName); ?>
										</td>
										<td>
											<?php echo htmlentities($result->EmailId); ?>
										</td>
										<td>
											<?php echo htmlentities($result->City); ?>
										</td>
										<td>
											<?php echo htmlentities($result->bookings); ?>
										</td>
									</tr>
									<?php $cnt = $cnt + 1;
								}
							}

}
function _get_companyIncome($dbh, $start, $end)
{
	?>
					<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0"
						width="100%">
						<thead>
							<tr>
								<th>#</th>
								<th>ID</th>
								<th>Customer Name</th>
								<th>Email</th>
								<th>City</th>
								<th>Bookings</th>

							</tr>
						</thead>
						<tbody>
							<?php
							$sql = "SELECT tblusers.id,tblusers.FullName,tblusers.EmailId,tblusers.City ,count(*) as `bookings`FROM `tblbooking` LEFT JOIN `tblusers` ON (`tblbooking`.`userEmail` = `tblusers`.`EmailId`)  WHERE `tblbooking`.`PostingDate`  between :StartD and :EndD group by `tblbooking`.`userEmail` order by bookings DESC;";
							//$sql = "SELECT tblvehicles.Vimage1,tblvehicles.id,tblvehicles.VehiclesTitle,tblbrands.BrandName,count(*) as `bookings`FROM `tblbooking` LEFT JOIN `tblvehicles` ON (`tblbooking`.`VehicleId` = `tblvehicles`.`id`) left join `tblbrands` on `tblbrands`.id=`tblvehicles`.`VehiclesBrand` WHERE `tblbooking`.`PostingDate` between :StartD and :EndD group by `tblbooking`.`VehicleId` order by bookings DESC;";
							$query = $dbh->prepare($sql);
							$query->bindParam(':StartD', $start, PDO::PARAM_STR);
							$query->bindParam(':EndD', $end, PDO::PARAM_STR);
							$query->execute();
							$results = $query->fetchALL(PDO::FETCH_OBJ);
							$cnt = 1;
							if ($query->rowCount() > 0) {
								foreach ($results as $result) { ?>
									<tr>
										<td>
											<?php echo htmlentities($cnt); ?>
										</td>
										<td>
											<?php echo htmlentities($result->id); ?>
										</td>
										<td>
											<?php echo htmlentities($result->FullName); ?>
										</td>
										<td>
											<?php echo htmlentities($result->EmailId); ?>
										</td>
										<td>
											<?php echo htmlentities($result->City); ?>
										</td>
										<td>
											<?php echo htmlentities($result->bookings); ?>
										</td>
									</tr>
									<?php $cnt = $cnt + 1;
								}
							}

}
function _get_providerIncome($dbh, $start, $end)
{
	?>
					<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0"
						width="100%">
						<thead>
							<tr>
								<th>#</th>
								<th>ID</th>
								<th>Customer Name</th>
								<th>Email</th>
								<th>City</th>
								<th>Bookings</th>

							</tr>
						</thead>
						<tbody>
							<?php
							$sql = "SELECT tblusers.id,tblusers.FullName,tblusers.EmailId,tblusers.City ,count(*) as `bookings`FROM `tblbooking` LEFT JOIN `tblusers` ON (`tblbooking`.`userEmail` = `tblusers`.`EmailId`)  WHERE `tblbooking`.`PostingDate`  between :StartD and :EndD group by `tblbooking`.`userEmail` order by bookings DESC;";
							//$sql = "SELECT tblvehicles.Vimage1,tblvehicles.id,tblvehicles.VehiclesTitle,tblbrands.BrandName,count(*) as `bookings`FROM `tblbooking` LEFT JOIN `tblvehicles` ON (`tblbooking`.`VehicleId` = `tblvehicles`.`id`) left join `tblbrands` on `tblbrands`.id=`tblvehicles`.`VehiclesBrand` WHERE `tblbooking`.`PostingDate` between :StartD and :EndD group by `tblbooking`.`VehicleId` order by bookings DESC;";
							$query = $dbh->prepare($sql);
							$query->bindParam(':StartD', $start, PDO::PARAM_STR);
							$query->bindParam(':EndD', $end, PDO::PARAM_STR);
							$query->execute();
							$results = $query->fetchALL(PDO::FETCH_OBJ);
							$cnt = 1;
							if ($query->rowCount() > 0) {
								foreach ($results as $result) { ?>
									<tr>
										<td>
											<?php echo htmlentities($cnt); ?>
										</td>
										<td>
											<?php echo htmlentities($result->id); ?>
										</td>
										<td>
											<?php echo htmlentities($result->FullName); ?>
										</td>
										<td>
											<?php echo htmlentities($result->EmailId); ?>
										</td>
										<td>
											<?php echo htmlentities($result->City); ?>
										</td>
										<td>
											<?php echo htmlentities($result->bookings); ?>
										</td>
									</tr>
									<?php $cnt = $cnt + 1;
								}
							}

}

include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
	header('location:index.php');
} else {

	?>
							<!doctype html>
							<html lang="en" class="no-js">

							<head>
								<meta charset="UTF-8">
								<meta http-equiv="X-UA-Compatible" content="IE=edge">
								<meta name="viewport"
									content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
								<meta name="description" content="">
								<meta name="author" content="">
								<meta name="theme-color" content="#3e454c">

								<title>Vehicle Rental Portal | Admin Panel</title>


								<link rel="stylesheet" href="css/font-awesome.min.css">

								<link rel="stylesheet" href="css/bootstrap.min.css">

								<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">

								<link rel="stylesheet" href="css/bootstrap-social.css">

								<link rel="stylesheet" href="css/bootstrap-select.css">

								<link rel="stylesheet" href="css/fileinput.min.css">

								<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">

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
													<!-- 
									Most Booked Vehcile selected date range
									most Booked Person selected date range
									canseld booking Selected date range
									top provider
									compay Income 
									providers income 
								 -->
													<form action="reports.php" method="GET" id="" class="form-inline">
														<label class="mr-sm-2  mb-2">Report:&nbsp;&nbsp;&nbsp;&nbsp;
														</label>
														<select name="report" id="" class="form-control  mb-2 mr-sm-2">
															<option value="" disabled selected>Select Report Type</option>
															<option value="mostBoVh">Most Booked Vehcile</option>
															<option value="mostOutPer">Most Outstanding Customer</option>
															<option value="cncelBo">Canseld Booking</option>
															<option value="topPrvdr">Top Provider</option>
															<option value="comInc">Company Income</option>
															<option value="proInc">Providers Income</option>
														</select>
														&nbsp;&nbsp;&nbsp;&nbsp;
														<label class="mr-sm-2  mb-2">Select Date
															Range:&nbsp;&nbsp;&nbsp;&nbsp;
														</label>
														<input type="date" name="startDate" required
															class="form-control  mb-2 mr-sm-2" placeholder="">
														&nbsp;&nbsp;- &nbsp;&nbsp;
														<input type="date" name="endDate" required
															class="form-control  mb-2 mr-sm-2" placeholder="">
														<button type="submit" id="dateRange"
															class="btn btn-primary  mb-2 mr-sm-1">Load</button>
													</form>
													<hr>

													<?php
													$report = "";
													$start = date("Y-m-d", strtotime("-1 Year"));
													$end = date("Y-m-d");

													if (isset($_GET['startDate']) && $_GET['startDate'] != "") {
														$start = date("Y-m-d", strtotime($_GET['startDate']));
													}
													if (isset($_GET['endDate']) && $_GET['endDate'] != "") {
														$end = date("Y-m-d", strtotime($_GET['endDate']));
													}

													if (isset($_GET['report']) && $_GET['report'] != "") {
														$report = $_GET['report'];
													}
													if ($report == "") {
														echo 'Select Report Type and Date Range';
													} else if ($report == "mostBoVh") {
														echo _get_mostBooked_vehicle($dbh, $start, $end);
													} else if ($report == "mostOutPer") {
														echo _get_mostOut_customer($dbh, $start, $end);
													} else if ($report == "cncelBo") {
														echo _get_mostOut_customer($dbh, $start, $end);
													}
													else if ($report == "topPrvdr") {
														echo _get_mostOut_customer($dbh, $start, $end);
													}
													else if ($report == "comInc") {
														echo _get_mostOut_customer($dbh, $start, $end);
													}else if ($report == "proInc") {
														echo _get_mostOut_customer($dbh, $start, $end);
													}
													?>

												</div>
											</div>









										</div>
									</div>
								</div>


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


										var ctx = document.getElementById("dashReport").getContext("2d");
										window.myLine = new Chart(ctx).Line(swirlData, {
											responsive: true,
											scaleShowVerticalLines: false,
											scaleBeginAtZero: true,
											multiTooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %>",
										});


										var doctx = document.getElementById("chart-area3").getContext("2d");
										window.myDoughnut = new Chart(doctx).Pie(doughnutData, { responsive: true });


										var doctx = document.getElementById("chart-area4").getContext("2d");
										window.myDoughnut = new Chart(doctx).Doughnut(doughnutData, { responsive: true });

									}
								</script>
							</body>

							</html>
						<?php } ?>