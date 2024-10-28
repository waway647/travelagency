<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/adminStyle.css?<?php echo time(); ?>"> 

	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css?<?php echo time(); ?>">

<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
	
</head>
<body>

<div class="wrapper">
	<div class="navbar-left">
			<nav>
				<div class="logo-container">
					<img id="logo" src="http://localhost/travelagency_ci/images/logo/web_logo.png" alt="">
				</div>

				<div class="NavPic-container">
					<img src="https://cdn-icons-png.flaticon.com/512/3177/3177440.png" alt="">
				</div>

				<div class="adminName-container">
					<h4>Admin</h4>
				</div>

				<div class="sidebar">
					<ul>
						<li><a href="http://localhost/travelagency_ci/index.php/AdminController/showAdminDashboard">
							<img src="http://localhost/travelagency_ci/images/icons/dashboard.png" alt="Dashboard-icon"><span>Dashboard</span></a></li>

						<li><a href="http://localhost/travelagency_ci/index.php/AdminController/showUserAccounts">
							<img src="http://localhost/travelagency_ci/images/icons/userAccounts.png" alt="User-Accounts-icons"><span>User Accounts</span></a></li>

						<li><a href="http://localhost/travelagency_ci/index.php/AdminController/showTourPackages">
							<img src="http://localhost/travelagency_ci/images/icons/tourPackages.png" alt="Tour-Packages-icon"><span>Tour Packages</span></a></li>

						<li><a href="http://localhost/travelagency_ci/index.php/AdminController/showAdminBookings">
							<img src="http://localhost/travelagency_ci/images/icons/bookings.png" alt="Bookings-icon"><span>Bookings</span></a></li>

						<li><a href="http://localhost/travelagency_ci/index.php/AdminController/showAdminArchives">
							<img src="http://localhost/travelagency_ci/images/icons/archives.png" alt="Archives-icon"><span>Archives</span></a></li>

						<li><a href="http://localhost/travelagency_ci/index.php/AdminController/showTransactions">
							<img src="http://localhost/travelagency_ci/images/icons/transactions.png" alt="Transactions-icon"></span>Transactions</span></a></li>

						<li><a href="http://localhost/travelagency_ci/index.php/AdminController/showAdminReviews">
							<img src="http://localhost/travelagency_ci/images/icons/reviews.png" alt="Reviews-icon"><span>Reviews</span></a></li>

						<li><a href="http://localhost/travelagency_ci/index.php/Account/LogOut">
							<img src="http://localhost/travelagency_ci/images/icons/logout.png" alt="LogOut-icon"><span>Log Out</span></li></a>
					</ul>
				</div>
			</nav>
		</div>

	<div class="main-content">
		<div id="container">			
				<form method="post" action="<?php echo base_url('index.php/AdminController/updateUserAccount/' . $editUser['id']); ?>">
				<div class="form-group">
					<h4>Edit User ID: <?php echo $editUser['id'] ?></h4>
					<label for="asset_acquired">Date (Created):</label>
					<p style="font-size: 17px;"><?php echo $editUser['created_at']; ?></p>
				</div>
			<div class="form-group">
				<label for="username">Username:</label>
				<input type="text" class="form-control" placeholder="Enter username" id="username" name="username" value="<?php echo $editUser['username']; ?>">
			</div>
			<!-- <br>
			<div class="form-group">
				<label for="pass">Password:</label>
				<input type="text" class="form-control" placeholder="Enter password" id="pass" name="pass" value="<php echo $editUser->pass; ?>">
			</div> -->
				<div class="form-group">
				<label for="firstName">First Name:</label>
				<input type="text" class="form-control" placeholder="Enter first name" id="firstName" name="firstName" value="<?php echo $editUser['firstName']; ?>">
			</div>
			<div class="form-group">
				<label for="midInitial">Middle Initial:</label>
				<input type="text" class="form-control" placeholder="Enter middle initial" id="midInitial" name="midInitial" value="<?php echo $editUser['midInitial']; ?>">
			</div>
			<div class="form-group">
				<label for="lastName">Last Name:</label>
				<input type="text" class="form-control" placeholder="Enter last name" id="lastName" name="lastName" value="<?php echo $editUser['lastName']; ?>">
			</div>
			<div class="form-group">
				<label for="email">Email:</label>
				<input type="text" class="form-control" placeholder="Enter email" id="email" name="email" value="<?php echo $editUser['email']; ?>">
			</div>
			<div class="form-group">
				<label for="mobileNum">Mobile Number:</label>
				<input type="text" class="form-control" placeholder="Enter mobile number" id="mobileNum" name="mobileNum" value="<?php echo $editUser['mobileNum']; ?>">
			</div>
			<div class="form-group">
				<label for="bday">Birthday:</label>
				<input type="text" class="form-control" placeholder="Enter birthday" id="bday" name="bday" value="<?php echo $editUser['bday']; ?>">
			</div>
			<div class="form-group">
				<label for="gender">Birthday:</label>
				<input type="text" class="form-control" placeholder="Enter gender" id="gender" name="gender" value="<?php echo $editUser['gender']; ?>">
			</div>
			<div class="form-group">
				<label for="nationality">Birthday:</label>
				<input type="text" class="form-control" placeholder="Enter nationality" id="nationality" name="nationality" value="<?php echo $editUser['nationality']; ?>">
			</div>
		
			<button type="submit" class="btn btn-primary">Submit</button>
			</form>

		</div>
	</div>
	
</div>



</body>
</html>
