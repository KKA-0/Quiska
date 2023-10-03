<?php
    $path_home = "../index.php";
    // session_start();
    include_once('./../config/config.php');
    include_once('./../config/google-api-php-client/googleLogin.php');
    $join = 2;
// check if the user is already logged in
    if(isset($_SESSION['id']))
    {
        echo "You are already logged in";
        header("location: ./dashboard.php");
        exit;
    };

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Quiska</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../public/style.css">
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
            <form action="./../backend/signup.php" method="post" id="signup_form">
            <div class="signup_name-div">
                <div class="group">      
                    <input class="input_signup" type="text" name="name" id="name" required>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label class="input_float"><i class="fa-solid fa-user" style="color: #000000;"></i>Your Name</label>
                </div>
                <div class="group">      
                    <input class="input_signup" type="text" name="username" id="username" required>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label class="input_float"><i class="fa-solid fa-user" style="color: #000000;"></i>User Name</label>
                </div>
                <div class="group">      
                    <input class="input_signup" type="text" name="email" id="email" required>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label class="input_float"><i class="fa-solid fa-envelope" style="color: #000000;"></i>Your Email</label>
                </div>
                <div class="group">      
                    <input class="input_signup" type="password" name="password" id="password" required>    
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label class="input_float"><i class="fa-solid fa-lock" style="color: #000000;"></i>Your Password</label>
                </div>
                <div class="group">      
                    <input class="input_signup" type="password" name="confirm_password" id="confirm_password"  required>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label class="input_float"><i class="fa-solid fa-lock" style="color: #000000;"></i>Repeat your password</label>
                </div>
                <div class="submit-div">
                    <button onclick="preventDefault('signup')" class="submit"> Sign up
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
            <form action="./../backend/login.php" method="POST" id="login_form">
                <div class="signin_name-div">
                    <div class="group">      
                        <input class="input_signup" type="text" id="email_login" name="email_login">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label class="input_float"><i class="fa-solid fa-envelope" style="color: #000000;"></i>Your Email</label>
                    </div>
                    <div class="group">      
                        <input class="input_signup" type="password" id="password_login" name="password_login">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label class="input_float"><i class="fa-solid fa-lock" style="color: #000000;"></i>Your Password</label>
                    </div>
                    <div class="submit-div">
                        <button id="submit" onclick="preventDefault('login')" class="submit"> Sign in
                        </button>
                    </div>
                </form>
                <div class="googlebutton_div">
                   <?php echo '<a href="'.$google_client->createAuthUrl().'"><div class="googlebutton">
                    <svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid" viewBox="0 0 256 262">
                    <path fill="#4285F4" d="M255.878 133.451c0-10.734-.871-18.567-2.756-26.69H130.55v48.448h71.947c-1.45 12.04-9.283 30.172-26.69 42.356l-.244 1.622 38.755 30.023 2.685.268c24.659-22.774 38.875-56.282 38.875-96.027"></path>
                    <path fill="#34A853" d="M130.55 261.1c35.248 0 64.839-11.605 86.453-31.622l-41.196-31.913c-11.024 7.688-25.82 13.055-45.257 13.055-34.523 0-63.824-22.773-74.269-54.25l-1.531.13-40.298 31.187-.527 1.465C35.393 231.798 79.49 261.1 130.55 261.1"></path>
                    <path fill="#FBBC05" d="M56.281 156.37c-2.756-8.123-4.351-16.827-4.351-25.82 0-8.994 1.595-17.697 4.206-25.82l-.073-1.73L15.26 71.312l-1.335.635C5.077 89.644 0 109.517 0 130.55s5.077 40.905 13.925 58.602l42.356-32.782"></path>
                    <path fill="#EB4335" d="M130.55 50.479c24.514 0 41.05 10.589 50.479 19.438l36.844-35.974C195.245 12.91 165.798 0 130.55 0 79.49 0 35.393 29.301 13.925 71.947l42.211 32.783c10.59-31.477 39.891-54.251 74.414-54.251"></path>
                    </svg>Continue with Google
                </div> </a>' ?> 
                </div>
            </div>
        </div>
        <div class="signin-image" style="margin: auto;">
        <center>
            <img class="signin-image-png" style="height: 226px; width: 320px" src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEiGAHv3s06X37qQUTeJtZPVHB68J_XLh-3Aec2E6_uScu2u-xQiWPX7PsVlsnA2Vh4Dz4XDu2gc74nV-t8-5xSaSxrLnIutml-dwdYQulNWClh-Q_HpXsOqkm5s4mpmpqm1XngSX-296Fibvdv6Tn6t5b_ihDDVvBDJCvGGE-tXNOKjeFn2TE1Fnu6AaWk/s1104/signin.png" alt="">
            <a onclick="signupContainer()"><h3 class="signin-option">Not a member? <i class="underline">Sign up</i></h3></a>
        </center>
            <div class="credentials_div">
                <center>
                    <h3 id="center_credentials">Testing Credentials:</h3>
                    <h5 id="center_credentials">Email: admin@test.com</h5>
                    <h5 id="center_credentials">Password: admin123</h5>
                </center>
            </div>
        </div>
    </div>
        <!-- signin Page End -->
    </section>
</body>
<?php
    require_once './../public/components/alerts.php';
    require_once './../public/components/footer.php';
    include_once("./../public/components/preference.php")
?>
<script type="text/javascript" src="./../public/javascript.js">

</script>
</html>
