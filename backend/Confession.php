

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User SayIt</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="confession.css">
    <script src="https://kit.fontawesome.com/9a28018dec.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" ></script>
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
    <h1 class="welcome">Welcome <div class="under"><?php session_start();  echo $_SESSION['username'] ?></div></h1>
    <br>
    <textarea readonly="true" class="textboi">http://localhost/quiska/sayit.php?user=<?php echo $_SESSION['id'] ?></textarea>
    
      </div>
  </section>
  <section class="stat">
<div class="statics"><p class="textstat">In Last 24 Hours</p></div>
<div class="statics1"><p class="total"><?php echo "100" ?></p><p class="textstat">Total</p></div>
<div class="long-statics"><p class="total"><?php echo "1000000" ?></p><p class="textstat">In Last 7 days</p></div>
</section>


<div class="confessions1">
<?php

  require 'form.php';
$okey = $_SESSION['id'];
$query = "SELECT * FROM confess WHERE userid='$okey' ORDER BY Created_at desc";
$query_run = mysqli_query($con, $query);
$check_faculty = mysqli_num_rows($query_run) > 0;

if($check_faculty)
{
  while ($row = mysqli_fetch_assoc($query_run))
    
  { 
    ?>
    <div class="mess-box"><p class="mess-size"><?php echo $row['message'];?></p><p class="textstat"><?php  echo $row['created_at'];   ?></p></div>
    <?php

    
    
    
  }

}
else{
  echo "no records found";
}



?>

</div>

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
<?php

if(!isset($_SESSION['username']))
{
    header("location: login.php");
    exit;
}
?>