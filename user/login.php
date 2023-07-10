<?php
    $path_home = "../index.php";
    session_start();
    include_once('./../config/config.php');
    $join = 1;
// check if the user is already logged in
    if(isset($_SESSION['id']))
    {
        echo "You are already logged in";
        header("location: ./dashboard.php");
        exit;
    }
?>
<?php 
    $name = $username = $password = $email = $confirm_password = "";
    $nameerr = $username_err = $password_err = $email_err = $confirm_password_err = "";

    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        // Checking Blanks for Credentials ===Start=== 
        if(empty(trim($_POST["name"]))){
            $name_err = "Name can't be blank";
        }
        else if(empty(trim($_POST["username"]))){
            $username_err = "User Name can't be blank";
        }
        else if(empty(trim($_POST["email"]))){
            $email_err = "User email can't be blank";
        }
        else if(empty(trim($_POST["password"]))){
            $password_err = "User password can't be blank";
        }
        else if(empty(trim($_POST["confirm_password"]))){
            $confirm_password_err = "User confirm password can't be blank";
        }
        else if(trim($_POST['password']) !=  trim($_POST['confirm_password'])){
            $password_err = "Passwords should match";
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
                    $username_err = "This username is already taken"; 
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
                    $email_err = "This email is already registered";  
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

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Quiska</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/9a28018dec.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
</head>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
<?php
    require_once './../public/components/navbar.php';
?>
<body>
    <section class="section-login-signup">
        <!-- signup Page -->
    <div class="signup-container">
        <div class="signup-fields">
            <div class="signup-text">
                <span>Sign up</span>
            </div>
            <form action="" method="post" onsubmit="preventDefault()">
            <div class="signup_name-div">
                <div class="group">      
                    <input type="text" name="name"  required>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label><i class="fa-solid fa-user" style="color: #000000;"></i>Your Name</label>
                </div>
                <div class="group">      
                    <input type="text" name="username" required>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label><i class="fa-solid fa-user" style="color: #000000;"></i>User Name</label>
                </div>
                <div class="group">      
                    <input type="text" name="email" required>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label><i class="fa-solid fa-envelope" style="color: #000000;"></i>Your Email</label>
                </div>
                <div class="group">      
                    <input type="password" name="password" required>    
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label><i class="fa-solid fa-lock" style="color: #000000;"></i>Your Password</label>
                </div>
                <div class="group">      
                    <input type="password" name="confirm_password"  required>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label><i class="fa-solid fa-lock" style="color: #000000;"></i>Repeat your password</label>
                </div>
                <div class="terms-of-service">
                    <input type="checkbox" class="terms-of-service-checkbox" required> 
                    <span class="terms-of-service-text">I agree all statements in <u>Terms of service</u></span>
                </div> 
                <div class="submit-div">
                    <button class="submit"> Sign up
                    </button>
                </div>
                </form>
            </div>
        </div>
        <div class="signup-image" style="margin: auto;">
            <img class="image-svg" src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjmQIdGpq0TS_6tuHMlDIwHQn0iTuv76x16WT6IzwaGYQlsJybBF6kyL7Y7bLTi-DWmriXDiFBAepfJLVx6fmmZp9IcDxROrMJNwl_YfoA6qdi-uPijkH4-WgI3rQeeUGrSZE59UjyTsHWNkHGLMdJLhL-9JkWjii0aBoCcukJ6IU4CYTLKPq6ag6bByB0/s320/signup.png" alt="">
            <a onclick="signinContainer()"><h3 class="signin-option">Already a member? <i class="underline">Sign in</i></h3></a>
        </div>
        <div class="signin-fields">
            <div class="signin-text">
                <span>Sign in</span>
            </div>
            <form action="./../backend/login.php" method="POST">
            <div class="signin_name-div">
                <div class="group">      
                    <input type="text" name="email_login">
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label><i class="fa-solid fa-envelope" style="color: #000000;"></i>Your Email</label>
                </div>
                <div class="group">      
                    <input type="password" name="password_login">
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label><i class="fa-solid fa-lock" style="color: #000000;"></i>Your Password</label>
                </div>
                <div class="submit-div">
                    <button class="submit"> Sign in
                    </button>
                </div>
                </form>
            </div>
        </div>
        <div class="signin-image" style="margin: auto;">
            <img class="signin-image-png" style="height: 226px; width: 320px" src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEiGAHv3s06X37qQUTeJtZPVHB68J_XLh-3Aec2E6_uScu2u-xQiWPX7PsVlsnA2Vh4Dz4XDu2gc74nV-t8-5xSaSxrLnIutml-dwdYQulNWClh-Q_HpXsOqkm5s4mpmpqm1XngSX-296Fibvdv6Tn6t5b_ihDDVvBDJCvGGE-tXNOKjeFn2TE1Fnu6AaWk/s1104/signin.png" alt="">
            <a onclick="signupContainer()"><h3 class="signin-option">Not a member? <i class="underline">Sign up</i></h3></a>
        </div>
    </div>
        <!-- signup Page End -->
    </section>
</body>
<?php
    require_once './../public/components/alerts.php';
    require_once './../public/components/footer.php';
?>
<script type="text/javascript" src="./javascript.js" href="./javascript.js"></script>
</html>
