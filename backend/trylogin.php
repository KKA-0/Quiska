
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login and signup.css">
    <script src="https://kit.fontawesome.com/9a28018dec.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" ></script>
    <link rel="icon" type="image/x-icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/5/54/Q_magazine_logo.svg/2034px-Q_magazine_logo.svg.png">
    <title>Login and Signup Page</title>
</head>
<body>
  

<div class="ad">
  <template class="ad__mobile">
    // Mobile ad HTML code with inline script
    
    <div class="login">
      <div id="1" class="login-screen">
        <div class="app-title">
          <h1>Login</h1>
        </div>
        <form action="" method="post">
        <div class="login-form">
          <div class="control-group">
          <input type="text" class="login-field" value="" placeholder="Email" id="login-name">
          <label class="login-field-icon fui-user" for="login-name"></label>
          </div>
  
          <div class="control-group">
          <input type="password" class="login-field" value="" placeholder="password" id="login-pass">
          <label class="login-field-icon fui-lock" for="login-pass"></label>
          </div>
  
          <button type="submit" name="submit" id="submit" class="glow-on-hover" value="send">Submit</button>
          </form>
          <a class="login-link" href="signup.php" >Sign up</a>
          
          <a class="login-link" href="#">Lost your password?</a>
        </div>
      </div>
      
   
  </template>
  <template class="ad__desktop">
    // Desktop ad HTML code with inline script
    <div class="bdy">

      <div class="container" id="container">
        <div class="form-container sign-up-container">
          <form action="" method="post">
            <h1>Create Account</h1>
            <div class="social-container">
              <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
              <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
              <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
            </div>
<!--                    signup inputs                                     -->
            <span>or use your email for registration</span>
            <input required type="text" name="usernawertme"placeholder="Username" />
            <input required type="email" name="emaiwertl"placeholder="Email" />
            <input required type="password" name="passwowertrd"placeholder="Password" />
            <input required type="password" name="confirm_password"placeholder="confirm_password" />
            
            <button type="submit" name="submit" id="submit" class="glow-on-hover" value="send">Sign Up</button>
            
          </form>
          
        </div>
        <div class="form-container sign-in-container">
        <form action="" method="post">
            <h1>Sign in</h1>
            <div class="social-container">
              <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
              <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
              <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
            </div>
            <span>or use your account</span>
            <input required type="text" name="username" placeholder="username" />
            <input required type="password" name="password" placeholder="Password" />
            <a href="#">Forgot your password?</a>
            <button type="submit" name="submit" id="submit1" class="glow-on-hover" value="send">Login</button>
          </form>

          <?php
//This script will handle login
session_start();

// check if the user is already logged in
if(isset($_SESSION['username']))
{
    header("location: Confession.html");
    exit;
}
require_once "form.php";

$username = $password = "";
$err = "";

// if request method is post
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if(empty(trim($_POST['username'])) || empty(trim($_POST['password'])))
    {
        $err = "Please enter username + password";
    }
    else{
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
    }


if(empty($err))
{
    $sql = "SELECT id, username, password FROM users WHERE username = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "s", $param_username);
    $param_username = $username;
    
    
    // Try to execute this statement
    if(mysqli_stmt_execute($stmt)){
        mysqli_stmt_store_result($stmt);
        if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt))
                    {
                        if(password_verify($password, $hashed_password))
                        {
                            // this means the password is corrct. Allow user to login
                            session_start();
                            $_SESSION["username"] = $username;
                            $_SESSION["id"] = $id;
                            $_SESSION["loggedin"] = true;

                            //Redirect user to welcome page
                            header("location: Confession.html");
                            
                        }
                    }

                }

    }
}    


}


?>

          
        </div>
        <div class="overlay-container">
          <div class="overlay">
            <div class="overlay-panel overlay-left">
              <h1>Welcome Back!</h1>
              <p>To keep connected with us please login with your personal info</p>
              <button class="ghost" id="signIn">Sign In</button>
            </div>
            <div class="overlay-panel overlay-right">
              <h1>Hello, Friend!</h1>
              <p>Enter your personal details and start journey with us</p>
              <button class="ghost" id="signUp">Sign Up</button>
            </div>
          </div>
        </div>
      </div>
  </template>
  <script>
    const isMobile = matchMedia('(max-device-width: 500px)').matches;
    const ad = document.currentScript.closest('.ad');
    const content = ad
      .querySelector(isMobile ? '.ad__mobile' : '.ad__desktop')
      .content;
    
    ad.appendChild(document.importNode(content, true));

      </script>
</div> 


<footer>
	<p>
		Make with <i class="fa fa-heart"></i> 
		<a href="index.html">Quiska</a>
		
	</p>
</footer>
  <script src="javascript.js"></script>
</body>
</html>


