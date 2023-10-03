<?php
include_once('./../config/config.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $sql = "INSERT INTO sayit (userid, message) VALUES (?, ?)";
    $stmt = mysqli_prepare($con, $sql);
    $id = trim($_POST['id']);
    $message = trim($_POST['message']);
    mysqli_stmt_bind_param($stmt, "ss",$id, $message);
    if(mysqli_stmt_execute($stmt)){
      
    }else{
      echo "Something went wrong...";
   }
   mysqli_stmt_close($stmt);
   mysqli_close($con);
  }

?>