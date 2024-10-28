<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
    <link rel="icon" href="<?php echo base_url('images/logo/Logo_final.png'); ?>">
	<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/adminStyle.css?<?php echo time(); ?>"> 
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
                <li><a href="http://localhost/travelagency_ci/index.php/AdminController/showAdminDashboard">Dashboard</a></li>
                <li><a href="http://localhost/travelagency_ci/index.php/AdminController/showUserAccounts">User Accounts</a></li>
                <li><a href="http://localhost/travelagency_ci/index.php/AdminController/showTourPackages">Tour Packages</a></li>
                <li><a href="http://localhost/travelagency_ci/index.php/AdminController/showAdminBookings">Bookings</a></li>
                <li><a href="http://localhost/travelagency_ci/index.php/AdminController/showAdminArchives">Archives</a></li>
                <li><a href="http://localhost/travelagency_ci/index.php/AdminController/showTransactions">Transactions</a></li>
                <li><a href="http://localhost/travelagency_ci/index.php/AdminController/showAdminReviews">Reviews</a></li>
                <li><a href="http://localhost/travelagency_ci/index.php/Account/LogOut">Log Out</li></a>
            </ul>
        </div>
        </nav>
    </div>
    <div class="main-content">
    <div class="top-bar">
            <h1>Reviews</h1>
            
                <div class="packageSearch">
                    <label for "search"></label>
                    <input type="text" 
                    onKeyUp="ajaxSearch(this.value)"
                    class="form-control" name="search" id="search" placeholder="Search Package">
                </div>
                <div class="notification-bell">
                    <a href="notif.html"><img src="http://localhost/travelagency_ci/images/icons/notification.png" alt=""></a>
                </div>
        </div>
    </div>
</div>

</body>
</html>
