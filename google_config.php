<?php

//config.php

//Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('637995746103-9fp8ssb20d8b5hmumkcib7m9204pkq2d.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('i9ofoELGslla8xfZ83iHpC5o');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri(BASE_URL.'google_login_check.php');

$google_client->addScope('email');

$google_client->addScope('profile');

//This is for check user has login into system by using Google account, if User not login into system then it will execute if block of code and make code for display Login link for Login using Google account.


?>
