<?php
$con=mysqli_connect('localhost','root','','epiz_32211115_quiska');

if($con){
    echo("Connected to DataBase! 🎉");
}
else{
    echo("No Connected! 😭");
}
?>