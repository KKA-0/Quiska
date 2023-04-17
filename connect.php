<?php
$host = '192.168.1.85';

$user = 'root';

$pass = 'karan@123';

$conn = mysql_connect($host, $user, $pass);
if (!$conn) {
    die("Connection failed: ");
}echo "Connected successfully";
?>