<?php
session_start();
// check if the user is already logged in
if(isset($_SESSION['id']))
{
    echo "You are already logged in";
    header("location: ./user/dashboard.php");
    exit;
}

include_once('./../config/config.php');

$email_login = $password_login = "";
$err = "";

// listening to POST request
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // check if  Email and password are not empty
    $email_login = trim($_POST['email_login']);
    $password_login = trim($_POST['password_login']);
    // echo "$email_login, $password_login";
    if(empty(trim($_POST['email_login'])) || empty(trim($_POST['password_login'])))
    {
        $err = "Please enter username + password";
    }
    else{
        // echo "not empty feilds..";

    if(empty($err)) {
        $sql = "SELECT id, email, name, password FROM users WHERE email = ?";
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, "s", $param_email_login);
        $param_email_login = $email_login; 

        // Try to execute this statement
        if(mysqli_stmt_execute($stmt)) {
            // echo "executing stmt... \n";
            mysqli_stmt_store_result($stmt);
            if(mysqli_stmt_num_rows($stmt) == 1) {
                // echo "email found... \n";
                mysqli_stmt_bind_result($stmt, $id, $email, $name, $hashed_password);
                mysqli_stmt_fetch($stmt);
                if(password_verify($password_login, $hashed_password))
                {
                    // this means the password is correct. Allow user to login
                    echo "success";
                    session_start();
                    $_SESSION["email"] = $email_login;
                    $_SESSION["name"] = $name;
                    $_SESSION["id"] = $id;
                    $_SESSION["loggedin"] = true;
                    //Redirect user to welcome page
                    header("location: ./../user/dashboard.php");
                }else{
                    echo "google";
                }
            }
            else{
                echo "errorUser";
            }
        }
        else{
            echo "error: something went wrong";
        }
    }
}

}

?>
