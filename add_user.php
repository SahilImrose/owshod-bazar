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
	if (isset($_POST['addUser'])) {
		require('db.php');
		$uName = $_POST['uName'];
		$uEmail = $_POST['uEmail'];
		$uPassword = $_POST['uPassword'];

		if ($uName != '' && $uEmail != '' && $uPassword != '') {

			$sqlinsert = "INSERT INTO tbl_admin(name,email,password,image) 
			VALUES('$uName','$uEmail','$uPassword','noavatar.jpg')";
			if (mysqli_query($conn, $sqlinsert)) {
				?>
				<script type="text/javascript">
					swal("Great!", "User Added Successfully", "success")
				</script>
				<?php
			}
		}

		else{
			?>
			<script type="text/javascript">
				swal("OOPS!", "Must Fill Fields", "error")
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
			<div class="main-content" >
				<div class="container-fluid">
					<div class="d-flex full-height p-v-20 flex-column justify-content-between">
						<div class="container">
							<div class="row align-items-center">
								<div class="col-md-6 d-none d-md-block">
									<img class="img-fluid" src="assets/images/others/sign-up-2.png" alt="">
								</div>
								<div class="m-l-auto col-md-6">
									<div class="card">
										<div class="card-body">
											<h2 class="m-t-20">Add User</h2>
											<p class="m-b-30">Enter credential to get access</p>
											<form method="post" action="add_user.php">
												<div class="form-group">
													<label class="font-weight-semibold"  for="userName">Name:
													</label>
													<input type="text" class="form-control" name="uName" placeholder="Enter Name">
												</div>
												<div class="form-group">
													<label class="font-weight-semibold" for="email">Email:</label>
													<input type="email" class="form-control" name="uEmail" placeholder="Enter Email">
												</div>
												<div class="form-group">
													<label class="font-weight-semibold" for="password">Password:</label>
													<input type="password" class="form-control" name="uPassword" placeholder="Enter Password">
												</div>												
												<center>
													<button style="margin-top: 30px;margin-bottom: 30px;" name="addUser" class="btn btn-primary">Add </button>
												</center>
											</form>
										</div>
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