<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Quiska</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/9a28018dec.js" crossorigin="anonymous"></script>
</head>

<?php
    require_once './../public/components/navbar.php';
?>
<body>
    <section>
        <!-- signup Page -->
    <div class="signup-container">
        <div class="signup-fields">
            <div class="signup-text">
                <span>Sign up</span>
            </div>
            <div class="signup_name-div">
                <div class="group">      
                    <input type="text" required>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label><i class="fa-solid fa-user" style="color: #000000;"></i>Your Name</label>
                </div>
                <div class="group">      
                    <input type="text" required>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label><i class="fa-solid fa-envelope" style="color: #000000;"></i>Your Email</label>
                </div>
                <div class="group">      
                    <input type="text" required>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label><i class="fa-solid fa-lock" style="color: #000000;"></i>Your Password</label>
                </div>
                <div class="group">      
                    <input type="text" required>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label><i class="fa-solid fa-lock" style="color: #000000;"></i>Repeat your password</label>
                </div>
                <div class="terms-of-service">
                    <input type="checkbox" class="terms-of-service-checkbox" required> 
                    <span class="terms-of-service-text">I agree all statements in <u>Terms of service</u></span>
                </div> 
            </div>
        </div>
        <div class="signup-image" style="margin: auto;">
            <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjmQIdGpq0TS_6tuHMlDIwHQn0iTuv76x16WT6IzwaGYQlsJybBF6kyL7Y7bLTi-DWmriXDiFBAepfJLVx6fmmZp9IcDxROrMJNwl_YfoA6qdi-uPijkH4-WgI3rQeeUGrSZE59UjyTsHWNkHGLMdJLhL-9JkWjii0aBoCcukJ6IU4CYTLKPq6ag6bByB0/s320/signup.png" alt="">
        </div>
    </div>
        <!-- signup Page End -->
    </section>
</body>
<?php
    require_once './../public/components/footer.php';
?>
</html>