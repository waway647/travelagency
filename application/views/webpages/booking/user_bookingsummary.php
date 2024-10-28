<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/style.css?<?php echo time(); ?>"> 
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/booking/style_bookingForm1.css?<?php echo time(); ?>">

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
                                                    <img src="../images/logos/black.png" alt="">
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
    
    <!--    MAIN CONTENT    -->
    <div class="booking-form-main-container">
       <!-- <Form name="regform" id="regform" method="post" enctype="multipart/form-data"
                action="RegisterBooking_form1.php"> -->

            <div class="main-header">
                <h3>Booking Summary</h3>
            </div>

            <div class="background-main">

                <div class="booking-summary-main-form-container">
                    <div class="main-form-wrapper">

                    <div class="chosen-tour-flexbox">
                           
                            <div class="nav-row-container-summary">
                                <h6>TOUR PACKAGE</h6>
                                
                                <div class="information-side-container-summary">
                
                                    <div class="personal-information-column-summary-tourPackage">

                                        <div class="personal-information-row-summary">
                                            <h4><?php echo trim($this->session->userdata('city')); ?>, <?php echo trim($this->session->userdata('country')); ?></h4>
                                        </div>                                                                 
                                    </div>
                    
                                </div>
                                
                            </div>

                            <div class="nav-row-container-summary">
                                <h6>DATE / DURATION</h6>
                                
                                <div class="information-side-container-summary">
                
                                    <div class="personal-information-column-summary-tourPackage">

                                        <div class="personal-information-row-summary book-date-summary">
                                                <h4><?php echo $this->session->userdata('duration'); ?> days</h4>

                                            <div class="date-tour-h3-container">
                                                <h3 id="label">Start:</h3><h3><?php echo $this->session->userdata('booktour_date'); ?></h3>
                                            </div>

                                            <div class="date-tour-h3-container">
                                                <h3 id="label">End:</h3><h3><?php echo $this->session->userdata('tourEndDate'); ?></h3>
                                            </div>  
                                        </div>                                                                 
                                    </div>                
                                </div>
                            </div>

                            <div class="nav-row-container-summary">
                                <h6>TOTAL PRICE</h6>
                                
                                <div class="information-side-container-summary">
                
                                    <div class="personal-information-column-summary-tourPackage">

                                        <div class="personal-information-row-summary">
                                            <h4>PHP <?php echo $this->session->userdata('totalPrice'); ?></h4>    
                                        </div>                                                                 
                                    </div>
                    
                                </div>
                                
                            </div>
                        </div>
                        

                            <div class="mytable" id="passengertable">
                                <main>
                                    <!-- Start DEMO HTML (Use the following code into your project)-->
                                    <table id="passengertable">
                                        <thead>
                                        <tr>
                                            <h6>Passenger/s List</h6>
                                            <th>ID</th>
                                            <th>TITLE</th>
                                            <th>LAST NAME</th>    
                                            <th>FIRST NAME</th>                              
                                            <th>M.I.</th>
                                            <th>BIRTHDAY</th>
                                            <th>GENDER</th>
                                            <th>NATIONALITY</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        
                                        </tbody>
                                    
                                    </table>  
                                </main>
                                    <div class="personal-information-column-contact contact-padding">
                                    <h6>CONTACT INFORMATION</h6>
                                        <div class="personal-information-row-contact">
                                            <div class="personal-information-line">
                                                <h6>First Name</h6>
                                                <input type="text" name="contact_firstName" id="contact_firstName" value="<?php echo isset($this->session->userdata('contact')['contact_firstName']) ? $this->session->userdata('contact')['contact_firstName'] : ''; ?>" disabled>
                                            </div>
                                            <div class="personal-information-line">
                                                <h6>M.I.</h6>
                                                <input type="text" name="contact_midInitial" id="contact_midInitial" value="<?php echo isset($this->session->userdata('contact')['contact_midInitial']) ? $this->session->userdata('contact')['contact_midInitial'] : ''; ?>" oninput="this.value = this.value.toUpperCase()" maxlength="1" disabled>
                                            </div>
                                            <div class="personal-information-line">
                                                <h6>Last Name</h6>
                                                <input type="text" name="contact_lastName" id="contact_lastName" value="<?php echo isset($this->session->userdata('contact')['contact_lastName']) ? $this->session->userdata('contact')['contact_lastName'] : ''; ?>" disabled>
                                            </div>
                                            <div class="personal-information-line">
                                                <h6>Email</h6>
                                                <input type="email" name="contact_email" id="contact_email" value="<?php echo isset($this->session->userdata('contact')['contact_email']) ? $this->session->userdata('contact')['contact_email'] : ''; ?>" disabled>
                                            </div>
                                            <div class="personal-information-line">
                                                <h6>Contact Number</h6>
                                                <input type="text" name="contact_contactNumber" id="contact_contactNumber" value="<?php echo isset($this->session->userdata('contact')['contact_contactNumber']) ? $this->session->userdata('contact')['contact_contactNumber'] : ''; ?>" disabled>
                                            </div>
                                        </div>
                                    </div>
                                
                                    <div class="edit-text">
                                        <a href="http://localhost/travelagency_ci/index.php/UserController/part2">
                                            <h5>Edit</h5>
                                        </a>
                                    </div>
                            </div>

                            <div class="mytable" id="passengertable">
                                <h6>ITINERARY</h6>
                                <div class="container itinerary-container">

                                    <?php 
                                    // Retrieve itineraries from session
                                    $itineraries = $this->session->userdata('itineraries');

                                    // Check if there are itineraries to display
                                    if (!empty($itineraries)) 
                                    {
                                        foreach ($itineraries as $index => $itinerary) 
                                        {
                                            echo "<div class='itinerary-item'>";
                                                echo "<h5>Day " . htmlspecialchars($itinerary['day']) . "</h5>"; // Display day
                                                echo "<div class='day-row'>";
                                                    echo "<span>Activity: </span>" . "<p>" . htmlspecialchars($itinerary['activity']) . "</p>"; // Display activity
                                                echo "</div>";
                                                echo "<div class='day-row'>";
                                                    echo "<span>Start Time: </span>" . "<p>" . htmlspecialchars($itinerary['startTime']) . "</p>"; // Display start time
                                                echo "</div>";
                                                echo "<div class='day-row'>";
                                                    echo "<span>End Time: </span>" . "<p>" . htmlspecialchars($itinerary['endTime']) . "</p>"; // Display end time
                                                echo "</div>";
                                                echo "<div class='day-row'>";
                                                    echo "<span>Location: </span>" . "<p>" . htmlspecialchars($itinerary['location']) . "</p>"; // Display location
                                                echo "</div>";
                                            echo "</div>";
                                        }

                                    } 
                                    else 
                                    {
                                        echo "<p>No itineraries found.</p>";
                                    }
                                    ?>

                                </div>
                            </div>


                        
                 

                        <div class="button">
                            <form method="post" action="http://localhost/travelagency_ci/index.php/UserController/part3_submit">
                                <button type="submit" class="" id="submit-button" name="create_account" value="Finalize and Submit" onclick="">Submit</button>
                            </form>
                        </div>    
                </div>
                
                </div>
            
            </div>
       <!-- </Form> -->
   
    </div>

