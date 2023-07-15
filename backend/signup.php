<?php 
    include_once('./../config/config.php');
    $name = $username = $password = $email = $confirm_password = "";
    $nameerr = $username_err = $password_err = $email_err = $confirm_password_err = "";

    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        // Checking Blanks for Credentials ===Start=== 
        if(empty(trim($_POST["name"]))){
            $name_err = "Name can't be blank";
            echo $name_err;
        }
        else if(empty(trim($_POST["username"]))){
            $username_err = "User Name can't be blank";
            echo $username_err;
        }
        else if(empty(trim($_POST["email"]))){
            $email_err = "User email can't be blank";
            echo $email_err;
        }
        else if(empty(trim($_POST["password"]))){
            $password_err = "User password can't be blank";
            echo $password_err;
        }
        else if(empty(trim($_POST["confirm_password"]))){
            $confirm_password_err = "User confirm password can't be blank";
            echo $confirm_password_err;
        }
        else if(trim($_POST['password']) !=  trim($_POST['confirm_password'])){
            $password_err = "1";
            echo $password_err;
        }
        // End checking Blanks ===End===
        else{
        // Checking if username name exists ===Start===
            $username_check = "SELECT id FROM users WHERE username = ?";
            $stmt = mysqli_prepare($con, $username_check);
            if($stmt){
                $param_username = trim($_POST['username']);
                mysqli_stmt_bind_param($stmt, "s", $param_username);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    $username_err = "2"; 
                    echo $username_err;
                    return;
                }
                else{
                    $username = trim($_POST['username']);
                }
            }
            mysqli_stmt_close($stmt);                
            // Checking if username name exists ===End===
            // Checking if email name exists ===Start===
            $email_check = "SELECT id FROM users WHERE email = ?";
            $email_check_stmt = mysqli_prepare($con, $email_check);
            if($email_check_stmt){
                $param_email = trim($_POST['email']);
                mysqli_stmt_bind_param($email_check_stmt, "s", $param_email);
                mysqli_stmt_execute($email_check_stmt);
                mysqli_stmt_store_result($email_check_stmt);
                if(mysqli_stmt_num_rows($email_check_stmt) == 1)
                {
                    $email_err = "3";  
                    echo $email_err;
                    return;
                }
                else{
                    $email = trim($_POST['email']);
                }
            }
            mysqli_stmt_close($email_check_stmt);
            // Checking if email name exists ===End===
        }
        // Checking if errors exists if not then sending data to backend ===Start===
        if(empty($name_err) && empty($username_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err)){
            
            $sql = "INSERT INTO users (name, username, email,  password) VALUES (?, ?, ?, ?)";
            $stmt = mysqli_prepare($con, $sql);
            if ($stmt){
                $param_name = trim($_POST['name']);
                $param_password = trim($_POST['password']);
                $param_password = password_hash($param_password, PASSWORD_DEFAULT);
                mysqli_stmt_bind_param($stmt, "ssss",$param_name, $param_username, $param_email, $param_password);
                if(mysqli_stmt_execute($stmt)){
                    echo "Awesome! Your email has been registered";
                    echo "<script>$('#alert').css('display','initial');</script>";
                    echo "<script>$('#alert_text').text('Awesome! Your email has been registered')</script>";
                }
                else{
                   echo "Something went wrong...";
                }
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($con);
        // Checking if errors exists if not then sending data to backend ===End===
}
?>