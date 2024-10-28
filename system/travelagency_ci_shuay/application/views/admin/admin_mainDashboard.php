<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
    <link rel="icon" href="<?php echo base_url('images/logo/Logo_final.png'); ?>">
	<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/style_adminv3.css?<?php echo time(); ?>"> 
</head>
<body>
<div class="wrapper">

    <div class="navbar-left">
        <nav>
            <div class="logo-container">
                <a href="http://localhost/travelagency_ci/index.php/Account/showAdminPage">
                <img id="logo" src="http://localhost/travelagency_ci/images/logo/web_logo.png" alt="">
                </a>
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
                <li><a href="http://localhost/travelagency_ci/index.php/Admin_controllers/Admin_tourpackage/show_tourPackageCRUD">Tour Packages</a></li>
                <li><a href="http://localhost/travelagency_ci/index.php/AdminController/showAdminBookings">Bookings</a></li>
                <li><a href="http://localhost/travelagency_ci/index.php/AdminController/showAdminArchives">Archives</a></li>
                <li><a href="http://localhost/travelagency_ci/index.php/AdminController/showTransactions">Transactions</a></li>
                <li><a href="http://localhost/travelagency_ci/index.php/AdminController/showAdminReviews">Reviews</a></li>
                <li><a href="http://localhost/travelagency_ci/index.php/Account/showLogOut">Log Out</li></a>
            </ul>
        </div>
        </nav>
    </div>
    <div class="main-content">
        <h1>Hello World!</h1>
    </div>
</div>

</body>
</html>
