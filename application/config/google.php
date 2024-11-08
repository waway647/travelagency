<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
|  Google API Configuration
| -------------------------------------------------------------------
| 
| To get API details you have to create a Google Project
| at Google API Console (https://console.developers.google.com)
| 
|  client_id         string   Your Google API Client ID.
|  client_secret     string   Your Google API Client secret.
|  redirect_uri      string   URL to redirect back to after login.
|  application_name  string   Your Google application name.
|  api_key           string   Developer key.
|  scopes            string   Specify scopes
*/
$config['google']['client_id']        = '144239651874-0keuk9fi648qn79fudjdimfgut4ctm5f.apps.googleusercontent.com';
$config['google']['client_secret']    = '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';
$config['google']['redirect_uri']     = 'http://localhost/GitHub/travelagency/index.php/Account/redirect_userHomePage';
$config['google']['application_name'] = 'Login to Travel Agency';
$config['google']['api_key']          = '';
$config['google']['scopes']           = array();