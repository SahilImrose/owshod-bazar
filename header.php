<div class="header">
	<div class="logo logo-dark" >
		<a href="home.php" style="margin-top: 10px;">
			<img src="assets/images/logo/e-logo.png" style="height: 30px;" alt="Logo" >
			<h3 style="margin-top: 0px;">E Pharmacy</h3>
		</a>
	</div>
	<div class="logo logo-white">
		<a href="index.php">
			<img src="assets/images/logo/logo-white.png" alt="Logo">
			<img class="logo-fold" src="assets/images/logo/logo-fold-white.png" alt="Logo">
		</a>
	</div>
	<div class="nav-wrap">
		<ul class="nav-left">

		</ul>
		<ul class="nav-right">
			<?php
			$user_check = $_SESSION['username'];
			$ses_sql = mysqli_query($conn,"SELECT * FROM tbl_admin WHERE email = '$user_check' ");
			$row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
			?>
			<li class="dropdown dropdown-animated scale-left">
				
				<div class="pointer" data-toggle="dropdown">					
					<span class="badge badge-success badge-dot"></span>
					<div class="avatar avatar-image  m-h-10 m-r-15">
						<img src="<?php echo "images/admin/".$row["image"]; ?>"  alt="">
					</div>
				</div>
				<div class="p-b-15 p-t-20 dropdown-menu pop-profile">
					<div class="p-h-20 p-b-15 m-b-10 border-bottom">										
						<div class="d-flex m-r-50">
							<div class="avatar avatar-lg avatar-image">
								<img style="max-height: 50px;" src="<?php echo "images/admin/".$row["image"]; ?>" alt="">
							</div>
							<div class="m-l-10" >
								<p class="m-b-0 text-dark font-weight-semibold"> <?php echo $row["name"]; ?></p>
								<span class="badge badge-success badge-dot m-r-10"></span>
								<span class="badge badge-pill badge-blue font-size-12">
									<span class="font-weight-semibold m-l-5">Active</span>
								</div>
							</div>
						</div>
						<a href="edit_profile.php" class="dropdown-item d-block p-h-15 p-v-10">
							<div class="d-flex align-items-center justify-content-between">
								<div>
									<i class="anticon anticon-user"></i>
									<span class="m-l-10">Edit Profile</span>
								</div>
								<i class="anticon font-size-10 anticon-right"></i>
							</div>
						</a>
						<a href="add_user.php" class="dropdown-item d-block p-h-15 p-v-10">
							<div class="d-flex align-items-center justify-content-between">
								<div>
									<i class="anticon anticon-plus-circle"></i>
									<span class="m-l-10">Add User</span>
								</div>
								<i class="anticon font-size-10 anticon-right"></i>
							</div>
						</a>
						<a href="logout.php" class="dropdown-item d-block p-h-15 p-v-10">
							<div class="d-flex align-items-center justify-content-between">
								<div>
									<i class="anticon  anticon-logout"></i>
									<span class="m-l-10">Logout</span>
								</div>
								<i class="anticon font-size-10 anticon-right"></i>
							</div>
						</a>
					</div>
				</li>
				<li>

				</li>
			</ul>
		</div>
	</div>  
	
