<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GoogleController extends CI_Controller {

    public $benchmark;
    public $hooks;
    public $config;
    public $log;
    public $utf8;
    public $uri;
    public $router;
    public $output;
    public $security;
    public $input;
    public $lang;
    public $google;

    public function __construct() {
        parent::__construct();
        $this->load->library('Google'); // Load the Google library
        $this->load->helper('url');
    }

    // Google login page
    public function index() {
        $loginUrl = $this->google->getLoginUrl();
        redirect($loginUrl);  // Redirect the user to Google login page
    }

    // Callback function to handle Google response
    public function callback() {
        if (isset($_GET['code'])) {
            // Get access token
            $accessToken = $this->google->authenticate($_GET['code']);
            
            // Set access token
            $this->google->getClient()->setAccessToken($accessToken);
            $googleService = new Google_Service_Oauth2($this->google->getClient());
            
            // Get user information
            $userInfo = $googleService->userinfo->get();

            // Example: Show user info (you can store this in session or database)
            echo '<pre>';
            print_r($userInfo);  // Output user info
            echo '</pre>';

            // Optionally, save user info to session or database
            // $this->session->set_userdata('google_user', $userInfo);
        }
    }
}
