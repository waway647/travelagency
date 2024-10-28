<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/style.css?<?php echo time(); ?>"> 
    <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/tourpackage/style_tourpackagev3.css?<?php echo time(); ?>"> 
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
	<!-- Popper JS -->
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        #discoverImage {
            background-image: linear-gradient(to bottom, rgba(0,0,0,0), rgba(0,0,0,0.5)), url(<?php echo base_url('images/asia/bali/Bali_Alfiano-Sutianto_Unsplash-scaled.jpg'); ?>);
            background-size: cover;
            background-position: center;
        }
    </style>

</head>
<body>

    <div class="tourPackages-container">
        <div class="tourHeading-container" id="discoverImage">
            <div class="tourTextHeading-container">
                <h1>DISCOVER</h1>
                <h2>Tour Packages</h2>

                <div class="packageSearch">
                <label for="search"></label>
                    <input type="text" 
                    onKeyUp="ajaxSearch(this.value)"
                    class="form-control" name="search" id="search" placeholder="Search Package">
                </div>
            </div>
        </div>

        

        <div class="main-container">
    
           



            <div class="tourCatalog-container" id="tourpackageList">


    
            </div>
    

            <div class="logo-container">
                <a href="http://localhost/travelagency_ci/index.php/Account/redirect_userHomePage">
                    <img src="<?php echo base_url('images/logos/black.png'); ?>" alt="" id="logo">
                </a>
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
                var url = 'http://localhost/travelagency_ci/index.php/User_Controllers/User_tourpackage/loadRecord2/' + pagno;
                console.log('Request URL:', url); // Log the URL
                $.ajax({
                    url: url,
                    type: 'get',
                    dataType: 'json',
                    success: function(response){
                        console.log('AJAX Response:', response);
                        $('#pagination2').html(response.pagination);
                        createGrid(response.result, response.row);
                    },
                    error: function(error) {
                        console.error('Error fetching data:', error);
                    }
                });
            }

            function createGrid(result, sno){
                sno = Number(sno);
                $('#tourpackageList').empty();
                console.log(result); // Debugging statement to check the structure of result
                for(index in result){
                    var tourpackage = result[index];
                    if (typeof tourpackage === 'object') {
                        var tourpackage_id = tourpackage.tourpackage_id;
                        var city = tourpackage.city;
                        var country = tourpackage.country;
                        var price = tourpackage.price;
                        var tourDescription = tourpackage.tourDescription;
                        var duration = tourpackage.duration;

                        sno += 1;

                        // Create a dynamic style for each tour package
                        var style = `
                            <style>
                                #tour-${tourpackage_id} {
                                    background-image: linear-gradient(to bottom, rgba(0,0,0,0), rgba(0,0,0,0.5)), url('<?php echo base_url('images/tourpackages/'); ?>${city.toLowerCase().replace("/\s+/g, ''")}.jpg');
                                    background-size: cover;
                                    background-position: center;
                                }
                            </style>
                        `;
                        $('head').append(style);

                        var card = `<div class="tourItemBox" id="tour-${tourpackage_id}">
                                        <div class="tourTextBox-container">
                                            <h3>${city}, ${country}</h3>
                                            <div class="tourpackage-price-container">
                                            <p>${tourDescription}</p>
                                                <h4>PHP ${price}</h4>
                                            </div>
                                            <div class="tourItemBox-buttonContainer">
                                                <a href="booking_form.php">
                                                    <form action="http://localhost/travelagency_ci/index.php/User_Controllers/User_tourpackage/tourPackages_session" method="post">
                                                        <input type="hidden" name="tourpackage_id" value="${tourpackage_id}">
                                                        <button type="submit" class="bookTourButton" id="headerButton">Book Tour</button>
                                                    </form>
                                                </a>
                                                <a href="tours_webpages/${city.toLowerCase().replace(' ', '_')}.html">
                                                    <button type="button" class="tourDiscoverButton" id="headerButton" onclick="sendEmail()">Discover</button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>`;
                        $('#tourpackageList').append(card);
                    } else {
                        console.error('Unexpected data format:', tourpackage);
                    }
                }
            }
        });
    </script>

</body>
</html>
