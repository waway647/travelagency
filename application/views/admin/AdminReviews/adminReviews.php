<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Bedan Travel & Tours</title>
    <link rel="icon" href="<?php echo base_url('images/logo/url_logo.png'); ?>">
	<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/adminStyle.css?<?php echo time(); ?>"> 
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
                <h4>Admin</h4>
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

                    <li><a href="http://localhost/GitHub/travelagency/index.php/Account/showAdminCreateAcc">
                        <img src="http://localhost/GitHub/travelagency/images/icons/add-user.png" alt="Add-AdminAcc-icon"><span>Add Admin</span></li></a>

                    <li><a href="http://localhost/GitHub/travelagency/index.php/Account/LogOut">
                        <img src="http://localhost/GitHub/travelagency/images/icons/logout.png" alt="LogOut-icon"><span>Log Out</span></li></a>
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
                    <a href="notif.html"><img src="http://localhost/GitHub/travelagency/images/icons/notification.png" alt=""></a>
                </div>
        </div>
    </div>
</div>

</body>
</html>
