<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
    <link rel="icon" href="<?php echo base_url('images/logo/Logo_final.png'); ?>">
	<!-- <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/styleSignIn.css"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"> -->
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
	<!-- Popper JS -->
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
</head>
<body>

<div id="container">
	<h1>Create Admin Account</h1>
    <form method="post" action="http://localhost/travelagency_ci/index.php/Account/createAdminAcc">
        <div class="input-container">
            <label for="username">Username:</label>
                <input type="text" name="username" id="username" placeholder="Enter username" onclick="" required>
            <br>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" placeholder="Enter email" onclick="" required>
            <br>
            <label for="pass">Password:</label>
                <input type="password" name="pass" id="pass" placeholder="Enter password" onclick="" required>
            <div class="button">
                <button type="submit" id="button" onclick="">Continue</button>
            </div>
        </div>
    </form>
	
</div>

</body>
</html>
