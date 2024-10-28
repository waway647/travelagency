<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    function is_logged_in() {
        $CI =& get_instance();
        if ($CI->session->userdata('username')) {
            redirect('Account/showUserHomePage');
        }
    }

    function check_login() {
        $CI =& get_instance();
        if (!$CI->session->userdata('username')) {
            redirect('Account/showSignIn');
        }
    }