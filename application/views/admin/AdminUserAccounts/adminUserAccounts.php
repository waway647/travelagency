<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Bedan Travel & Tours</title>
    <link rel="icon" href="<?php echo base_url('images/logo/url_logo.png'); ?>">
	<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/adminStyle.css?<?php echo time(); ?>"> 
    <!-- Latest compiled and minified CSS -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"> -->
	<!-- jQuery library -->
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
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
                <img id="logo" src="http://localhost/GitHub/travelagency/images/logo/Logo_final.png" alt="">
            </div>

            <div class="NavPic-container">
                <img src="https://cdn-icons-png.flaticon.com/512/3177/3177440.png" alt="">
            </div>

            <div class="adminName-container">
                <h4>Admin</h4>
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

                    <li><a href="http://localhost/GitHub/travelagency/index.php/Account/showAdminCreateAcc">
						<img src="http://localhost/GitHub/travelagency/images/icons/add-user.png" alt="Add-AdminAcc-icon"><span>Add Admin</span></li></a>

                    <li><a href="http://localhost/GitHub/travelagency/index.php/Account/LogOut">
                        <img src="http://localhost/GitHub/travelagency/images/icons/logout.png" alt="LogOut-icon"><span>Log Out</span></li></a>
                </ul>
            </div>
        </nav>
    </div>
    <div class="main-content">

            <div class="top-bar">
                <h1>User Accounts</h1>
                
                    <div class="packageSearch">
                        <label for "search"></label>
                        <input type="text" 
                        onKeyUp="ajaxSearch(this.value)"
                        class="form-control" name="search" id="search" placeholder="Search Package">
                    </div>
                    <div class="notification-bell">
                        <a href="notif.html"><img src="http://localhost/GitHub/travelagency/images/icons/notification.png" alt=""></a>
                    </div>
            </div>

            <div class="user-table">

                <div class="table-wrapper">
                    <table class="table table-bordered" id="assetList">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>First Name</th>
                                <th>M.I.</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Mobile Number</th>
                                <th>Birthday</th>
                                <th>Gender</th>
                                <th>Nationality</th>
                                <th>LoginID</th>
                                <th>Time (Created)</th>
                                <th>Time (Updated)</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        
                        <!-- Scrollable tbody -->
                        <tbody class="scrollable-tbody"></tbody>
                    </table>

                    <!-- Pagination -->
                    <div style="width: fit-content; margin: 10px auto; " id='pagination2' ><a></a></div>
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
                                url: 'loadRecord2/' + pagno,
                                type: 'get',
                                dataType: 'json',
                                success: function(response){
                                    $('#pagination2').html(response.pagination);
                                    createTable(response.result, response.row);
                                }
                            });
                        }
        
                    
                        function createTable(result,sno){
                        sno = Number(sno);
                        $('#assetList tbody').empty();
                        for(index in result){
                            var id = result[index].id;
                            var username = result[index].username;
                            var pass = result[index].pass;
                            var firstName = result[index].firstName;
                            var midInitial = result[index].midInitial;
                            var lastName = result[index].lastName;
                            var email  = result[index].email ;
                            var mobileNum = result[index].mobileNum;
                            var bday = result[index].bday;
                            var gender = result[index].gender;
                            var nationality = result[index].nationality;
                            var loginID = result[index].loginID;
                            var created_at = result[index].created_at;
                            var updated_at = result[index].updated_at;
                            
                            sno+=1;
                            
                            var tr = "<tr>";
                            tr += "<td>"+ id +"</td>";
                            tr += "<td>"+ username +"</td>";
                            tr += "<td>"+ pass +"</td>";
                            tr += "<td>"+ firstName +"</td>";
                            tr += "<td>"+ midInitial +"</td>";
                            tr += "<td>"+ lastName +"</td>";
                            tr += "<td>"+ email +"</td>";
                            tr += "<td>"+ mobileNum +"</td>";
                            tr += "<td>"+ bday +"</td>";
                            tr += "<td>"+ gender +"</td>";
                            tr += "<td>"+ nationality +"</td>";
                            tr += "<td>"+ loginID +"</td>";
                            tr += "<td>"+ created_at +"</td>";  
                            tr += "<td>"+ updated_at +"</td>";
                            tr += "<td><a href='http://localhost/GitHub/travelagency/index.php/AdminController/editUserAccount/"+ id +"'>Edit</a></td>>";
                            tr += "<td><a href='http://localhost/GitHub/travelagency/index.php/AdminController/deleteUserAccount/"+ id +"'>Delete</a></td>>";
        
                            tr += "</tr>";
                            $('#assetList tbody').append(tr);
                    
                            }
                        }  
                    });
                </script>
    
</body>
</html>
