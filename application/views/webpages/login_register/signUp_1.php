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

        <!--<form name="regform" id="regform" method="post"
		   action="registerSignUp.php">-->

            <div class="main-container">


                <div class="logo-container">
                    <a href="http://localhost/travelagency_ci/index.php/Account/showHomepage">
                        <img src="<?php echo base_url('images/logo/web_logo.png'); ?>" alt="">
                    </a>
                </div>


                <div class="signInCard">

                    <div class="card-container">


                        <div class="bottomOption-container">

                            <h3>Step 1 of 2</h3>

                            <h2>Create an account</h2>


                            <div class="icon-container">

                                <div class="google">
                                    <button type="button" id="otherOptionLogin" onclick="">
                                    <img src="https://cdn-icons-png.flaticon.com/512/300/300221.png" alt="">
                                    </button>
                                </div>
    
                                <div class="facebook">
                                    <button type="button" id="otherOptionLogin" onclick="">
                                    <img src="https://cdn-icons-png.flaticon.com/512/5968/5968764.png" alt="">
                                    </button>
                                </div>

                            </div>

                        </div>


                        <div class="divider">
                            <div class="leftDivider"></div>
                            <p>Or</p>
                            <div class="rightDivider"></div>
                        </div>
        
                        <div class="topOption-container">

                            <h3>Sign up with email</h3>

                            <div class="p-container">
                                <p>Already have an account? &nbsp</p>
                                <a href="http://localhost/travelagency_ci/index.php/Account/redirect_signIn"><p>Sign in</p></a>
                            </div>

                            <div class="input-container">
                                <form name="registerSignUp" id="registerSignUp" method="post"
                                action="http://localhost/travelagency_ci/index.php/Account/create_user_1">
                                        <div class="textbox-container">
                                            <p>Username</p>
                                                <input type="text" name="username" id="email_address" placeholder="" onclick="" required>
                                        </div>
                                        <div class="textbox-container">
                                            <p>Password</p>
                                                <input type="password" name="pass" id="password" placeholder="" onclick="" required>
                                            <br>
                                                <div class="button">
                                                    <button type="submit" class="" id="continue" name="continue" onclick="validateForm()">Continue</button>
                                                </div>
                                        </div>
                                </form>
                            </div>

                        </div>
                        
                    </div>

                </div>

            </div>

        <!--</form>-->

    </div>

</body>
</html>
