<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/style.css?<?php echo time(); ?>"> 
    <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/booking/style_bookingForm1v3.css?<?php echo time(); ?>"> 
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
                                                    <img src="<?php echo base_url('images/logos/black.png'); ?>" alt="" id="logo">
                                                </a>
                                            </div>
                                
                                            <div class="list-container">
                                                <ul>
                                                    <li><a href="#aboutUs">About us</a></li>
                                                    <li><a href="tourPackages.php">Tour Packages</a></li>
                                                    <li><a href="">Reviews</a></li>
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
                                                                        <a href="">
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
                                
                                                                    <a href="myProfile.php"><p>My Profile</p></a>
                                                                    <a href=""><p>Favorites</p></a>
                                                                    <a href=""><p>Booking Requests</p></a>
                                                                    <a href=""><p>Settings</p></a>
                                
                                                                </div>
                                
                                
                                                                <div class="profileHelp-bar-container">
                                
                                                                    <a href="">
                                                                        <p>Help
                                                                            <img src="../images/icons/external_link.png" alt="">
                                                                        </p>
                                                                    </a>
                                
                                                                    <a href="">
                                                                        <p>Privacy Policy
                                                                            <img src="../images/icons/external_link.png" alt="">
                                                                        </p> 
                                                                    </a>
                                
                                                                </div>
                                
                                
                                                                <div class="signout-bar-container">
                                
                                                                    <a href="../webpages/signInUser.html"><p>Log into Another Account</p></a>
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

    
    <!--    MAIN CONTENT    -->
    <div class="booking-form-main-container">
        <Form name="regform" id="regform" method="post" enctype="multipart/form-data"
                action="http://localhost/travelagency_ci/index.php/User_Controllers/User_tourpackage/part1_submit">

            <div class="main-header">
                <h3>Booking Form</h3>

            </div>

            <div class="background-main">
                <div class="when-where-container">
                    <div class="form-container">
                        <div class="form-row-container">
                            <h4>Where do you want to go?</h4>
                            <h6>CHOOSE A TOUR PACKAGE</h6>
        
                            <div class="form-select">
                                <select id="tour_package" placeholder="" name="booktour_package" required>
                                <option value="<?php echo $this->session->userdata('tourpackage_id'); ?> | <?php echo $this->session->userdata('city'); ?> | <?php echo $this->session->userdata('country'); ?> | <?php echo $this->session->userdata('price'); ?> | <?php echo $this->session->userdata('tourDescription'); ?> | <?php echo $this->session->userdata('duration'); ?>" selected> <?php echo trim($this->session->userdata('city')); ?>, <?php echo $this->session->userdata('country'); ?></option>
                                
                                </select>
                            </div>
                        </div>
        
                        <div class="form-row-container">
                            <h4>When?</h4>
                            <h6>DATE FOR THE TOUR</h6>
        
                            <div class="form-select">
                                <input type="date" id="tour_date" name="booktour_date" placeholder="" required>   
                            </div>
                        </div>

                        
                    </div>
                </div>
                    <div class="button">
                        <a href="">
                            <button type="submit" class="" id="submit-button" name="create_account" onclick="">Continue</button>
                        </a>
                    </div>
            
            </div>
        </Form>
   
    </div>

</div>

    
    
</body>
</html>
