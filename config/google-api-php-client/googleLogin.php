
<?php

//config.php

//Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('1077172042075-nobr93mocnj6dresbekf08lqiads3mur.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('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');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('http://localhost/quiska/config/google-api-php-client/googleSessionCreate.php');

//
$google_client->addScope('email');

$google_client->addScope('profile');

//start session on web page
session_start();

?>
