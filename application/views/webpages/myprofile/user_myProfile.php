<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/style.css?<?php echo time(); ?>"> 
    <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/style_myProfile.css?<?php echo time(); ?>"> 

	
</head>
<body>

<div class="myProfile-container">
        <div class="header" id="myProfile">
                
            <div class="logo-container">
                <a href="http://localhost/travelagency_ci/index.php/Account/redirect_userHomepage">
                    <img src="<?php echo base_url('images/logos/black.png'); ?>" alt="">
                </a>
            </div>

            <div class="list-container">
                <ul>
                    <li><a href="#">About us</a></li>
                    <li><a href="http://localhost/travelagency_ci/index.php/UserController/show_user_tourpackages">Tour Packages</a></li>
                    <li><a href="#">Reviews</a></li>
                    <li><a href="#">Contacts</a></li>
                    
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

                                    <a href=""><p>My Profile</p></a>
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

                                    <a href="http://localhost/travelagency_ci/index.php/UserController/redirect_signIn_to_another"><p>Log into Another Account</p></a>
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


        <!--        M   A   I   N       -->

        <div class="profile-main-container">
            <div class="profile-wrapper">

                <div class="container-column" id="nav-container">
                    <div class="profile-nav-container">
                        <a href="#nav-personal-information">
                            <div class="nav-item-container">
                                <h5>Personal Information</h5>
                            </div>
                        </a>
                        
                        <a href="#nav-my-bookings">
                            <div class="nav-item-container">
                                <h5>My Bookings</h5>
                            </div>
                        </a>                     
                    </div>
                </div>
                
                <div class="column-wrapper">
                    <div class="container-column" id="nav-personal-information">
                        <div class="nav-row-container">
                            <h6>PERSONAL INFORMATION</h6>
                            
                            <div class="information-side-container">
                                <div class="profile-pic-column">
                                    <div class="upload-profile-container">
                                        <img src="https://cdn-icons-png.flaticon.com/512/3177/3177440.png" alt="">
                                        <a href="">
                                            <img src="../images/icons/upload.png" alt="" id="upload-icon">
                                            <h6>Upload</h6>
                                        </a>
                                    </div>
                                </div>
            
                                <div class="personal-information-column">
                                    <div class="personal-information-row">
                                        <div class="personal-information-line" id="first_name">
                                            <h6>First Name</h6>
                                            <input type="text" name="firstName" id="first_name" placeholder="" value="<?php echo $userinfo->firstName ?>" onclick="" disabled>
                                        </div>
                                        <div class="personal-information-line" id="minit">
                                            <h6>M.I.</h6>
                                            <input type="text" name="midInitial" id="minit" placeholder="" value="<?php echo $userinfo->midInitial ?>" onclick="" disabled>
                                        </div>
                                        <div class="personal-information-line" id="last_name">
                                            <h6>Last Name</h6>
                                            <input type="text" name="lastName" id="last_name" placeholder="" value="<?php echo $userinfo->lastName ?>" onclick="" disabled>
                                        </div>
                                    </div>
            
                                    <div class="personal-information-row">
                                        <div class="personal-information-line">
                                            <h6>Email Address</h6>
                                            <input type="text" name="email" id="email" placeholder="" value="<?php echo $userinfo->email ?>" onclick="" disabled>
                                        </div>
                                    </div>
            
                                    <div class="personal-information-row">
                                        <div class="personal-information-line">
                                            <h6>Mobile Number</h6>
                                            <input type="text" name="mobileNum" id="mobilenumber" placeholder="" value="<?php echo $userinfo->mobileNum ?>" onclick="" disabled>
                                        </div>
                                    </div>
            
                                    <div class="personal-information-row">
                                        <div class="personal-information-line">
                                            <h6>Birthday</h6>
                                            <input type="date" id="birthday" name="bday" placeholder="date" value="<?php echo $userinfo->bday ?>"  disabled>
                                        </div>
                                        <div class="personal-information-line">
                                                <h6>Gender</h6>
                                                <select class="gender-form" name="gender" id="gender" disabled>
                                                <option value="<?php echo $userinfo->gender ?>" selected><?php echo $userinfo->gender ?></option>
                                                <!--
                                                <option value="" disabled selected></option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                                -->
                                                </select>
                                        </div>
                                    </div>

                                    <div class="personal-information-row">
                                        <div class="personal-information-line">
                                            <h6>Nationality</h6>
                                            <input type="text" name="nationality" id="nationality" placeholder="" value="<?php echo $userinfo->nationality ?>" onclick="" disabled>
                                        </div>
                                    </div>

                                    <!--
                                    <div class="bottom-selection">
                                        <div class="selection-container">
                                            <a href="">
                                                <h6>Edit Profile</h6>
                                            </a>
                                        </div>
                                    </div>
                                    -->

                                        <div class="bottom-selection">
                                            <a href="http://localhost/travelagency_ci/index.php/UserController/showedit_myprofile/id"><h5>Edit</h5></a>
                                        </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>

                    
                    
                    <div class="container-column" id="nav-my-bookings">
                        <div class="nav-row-container">
                            <h6>MY BOOKINGS</h6>
                            <div class="sub-header-container-booking">
                                <h5>Here are your Current Bookings:</h5>
                            </div>
                            
                    
                            <div class="bookings-container">
                                <div class="booking-row-container">
                                    <div class="booking-header">
                                        <div class="booking-header-column">
                                            <h6>Booking Reference</h6>
                                            <p>10022881</p>
                                        </div>
                                        <div class="booking-header-column">
                                            <p id="booking-package-name"> <?php echo $tour_package; ?></p>
                                        </div>
                                        <div class="booking-header-column">
                                            <h6>Status:</h6>
                                            <div class="status-paragraph">                           
                                                <p>CONFIRMED</p>
                                            </div>                         
                                        </div>
                                    </div>

                                    <div class="my-booking-date">
                                        <div class="my-booking-date-container">
                                            <div class="my-start-end-date">
                                                <h6>START</h6>
                                                <p><?php echo $tour_date; ?></p>
                                            </div>
                                            <div class="my-start-end-date">
                                                <h6>END</h6>
                                                <p>JUN 16 2020</p>
                                            </div>
                                        </div>
                                        <div class="side-text-date">
                                            <p>100,000 PHP — 7 DAYS — 6 NIGHTS</p>
                                        </div>
                                    </div>

                                    <div class="booking-button-options">
                                        <div class="buttons-container">
                                            <a href="">
                                                <button type="button" class="booking-button" id="view-itinerary-button">View Itinerary</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                
                            </div>
                            
                        </div>
                    </div>
                    
                </div>
                

                
            </div>
        </div>

    </div>

</body>
</html>
