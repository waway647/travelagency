<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/style.css?<?php echo time(); ?>"> 
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/booking/style_bookingForm1.css?<?php echo time(); ?>">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
	<!-- Popper JS -->
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        body {
            background-color: #62b6cb;
        }

        .header, .main-header {
            background-color: #fff;
        }
    </style>

</head>
<body>
    
<div class="booking-form-all-container">
    <!--    H   E   A   D   E   R   -->
    <div class="header">
                
        <div class="logo-container">
            <a href="http://localhost/travelagency_ci/index.php/Account/redirect_userHomePage">
                <img src="<?php echo base_url('images/logos/black.png'); ?>" alt="">
            </a>
        </div>

        <div class="list-container">
            <ul>
                <li><a href="#aboutUs">About us</a></li>
                <li><a href="tourPackages.php">Tour Packages</a></li>
                <li><a href="#">Reviews</a></li>
                <li><a href="#contacts">Contacts</a></li>
                
                <li id="NavProfile">
                    <a href="#">
                    <div class="NavPic-container">
                        <img src="https://cdn-icons-png.flaticon.com/512/3177/3177440.png" alt="">
                    </div>
                    </a>

                    <div class="profileCard">
                        
                        <div class="profile-container">


                            <div class="topProfile-bar-container">

                                <div class="profilePic-container">
                                    <a href="#">
                                    <button type="button" class="profilePicButton" id="profilePicButton">
                                        <img src="https://cdn-icons-png.flaticon.com/512/3177/3177440.png" alt="">
                                    </button>
                                    </a>
                                </div>

                                <div class="profileName-container">
                                    <h4><?php echo $this->session->userdata('logged_lastName'); ?>, <?php echo $this->session->userdata('logged_firstName'); ?> <?php echo $this->session->userdata('logged_midInitial'); ?></h4>
                                    <p><?php echo $this->session->userdata('logged_email');?></p>
                                </div>

                            </div>


                            <div class="profileMenu-bar-container">

                                <a href="#"><p>My Profile</p></a>
                                <a href="#"><p>Favorites</p></a>
                                <a href="#"><p>Booking Requests</p></a>
                                <a href="#"><p>Settings</p></a>

                            </div>


                            <div class="profileHelp-bar-container">

                                <a href="#">
                                    <p>Help
                                        <img src="<?php echo base_url('images/icons/external_link.png'); ?>" alt="">
                                    </p>
                                </a>

                                <a href="#">
                                    <p>Privacy Policy
                                        <img src="<?php echo base_url('images/icons/external_link.png'); ?>" alt="">
                                    </p> 
                                </a>

                            </div>


                            <div class="signout-bar-container">

                                <a href="http://localhost/travelagency_ci/index.php/Account/redirect_signIn_to_another"><p>Log into Another Account</p></a>
                                <a href="http://localhost/travelagency_ci/index.php/Account/logout"><p>Sign Out</p></a>

                            </div>

                        </div>

                    </div>

                </li>

                
                
            </ul>


                <!--

                <a href="../index.php">
                    <button type="button" class="loginButton" id="headerButton" onclick="sendEmail()">Log out</button>
                </a>

                -->

        </div>

    </div>

    <div class="submitted-content-container">
        <div class="submitted-content-wrapper">
            <div class="submitted-container">
                <div class="submitted-textbox-container">
                    <h3>Form Submitted!</h3>
                    <h5>Your booking is now on for approval by the agency. <br>Bedan Travel and Tours will contact you directly through email within 24 working hours.</h5>
                    <h5>Thank you!</h5>
                    <h6>Go to <a href="myProfile.php#nav-my-bookings">My Bookings</a> to view status.</h6>
                </div>
            </div>
        </div>
    </div>

</div>
    
</body>
</html>
