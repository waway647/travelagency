<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Bedan Travel & Tours</title>
    <link rel="icon" href="<?php echo base_url('images/logo/url_logo.png'); ?>">
	<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/styleSignIn.css?<?php echo time(); ?>"> 

</head>
<body>

<div class="signIn-container">

<div class="main-container">


    <div class="logo-container">
        <a href="http://localhost/GitHub/travelagency/index.php/Account/showHomepage">
            <img src="<?php echo base_url('images/logo/Logo_final.png'); ?>" alt="">
        </a>
    </div>


    <div class="signInCard">

        <div class="card-container">





            <div class="topOption-container">
                <form name="regform" id="regform" method="post"
                action="http://localhost/GitHub/travelagency/index.php/Account/proc_login">
                        <h2>Sign in</h2>

                        <div class="p-container">
                            <p>New user? &nbsp</p>
                            <a href="http://localhost/GitHub/travelagency/index.php/Account/showSignUp_1"><p>Create an account</p></a>
                        </div>

                        <div class="input-container">
                                <p for="email_address">Username or email</p>
                                    <input type="text" name="username" id="email_address" placeholder="" onclick="" required>
                                <br>
                                <br>
                                <p for="password">Password</p>
                                    <input type="password" name="pass" id="password" placeholder="" onclick="" required>

                                    <?php if ($this->session->flashdata('error_message')): ?>
                                        <div class="alert alert-danger">
                                            <?php echo $this->session->flashdata('error_message'); ?>
                                        </div>
                                    <?php endif; ?>
                                    
                                <div class="button">
                                    <button type="submit" id="button" onclick="">Continue</button>
                                </div>
                        </div>
                    </form>
                
            </div>





            <div class="divider">
                <div class="leftDivider"></div>
                <p>Or</p>
                <div class="rightDivider"></div>
            </div>





            <div class="bottomOption-container">

                <div class="socMed-container">

                <a href="http://localhost/github/travelagency">
                    <div class="google">
                        <button type="button" id="otherOptionLogin" onclick="">
                        <img src="https://cdn-icons-png.flaticon.com/512/300/300221.png" alt="">
                        <p>Continue with Google</p>
                        </button>
                    </div>
                    </a>

                    <div class="facebook">
                        <button type="button" id="otherOptionLogin" onclick="">
                        <img src="https://cdn-icons-png.flaticon.com/512/5968/5968764.png" alt="">
                        <p>Continue with Facebook</p>
                        </button>
                    </div>

                </div>

            </div>

            

            <div class="cardFooter">
                <a href=""><p>Get help signing in</p></a>
            </div>
            

        </div>

    </div>

</div>

</div>

</body>
</html>
