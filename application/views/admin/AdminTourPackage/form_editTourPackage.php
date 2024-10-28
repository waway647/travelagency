<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

    <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/adminStyle.css?<?php echo time(); ?>"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
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
        <div id="container">
            <form method="post" action="<?php echo 'http://localhost/travelagency_ci/index.php/AdminController/update_TourPackage/' . $tourpackages->tourpackage_id; ?>">
                <h2>Edit Tour Package ID: <?php echo $tourpackages->tourpackage_id ?></h2>

                <div class="form-group">
                    <label for="city">City:</label>
                    <input type="text" class="form-control" placeholder="Enter city" id="email" name="city" value="<?php echo $tourpackages->city; ?>" required>
                </div>
            
                <div class="form-group">
                    <label for="country">Country:</label>
                    <input type="text" class="form-control" placeholder="Enter country" id="email" name="country" value="<?php echo $tourpackages->country; ?>" required>
                </div>
            
                <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="text" class="form-control" placeholder="Enter price" id="fn" name="price" value="<?php echo $tourpackages->price; ?>" required>
                </div>
            
                <div class="form-group">
                    <label for="tourDescription">Description:</label>
                    <input type="text" class="form-control" placeholder="Enter tour description" id="mn" name="tourDescription" value="<?php echo $tourpackages->tourDescription; ?>" required>
                </div>
            
                <div class="form-group">
                    <label for="duration">Duration:</label>
                    <input type="text" class="form-control" placeholder="Enter tour duration" id="ln" name="duration" value="<?php echo $tourpackages->duration; ?>" required>
                </div>
            
                <button type="submit" class="btn btn-primary">Submit</button>
            
            </form>
        </div>
    </div>
</div>


<script>
$(document).ready(function() {


   
});
</script>

</body>
</html>
