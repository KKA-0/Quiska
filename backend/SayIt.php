<?php
    include('form.php');
    
     
    if(!isset($_GET['user']))
    {
    header('location: index.html');
    }
    else if (isset($_GET['user']))
    {
    $user = $_GET['user'];
    }

$query = "SELECT * FROM users WHERE id='$user'";
$query_run = mysqli_query($con, $query);

    
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Say It</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="confession.css">
    <script src="https://kit.fontawesome.com/9a28018dec.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" ></script>
    <style> @import url('https://fonts.googleapis.com/css2?family=Chivo+Mono:wght@600&display=swap'); </style>
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Chivo+Mono:wght@600&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/5/54/Q_magazine_logo.svg/2034px-Q_magazine_logo.svg.png">
</head>
<body>
  <nav>
    <input type="checkbox" id="check">
    <label for="check" class="check-btn">  
        <i class="fas fa-bars"></i>
    </label>    
    
    <label class="logo">Quiska</label>
    <ul>
      
    <li><a class="active fcka" href="#">Dashboard<i class="fas fa-home"></i></a></li>
    <li><a class="test fcka" href="#quiz">Quizs</a></li>
    
    <li><a class="login fcka" href="logout.php">Log-Out</Log-Out></i></a></li>
    </ul>
   </nav>
   <section class="features">
    <span class="btn-options"><a class="rida" href="dashboard.html"></a></span>
    <span class="btn-options-2"><a class="rida-2" href="Confession.php"></a></span>
    
  </div>

   </section>
   
  <section class="confess">
    <h1 class="welcome">SayIt To <?php if(mysqli_num_rows($query_run) > 0)
                                                    {
                                                        foreach($query_run as $row)
                                                        {
                                                              echo $row['username'];
                                                        }
                                                    }
                                                    else
                                                    {
                                                          echo "no record found";
                                                    }
                                                ?> 
  
            
<section>
<div class="box67">This is a small space to tell whatever you want to tell. nobody will be able to know who wrote it.</div> 
  <form action="confess-sub.php" method="POST">
    <div class="form-group1">
        <label class="label_txt2">Message:</label>
        <br>
         
        <textarea type="text-area"  name="message" class="form-controlmsg" placeholder="Enter Your Message" required> </textarea>
    </div>
    <input type = "hidden" name ="karan" value = "<?php echo $_GET['user'] ?>" />
    <input type = "hidden" name ="url" value = "<?php echo 'http://localhost/quiska/sayit.php?user=';  echo $_GET['user'] ?>" />
    <button type="submit" name="submit" id="submit" class="glow-on-hovera" value="send">Submit</button>  
  </form>
</section class="box69">         
<div class="under"></div></h1>  
      </div>
  </section>
  <section class="stat">
    
</section>



<section class="quiz">
<div class="box2">
    <h1 id="quiz">Quizs</h1>
</div>


</section>
<!-- Parallex shit end-->
<section class="footer">
  <div class="footer1">
  
  <footer>
  <div class="contacts">
      <h5 >Terms and Conditions</h5>
      <br>
      
      <h5 >Privacy Policy </h5>
      <br>
      <h5 >Contact Us </h5>
  
  </div>
      
      <br>
      <hr>
      <br>
      <h4>Made by Karan Agarwal</h4> 
      
      <h4>Follow us on: <i class="fa-brands fa-instagram"></i></h4>
      <br><h6 class="copy"> © Quiska.quantgam.com, Inc. All rights reserved.</h6>
  <br>
  
  </footer>
  </div></section>
</body>
</html>
