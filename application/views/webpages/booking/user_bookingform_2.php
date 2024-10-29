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
    <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/booking/style_bookingform1v3.css?<?php echo time(); ?>"> 
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

        

    

        <div class="main-form-wrapper">
            <div class="mytable" id="passengertable">
                <main>
                    <table id="passengertable">
                        <thead>
                            <tr>
                                <h6>Passenger List</h6>
                                <th>NO.</th>
                                <th>TITLE</th>
                                <th>FIRST NAME</th>
                                <th>M.I.</th>
                                <th>LAST NAME</th>
                                <th>BIRTHDAY</th>
                                <th>GENDER</th>
                                <th>NATIONALITY</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </main>
                <!-- Paginate -->
	            <div style="width: fit-content; margin: auto;" id='pagination2' ></div>
                <!-- Button to Open the Modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add Passenger</button>

                <div class="modal-container">

                    <!-- The Modal -->
                    <div class="modal" id="myModal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form method="post" action="http://localhost/GitHub/travelagency/index.php/UserController/part2_passenger_submit" enctype="multipart/form-data">
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Add Passenger</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <div class="nav-row-container add-passenger">
                                            <h6>PASSENGER INFORMATION</h6>

                                            <div class="add-passenger info">
                                                <div class="personal-information-column">
                                                <div class="personal-information-line" id="title">
                                                            <h6>Title</h6>
                                                            <select class="title-form" name="passengerTitle" id="title">
                                                                <option value=""></option>
                                                                <option value="Mr.">Mr.</option>
                                                                <option value="Ms.">Ms.</option>
                                                                <option value="Mrs.">Mrs.</option>
                                                            </select>
                                                        </div>
                                                    <div class="personal-information-row">
                                                        
                                                        <div class="personal-information-line">
                                                            <h6>First Name</h6>
                                                            <input type="text" name="passengerFname" id="passengerFname" placeholder="" required>
                                                        </div>
                                                        <div class="personal-information-line">
                                                            <h6>M.I.</h6>
                                                            <input type="text" name="passengerMinit" id="minit" placeholder="" oninput="this.value = this.value.toUpperCase()" maxlength="1" required>
                                                        </div>
                                                        <div class="personal-information-line">
                                                            <h6>Last Name</h6>
                                                            <input type="text" name="passengerLname" id="passengerLname" placeholder="" required>
                                                    </div>
                                                    </div>
                                                    

                                                    <div class="personal-information-row">
                                                        <div class="personal-information-line">
                                                            <h6>Birthday</h6>
                                                            <input type="date" id="passengerBirthday" name="passengerBirthday" required>
                                                        </div>
                                                        <div class="personal-information-line">
                                                            <h6>Gender</h6>
                                                            <select class="gender-form" name="passengerGender" id="passengerGender" required>
                                                                <option></option>
                                                                <option value="Male">Male</option>
                                                                <option value="Female">Female</option>
                                                            </select>
                                                        </div>
                                                        <div class="personal-information-line">
                                                            <h6>Nationality</h6>
                                                            <input type="text" name="passengerNationality" id="passengerNationality" required>
                                                        </div>
                                                    </div>

                                                    <div class="personal-information-row">
                                                        
                                                    </div>                         
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-submit">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        
            <div class="booking-contact-form-container">
                <form method="post" action="http://localhost/GitHub/travelagency/index.php/UserController/part2_contact_submit">
                <div class="mytable">
                        <div class="personal-information-column-contact">
                        <h6>CONTACT INFORMATION</h6>
                            <div class="personal-information-row-contact">
                                <div class="personal-information-line">
                                    <h6>First Name</h6>
                                    <input type="text" name="contact_firstName" id="contact_firstName" value="<?php echo isset($this->session->userdata('contact')['contact_firstName']) ? $this->session->userdata('contact')['contact_firstName'] : ''; ?>" required>
                                </div>
                                <div class="personal-information-line">
                                    <h6>M.I.</h6>
                                    <input type="text" name="contact_midInitial" id="contact_midInitial" value="<?php echo isset($this->session->userdata('contact')['contact_midInitial']) ? $this->session->userdata('contact')['contact_midInitial'] : ''; ?>" oninput="this.value = this.value.toUpperCase()" maxlength="1" required>
                                </div>
                                <div class="personal-information-line">
                                    <h6>Last Name</h6>
                                    <input type="text" name="contact_lastName" id="contact_lastName" value="<?php echo isset($this->session->userdata('contact')['contact_lastName']) ? $this->session->userdata('contact')['contact_lastName'] : ''; ?>" required>
                                </div>
                                <div class="personal-information-line">
                                    <h6>Email</h6>
                                    <input type="email" name="contact_email" id="contact_email" value="<?php echo isset($this->session->userdata('contact')['contact_email']) ? $this->session->userdata('contact')['contact_email'] : ''; ?>" required>
                                </div>
                                <div class="personal-information-line">
                                    <h6>Contact Number</h6>
                                    <input type="text" name="contact_contactNumber" id="contact_contactNumber" value="<?php echo isset($this->session->userdata('contact')['contact_contactNumber']) ? $this->session->userdata('contact')['contact_contactNumber'] : ''; ?>" required>
                                </div>
                            </div>
                        </div>
                </div>

                <?php if ($this->session->flashdata('error_message')): ?>
                    <div class="alert alert-danger">
                        <?php echo $this->session->flashdata('error_message'); ?>
                    </div>
                <?php endif; ?>
                
                <div class="button">
                    <button type="submit" id="submit-button">Continue</button>
                </div>
                </form>
            </div>

            
            
        </div>
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
			var passengerFname = result[index].passengerFname;
			var passengerMinit = result[index].passengerMinit;
            var passengerLname = result[index].passengerLname;
			var passengerBirthday = result[index].passengerBirthday;
            var passengerGender = result[index].passengerGender;
            var passengerNationality = result[index].passengerNationality;

			sno+=1;
	
			var tr = "<tr>";
			tr += "<td>"+ sno +"</td>";
			tr += "<td>"+ passengerTitle +"</td>";
			tr += "<td>"+ passengerFname +"</td>";
            tr += "<td>"+ passengerMinit +"</td>";
            tr += "<td>"+ passengerLname +"</td>";
			tr += "<td>"+ passengerBirthday +"</td>";
			tr += "<td>"+ passengerGender +"</td>";
			tr += "<td>"+ passengerNationality +"</td>";
			tr += "<td><a href='http://localhost/GitHub/travelagency/index.php/UserController/part2_passenger_edit/" + id + "'>Edit</a>";
			tr += "&nbsp<td><a href='http://localhost/GitHub/travelagency/index.php/UserController/part2_passenger_delete/" + id + "'>Delete</a></td>";
			
          
          //tr += "<td><a href='"+ link +"' target='_blank' >"+ title +"</a></td>";
          tr += "</tr>";
          $('#passengertable tbody').append(tr);
  
        }
      }
       
         
    });
</script>
    
</body>
</html>