</div>

<script type='text/javascript'>
   $(document).ready(function(){
       
     $('#pagination2').on('click','a',function(e){
       e.preventDefault(); 
       var pageno = $(this).attr('data-ci-pagination-page');
       loadPagination(pageno);
     });
 
     loadPagination(0);
 
     function loadPagination(pagno){
       $.ajax({
         url: 'loadRecord_passenger/'+pagno,
         type: 'get',
         dataType: 'json',
         success: function(response){
            $('#pagination2').html(response.pagination);
            createTable(response.result,response.row);
         }
       });
     }
 
     function createTable(result,sno){
       sno = Number(sno);
       $('#passengertable tbody').empty();
       for(index in result){

        var id = result[index].id;
			var passengerTitle = result[index].passengerTitle;
			var passengerLname = result[index].passengerLname;
			var passengerFname = result[index].passengerFname;
			var passengerMinit = result[index].passengerMinit;
			var passengerBirthday = result[index].passengerBirthday;
            var passengerGender = result[index].passengerGender;
            var passengerNationality = result[index].passengerNationality;

			sno+=1;
	
			var tr = "<tr>";
			tr += "<td>"+ id +"</td>";
			tr += "<td>"+ passengerTitle +"</td>";
			tr += "<td>"+ passengerLname +"</td>";
			tr += "<td>"+ passengerFname +"</td>";
			tr += "<td>"+ passengerMinit +"</td>";
			tr += "<td>"+ passengerBirthday +"</td>";
			tr += "<td>"+ passengerGender +"</td>";
			tr += "<td>"+ passengerNationality +"</td>";
			
          
          //tr += "<td><a href='"+ link +"' target='_blank' >"+ title +"</a></td>";
          tr += "</tr>";
          $('#passengertable tbody').append(tr);
  
        }
      }
       
         
    });
</script>
    
</body>
</html>
