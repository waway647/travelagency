<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
    <link rel="icon" href="<?php echo base_url('images/logo/url_logo.png'); ?>">
	<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/adminStyle.css?<?php echo time(); ?>"> 
    <script>
        function ajaxSearch(str) {
            if (str == "") {
                location.reload();
                //alert("here");
                document.getElementById("newtable").innerHTML = '';
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("newtable").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "search.php?kw=" + encodeURIComponent(str), true);
                xmlhttp.send();
            }
        }
    </script>
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

                    <li><a href="http://localhost/GitHub/travelagency/index.php/Account/LogOut">
                        <img src="http://localhost/GitHub/travelagency/images/icons/logout.png" alt="LogOut-icon"><span>Log Out</span></li></a>
                </ul>
            </div>
        </nav>
    </div>
    <div class="main-content" id="main-content-adminDashboard">
        <div class="top-bar">
            <h1>Dashboard</h1>
            
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
        <div class="dashboard-content">
            <div class="dashboard-cards">
                <div class="card">
                    <div class="card-icon">
                        <img src="" alt="">
                    </div>
                    <div class="card-content">
                        <h2>Total Users</h2>
                        <h3>100</h3>
                        <a href="http://localhost/GitHub/travelagency/index.php/AdminController/showUserAccounts">View Details</a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-icon">
                        <img src="" alt="">
                    </div>
                    <div class="card-content">
                        <h2>Total Bookings</h2>
                        <h3>100</h3>
                        <a href="http://localhost/GitHub/travelagency/index.php/AdminController/showAdminBookings">View Details</a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-icon">
                        <img src="" alt="">
                    </div>
                    <div class="card-content">
                        <h2>Total Transactions</h2>
                        <h3>100</h3>
                        <a href="http://localhost/GitHub/travelagency/index.php/AdminController/showTransactions">View Details</a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-icon">
                        <img src="" alt="">
                    </div>
                    <div class="card-content">
                        <h2>Reviews</h2>
                        <h3>100</h3>
                        <a href="http://localhost/GitHub/travelagency/index.php/AdminController/showAdminReviews">View Details</a>
                    </div>
                </div>
            </div>
            <div class="booking-rates">
                <h2>Booking Rates</h2>
                <div class="booking-rate-cards">
                    <div class="booking-rate-card">
                        <h3>Rates as of October</h3>
                        <h4>100%</h4>
                        <div class="date">
                            <select>
                                <option disabled selected>Choose date</option>
                                <option>Today</option>
                                <option>This week</option>
                                <option>This month</option>
                                <option>Choose month & year</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="feedback-ratings">
                <h2>Feedback Ratings</h2>
                <div class="feedback-rating-cards">
                    <div class="feedback-rating-card">
                        <h3>Feedback as of October</h3>
                        <h4>100%</h4>
                        <div class="date">
                            <select>
                                <option disabled selected>Choose Date</option>
                                <option>Today</option>
                                <option>This week</option>
                                <option>This month</option>
                                <option>Choose month & year</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="top-users">
                <h2>Top Users</h2>
                <div class="top-user-cards">
                    <div class="top-user-card">
                        <h3>Top User 1</h3>
                        <h4>5 Bookings</h4>
                        <img src="https://cdn-icons-png.flaticon.com/512/3177/3177440.png" alt="">
                    </div>
                    <div class="top-user-card">
                        <h3>Top User 3</h3>
                        <h4>3 Bookings</h4>
                        <img src="https://cdn-icons-png.flaticon.com/512/3177/3177440.png" alt="">
                    </div>
                    <div class="top-user-card">
                        <h3>Top User 3</h3>
                        <h4>6 Bookings</h4>
                        <img src="https://cdn-icons-png.flaticon.com/512/3177/3177440.png" alt="">
                    </div>
                    <div class="top-user-card">
                        <h3>Top User 4</h3>
                        <h4>6 Bookings</h4>
                        <img src="https://cdn-icons-png.flaticon.com/512/3177/3177440.png" alt="">
                    </div>
                    <div class="top-user-card">
                        <h3>Top User 5</h3>
                        <h4>6 Bookings</h4>
                        <img src="https://cdn-icons-png.flaticon.com/512/3177/3177440.png" alt="">
                    </div>
                    <div class="top-user-card">
                        <h3>Top User 6</h3>
                        <h4>6 Bookings</h4>
                        <img src="https://cdn-icons-png.flaticon.com/512/3177/3177440.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
