
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>E-Pharmacy Dashboard</title>
	<!-- Favicon -->
	<link href="assets/vendors/select2/select2.css" rel="stylesheet">
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
	if(isset($_POST['submitted']))
	{
		require('db.php');
		$p_id = $_POST['p_id'];

		$image = $_FILES['p_image']['name'];
		$target_dir = "images/banners/";
		$target_file = $target_dir . basename($_FILES["p_image"]["name"]);
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		if (move_uploaded_file($_FILES["p_image"]["tmp_name"], $target_file)) {
			
		} else {
      //  echo "Sorry, there was an error uploading your file.";
		}
		$imageName=basename($_FILES["p_image"]["name"]); 
		if ($_POST['p_id'] != 0 && $imageName != '') {
			$sqlinsert = "INSERT INTO tbl_banner(image,p_id) 
			VALUES('$imageName','$p_id')";
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
	if(isset($_POST['delete']))
	{
		require('db.php');
		$id = $_POST['delete'];
		$sql = "DELETE FROM tbl_banner WHERE id = '$id'" ;
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
			swal("Good job!", "Banner Deleted Successfully!", "success")
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
						<li style="background-color: #E2EDFE">
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
						<li >
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
				<div class="main-content"style="background-color: #f0f0f0">
					
					<div class="row">
						<div class="col-lg-4">
							<div class="card" style="height: 450px;">
								<div class="card-body">
									<div class="d-flex justify-content-between align-items-center">
										<h5>Add Banners</h5>
									</div>
									<form method="post" action="banner.php" enctype="multipart/form-data">
										<div  class="select2">
											<select id="productId" name="p_id" style="margin-top: 80px;" class="form-control">
												<option value="0">Please Select Product ID</option>
												<?php
												require 'db.php'; 
												$query=mysqli_query($conn,"SELECT * FROM tbl_products");

												while ($row = mysqli_fetch_array($query)) {
													?>
													<option><?php echo $row["p_id"]; ?></option>
													<?php	
												}	
												?>
											</select>
										</div>
										<div class="custom-file" style="margin-top: 60px;">
											<input type="file" class="custom-file-input" name="p_image" id="selectImage">
											<label class="custom-file-label" for="customFile">Choose Image</label>
										</div>
										<center><button class="btn btn-primary" name="submitted" type="submit" onclick="validate();" style="margin-top: 80px;">Add Banner</button>
										</center>
									</div>
								</form>
							</div>
						</div>
						<div class="col-lg-8">
							<div class="card scrollable"style="height: 450px;">
								<div class="card-body">
									<div class="d-flex justify-content-between align-items-center">
										<h5>Recent Banners</h5>
									</div>
									<div class="m-t-30">
										<div class="table-responsive scrollable">
											<table class="table table-hover scrollable">
												<thead>
													<tr>
														<th>ID</th>
														<th>Image</th>
														<th>Product ID</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
													<?php
													require 'db.php'; 
													$query=mysqli_query($conn,"SELECT * FROM tbl_banner");
													while ($row = mysqli_fetch_array($query)) {
														?>
														<tr>
															<form action="" method="post" >
																<td><?php echo $row["id"]; ?></td>
																<td>

																	<div class="d-flex align-items-center">
																		<div class="d-flex align-items-center">
																			<img class="img-fluid rounded" src="<?php echo "images/banners/".$row["image"]; ?>" style="width: 90px; height: 60px;" alt="">
																		</div>
																	</div>															
																</td>
																<td><?php echo $row["p_id"]; ?></td>
																<td>
																	<button type="submit"  class="btn btn-icon btn-danger btn-rounded" style="width: 70px;" name="delete" value="<?php echo $row["id"]; ?>">
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

	<script src="assets/vendors/select2/select2.min.js"></script>
	<script type="text/javascript">

	</script>
</body>
</html>