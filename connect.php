<?php
$host = 'db01';

$user = 'root';

$pass = 'karan@123';

$conn = mysqli_connect($host, $user, $pass);
if (!$conn) {
    die("Connection failed: ");
}echo "Connected successfully";
?>