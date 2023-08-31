<?php

include_once('./googleLogin.php');
include_once('./../config.php');

if(isset($_GET["code"]))
{
 //It will Attempt to exchange a code for an valid authentication token.
 $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

 //This condition will check there is any error occur during geting authentication token. If there is no any error occur then it will execute if block of code/
 if(!isset($token['error']))
 {
  //Set the access token used for requests
  $google_client->setAccessToken($token['access_token']);

  //Store "access_token" value in $_SESSION variable for future use.
  $_SESSION['access_token'] = $token['access_token'];

  //Create Object of Google Service OAuth 2 class
  $google_service = new Google_Service_Oauth2($google_client);

  //Get user profile data from google
  $data = $google_service->userinfo->get();

  //Below you can find Get profile data and store into $_SESSION variable
  if(!empty($data['given_name']))
  {
   $_SESSION['name'] = $data['given_name'];
  }
  if(!empty($data['email']))
  {
   $_SESSION['user_email_address'] = $data['email'];
  }
  $query = "SELECT username FROM users WHERE username = ?";

  $stmt = mysqli_prepare($con, $query);
    $param_username = trim($data['given_name']);
    $param_email = trim($data['email']);
  mysqli_stmt_bind_param($stmt, "s", $param_username);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_store_result($stmt);
  
//   if($stmt){
    if(mysqli_stmt_num_rows($stmt) == 1)
    {
        $query = "SELECT id, email FROM users WHERE email = ?";

        $stmtEmail = mysqli_prepare($con, $query);
          $param_email = trim($data['email']);
        mysqli_stmt_bind_param($stmtEmail, "s", $param_email);
        mysqli_stmt_execute($stmtEmail);
        mysqli_stmt_store_result($stmtEmail);
        if(mysqli_stmt_num_rows($stmtEmail) == 1){
            mysqli_stmt_bind_result($stmtEmail, $id, $email);
            mysqli_stmt_fetch($stmtEmail);
            $_SESSION['id'] = $id;
            header("location: ./../../user/dashboard.php");
            echo "user exist in DB";
        }
    }
    else{
        $addQuery = 'INSERT INTO users (name, username, email, password) VALUES (?, ?, ?, ?)';
        $param_name = $data['given_name'] . " " . $data['family_name'];
        $param_password = "userFromGoogle";
        $stmt = mysqli_prepare($con, $addQuery);
        if ($stmt){
            mysqli_stmt_bind_param($stmt, "ssss",$param_name, $param_username, $param_email, $param_password);
            if(mysqli_stmt_execute($stmt)){
                $queryForid = 'SELECT id FROM users WHERE email = ?';
                $stmtID = mysqli_prepare($con, $queryForid);
                mysqli_stmt_bind_param($stmtID,"s", $param_email);
                mysqli_stmt_execute($stmtID);
                mysqli_stmt_store_result($stmtID);
                mysqli_stmt_bind_result($stmtID, $id);
                mysqli_stmt_fetch($stmtID);
                $_SESSION['id'] = $id;
                header("location: ./../../user/dashboard.php");
            }
            mysqli_stmt_close($stmt);
            mysqli_close($con);
        }

    }
}
}
?>