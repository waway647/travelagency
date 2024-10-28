<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/styleSignIn.css?<?php echo time(); ?>"> 

	
</head>
<body>

<div class="signIn-container">

        <form name="regform" id="regform" method="post"
		   action="http://localhost/travelagency_ci/index.php/Account/create_user_2">
        

            <div class="main-container">


                <div class="logo-container">
                    <a href="http://localhost/travelagency_ci/index.php/Account/showHomepage">
                        <img src="<?php echo base_url('images/logo/Logo_final.png'); ?>" alt="">
                    </a>
                </div>


                <div class="signInCard">

                    <a href="http://localhost/travelagency_ci/index.php/Account/showSignUp_1">
                        <div class="backIcon">
                            <img src="https://cdn-icons-png.flaticon.com/512/271/271220.png" alt="">
                        </div>
                    </a>

                    <div class="card-container">


                        <div class="bottomOption-container">

                            <h3>Step 2 of 2</h3>

                            <h2>Create an account</h2>
                            <br>
        
                            <div class="topOption-container">

                                <!--<h3>Sign up with email</h3>
                                    <div class="p-container">
                                    <p>Already have an account? &nbsp</p>
                                    <a href="signInUser.html"><p>Sign in</p></a>
                                </div>-->

                                <div class="row-container">

                                    <div class="row-input-container-step2">

                                        <div class="textbox-container-step2" id="firstName-input">
                                            <p for="first_name">First name</p>
                                                <input type="text" name="firstName" id="first_name" placeholder="" onclick="" required>
                                        </div>

                                        <div class="textbox-container-step2" id="middleInitial-input">
                                            <p for="minit">M.I.</p>
                                                <input type="text" name="midInitial" id="minit" placeholder="" oninput="this.value = this.value.toUpperCase()" maxlength="1">
                                        </div>
    
                                        <div class="textbox-container-step2" id="surname-input">
                                            <p for="last_name">Surname</p>
                                                <input type="text" name="lastName" id="last_name" placeholder="" onclick="" required>
                                        </div>
                                                       
                                    </div>


                                    <div class="rowEmail-input-container-step2">

                                        <div class="textbox-container-step2">
                                            <p for="email">Email</p>
                                                <input type="text" name="email" id="email" placeholder="" onclick="" required>
                                        </div>

                                    </div>
                                    
                            
                                    <div class="row2nd-input-container-step2">

                                        <div class="textbox-container-step2">
                                            <p for="mobilenumber">Mobile Number</p>
                                                <input type="text" name="mobileNum" id="mobilenumber" placeholder="" onclick="" required>
                                        </div>
                                                        
                                    </div>

                                    <div class="row3rd-input-container-step2">
                                        
                                        <div class="textbox3rdrow-container-step2">
                                            <p for="birthday">Birthday</p>
                                                <input type="date" id="birthday" name="bday" required>   
                                        </div>

                                        <div class="form-group">
                                                <p for="gender">Gender</p>
                                                <select class="form-control" name="gender" id="gender" required>
                                                <option value="" disabled selected></option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                                </select>
                                        </div>
                                                       
                                    </div>

                                    <div class="row4th-input-container-step2">

                                        <div class="textbox4throw-container-step2">
                                            <p for="nationality">Nationality</p>
                                                <input type="text" name="nationality" id="nationality" placeholder="" onclick="" required>
                                        </div>
                                                        
                                    </div>

                                    <div class="consent-container">
                                
                                        <input type="checkbox" id="checkbox" value="" required>

                                        <div class="sentence">
                                        <p>I agree to the <a href="">Terms and Conditions</a> of Use and <a href="">Privacy Policy</a></p>
                                    
                                    </div>
                                
                                </div>
                            
                            </div>
                            <div class="button">
                                <button type="submit" class="btn btn-primary" id="create_account" name="create_account" onclick="">Create account</button>
                            </div>

                        </div>

                    </div>

                </div>

            </div>
            
        </form>

    </div>

</body>
</html>
