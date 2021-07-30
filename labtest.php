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
	if(isset($_POST['addTest']))
	{
		require('db.php');
		$testName = $_POST['testName'];
		$testPrice = $_POST['testPrice'];
		$image = $_FILES['testImage']['name'];
		$target_dir = "images/LabTest/";
		$target_file = $target_dir . basename($_FILES["testImage"]["name"]);
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		if (move_uploaded_file($_FILES["testImage"]["tmp_name"], $target_file)) {
			
		} else {
      //  echo "Sorry, there was an error uploading your file.";
		}
		$imageName=basename($_FILES["testImage"]["name"]); 

		if ($testName != '' && $testPrice != '' && $imageName != '') {
			$sqlinsert = "INSERT INTO tbl_labtest(image,price,title) 
			VALUES('$imageName','$testPrice','$testName')";
			mysqli_query($conn, $sqlinsert);
		}
		else{
			?>
			<script type="text/javascript">
				swal("OOPS!", "Must Fill Fields", "error")
			</script>
			<?php
		}
	}?>

<?php
	if(isset($_POST['updateTest']))
	{
		$id = $_POST['txtTestID'];
		$testName = $_POST['testName'];
		$testPrice = $_POST['testPrice'];
		$image = $_FILES['testImage']['name'];
		$target_dir = "images/LabTest/";
		$target_file = $target_dir . basename($_FILES["testImage"]["name"]);
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		if (move_uploaded_file($_FILES["testImage"]["tmp_name"], $target_file)) {
			
		} else {
      //  echo "Sorry, there was an error uploading your file.";
		}
		$imageName=basename($_FILES["testImage"]["name"]); 

		if ($testName != '' && $testPrice != '' && $imageName != '') {
			$sqlinsert = "UPDATE tbl_labtest SET image = '$imageName',price = '$testPrice',title = '$testName' WHERE id = $id";
			if (mysqli_query($conn, $sqlinsert)) {
				?>
			<script type="text/javascript">
				swal("Great!", "Updated Successfully", "success")
			</script>
			<?php
			}
		}
		else if ($imageName == '') {
			$sqlinsert = "UPDATE tbl_labtest SET price = '$testPrice',title = '$testName' WHERE id = $id";
			if (mysqli_query($conn, $sqlinsert)) {
				?>
			<script type="text/javascript">
				swal("Great!", "Updated Successfully", "success")
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
	}?>


	<?php
	if(isset($_POST['deleteTest']))
	{
		require('db.php');
		$id = $_POST['deleteTest'];
		$sql = "DELETE FROM tbl_labtest WHERE id = '$id'" ;
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
						<li style="background-color: #E2EDFE">
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
				<div class="main-content"style="background-color: #f0f0f0">
					<div class="row">
						<div class="col-lg-6">
							<div class="card">
								<div class="card-body">
									<div class="d-flex justify-content-between align-items-center">
										<h5>Add Lab Test</h5>
									</div>
									<div class="m-t-30">
										<form method="post" action="labtest.php" enctype="multipart/form-data">
											<?php
											
											if(isset($_POST['btnEditTest']))
											{
												$id = $_POST['txtID'];
												$query=mysqli_query($conn,"SELECT * FROM tbl_labtest WHERE id = '$id'");
												$rowPlan = mysqli_fetch_array($query);?>
												<input type="hidden" value="<?php echo $rowPlan["id"];?>" name="txtTestID">
												<div class="form-group">
													<label class="font-weight-semibold" for="productName">Lab Test Name</label>
													<input type="text" class="form-control" name="testName" value="<?php echo $rowPlan["title"];?>" placeholder="Lab Test Name">
												</div>
												<div class="form-group">
													<label class="font-weight-semibold" for="productName">Lab Test Price</label>
													<input type="text" class="form-control" value="<?php echo $rowPlan["price"];?>" name="testPrice" placeholder="Lab Test Price">
												</div>
												<div class="custom-file" style="margin-top: 10px;">
													<input type="file" class="custom-file-input" value="<?php echo "images/LabTest/".$rowPlan["image"]; ?>" name="testImage" >
													<label class="custom-file-label"   for="customFile">Choose Image </label>
												</div>
												<center>
													<button class="btn btn-primary" type="submit" name="updateTest" style="margin-top: 30px;margin-bottom: 20px;">Update</button>
												</center>
											<?php	}

											else{?>
												<div class="form-group">
													<label class="font-weight-semibold" for="productName">Lab Test Name</label>
													<input type="text" class="form-control" name="testName" placeholder="Lab Test Name">
												</div>
												<div class="form-group">
													<label class="font-weight-semibold" for="productName">Lab Test Price</label>
													<input type="text" class="form-control" name="testPrice" placeholder="Lab Test Price">
												</div>
												<div class="custom-file" style="margin-top: 10px;">
													<input type="file" class="custom-file-input" name="testImage" >
													<label class="custom-file-label" for="customFile">Choose Image </label>
												</div>
												<center>
													<button class="btn btn-primary" type="submit" name="addTest" style="margin-top: 30px;margin-bottom: 20px;">Submit</button>
												</center>

												<?php
											}
											?>
										</form>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="card scrollable"style="height: 440px;">
								<div class="card-body">
									<div class="d-flex justify-content-between align-items-center">
										<h5>All Lab Test</h5>
									</div>
									<div class="m-t-30">
										<div class="table-responsive">
											<table class="table table-hover">
												<thead>
													<tr>
														<th>ID</th>
														<th>Image</th>
														<th>Title</th>
														<th>Price</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
													<?php
													require 'db.php'; 
													$query=mysqli_query($conn,"SELECT * FROM tbl_labtest ORDER BY id DESC");
													while ($row = mysqli_fetch_array($query)) {
														?>
														<tr>
															<form action="" method="post" >
																<input type="hidden" value="<?php echo $row["id"];?>" name="txtID">
																<td><?php echo $row["id"];?></td>
																<td>
																	<div class="d-flex align-items-center">
																		<div class="d-flex align-items-center">
																			<img class="img-fluid rounded" src="<?php echo "images/LabTest/".$row["image"]; ?>" style="width: 90px; height: 60px;" alt="">
																		</div>
																	</div>
																</td>
																<td><?php echo $row["title"];?></td>
																<td><?php echo $row["price"];?></td>
																<td class="text-centre">
																	<button class="btn btn-icon btn-hover btn-sm btn-rounded pull-right" type="submit" name="btnEditTest" value="<?php echo $row["id"];?>" >
																		<i class="anticon anticon-edit"></i>
																	</button>
																	<button class="btn btn-icon btn-hover btn-sm btn-rounded" name="deleteTest" value="<?php echo $row["id"];?>"  >
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