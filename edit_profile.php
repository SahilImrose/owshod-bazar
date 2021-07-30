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
</head>

<body>
	<?php
	include('session.php');
	?>
	<?php
	if (isset($_POST['updateProfile'])) {
		require('db.php');
		$key = $_SESSION['username'];

		$name = $_POST['name'];
		$password = $_POST['password'];
		$address = $_POST['address'];
	
		$image = $_FILES['xImage']['name'];
		$target_dir = "images/admin/";
		$target_file = $target_dir . basename($_FILES["xImage"]["name"]);
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		if (move_uploaded_file($_FILES["xImage"]["tmp_name"], $target_file)) {

		} else {
	      //  echo "Sorry, there was an error uploading your file.";
		}
		$imageName=basename($_FILES["xImage"]["name"]);
		if ($imageName != '') {
			$sqlinsert = "UPDATE tbl_admin SET name = '$name', password = '$password' , image = '$imageName' , address = '$address' WHERE email = '$key'";
			mysqli_query($conn, $sqlinsert);
		} else{
			$sqlinsert = "UPDATE tbl_admin SET name = '$name' , password = '$password'  , address = '$address' WHERE email = '$key'";
			mysqli_query($conn, $sqlinsert);
		}
	}			
	?>

	<?php
	if (isset($_POST['deleteProfile'])) {
		require('db.php');
		$key = $_SESSION['username'];
		$sql = "DELETE FROM tbl_admin WHERE email = '$key'" ;
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
			swal("Good job!", "Deleted Successfully!", "success")
		</script>
			<?php
			session_start();
   
   if(session_destroy()) {
      header("Location: index.php");
   }
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
			<?php
			$user_check = $_SESSION['username'];
			$ses_sql = mysqli_query($conn,"SELECT * FROM tbl_admin WHERE email = '$user_check' ");
			$row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
			?>
			<!-- Page Container START -->
			<div class="page-container">
				<!-- Content Wrapper START -->
				<div class="main-content" style="background-color: #f0f0f0">
					<div class="page-header no-gutters has-tab">
						<h2 class="font-weight-normal">Edit Profile</h2>						
					</div>
					<div class="container">
						<div class="tab-content m-t-15">
							<div class="tab-pane fade show active" id="tab-account" >
								<div class="card">
									<div class="card-header">
										<h4 class="card-title" >Basic Infomation</h4>
										<form method="post" action="">
										<button class="btn btn-danger right" name="deleteProfile" type="submit" style="margin-top: -48px;float: right;">Delete Account</button>
										</form>
									</div>
									<div class="card-body">
										<form action="edit_profile.php" method="post" enctype="multipart/form-data">
											<div class="media align-items-center">
												<div class="avatar avatar-image  m-h-10 m-r-15" style="height: 80px; width: 80px">
													<img src="<?php echo "images/admin/".$row["image"]; ?>" alt="">
												</div>
												<div class="m-l-20 m-r-20">
													<h5 class="m-b-5 font-size-18"><?php echo $row["name"]; ?></h5>
												</div>
												<div>
													<div class="custom-file">
														<input type="file" class="custom-file-input" name="xImage" id="selectImage">
														<label class="custom-file-label" for="customFile">Add Profile Image</label>
													</div>
												</div>
											</div>
											<hr class="m-v-25">

											<div class="form-row">
												<div class="form-group col-md-6">
													<label class="font-weight-semibold" for="userName">Email:</label>
													<input type="text" class="form-control" disabled="" value="<?php echo $row["email"]; ?>" name="email" placeholder="Email">
												</div>
												<div class="form-group col-md-6">
													<label class="font-weight-semibold" for="email">Password:</label>
													<input type="password" class="form-control" value="<?php echo $row["password"]; ?>" name="password" placeholder="email">
												</div>
											</div>
											<div class="form-row">
												<div class="form-group col-md-4">
													<label class="font-weight-semibold" for="phoneNumber">Name:</label>
													<input type="text" class="form-control" value="<?php echo $row["name"]; ?>" name="name" placeholder="Enter name">
												</div>
												<div class="form-group col-md-8">
													<label class="font-weight-semibold" for="fullAddress">Full Address:</label>
													<input type="text" class="form-control" value="<?php echo $row["address"]; ?>" name="address" placeholder="Full Address">
												</div>
											</div>
											<center>
												<button class="btn btn-primary" name="updateProfile" type="submit" style="margin-top: 30px; margin-bottom: 20px;">Update</button>
											</center>
										</form>
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