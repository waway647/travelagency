<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Itinerary</title>
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
            <h2>Edit Itinerary for <?php echo $tourpackage->city ?></h2>
            
            <!-- Ensure the form action includes the tour package ID -->
            <form method="POST" action="<?php echo base_url('index.php/AdminController/updateItinerary/' . $tourpackage->tourpackage_id); ?>">
                <?php foreach($itineraries as $itinerary): ?>
                    <div class="form-group">
                        <strong>Day <?php echo $itinerary['day']; ?> Activity</strong>
                        <input type="text" class="form-control" name="itinerary[<?php echo $itinerary['day']; ?>][activity]" value="<?php echo $itinerary['activity']; ?>">
                        <input type="hidden" name="itinerary[<?php echo $itinerary['day']; ?>][id]" value="<?php echo $itinerary['id']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Start Time</label>
                        <input type="time" class="form-control" name="itinerary[<?php echo $itinerary['day']; ?>][startTime]" value="<?php echo $itinerary['startTime']; ?>">
                    </div>
                    <div class="form-group">
                        <label>End Time</label>
                        <input type="time" class="form-control" name="itinerary[<?php echo $itinerary['day']; ?>][endTime]" value="<?php echo $itinerary['endTime']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Location</label>
                        <input type="text" class="form-control" name="itinerary[<?php echo $itinerary['day']; ?>][location]" value="<?php echo $itinerary['location']; ?>">
                    </div>
                    <hr>
                <?php endforeach; ?>

                <button type="submit" class="btn btn-primary">Update Itinerary</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
