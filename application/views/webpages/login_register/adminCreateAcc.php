<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
<head>
	<meta charset="utf-8">
	<title>Bedan Travel & Tours</title>
    <link rel="icon" href="<?php echo base_url('images/logo/url_logo.png'); ?>">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/adminStyle.css?<?php echo time(); ?>">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
	<!-- Popper JS -->
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
</head>
<body>
<div class="wrapper">

    <div class="navbar-left">
        <nav>
            <div class="logo-container">
                <img id="logo" src="http://localhost/GitHub/travelagency/images/logo/Logo_final.png" alt="">
            </div>

            <div class="NavPic-container">
                <img src="https://cdn-icons-png.flaticon.com/512/3177/3177440.png" alt="">
            </div>

            <div class="adminName-container">
            <h4><?php echo $this->session->userdata('lname');?>, <?php echo $this->session->userdata('fname');?> <?php echo $this->session->userdata('minitial'); ?></h4>
            </div>

            <div class="sidebar">
                <ul>
                    <li><a href="http://localhost/GitHub/travelagency/index.php/AdminController/showAdminDashboard">
                        <img src="http://localhost/GitHub/travelagency/images/icons/dashboard.png" alt="Dashboard-icon"><span>Dashboard</span></a></li>

                    <li><a href="http://localhost/GitHub/travelagency/index.php/AdminController/showUserAccounts">
                        <img src="http://localhost/GitHub/travelagency/images/icons/userAccounts.png" alt="User-Accounts-icons"><span>User Accounts</span></a></li>

                    <li><a href="http://localhost/GitHub/travelagency/index.php/AdminController/showTourPackages">
                        <img src="http://localhost/GitHub/travelagency/images/icons/tourPackages.png" alt="Tour-Packages-icon"><span>Tour Packages</span></a></li>

                    <li><a href="http://localhost/GitHub/travelagency/index.php/AdminController/showAdminBookings">
                        <img src="http://localhost/GitHub/travelagency/images/icons/bookings.png" alt="Bookings-icon"><span>Bookings</span></a></li>

                    <li><a href="http://localhost/GitHub/travelagency/index.php/AdminController/showAdminArchives">
                        <img src="http://localhost/GitHub/travelagency/images/icons/archives.png" alt="Archives-icon"><span>Archives</span></a></li>

                    <li><a href="http://localhost/GitHub/travelagency/index.php/AdminController/showTransactions">
                        <img src="http://localhost/GitHub/travelagency/images/icons/transactions.png" alt="Transactions-icon"></span>Transactions</span></a></li>

                    <li><a href="http://localhost/GitHub/travelagency/index.php/AdminController/showAdminReviews">
                        <img src="http://localhost/GitHub/travelagency/images/icons/reviews.png" alt="Reviews-icon"><span>Reviews</span></a></li>

                    <li><a href="http://localhost/GitHub/travelagency/index.php/AdminController/showAdminCreateAcc">
                        <img src="http://localhost/GitHub/travelagency/images/icons/add-user.png" alt="Add-AdminAcc-icon"><span>Add Admin</span></li></a>

                    <li><a href="http://localhost/GitHub/travelagency/index.php/Account/LogOut">
                        <img src="http://localhost/GitHub/travelagency/images/icons/logout.png" alt="LogOut-icon"><span>Log Out</span></li></a>
                </ul>
            </div>
        </nav>
    </div>
    <div class="main-content">

        <div id="form-container">
            <h2>Create Admin Account</h2>
            <hr id="line">
            <form method="post" action="http://localhost/GitHub/travelagency/index.php/Account/createAdminAcc">
                <div class="input-container">

                    <div class="form-group">
                        <label for="fname">Username:</label>
                        <input type="text" class="form-control" name="fname" id="fname" placeholder="Enter first name" onclick="" required>
                    </div>

                    <div class="form-group">
                        <label for="minitial">Middle Initial:</label>
                        <input type="text" class="form-control" name="minitial" id="minitial" placeholder="Enter middle initial" onclick="" required>
                    </div>

                    <div class="form-group">
                        <label for="lname">Last Name:</label>
                        <input type="text" class="form-control" name="lname" id="lname" placeholder="Enter last name" onclick="" required>
                    </div>

                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="Enter username" onclick="" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" onclick="" required>
                    </div>

                    <div id="form-group">
                        <label for="pass">Password:</label>
                        <input type="password" class="form-control" name="pass" id="pass" placeholder="Enter password" onclick="" required>
                    </div>
                    <br>
                    
                    <!-- <div class="form-group">
                        <label for="profile_pic">Profile Picture:</label>
                        <input type="file" class="form-control" name="profile_pic" id="profile_pic" accept="image/*" required>
                    </div> -->
            
				    <button type="submit" class="btn btn-secondary" id="add-itinerary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
