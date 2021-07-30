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
	if(isset($_POST['insertCategory']))
	{
		require('db.php');
		//	$catId = "";
		$catTitle = $_POST['categoryDietPlanName'];

		if ($catTitle != '') {
			$sqlinsert = "INSERT INTO tbl_catagories_dietplans(title) 
			VALUES('$catTitle')";
			mysqli_query($conn, $sqlinsert);	
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

	<?php
	if(isset($_POST['btnUpdateCategory']))
	{
		require('db.php');
		//	$catId = "";
		$id = $_POST['txtID'];
		$catTitle = $_POST['categoryDietPlanName'];

		if ($catTitle != '') {
			$sqlinsert = "UPDATE tbl_catagories_dietplans SET title = '$catTitle'
			WHERE id = $id";
			if (mysqli_query($conn, $sqlinsert)) {
				?>
				<script type="text/javascript">
					swal("Great!", "Updated Successfully!", "success")
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

	<?php
	if(isset($_POST['btnUpdatePlan']))
	{
		require('db.php');
		$id = $_POST['txtPlanID'];
		$breakfast = $_POST['breakfast'];
		$afterBreakfast = $_POST['afterBreakfast'];
		$lunch = $_POST['lunch'];
		$dinner = $_POST['dinner'];
		$afterDinner = $_POST['afterDinner'];
		$diet_cat_id = $_POST['diet_cat_id'];
		

		if ($breakfast != '' && $afterBreakfast != '' && $lunch != '' && $dinner != '' && $afterDinner != '') {			
		
			$sqlupdate = "UPDATE tbl_dietplan_detail SET breakfast_time ='$breakfast',after_breakfast_time= '$afterBreakfast',lunch_time= '$lunch',dinner_time= '$dinner',afterdinner_time= '$afterDinner',diet_cat_id = $diet_cat_id WHERE id = $id ";
			if (mysqli_query($conn, $sqlupdate)) {
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



	}
	?>

	<?php
	if (isset($_POST['deleteDietCat'])) {
		require('db.php');
		$id = $_POST['deleteDietCat'];
		$sql = "DELETE FROM tbl_catagories_dietplans WHERE id = '$id'" ;
		$sql2 = "DELETE FROM tbl_dietplan_detail WHERE diet_cat_id = '$id'" ;
		$retval = mysqli_query($conn, $sql);          
		$retval2 = mysqli_query($conn, $sql2);          
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
	<?php 
	if (isset($_POST['addDietPlan'])) {
		require('db.php');
		//	$Id = "";
		$breakfast = $_POST['breakfast'];
		$afterBreakfast = $_POST['afterBreakfast'];
		$lunch = $_POST['lunch'];
		$dinner = $_POST['dinner'];
		$afterDinner = $_POST['afterDinner'];
		$diet_cat_id = $_POST['diet_cat_id'];
		

		if ($breakfast != '' && $afterBreakfast != '' && $lunch != '' && $dinner != '' && $afterDinner != '') {			
			$sqlinsert = "INSERT INTO tbl_dietplan_detail(breakfast_time,after_breakfast_time,lunch_time,dinner_time,afterdinner_time,diet_cat_id)
			VALUES('$breakfast','$afterBreakfast','$lunch','$dinner','$afterDinner','$diet_cat_id')";
			if (mysqli_query($conn, $sqlinsert)) {
					?>
			<script type="text/javascript">
				swal("Great!", "Diet Plan Added Successfully", "success")
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

	<?php
	if (isset($_POST['deleteDietPlan'])) {
		require('db.php');
		$id = $_POST['deleteDietPlan'];
		$sql2 = "DELETE FROM tbl_dietplan_detail WHERE id = '$id'" ;

		if(! mysqli_query($conn, $sql2)) {
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
						<li style="background-color: #E2EDFE">
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
						<div class="col-lg-6">
							<div class="card">
								<div class="card-body">
									<div class="d-flex justify-content-between align-items-center">
										<h5>Add Diet Plan Categories</h5>
									</div>
									<form method="post" action="dietplan.php">
										<div class="m-t-30">
											
											<?php
											require 'db.php'; 
											if(isset($_POST['updateCategory']))
											{
												$id = $_POST['txtID'];
												$query=mysqli_query($conn,"SELECT * FROM tbl_catagories_dietplans WHERE id = '$id'");
												$row = mysqli_fetch_array($query);?>

												<div class="form-group">
													<input type="hidden" name="txtID" value="<?php echo $row["id"]; ?>">
													<label class="font-weight-semibold" for="productName">Category Name</label>
													<input type="text" class="form-control" value="<?= $row['title'] ?>" id="catDietTitle" name="categoryDietPlanName" placeholder="Category Name">
												</div>
												<center>
													<button class="btn btn-primary" name="btnUpdateCategory" type="submit" style="margin-top: 30px;margin-bottom: 20px;">Update</button>
												</center>
											<?php	}

											else{?>
												<div class="form-group">
													<label class="font-weight-semibold" for="productName">Category Name</label>
													<input type="text" class="form-control" value="" id="catDietTitle" name="categoryDietPlanName" placeholder="Category Name">
												</div>

												<center>
													<button class="btn btn-primary" name="insertCategory" type="submit" style="margin-top: 30px;margin-bottom: 20px;">Submit</button>
												</center>

												<?php
											}
											?>

										</div>
									</form>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="card scrollable"style="height: 295px;">
								<div class="card-body">
									<div class="d-flex justify-content-between align-items-center">
										<h5>All Diet Plan Categories</h5>
									</div>
									<div class="m-t-30">
										<div class="table-responsive">
											<table id="tblDietCategory" class="table table-hover">
												<thead>
													<tr>
														<th>ID</th>
														<th>Title</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
													<?php
													require 'db.php'; 
													$query=mysqli_query($conn,"SELECT * FROM tbl_catagories_dietplans ORDER BY id DESC");
													while ($row = mysqli_fetch_array($query)) {
														?>
														<tr>
															<td><?php echo $row["id"]; ?></td>
															<td><?php echo $row["title"]; ?></td>
															<td class="text-centre">
																<form method="post">
																	<input type="hidden" name="txtID" value="<?php echo $row["id"]; ?>">
																	<button class="btn btn-icon btn-hover btn-sm btn-rounded pull-right" name="updateCategory" 
																	type="submit" style="float: left;" value="<?php echo $row["id"]; ?>">
																	<i class="anticon anticon-edit"></i>
																</button>
															</form>
															<form action="" method="post" >
																<button class="btn btn-icon btn-hover btn-sm btn-rounded" name="deleteDietCat" value=" <?php echo $row["id"]; ?>">
																	<i class="anticon anticon-delete"></i>
																</button>
															</form>
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
				<div class="row">
					<div class="col-lg-12">
						<div class="card"style="">
							<div class="card-body">
								<div class="d-flex justify-content-between align-items-center">
									<h5>Add Diet Plan Detail</h5>
								</div>
								<form method="post" action="dietplan.php">
									<div class="m-t-30" style="margin-left: 20px;">
										<div class="row">
											<div class="col-lg-4">
												<?php
												require 'db.php'; 
												if (isset($_POST['btnUpdateDietPlan'])) {
													$id = $_POST['txtIDPlan'];
													$query=mysqli_query($conn,"SELECT * FROM tbl_dietplan_detail WHERE id = '$id'");
													$rowx = mysqli_fetch_array($query);?>
													<div class="form-group">
													<input type="hidden" name="txtPlanID" value="<?php echo $rowx["id"]; ?>">													
														<label class="font-weight-semibold" for="productName">Diet Plan Category ID</label>
														<select id="inputState" name="diet_cat_id"  class="form-control">
															<option value="0">Choose Diet Plan Category ID</option>
															<option selected ><?php echo $rowx["diet_cat_id"]; ?></option>
															<?php															 
															$query=mysqli_query($conn,"SELECT * FROM tbl_catagories_dietplans");
															while ($row = mysqli_fetch_array($query)) {
																?>
																<option><?php echo $row["id"]; ?></option>
																<?php	
															}	
															?>
														</select>
													</div>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="font-weight-semibold" for="productName">Breakfast Detail</label>
											<input type="text" class="form-control" name="breakfast" placeholder="Breakfast Detail" value="<?= $rowx['breakfast_time'] ?>">
										</div>
										<div class="form-group">
											<label class="font-weight-semibold" for="productName">After Breakfast Detail</label>
											<input type="text" class="form-control" name="afterBreakfast" placeholder="After Breakfast Detail" value="<?php echo $rowx["after_breakfast_time"]; ?>">
										</div>
										<div class="form-group">
											<label class="font-weight-semibold" for="productName">Lunch Detail</label>
											<input type="text" class="form-control" name="lunch" placeholder="Lunch Detail" value="<?php echo $rowx["lunch_time"]; ?>">
										</div>
										<div class="form-group">
											<label class="font-weight-semibold" for="productName">Dinner Detail</label>
											<input type="text" class="form-control" name="dinner" placeholder="Dinner Detail" value="<?php echo $rowx["dinner_time"]; ?>">
										</div>
										<div class="form-group">
											<label class="font-weight-semibold" for="productName">After Dinner Detail</label>
											<input type="text" class="form-control" name="afterDinner" placeholder="After Dinner Detail" value="<?php echo $rowx["afterdinner_time"]; ?>">
										</div>
										<center>
											<button class="btn btn-primary" name="btnUpdatePlan" type="submit" style="margin-top: 30px; margin-bottom: 10px;"> Update </button>
										</center>
										<?php						
									}
									else{?>

										<div class="form-group">
											<label class="font-weight-semibold" for="productName">Diet Plan Category ID</label>
											<select id="inputState" name="diet_cat_id" class="form-control">
												<option selected value="0" >Choose Category ID</option>
												<?php
												require 'db.php'; 
												$query=mysqli_query($conn,"SELECT * FROM tbl_catagories_dietplans");
												while ($row = mysqli_fetch_array($query)) {
													?>
													<option><?php echo $row["id"]; ?></option>
													<?php	
												}	
												?>
											</select>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="font-weight-semibold" for="productName">Breakfast Detail</label>
								<input type="text" class="form-control" name="breakfast" placeholder="Breakfast Detail">
							</div>
							<div class="form-group">
								<label class="font-weight-semibold" for="productName">After Breakfast Detail</label>
								<input type="text" class="form-control" name="afterBreakfast" placeholder="After Breakfast Detail">
							</div>
							<div class="form-group">
								<label class="font-weight-semibold" for="productName">Lunch Detail</label>
								<input type="text" class="form-control" name="lunch" placeholder="Lunch Detail">
							</div>
							<div class="form-group">
								<label class="font-weight-semibold" for="productName">Dinner Detail</label>
								<input type="text" class="form-control" name="dinner" placeholder="Dinner Detail">
							</div>
							<div class="form-group">
								<label class="font-weight-semibold" for="productName">After Dinner Detail</label>
								<input type="text" class="form-control" name="afterDinner" placeholder="After Dinner Detail">
							</div>
							<center>
								<button class="btn btn-primary" name="addDietPlan" type="submit" style="margin-top: 30px; margin-bottom: 10px;"> Submit </button>
							</center>

							<?php
						}
						?>

					</div>
				</div>
			</div>
		</form>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="card"style="height: 450px;">
				<div class="card-body">
					<div class="d-flex justify-content-between align-items-center">
						<h5>Diet Plan Detail</h5>
					</div>
					<div class="m-t-30">
						<div class="table-responsive">
							<table id="tblDietDetail" class="table table-hover">
								<thead>
									<tr>
										<th>ID</th>
										<th>Cat.ID</th>
										<th>BreakFast</th>
										<th>After BreakFast</th>
										<th>Lunch</th>
										<th>Dinner</th>
										<th>After Dinner</th>
										<th class="text-centre">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									require 'db.php';
									$query=mysqli_query($conn,"SELECT * FROM tbl_dietplan_detail
										ORDER BY id DESC");
									while ($row = mysqli_fetch_array($query)) {
										?>
										<tr>
											<form action="" method="post">
												<td><?php echo $row["id"]; ?></td>
												<td><?php echo $row["diet_cat_id"]; ?></td>
												<td><?php echo $row["breakfast_time"]; ?></td>
												<td><?php echo $row["after_breakfast_time"]; ?></td>
												<td><?php echo $row["lunch_time"]; ?></td>
												<td><?php echo $row["dinner_time"]; ?></td>
												<td><?php echo $row["afterdinner_time"]; ?></td>
												<td class="text-centre">
													<input type="hidden" name="txtIDPlan" value="<?php echo $row["id"]; ?>">
													<button class="btn btn-icon btn-hover btn-sm btn-rounded pull-right" value="<?php echo $row["id"]; ?>" name="btnUpdateDietPlan">
														<i class="anticon anticon-edit"></i>
													</button>
													<button class="btn btn-icon btn-hover btn-sm btn-rounded" value="<?php echo $row["id"]; ?>" name="deleteDietPlan">
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

<!-- Core Vendors JS -->
<script src="assets/js/vendors.min.js"></script>

<!-- page js -->
<script src="assets/vendors/chartjs/Chart.min.js"></script>
<script src="assets/js/pages/dashboard-e-commerce.js"></script>

<!-- Core JS -->
<script src="assets/js/app.min.js"></script>
<script type="text/javascript">
	function update(valuex,i){

				/*var id = valuex;
				alert(id);
				*/
				var tbl = document.getElementById("tblDietCategory");
				alert(i)
					//alert(tbl.rows[1].cells[1].innerHTML)
				}


				/*<?php
				if (isset($_POST['updateCategory'])) {
					require('db.php');
					$id = $_POST['updateCategory'];
					$sql = "SELECT * FROM tbl_catagories_dietplans WHERE id = '$id'" ;
					$diet = mysqli_fetch_array($conn,$sql);
				}
				?>*/

				function getval(row) {
					document.getElementById("catDietTitle").value = row.cells[0].innerHTML;
						//document.getElementById("txtDsName").value = row.cells(1).innerHTML;

					}

				</script>

			</body>
			</html>