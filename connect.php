<?php
//These are the defined authentication environment in the db service

// The MySQL service named in the docker-compose.yml.
$host = '192.168.1.85';

// Database use name
$user = 'root';

//database user password
$pass = 'karan@123';

// check the MySQL connection status
$conn = new mysqli($host, $user, $pass);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected to MySQL server successfully!";
}
