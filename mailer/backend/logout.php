<?php

require_once('./../config/google-api-php-client/googleLogin.php');

session_start();
$_SESSION = array();
$google_client->revokeToken();
session_destroy();
header("location: ./../index.php");

?>