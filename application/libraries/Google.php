<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'third_party/google-api/vendor/autoload.php'; // Include Google API Client

class Google {

    private $client;

    public function __construct() {
        // Initialize the Google Client
        $this->client = new Google_Client();
        $this->client->setApplicationName('travelagency');
        $this->client->setClientId('1039624715098-mfttdpp9pki0h4bbuh9smqerqi9257la.apps.googleusercontent.com');  // Replace with your Google Client ID
        $this->client->setClientSecret('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'); // Replace with your Client Secret
        $this->client->setRedirectUri('http://localhost/GitHub/travelagency/index.php/google/callback'); // Set your callback URL
        $this->client->addScope('email');  // Request email scope for the user
        $this->client->setAccessType('offline');
        $this->client->setPrompt('select_account consent');
    }

    public function getClient() {
        return $this->client;
    }

    // Generate login URL
    public function getLoginUrl() {
        return $this->client->createAuthUrl();
    }

    // Authenticate user and get access token
    public function authenticate($code) {
        $this->client->authenticate($code);
        $accessToken = $this->client->getAccessToken();
        return $accessToken;
    }
}
