<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>E-Pharmacy Dashboard</title>
	<!-- Favicon -->
	<link rel="shortcut icon" href="assets/images/logo/favicon.png">
	<!-- page css -->
	<link href="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet">
	<!-- Core css -->
	<link href="assets/css/app.min.css" rel="stylesheet">
	<!-- SWEET ALERT DIALOG -->
	<script src="assets/sweetalert.min.js"></script>
</head>

<body>
	<?php
 include('session.php');
?>
	<?php
		if (isset($_POST['updatePO'])) {
			require('db.php');
			$id = $_POST['updatePO'];
			$pStatus = $_POST['pStatus'];
	
			$sqlUpdate = "UPDATE tbl_product_order SET status = '$pStatus' WHERE id = '$id'";
			//mysqli_query($conn, $sqlUpdate);
			if (mysqli_query($conn, $sqlUpdate) ) {
				?>
				<script type="text/javascript">
					swal("Good job!", "Updated Successfully!", "success");
				</script>
					<?php
			}
		}
	?>
	<?php
		if (isset($_POST['updateLO'])) {
			require('db.php');
			$id = $_POST['updateLO'];
			$pStatus = $_POST['lStatus'];
	
			$sqlUpdate = "UPDATE tbl_labtest_order SET status = '$pStatus' WHERE id = '$id'";
			if (mysqli_query($conn, $sqlUpdate) ) {
				?>
				<script type="text/javascript">
					swal("Good job!", "Updated Successfully!", "success");
				</script>
					<?php
			}
		}
	?>
	<?php
		if (isset($_POST['updatePreO'])) {
			require('db.php');
			$id = $_POST['updatePreO'];
			$pStatus = $_POST['preStatus'];
			$prePrice = $_POST['prePrice'];
	
			$sqlUpdate = "UPDATE tbl_prescription_order SET status = '$pStatus', price = '$prePrice'  WHERE id = '$id'";
		if (mysqli_query($conn, $sqlUpdate) ) {
				?>
				<script type="text/javascript">
					swal("Good job!", "Updated Successfully!", "success");
				</script>
					<?php
			}
		}
	?>



	<div class="app">
		<div class="layout">
			<!-- Header START -->
			<?php
			  include('header.php');
			  ?> 
			<!-- Header END -->
			<!-- Side Nav START -->
			<div class="side-nav" >
				<div class="side-nav-inner ">
					<ul class="side-nav-menu">
						<li >
							<a class="dropdown-toggle" href="home.php">
								<span class="icon-holder">
									<i class="anticon anticon-home"></i>
								</span>
								<span class="title">Home</span>
								<span class="arrow">
									<i class="arrow-icon"></i>
								</span>
							</a>
						</li>
						<li>
							<a class="dropdown-toggle" href="banner.php">
								<span class="icon-holder">
									<i class="anticon anticon-hdd"></i>
								</span>
								<span class="title">Banners</span>
								<span class="arrow">
									<i class="arrow-icon"></i>
								</span>
							</a>
						</li>
						<li style="background-color: #E2EDFE">
							<a class="dropdown-toggle" href="orders.php">
								<span class="icon-holder">
									<i class="anticon anticon-shopping-cart"></i>
								</span>
								<span class="title">Orders</span>
								<span class="arrow">
									<i class="arrow-icon"></i>
								</span>
							</a>
						</li>
						
						<li>
							<a class="dropdown-toggle" href="product.php">
								<span class="icon-holder">
									<i class="anticon anticon-shopping"></i>
								</span>
								<span class="title">Products</span>
								<span class="arrow">
									<i class="arrow-icon"></i>
								</span>
							</a>
						</li>
						<li>
							<a class="dropdown-toggle" href="labtest.php">
								<span class="icon-holder">
									<i class="anticon anticon-experiment"></i>
								</span>
								<span class="title">Lab Test</span>
								<span class="arrow">
									<i class="arrow-icon"></i>
								</span>
							</a>
						</li>
						<li>
							<a class="dropdown-toggle" href="dietplan.php">
								<span class="icon-holder">
									<i class="anticon anticon-profile"></i>
								</span>
								<span class="title">Diet Plans</span>
								<span class="arrow">
									<i class="arrow-icon"></i>
								</span>
							</a>
						</li>
					</ul>
				</div>
			</div>
			<!-- Side Nav END -->

			<!-- Page Container START -->
			<div class="page-container">
				<!-- Content Wrapper START -->
				<div class="main-content"style="background-color: #f0f0f0;">
					<div class="row">
						<div class="col-lg-12">
							<div class="card scrollable"style="height: 520px;">
								<div class="card-body">
									<div class="d-flex justify-content-between align-items-center">
										<h5>Product Orders</h5>
									</div>
									<div class="m-t-30">
										<div class="table-responsive">
											<table class="table table-hover">
												<thead>
													<tr>
														<th>ID</th>
														<th>Customer</th>
														<th>Address</th>
														<th>Phone No.</th>
														<th>Date</th>
														<th>Amount</th>
														<th >Status</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
													<?php
													require 'db.php'; 
													$query=mysqli_query($conn,"SELECT tbl_product_order.id,tbl_user.name,tbl_user.email,tbl_user.address,tbl_user.phone_no,tbl_product_order.status,tbl_product_order.price,  tbl_product_order.p_time FROM tbl_user,tbl_product_order  WHERE tbl_product_order.user_id = tbl_user.id  ORDER BY id DESC");
													while ($row = mysqli_fetch_array($query)) {
														?>
														<tr>
															<form action="" method="post" >
																<td><?php echo $row["id"];?></td>
																<td><?php echo $row["name"];?></td>
																<td><?php echo $row["address"];?></td>
																<td><?php echo $row["phone_no"];?></td>
																<td><?php echo date("d-M-Y", ($row["p_time"] / 1000));?></td>
																<td><?php echo $row["price"];?></td>
																<td>
																	<select name="pStatus" class="form-control">
																		<option <?=$row['status'] == 'IN PROGRESS' ? ' selected="selected"' : '';?>>IN PROGRESS</option>
																		<option <?=$row['status'] == 'PACKED' ? ' selected="selected"' : '';?>>PACKED</option>
																		<option <?=$row['status'] == 'ON THE WAY' ? ' selected="selected"' : '';?>>ON THE WAY</option>
																		<option <?=$row['status'] == 'DELIVERED' ? ' selected="selected"' : '';?>>DELIVERED</option>
																	</select>
																</td>
																<td class="text-centre">
																	<button class="btn btn-icon btn-primary btn-rounded" name="updatePO" value="<?php echo $row["id"];?>"  style="width: 70px;">
																		<i class="anticon anticon-check"></i>
																	</button>
																</td>
															</form>
														</tr>	
														<?php	
													}	
													?>									
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<div class="card scrollable"style="height: 520px;">
								<div class="card-body">
									<div class="d-flex justify-content-between align-items-center">
										<h5>Lab Test Orders</h5>
									</div>
									<div class="m-t-30">
										<div class="table-responsive">
											<table class="table table-hover">
												<thead>
													<tr>
														<th>ID</th>
														<th>Customer</th>
														<th>Address</th>
														<th>Phone No.</th>
														<th>Date</th>
														<th>Amount</th>
														<th >Status</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
													<?php
													require 'db.php'; 
													$query=mysqli_query($conn,"SELECT tbl_labtest_order.id,tbl_user.name,tbl_user.email,tbl_user.address,tbl_user.phone_no,tbl_labtest_order.status,tbl_labtest_order.price,  tbl_labtest_order.p_time FROM tbl_user,tbl_labtest_order  WHERE tbl_labtest_order.user_id = tbl_user.id  ORDER BY id DESC");
													while ($row = mysqli_fetch_array($query)) {
														?>
														<tr>
															<form action="" method="post" >
																<td><?php echo $row["id"];?></td>
																<td><?php echo $row["name"];?></td>
																<td><?php echo $row["address"];?></td>
																<td><?php echo $row["phone_no"];?></td>
																<td><?php echo date("d-M-Y", ($row["p_time"] / 1000));?></td>
																<td><?php echo $row["price"];?></td>
																<td>
																	<select name="lStatus" class="form-control">
																		<option <?=$row['status'] == 'IN PROGRESS' ? ' selected="selected"' : '';?>>IN PROGRESS</option>
																		<option <?=$row['status'] == 'PACKED' ? ' selected="selected"' : '';?>>PACKED</option>
																		<option <?=$row['status'] == 'ON THE WAY' ? ' selected="selected"' : '';?>>ON THE WAY</option>
																		<option <?=$row['status'] == 'DELIVERED' ? ' selected="selected"' : '';?>>DELIVERED</option>
																	</select>
																</td>
																<td class="text-centre">
																	<button class="btn btn-icon btn-primary btn-rounded" name="updateLO" value="<?php echo $row["id"];?>" style="width: 70px;">
																		<i class="anticon anticon-check"></i>
																	</button>
																</td>
															</form>
														</tr>	
														<?php	
													}	
													?>										
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<div class="card scrollable"style="height: 520px;">
								<div class="card-body">
									<div class="d-flex justify-content-between align-items-center">
										<h5>Prescription Orders</h5>
									</div>
									<div class="m-t-30">
										<div class="table-responsive">
											<table class="table table-hover">
												<thead>
													<tr>
														<th>ID</th>
														<th>Customer</th>
														<th>Image</th>
														<th>Address</th>
														<th>Phone No.</th>
														<th>Date</th>
														<th>Amount</th>
														<th >Status</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
													<?php
													require 'db.php'; 
													$query= mysqli_query($conn,"SELECT tbl_prescription_order.id,tbl_user.name,tbl_user.email,tbl_user.address,tbl_user.phone_no,tbl_prescription_order.image,tbl_prescription_order.status,tbl_prescription_order.price,  tbl_prescription_order.p_time FROM tbl_user,tbl_prescription_order  WHERE tbl_prescription_order.user_id = tbl_user.id  ORDER BY id DESC");
													while ($row = mysqli_fetch_array($query)) {
														?>
														<tr>
															<form action="" method="post" >
																<td><?php echo $row["id"];?></td>
																<td><?php echo $row["name"];?></td>
																<td>
																	<div class="d-flex align-items-center">
																		<div class="d-flex align-items-center">
																			<a target="_blank" href="<?php echo "images/prescription/".$row["image"]; ?>">
																			<img class="img-fluid rounded" src="<?php echo "images/prescription/".$row["image"]; ?>" style="width: 90px; height: 60px;" alt="">
																			</a>
																		</div>
																	</div>
																</td>
																<td><?php echo $row["address"];?></td>
																<td><?php echo $row["phone_no"];?></td>
																<td><?php echo date("d-M-Y", ($row["p_time"] / 1000));?></td>
																<td><div class="form-group">
																	<label class="font-weight-regular" for=""></label>
																	<input style="width: 70px;" name="prePrice" type="text" class="form-control" value="<?php echo $row["price"];?>" placeholder="Update Amount">
																</div></td>
																<td>
																	<select name="preStatus" class="form-control">
																		<option <?=$row['status'] == 'IN PROGRESS' ? ' selected="selected"' : '';?>>IN PROGRESS</option>
																		<option <?=$row['status'] == 'PACKED' ? ' selected="selected"' : '';?>>PACKED</option>
																		<option <?=$row['status'] == 'ON THE WAY' ? ' selected="selected"' : '';?>>ON THE WAY</option>
																		<option <?=$row['status'] == 'DELIVERED' ? ' selected="selected"' : '';?>>DELIVERED</option>
																	</select>
																</td>
																<td class="text-centre">
																	<button class="btn btn-icon btn-primary btn-rounded" name="updatePreO" value="<?php echo $row["id"];?>" style="width: 70px;">
																		<i class="anticon anticon-check"></i>
																	</button>
																</td>
															</form>
														</tr>	
														<?php	
													}	
													?>														
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Content Wrapper END -->
				<!-- Footer START -->
				<footer class="footer" style="background-color: #ffffff;">
					<div class="footer-content ">
						<p class="m-b-0 text-centre">Copyright © 2021 Sahil Imrose. All rights reserved.</p>
					</div>
				</footer>
				<!-- Footer END -->
			</div>
			<!-- Page Container END -->
		</div>
	</div>


	<!-- Core Vendors JS -->
	<script src="assets/js/vendors.min.js"></script>

	<!-- page js -->
	<script src="assets/vendors/chartjs/Chart.min.js"></script>
	<script src="assets/js/pages/dashboard-e-commerce.js"></script>

	<!-- Core JS -->
	<script src="assets/js/app.min.js"></script>

</body>
</html>