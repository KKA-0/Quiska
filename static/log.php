<?php
session_start();

// check if the user is already logged in
if(isset($_SESSION['email_login']))
{
    echo "You are already logged in";
    exit;
}

include_once('./../config/config.php');

$email_login = $password_login = "";
$err = "";

// listening to POST request
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    echo "post request send... \n";
    // check if  Email and password are not empty
    if(empty(trim($_POST['email_login'])) || empty(trim($_POST['password_login'])))
    {
        $err = "Please enter username + password";
    }
    else {
        $email_login = trim($_POST['email_login']);
        $password_login = trim($_POST['password_login']);
        echo "not empty feilds...\n $email_login ,\n $password_login \n";
    }

    if(empty($err)) {
        echo "no errors found...";
        $sql = "SELECT id, email, password FROM users WHERE email = ?";
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, "s", $param_email_login);
        $param_email_login = $email_login; 

        // Try to execute this statement
        if(mysqli_stmt_execute($stmt)) {
            echo "executing stmt... \n";
            mysqli_stmt_store_result($stmt);
            if(mysqli_stmt_num_rows($stmt) == 1) {
                echo "email found... \n";
                mysqli_stmt_bind_result($stmt, $id, $email, $hashed_password);
                if(password_verify($password_login, $hashed_password))
                {
                    // this means the password is correct. Allow user to login
                    session_start();
                    $_SESSION["email"] = $email_login;
                    $_SESSION["id"] = $id;
                    $_SESSION["loggedin"] = true;
                    echo "User logged in";
                    //Redirect user to welcome page
                    header("location: ./../index.php");
                }else{
                    echo "Password is incorrect";
                }
            }
            else{
                echo "error: something went wrong 1";
            }
        }
        else{
            echo "error: something went wrong";
        }
    }
}
?>
