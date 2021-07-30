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
	if(isset($_POST['addCat']))
	{
		require('db.php');
		$catName = $_POST['catName'];
		$catDescription = $_POST['catDescription'];
		$image = $_FILES['catImage']['name'];
		$target_dir = "images/Catagory/";
		$target_file = $target_dir . basename($_FILES["catImage"]["name"]);
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		if (move_uploaded_file($_FILES["catImage"]["tmp_name"], $target_file)) {
			
		} else {
      //  echo "Sorry, there was an error uploading your file.";
		}
		$imageName=basename($_FILES["catImage"]["name"]); 

		if ($catName != '' && $catDescription != '' && $imageName != '') {
			$sqlinsert = "INSERT INTO tbl_catagories(cat_description,cat_title,cat_image) 
			VALUES('$catDescription','$catName','$imageName')";
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
	if(isset($_POST['updateCat']))
	{
		require('db.php');
		$id = $_POST['txtCatIDUpdate'];
		$catName = $_POST['catName'];
		$catDescription = $_POST['catDescription'];
		$image = $_FILES['catImage']['name'];
		$target_dir = "images/Catagory/";
		$target_file = $target_dir . basename($_FILES["catImage"]["name"]);
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		if (move_uploaded_file($_FILES["catImage"]["tmp_name"], $target_file)) {
			
		}
		$imageName=basename($_FILES["catImage"]["name"]); 

		if ($catName != '' && $catDescription != '' && $imageName != '') {
			$sqlinsert = "UPDATE tbl_catagories SET cat_description ='$catDescription',cat_title = '$catName',cat_image = '$imageName' WHERE category_id = $id";
			if (mysqli_query($conn, $sqlinsert)) {
				?>
				<script type="text/javascript">
					swal("Great!", "Updated Successfully", "success")
				</script>
				<?php
			}
		}
		else if ($imageName == '') {
			$sqlinsert = "UPDATE tbl_catagories SET cat_description ='$catDescription', cat_title = '$catName' WHERE category_id = $id";
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
	if(isset($_POST['deleteCat']))
	{
		require('db.php');
		$id = $_POST['deleteCat'];
		$pid = $_POST['deleteProduct'];
		$sql = "DELETE FROM tbl_catagories WHERE category_id = '$id'" ;
		$sql2 = "DELETE FROM tbl_products WHERE category_id = '$id'" ;
		$sql3 = "DELETE FROM tbl_pimages WHERE p_id = '$id'" ;
		mysqli_query($conn, $sql3);
		$retval = mysqli_query($conn, $sql);          
		$retval = mysqli_query($conn, $sql2);          
		if(! $retval ) {
			?>
			<script language="javascript">
				swal("OOPS!", "Category Not Deleted. try again!", "error")
			</script>
			<?php
		}
		else{
			?>
			<script language="javascript">
				swal("Good job!", "Category Deleted Successfully!", "success")
			</script>
			<?php
		}
	}
	?>
	<?php
	if(isset($_POST['addProduct']))
	{
		require('db.php');
		$pName = $_POST['pName'];
		$pDescription = $_POST['pDescription'];
		$pCatID = $_POST['pCatID'];
		$pPrice = $_POST['pPrice'];
		$pQuantity = $_POST['pQuantity'];


		$image = $_FILES['pImage1']['name'];
		$target_dir = "images/Products/";
		$target_file = $target_dir . basename($_FILES["pImage1"]["name"]);
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		if (move_uploaded_file($_FILES["pImage1"]["tmp_name"], $target_file)) {
			
		} else {
      //  echo "Sorry, there was an error uploading your file.";
		}
		$imageName=basename($_FILES["pImage1"]["name"]); 

		$target_file2 = $target_dir . basename($_FILES["pImage2"]["name"]);
		$imageFileType2 = pathinfo($target_file2,PATHINFO_EXTENSION);
		if (move_uploaded_file($_FILES["pImage2"]["tmp_name"], $target_file2)) {
			
		} else {
      //  echo "Sorry, there was an error uploading your file.";
		}
		$imageName2=basename($_FILES["pImage2"]["name"]);

		$target_file3 = $target_dir . basename($_FILES["pImage3"]["name"]);
		$imageFileType3 = pathinfo($target_file3,PATHINFO_EXTENSION);
		if (move_uploaded_file($_FILES["pImage3"]["tmp_name"], $target_file3)) {
			
		} else {
      //  echo "Sorry, there was an error uploading your file.";
		}
		$imageName3=basename($_FILES["pImage3"]["name"]);

		$target_file4 = $target_dir . basename($_FILES["pImage4"]["name"]);
		$imageFileType4 = pathinfo($target_file4,PATHINFO_EXTENSION);
		if (move_uploaded_file($_FILES["pImage4"]["tmp_name"], $target_file4)) {
			
		} else {
      //  echo "Sorry, there was an error uploading your file.";
		}
		$imageName4=basename($_FILES["pImage4"]["name"]); 

		if ($pName != '' && $pDescription!=''&& $pCatID!=0 && $pPrice!=''&& $pQuantity!='' && $imageName != ''&& $imageName2 != ''&& $imageName3 != ''&& $imageName4 != '') {
			$sqlinsert = "INSERT INTO tbl_products(p_title,p_description,category_id,p_price,p_image,p_quantity) 
			VALUES('$pName','$pDescription','$pCatID','$pPrice','$imageName','$pQuantity')";
			
			//sleep(3);
			if (mysqli_query($conn, $sqlinsert)) {
				$last_id = mysqli_insert_id($conn);

				$sqlinsertimg = "INSERT INTO tbl_pimages(image1,image2,image3,p_id) 
				VALUES('$imageName2','$imageName3','$imageName4','$last_id')";
				mysqli_query($conn, $sqlinsertimg);
				?>
				<script type="text/javascript">
					swal("Good job!", "Product added Successfully!", "success")
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
	if(isset($_POST['updateProduct']))
	{
		require('db.php');
		$id = $_POST['txtPIDUpdate'];
		$idImage = $_POST['txtImageIDUpdate'];
		$pName = $_POST['pName'];
		$pDescription = $_POST['pDescription'];
		$pCatID = $_POST['pCatID'];
		$pPrice = $_POST['pPrice'];
		$pQuantity = $_POST['pQuantity'];

		$image = $_FILES['pImage1']['name'];
		$target_dir = "images/Products/";
		$target_file = $target_dir . basename($_FILES["pImage1"]["name"]);
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		if (move_uploaded_file($_FILES["pImage1"]["tmp_name"], $target_file)) {
			
		} else {
      //  echo "Sorry, there was an error uploading your file.";
		}
		$imageName=basename($_FILES["pImage1"]["name"]); 

		$target_file2 = $target_dir . basename($_FILES["pImage2"]["name"]);
		$imageFileType2 = pathinfo($target_file2,PATHINFO_EXTENSION);
		if (move_uploaded_file($_FILES["pImage2"]["tmp_name"], $target_file2)) {
			
		} else {
      //  echo "Sorry, there was an error uploading your file.";
		}
		$imageName2=basename($_FILES["pImage2"]["name"]);

		$target_file3 = $target_dir . basename($_FILES["pImage3"]["name"]);
		$imageFileType3 = pathinfo($target_file3,PATHINFO_EXTENSION);
		if (move_uploaded_file($_FILES["pImage3"]["tmp_name"], $target_file3)) {
			
		} else {
      //  echo "Sorry, there was an error uploading your file.";
		}
		$imageName3=basename($_FILES["pImage3"]["name"]);

		$target_file4 = $target_dir . basename($_FILES["pImage4"]["name"]);
		$imageFileType4 = pathinfo($target_file4,PATHINFO_EXTENSION);
		if (move_uploaded_file($_FILES["pImage4"]["tmp_name"], $target_file4)) {
			
		} else {
      //  echo "Sorry, there was an error uploading your file.";
		}
		$imageName4=basename($_FILES["pImage4"]["name"]); 

		if ($pName != '' && $pDescription!=''&& $pCatID!=0 && $pPrice!=''&& $pQuantity!='' && $imageName != ''&& $imageName2 != ''&& $imageName3 != ''&& $imageName4 != '') {

			$sqlUpdate = "UPDATE tbl_products SET p_title= '$pName',p_description = '$pDescription',category_id = '$pCatID',p_price = '$pPrice',p_image = '$imageName' ,p_quantity = '$pQuantity' WHERE p_id = $id";	
			if (mysqli_query($conn, $sqlUpdate)) {

				$sqlUpdateimg = "UPDATE tbl_pimages SET image1 = '$imageName2',image2 = '$imageName3',image3 = '$imageName4',p_id = $id WHERE image_id = $idImage";
				mysqli_query($conn, $sqlUpdateimg);
				?>
				<script type="text/javascript">
					swal("Good job!", "Product Updated Successfully!", "success")
				</script>
				<?php

			}
		}
		else if ($imageName == ''&& $imageName2 == ''&& $imageName3 == ''&& $imageName4 == '') {
			$sqlUpdate = "UPDATE tbl_products SET p_title= '$pName',p_description = '$pDescription',category_id = '$pCatID',p_price = '$pPrice',p_quantity = '$pQuantity' WHERE p_id = $id";
			if (mysqli_query($conn, $sqlUpdate)) {
?>
				<script type="text/javascript">
					swal("Good job!", "Product Updated Successfully!", "success")
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
	if(isset($_POST['deleteProduct']))
	{
		require('db.php');
		$id = $_POST['deleteProduct'];
		$sql = "DELETE FROM tbl_products WHERE p_id = '$id'" ;
		$retval = mysqli_query($conn, $sql);

		$sql2 = "DELETE FROM tbl_pimages WHERE p_id = '$id'" ;
		mysqli_query($conn, $sql2);      

		if(! $retval ) {
			?>
			<script language="javascript">
				swal("OOPS!", "Product Not Deleted. try again!", "error")
			</script>
			<?php
		}
		else{
			?>
			<script language="javascript">
				swal("Good job!", "Product Deleted Successfully!", "success")
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
						
						<li style="background-color: #E2EDFE">
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
						<div class="col-lg-4">
							<div class="card" style="height: 450px;">
								<div class="card-body">
									<div class="d-flex justify-content-between align-items-center">
										<h5>Add Categories</h5>
									</div>
									<div class="m-t-30">
										<form method="post" action="product.php" enctype="multipart/form-data">

											<?php 
											if (isset($_POST['btnUpdateCategory'])) {
												$id = $_POST['txtCatID'];
												$query=mysqli_query($conn,"SELECT * FROM tbl_catagories WHERE category_id = '$id'");
												$row = mysqli_fetch_array($query);?>
												<div class="form-group">
													<input type="hidden" name="txtCatIDUpdate" value="<?php echo $row["category_id"];?>">
													<label class="font-weight-semibold" for="productName">Category Name</label>
													<input type="text" class="form-control" value="<?php echo $row["cat_title"];?>" name="catName" placeholder="Category Name">
												</div>
												<div class="form-group">
													<label class="font-weight-semibold" for="productName">Category Description</label>
													<input type="text" class="form-control" value="<?php echo $row["cat_description"];?>" name="catDescription" placeholder="category Description" style="height: 80px;">
												</div>
												<div class="custom-file" style="margin-top: 10px;">
													<input type="file" class="custom-file-input" name="catImage">
													<label class="custom-file-label" for="customFile">Choose Image </label>
												</div>
												<center>
													<button class="btn btn-primary" name="updateCat" type="submit" style="margin-top: 30px;">Update</button>
												</center>
												<?php
											}
											else{?>
												<div class="form-group">
													<label class="font-weight-semibold" for="productName">Category Name</label>
													<input type="text" class="form-control" name="catName" placeholder="Category Name">
												</div>
												<div class="form-group">
													<label class="font-weight-semibold" for="productName">Category Description</label>
													<input type="text" class="form-control" name="catDescription" placeholder="category Description" style="height: 80px;">
												</div>
												<div class="custom-file" style="margin-top: 10px;">
													<input type="file" class="custom-file-input" name="catImage">
													<label class="custom-file-label" for="customFile">Choose Image </label>
												</div>
												<center>
													<button class="btn btn-primary" name="addCat" type="submit" style="margin-top: 30px;">Submit</button>
												</center>
												<?php
											}
											?>


											
										</div>
									</form>
								</div>
							</div>
						</div>
						<div class="col-lg-8">
							<div class="card scrollable"style="height: 450px;">
								<div class="card-body">
									<div class="d-flex justify-content-between align-items-center">
										<h5>Recent Categories</h5>
									</div>
									<div class="m-t-30">
										<div class="table-responsive">
											<table class="table table-hover">
												<thead>
													<tr>
														<th>ID</th>
														<th>Image</th>
														<th>Title</th>
														<th>Description</th>
														<th class="text-centre">Action</th>
													</tr>
												</thead>
												<tbody>
													<?php
													require 'db.php'; 
													$query=mysqli_query($conn,"SELECT * FROM tbl_catagories ORDER BY category_id DESC");
													while ($row = mysqli_fetch_array($query)) {
														?>
														<tr>
															<form action="" method="post" >
																<input type="hidden" name="txtCatID" value="<?php echo $row["category_id"];?>">
																<td><?php echo $row["category_id"];?></td>
																<td>
																	<div class="d-flex align-items-center">
																		<div class="d-flex align-items-center">
																			<img class="img-fluid rounded" src="<?php echo "images/Catagory/".$row["cat_image"]; ?>" style="width: 90px; height: 60px;" alt="">
																		</div>
																	</div>
																</td>
																<td><?php echo $row["cat_title"];?></td>
																<td><?php echo $row["cat_description"];?></td>
																<td class="text-centre">
																	<button class="btn btn-icon btn-hover btn-sm btn-rounded pull-right" value="<?php echo $row["category_id"];?>" name="btnUpdateCategory">
																		<i class="anticon anticon-edit"></i>
																	</button>
																	<button class="btn btn-icon btn-hover btn-sm btn-rounded" value="<?php echo $row["category_id"];?>" name="deleteCat">
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
					<div class="row">
						<div class="col-lg-12">
							<div class="card"style="">
								<div class="card-body">
									<div class="d-flex justify-content-between align-items-center">
										<h5>Add Products</h5>
									</div>
									<div class="m-t-30">
										<form method="post" action="product.php" enctype="multipart/form-data">
											<?php
											
											if (isset($_POST['btnEditProduct'])) {
												$id = $_POST['txtPId'];
												$queryx=mysqli_query($conn,"SELECT * FROM tbl_products WHERE p_id = $id");
												$rowProduct = mysqli_fetch_array($queryx);
												$queryImages=mysqli_query($conn,"SELECT * FROM tbl_pimages WHERE p_id = $id");
												$rowimg = mysqli_fetch_array($queryImages);?>
												<div class="row">
													<div class="col-lg-6">
														<input type="hidden" value="<?php echo $rowProduct["p_id"];?>" name="txtPIDUpdate">
														<input type="hidden" value="<?php echo $rowimg["image_id"];?>" name="txtImageIDUpdate">
														<div class="form-group">
															<label class="font-weight-semibold" for="productName">Product Name</label>
															<input type="text" class="form-control" value="<?php echo $rowProduct["p_title"];?>" name="pName" placeholder="Product Name">
														</div>
													</div>
													<div class="col-lg-6">
														<div class="form-group">
															<label class="font-weight-semibold" for="productName">Category ID</label>
															<select name="pCatID" class="form-control">
																<option selected><?php echo $rowProduct["category_id"];?></option>
																<option value="0">Please Select Category ID</option>
																<?php
																require 'db.php'; 
																$query=mysqli_query($conn,"SELECT * FROM tbl_catagories");
																while ($row = mysqli_fetch_array($query)) {
																	?>
																	<option><?php echo $row["category_id"]; ?></option>
																	<?php	
																}	
																?>
															</select>
														</div>
													</div>
												</div>
												<div class="form-group">
													<label class="font-weight-semibold" for="productName">Product Description</label>
													<input type="text" class="form-control" value="<?php echo $rowProduct["p_description"];?>" name="pDescription" placeholder="Product Description">
												</div>
												<div class="row">
													<div class="col-lg-6">
														<div class="form-group">
															<label class="font-weight-semibold" for="productName">Product Quantity</label>
															<input type="text" class="form-control" value="<?php echo $rowProduct["p_quantity"];?>" name="pQuantity" placeholder="Product Quantity">
														</div>
													</div>
													<div class="col-lg-6">
														<div class="form-group">
															<label class="font-weight-semibold" for="productName">Price</label>
															<input type="text" class="form-control" value="<?php echo $rowProduct["p_price"];?>" name="pPrice" placeholder="Enter Product Price">
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-lg-6">
														<div class="form-group">
															<label class="font-weight-semibold" for="productName">Choose 1st Image</label>
															<div class="custom-file">
																<input type="file" class="custom-file-input" name="pImage1">
																<label class="custom-file-label" for="customFile">Choose Image</label>
															</div>
														</div>
													</div>
													<div class="col-lg-6">
														<div class="form-group">
															<label class="font-weight-semibold" for="productName">Choose 2nd Image</label>
															<div class="custom-file">
																<input type="file" class="custom-file-input" name="pImage2">
																<label class="custom-file-label" for="customFile">Choose Image</label>
															</div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-lg-6">
														<div class="form-group">
															<label class="font-weight-semibold" for="productName">Choose 3rd Image</label>
															<div class="custom-file">
																<input type="file" class="custom-file-input" name="pImage3">
																<label class="custom-file-label" for="customFile">Choose Image</label>
															</div>
														</div>
													</div>
													<div class="col-lg-6">
														<div class="form-group">
															<label class="font-weight-semibold" for="productName">Choose 4th Image</label>
															<div class="custom-file">
																<input type="file" class="custom-file-input" name="pImage4">
																<label class="custom-file-label" for="customFile">Choose Image</label>
															</div>
														</div>
													</div>
												</div>
												<center>
													<button class="btn btn-primary" name="updateProduct" type="submit" style="margin-top: 30px; margin-bottom: 10px;">Update</button>
												</center>
												<?php
											}
											else {?>
												<div class="row">
													<div class="col-lg-6">

														<div class="form-group">
															<label class="font-weight-semibold" for="productName">Product Name</label>
															<input type="text" class="form-control" name="pName" placeholder="Product Name">
														</div>
													</div>
													<div class="col-lg-6">
														<div class="form-group">
															<label class="font-weight-semibold" for="productName">Category ID</label>
															<select name="pCatID" class="form-control">
																<option value="0">Please Select Category ID</option>
																<?php
																require 'db.php'; 
																$query=mysqli_query($conn,"SELECT * FROM tbl_catagories");
																while ($row = mysqli_fetch_array($query)) {
																	?>
																	<option><?php echo $row["category_id"]; ?></option>
																	<?php	
																}	
																?>
															</select>
														</div>
													</div>
												</div>
												<div class="form-group">
													<label class="font-weight-semibold" for="productName">Product Description</label>
													<input type="text" class="form-control" name="pDescription" placeholder="Product Description">
												</div>
												<div class="row">
													<div class="col-lg-6">
														<div class="form-group">
															<label class="font-weight-semibold" for="productName">Product Quantity</label>
															<input type="text" class="form-control" name="pQuantity" placeholder="Product Quantity">
														</div>
													</div>
													<div class="col-lg-6">
														<div class="form-group">
															<label class="font-weight-semibold" for="productName">Price</label>
															<input type="text" class="form-control" name="pPrice" placeholder="Enter Product Price">
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-lg-6">
														<div class="form-group">
															<label class="font-weight-semibold" for="productName">Choose 1st Image</label>
															<div class="custom-file">
																<input type="file" class="custom-file-input" name="pImage1">
																<label class="custom-file-label" for="customFile">Choose Image</label>
															</div>
														</div>
													</div>
													<div class="col-lg-6">
														<div class="form-group">
															<label class="font-weight-semibold" for="productName">Choose 2nd Image</label>
															<div class="custom-file">
																<input type="file" class="custom-file-input" name="pImage2">
																<label class="custom-file-label" for="customFile">Choose Image</label>
															</div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-lg-6">
														<div class="form-group">
															<label class="font-weight-semibold" for="productName">Choose 3rd Image</label>
															<div class="custom-file">
																<input type="file" class="custom-file-input" name="pImage3">
																<label class="custom-file-label" for="customFile">Choose Image</label>
															</div>
														</div>
													</div>
													<div class="col-lg-6">
														<div class="form-group">
															<label class="font-weight-semibold" for="productName">Choose 4th Image</label>
															<div class="custom-file">
																<input type="file" class="custom-file-input" name="pImage4">
																<label class="custom-file-label" for="customFile">Choose Image</label>
															</div>
														</div>
													</div>
												</div>
												<center>
													<button class="btn btn-primary" name="addProduct" type="submit" style="margin-top: 30px; margin-bottom: 10px;">Submit</button>
												</center>
												<?php
											}
											?>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					<div class="row">		
						<div class="col-lg-12">
							<div class="card scrollable"style="height: 600px;">
								<div class="card-body">
									<div class="d-flex justify-content-between align-items-center">
										<h5>All Products</h5>
									</div>
									<div class="m-t-30">
										<div class="table-responsive">
											<table class="table table-hover">
												<thead>
													<tr>
														<th>ID</th>
														<th>Image</th>
														<th>Title</th>
														<th>Description</th>
														<th>Category ID</th>
														<th>Price</th>
														<th>Sales</th>
														<th>Quantity</th>
														<th class="text-centre">Action</th>
													</tr>
												</thead>
												<tbody>
													<?php
													require 'db.php'; 
													$query=mysqli_query($conn,"SELECT * FROM tbl_products ORDER BY p_id DESC");
													while ($row = mysqli_fetch_array($query)) {
														?>
														<tr>
															<form action="" method="post" >
																<input type="hidden" name="txtPId" value="<?php echo $row["p_id"];?>">
																<td><?php echo $row["p_id"];?></td>
																<td>
																	<div class="d-flex align-items-center">
																		<div class="d-flex align-items-center">
																			<img class="img-fluid rounded" src="<?php echo "images/Products/".$row["p_image"]; ?>" style="width: 90px; height: 60px;" alt="">
																		</div>
																	</div>
																</td>
																<td><?php echo $row["p_title"];?></td>
																<td><?php echo $row["p_description"];?></td>
																<td><?php echo $row["category_id"];?></td>
																<td><?php echo $row["p_price"];?></td>
																<td><?php echo $row["p_sale"];?></td>
																<td><?php echo $row["p_quantity"];?></td>
																<td class="text-centre">
																	<button class="btn btn-icon btn-hover btn-sm btn-rounded pull-right" value="<?php echo $row["p_id"];?>" name="btnEditProduct">
																		<i class="anticon anticon-edit"></i>
																	</button>
																	<button class="btn btn-icon btn-hover btn-sm btn-rounded" value="<?php echo $row["p_id"];?>" name="deleteProduct">
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
					<div class="row">		
						<div class="col-lg-12">
							<div class="card scrollable"style="height: 600px;">
								<div class="card-body">
									<div class="d-flex justify-content-between align-items-center">
										<h5>Products Images</h5>
									</div>
									<div class="m-t-30">
										<div class="table-responsive">
											<table class="table table-hover">
												<thead>
													<tr>

														<th>Product ID</th>
														<th>Image 1</th>
														<th>Image 2</th>
														<th>Image 3</th>														
													</tr>
												</thead>
												<tbody>
													<?php
													require 'db.php'; 
													$query=mysqli_query($conn,"SELECT * FROM tbl_pimages ORDER BY image_id DESC");
													while ($row = mysqli_fetch_array($query)) {
														?>
														<tr>
															<!-- <form action="" method="post" > -->
																<input type="hidden" value="<?php echo $row["image_id"];?>" name="txtImageId">
																<td><?php echo $row["p_id"];?></td>
																<td>
																	<div class="d-flex align-items-center">
																		<div class="d-flex align-items-center">
																			<img class="img-fluid rounded" src="<?php echo "images/Products/".$row["image1"]; ?>" style="width: 110px; height: 80px;" alt="">
																		</div>
																	</div>
																</td>
																<td>
																	<div class="d-flex align-items-center">
																		<div class="d-flex align-items-center">
																			<img class="img-fluid rounded" src="<?php echo "images/Products/".$row["image2"]; ?>" style="width: 110px; height: 80px;" alt="">
																		</div>
																	</div>
																</td>
																<td>
																	<div class="d-flex align-items-center">
																		<div class="d-flex align-items-center">
																			<img class="img-fluid rounded" src="<?php echo "images/Products/".$row["image3"]; ?>" style="width: 110px; height: 80px;" alt="">
																		</div>
																	</div>
																</td>																
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