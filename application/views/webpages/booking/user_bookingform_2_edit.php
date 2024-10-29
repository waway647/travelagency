<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Bedan Travel & Tours</title>
    <link rel="icon" href="<?php echo base_url('images/logo/url_logo.png'); ?>">
	<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/style.css?<?php echo time(); ?>"> 
    <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/booking/style_bookingform1.css?<?php echo time(); ?>"> 
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

    <!-- H E A D E R -->
    <div class="header">
        <div class="logo-container">
            <a href="http://localhost/GitHub/travelagency/index.php/Account/redirect_userHomePage">
                <img src="<?php echo base_url('images/logos/black.png'); ?>" alt="">
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
                                <a href="http://localhost/GitHub/travelagency/index.php/Account/redirect_signIn_to_another"><p>Log into Another Account</p></a>
                                <a href="http://localhost/GitHub/travelagency/index.php/Account/logout"><p>Sign Out</p></a>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <!-- MAIN CONTENT -->
    <div class="booking-form-main-container">
        <div class="main-header">
            <h3>Booking Form</h3>
        </div>

        

    

        <div class="mainform-container">
            <div class="maincontent-container">

                <div class="mytable">
                        <div class="personal-information-column-contact edit-passenger">
                        <h6>EDIT PASSENGER</h6>
                            <form method="post" action="<?php echo 'http://localhost/GitHub/travelagency/index.php/UserController/part2_passenger_update/' . $passenger->id; ?>">
                                <div class="personal-information-row-contact">
                                    <div class="personal-information-line" id="title">
                                        <h6>Title</h6>
                                        <select class="title-form" name="passengerTitle" id="title">
                                            <option value="<?php echo $passenger->passengerTitle; ?>" selected><?php echo $passenger->passengerTitle; ?></option>
                                            <option value="Mr.">Mr.</option>
                                            <option value="Ms.">Ms.</option>
                                            <option value="Mrs.">Mrs.</option>
                                        </select>
                                    </div>
                                    <div class="personal-information-line">
                                        <h6>First Name</h6>
                                        <input type="text" name="passengerFname" id="passengerFname" value="<?php echo $passenger->passengerFname; ?>" required>
                                    </div>
                                    <div class="personal-information-line">
                                        <h6>M.I.</h6>
                                        <input type="text" name="passengerMinit" id="passengerMinit" value="<?php echo $passenger->passengerMinit; ?>" oninput="this.value = this.value.toUpperCase()" maxlength="1" required>
                                    </div>
                                    <div class="personal-information-line">
                                        <h6>Last Name</h6>
                                        <input type="text" name="passengerLname" id="passengerLname" value="<?php echo $passenger->passengerLname; ?>" required>
                                    </div>
                                    <div class="personal-information-line">
                                        <h6>Birthday</h6>
                                        <input type="date" id="birthday" name="passengerBirthday" value="<?php echo $passenger->passengerBirthday; ?>" required>
                                    </div>
                                    <div class="personal-information-line">
                                        <h6>Gender</h6>
                                        <select class="gender-form" name="passengerGender" id="gender" required>
                                            <option value="<?php echo $passenger->passengerGender; ?>" selected><?php echo $passenger->passengerGender; ?></option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                    <div class="personal-information-line">
                                        <h6>Nationality</h6>
                                        <input type="text" name="passengerNationality" id="nationality" value="<?php echo $passenger->passengerNationality; ?>" required>
                                    </div>
                                </div>

                                <div class="button-container">
                                    <a href="http://localhost/GitHub/travelagency/index.php/UserController/part2">
                                        <button type="button" class="btn btn-cancel">Cancel</button>
                                    </a>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                </div>
            </div> 
        </div>
    </div>
</div>
    
</body>
</html>
