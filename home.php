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
	if(isset($_POST['deleteUser']))
	{
		require('db.php');
		$id = $_POST['deleteUser'];
		$sql = "DELETE FROM tbl_admin WHERE id = '$id'" ;
		$retval = mysqli_query($conn, $sql);          
		if(! $retval ) {
			?>
			<script type="text/javascript">
				swal("OOPS!", "Some Error Occure!", "error")
			</script>
			<?php
		}
		else{
			?>
		<script type="text/javascript">
			swal("Good job!", "Admin Account Deleted Successfully!", "success")
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
						<li style="background-color: #E2EDFE">
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
						<li>
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
				<div class="main-content" style="background-color: #f0f0f0">
					<div class="page-header no-gutters has-tab">
						<h2 class="font-weight-normal">Sales Statistics</h2>
					</div>
					<div class="row">
						<div class="col-lg-4" >
							<div class="card"style="height: 250px;">
								<div class="card-body">							
									<div class="m-t-20">
										<div class="d-inline-block m-r-0">
											<h1> Total Sale. </h1>											
										</div>										
									</div>
									<div class="m-t-30">
										<?php
										  require('db.php');
											$result = mysqli_query($conn,'SELECT SUM(price) AS value_sum FROM tbl_prescription_order'); 
											$row = mysqli_fetch_assoc($result);
											$sum = $row['value_sum'];
											$result2 = mysqli_query($conn,'SELECT SUM(price) AS product_sum FROM tbl_product_order'); 
											$row2 = mysqli_fetch_assoc($result2);
											$sum2 = $row2['product_sum'];
											$result3 = mysqli_query($conn,'SELECT SUM(price) AS test_sum FROM tbl_labtest_order'); 
											$row3 = mysqli_fetch_assoc($result3); 
											$sum3 = $row3['test_sum'];
											$total = $sum + $sum2 + $sum3;
										?>
										<center>
											<span class="badge badge-pill badge-blue font-size-35"style="width: 200px;">
											<h2 class="font-weight-semibold" style="align-self: center;">  Tk.  <?php echo $total; ?></h2></center>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4" >
							<div class="card"style="height: 250px;">
								<div class="card-body">							
									<div class="m-t-20">
										<div class="d-inline-block m-r-0">
											<h1> Total Orders. </h1>											
										</div>										
									</div>
									<div class="m-t-30">
										<?php
										  require('db.php');
											$result = mysqli_query($conn,'SELECT Count(id) AS preId FROM tbl_prescription_order'); 
											$row = mysqli_fetch_assoc($result);
											$sum = $row['preId'];
											$result2 = mysqli_query($conn,'SELECT Count(id) AS proId FROM tbl_product_order'); 
											$row2 = mysqli_fetch_assoc($result2);
											$sum2 = $row2['proId'];
											$result3 = mysqli_query($conn,'SELECT Count(price) AS tId FROM tbl_labtest_order'); 
											$row3 = mysqli_fetch_assoc($result3); 
											$sum3 = $row3['tId'];
											$total = $sum + $sum2 + $sum3;
										?>
										<center>
											<span class="badge badge-pill badge-blue font-size-35" style="width: 200px;">
											<h2 class="font-weight-semibold" style="align-self: center;"> <?php echo $total; ?> </h2></center>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4" >
							<div class="card"style="height: 250px;">
								<div class="card-body">							
									<div class="m-t-0">
										<div class="d-inline-block m-r-0">
											<h5>Prescription Orders </h1>											
										</div>										
									</div>
									<div class="m-t-0">
										<?php
										  require('db.php');
											$result = mysqli_query($conn,'SELECT Count(id) AS preId FROM tbl_prescription_order'); 
											$row = mysqli_fetch_assoc($result);
											$sum = $row['preId'];
										?>
										<center>
											<span class="badge badge-pill badge-blue font-size-5" style="width: 150px;">
											<h5 class="font-weight-semibold" style="align-self: center;"> <?php echo $sum; ?> </h5></center>
									</div>
									<div class="m-t-0">
										<div class="d-inline-block m-r-0">
											<h5>Product Orders</h1>											
										</div>										
									</div>
									<div class="m-t-0">
										<?php
										  require('db.php');										
											$result2 = mysqli_query($conn,'SELECT Count(id) AS proId FROM tbl_product_order'); 
											$row2 = mysqli_fetch_assoc($result2);
											$sum2 = $row2['proId'];											
										?>
										<center>
											<span class="badge badge-pill badge-blue font-size-5" style="width: 150px;">
											<h5 class="font-weight-semibold" style="align-self: center;"> <?php echo $sum2; ?> </h5></center>
									</div>
									<div class="m-t-0">
										<div class="d-inline-block m-r-0">
											<h5> Lab Test Orders </h1>											
										</div>										
									</div>
									<div class="m-t-0">
										<?php
										  require('db.php');											
											$result3 = mysqli_query($conn,'SELECT Count(price) AS tId FROM tbl_labtest_order'); 
											$row3 = mysqli_fetch_assoc($result3); 
											$sum3 = $row3['tId'];									
										?>
										<center>
											<span class="badge badge-pill badge-blue font-size-5" style="width: 150px;">
											<h5 class="font-weight-semibold" style="align-self: center;"> <?php echo $sum3; ?> </h5></center>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-4">
							<div class="card scrollable" style="height: 450px;">
								<div class="card-body">
									<div class="d-flex justify-content-between align-items-center">
										<h5>Top Products</h5>
										<div>
											<a href="product.php" class="btn btn-sm btn-default">View All</a>
										</div>
									</div>
									<div class="m-t-30">
										<div class="table-responsive scrollable">
											<table class="table table-hover scrollable">
												<tbody>
													<?php
													require 'db.php'; 
													$query=mysqli_query($conn,"SELECT * FROM tbl_products LIMIT 5");
													while ($row = mysqli_fetch_array($query)) {
														?>
														<tr>
															<form action="" method="post" >
																<td>
																	<div class="avatar avatar-image m-r-15">
																		<img src="<?php echo "images/Products/".$row["p_image"]; ?>" alt="">
																	</div>
																</td>
																<td>
																	<h6 class="m-b-0">
																		<span class="text-muted font-size-13"><?php echo $row["p_title"]; ?></span>
																	</h6>
																</td>
																<td>
																	<span class="badge badge-pill badge-cyan font-size-12">
																		<span class="font-weight-semibold m-l-5"><?php echo $row["p_quantity"]; ?></span>
																	</span>
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
						<div class="col-lg-8">
							<div class="card scrollable"style="height: 450px;">
								<div class="card-body">
									<div class="d-flex justify-content-between align-items-center">
										<h5>Recent Orders</h5>
										<div>
											<a href="orders.php"  class="btn btn-sm btn-default">View All</a>
										</div>
									</div>
									<div class="m-t-30">
										<div class="table-responsive">
											<table class="table table-hover">
												<thead>
													<tr>
														<th>ID</th>
													
														<th>Date</th>
														<th>Amount</th>
														<th>Status</th>
													</tr>
												</thead>
												<tbody>
													<?php
													require 'db.php'; 
													$query=mysqli_query($conn,"SELECT * FROM tbl_product_order ORDER BY id DESC");
													while ($row = mysqli_fetch_array($query)) {
														?>
														<tr>
															<form action="" method="post" >
														<td><?php echo $row["id"]; ?></td>
														
														<td><?php echo date("d-M-Y", ($row["p_time"] / 1000));?></td>
														<td><?php echo $row["price"];?></td>
														<td>
															<div class="d-flex align-items-center">
																<span class="badge badge-success badge-dot m-r-10"></span>
																<span><?php echo $row["status"];?></span>
															</div>
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
							<div class="card scrollable"style="height: 450px;">
								<div class="card-body">
									<div class="d-flex justify-content-between align-items-center">
										<h5>All Admins</h5>									
									</div>
									<div class="m-t-30">
										<div class="table-responsive">
											<table class="table table-hover">
												<thead>
													<tr>
														<th>ID</th>
														<th>Name</th>
														<th>Email</th>
														<th>Address</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
													<?php
													require 'db.php'; 
													$user_check = $_SESSION['username'];
													$query=mysqli_query($conn,"SELECT * FROM tbl_admin WHERE email Not In('$user_check')");
													while ($row = mysqli_fetch_array($query)) {
														?>
														<tr>
															<form action="" method="post" >
														<td><?php echo $row["id"]; ?></td>
														<td><?php echo $row["name"]; ?></td>
														<td><?php echo $row["email"];?></td>
														<td><?php echo $row["address"];?></td>
														<td>
															<button type="submit"  class="btn btn-icon btn-danger btn-rounded" style="width: 70px;" name="deleteUser" value="<?php echo $row["id"]; ?>">
																		<i class="anticon anticon-delete"></i>
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
				<footer class="footer" style="background-color: #ffffff">
					<div class="footer-content">
						<p class="m-b-0">Copyright © 2021 Sahil Imrose. All rights reserved.</p>
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