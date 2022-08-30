<?php
session_start();
$dbHost = 'localhost';
$dbName = 'mydb';
$dbUsername = 'root';
$dbPassword = '';
$dbc=mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);

?>