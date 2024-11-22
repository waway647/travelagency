<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Bedan Travel & Tours</title>
    <link rel="icon" href="<?php echo base_url('images/logo/url_logo.png'); ?>">
	<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/adminStyle.css?<?php echo time(); ?>"> 

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
                <img id="logo" src="http://localhost/travelagency_ci/images/logo/Logo_final.png" alt="">
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
    <div class="main-content" id="main-content-adminTourPackages">
        <div class="top-bar">
            <h1>Dashboard</h1>

            <div class="search-bar">
                <div class="packageSearch">
                    <label for="search"></label>
                    <input type="text" 
                    onKeyUp="ajaxSearch(this.value)"
                    class="form-control" name="search" id="search" placeholder="Search Package">
                </div>
                <div class="notification-bell">
                    <a href="notif.html"><img src="http://localhost/GitHub/travelagency/images/icons/notification.png" alt=""></a>
                </div>
            </div>
        </div>

        <div class="tour-package-content">
        <div id="container">
            <a href="http://localhost/GitHub/travelagency/index.php/AdminController/show_createTourPackage" class="btn btn-primary mb-3">Add Tour Package</a>
            <div class="row" id="tourList">
                <!-- Tour cards will be appended here -->
            </div>
            <!-- Paginate -->
            <div style="width: fit-content; margin: auto;" id='pagination2'></div>
        </div>
        <!-- View Modal -->
        <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h5 class="modal-title" id="viewModalLabel">Tour Package Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <!-- Content dynamically loaded from JavaScript -->
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <script type='text/javascript'>
            $(document).ready(function(){
                $('#pagination2').on('click', 'a', function(e){
                    e.preventDefault();
                    var pageno = $(this).attr('data-ci-pagination-page');
                    loadPagination(pageno);
                });
                loadPagination(0);
                function loadPagination(pagno){
                    $.ajax({
                        url: 'loadRecord1/' + pagno,
                        type: 'get',
                        dataType: 'json',
                        success: function(response){
                            $('#pagination2').html(response.pagination);
                            createGrid(response.result, response.row);
                        }
                    });
                }
                function createGrid(result, sno){
                    sno = Number(sno);
                    $('#tourList').empty();
                    for (index in result) {
                        var tourpackage_id = result[index].tourpackage_id;
                        var city = result[index].city;
                        var country = result[index].country;
                        var price = result[index].price;
                        var tourDescription = result[index].tourDescription;
                        var duration = result[index].duration;
                        var itineraries = result[index].itinerary;
                        sno += 1;
                        var card = `<div class="col-md-4">
                            <div class="tour-card">
                                <h5>City: ${city}</h5>
                                <div class="tour-p-container">
                                    <p><strong>Country:</strong> ${country}</p>
                                    <p><strong>Price:</strong> ${price}</p>
                                    <p><strong>Description:</strong> ${tourDescription}</p>
                                    <p><strong>Duration:</strong> ${duration} days</p>
                                </div>
                                <a href='#' class="btn btn-warning view-modal-btn" data-tourpackage_id="${tourpackage_id}" data-city="${city}" data-country="${country}" data-price="${price}" data-description="${tourDescription}" data-duration="${duration}" data-itineraries='${JSON.stringify(itineraries)}'>View</a>
                                <a href='http://localhost/GitHub/travelagency/index.php/AdminController/show_editTourPackage/${tourpackage_id}' class="btn btn-primary edit-modal-btn">Edit<br>Package</a>
                                <a href='http://localhost/GitHub/travelagency/index.php/AdminController/show_editItinerary/${tourpackage_id}' class="btn btn-primary edit-itinerary-btn">Edit<br>Itinerary</a>
                                <a href='http://localhost/GitHub/travelagency/index.php/AdminController/delete_TourPackage/${tourpackage_id}' class="btn btn-danger">Delete</a>
                            </div>
                        </div>`;
                        $('#tourList').append(card);
                    }
                    // Attach click event to view modal buttons
                    $('.view-modal-btn').click(function() {
                        var tourpackage_id = $(this).data('tourpackage_id');
                        var city = $(this).data('city');
                        var country = $(this).data('country');
                        var price = $(this).data('price');
                        var description = $(this).data('description');
                        var duration = $(this).data('duration');
                        var itineraries = $(this).data('itineraries');
                        var modalContent = `<p><strong>ID:</strong> ${tourpackage_id}</p>
                            <p><strong>City:</strong> ${city}</p>
                            <p><strong>Country:</strong> ${country}</p>
                            <p><strong>Price:</strong> ${price}</p>
                            <p><strong>Description:</strong> ${description}</p>
                            <p><strong>Duration:</strong> ${duration} days</p>`;
                        if (itineraries && itineraries.length > 0) {
                            modalContent += `<hr><h5>Itinerary Details:</h5>`;
                            itineraries.forEach(function(itinerary) {
                                modalContent += `<p><strong>Day ${itinerary.day}:</strong> ${itinerary.activity}</p>
                                    <p><strong>Start Time:</strong> ${itinerary.startTime}</p>
                                    <p><strong>End Time:</strong> ${itinerary.endTime}</p>
                                    <p><strong>Location:</strong> ${itinerary.location}</p><hr>`;
                            });
                        } else {
                            modalContent += `<p>No itinerary details available.</p>`;
                        }
                        $('#viewModal .modal-body').html(modalContent);
                        $('#viewModal').modal('show');
                    });
                }
            });
        </script>

</body>
</html>
