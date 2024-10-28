<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	
	<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/adminStyle.css?<?php echo time(); ?>"> 

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
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
			<form method="post" action="http://localhost/travelagency_ci/index.php/AdminController/create_tourPackage">

                    <h4>Tour Package</h4>

				<div class="form-group">
					<label for="city">City:</label>
					<input type="text" class="form-control" placeholder="Enter city" id="city" name="city" required>
				</div>

				<div class="form-group">
					<label for="country">Country:</label>
					<input type="text" class="form-control" placeholder="Enter country" id="country" name="country" required>
				</div>

				<div class="form-group">
					<label for="price">Price:</label>
					<input type="text" class="form-control" placeholder="Enter price" id="price" name="price" required>
				</div>

				<div class="form-group">
					<label for="tourDescription">Description:</label>
					<input type="text" class="form-control" placeholder="Enter tour description" id="tourDescription" name="tourDescription" required>
				</div>

				<div class="form-group">
					<label for="duration">Duration:</label>
					<input type="text" class="form-control" placeholder="Enter tour duration" id="duration" name="duration" required>
				</div>

				<div id="itinerary-container">
					<h4>Itinerary</h4>
				</div>

				<button type="button" class="btn btn-secondary" id="add-itinerary">Add Another Itinerary Entry</button>
				<br><br>
				
				<button type="submit" class="btn btn-primary">Submit</button>

			</form>
		</div>
	</div>
</div>




<script>
$(document).ready(function() {
    let itineraryIndex = 0;

    function addItineraryEntry(index) {
        let itineraryEntry = `
            <div class="itinerary-entry">
                <hr>
                <div class="form-group">
                    <label for="day"><strong>Day:</strong></label>
                    <input type="number" class="form-control" placeholder="Enter day number" name="itinerary[${index}][day]" required>
                </div>
                <div class="form-group">
                    <label for="activity">Activity:</label>
                    <input type="text" class="form-control" placeholder="Enter activity description" name="itinerary[${index}][activity]" required>
                </div>
                <div class="form-group">
                    <label for="startTime">Start Time:</label>
                    <input type="time" class="form-control" name="itinerary[${index}][startTime]" required>
                </div>
                <div class="form-group">
                    <label for="endTime">End Time:</label>
                    <input type="time" class="form-control" name="itinerary[${index}][endTime]" required>
                </div>
                <div class="form-group">
                    <label for="location">Location:</label>
                    <input type="text" class="form-control" placeholder="Enter location" name="itinerary[${index}][location]" required>
                </div>
            </div>
        `;

        $('#itinerary-container').append(itineraryEntry);
    }

    // Add the first itinerary entry on page load
    addItineraryEntry(itineraryIndex);

    $('#add-itinerary').click(function() {
        itineraryIndex++;
        addItineraryEntry(itineraryIndex);
    });
});
</script>


</body>
</html>





