<?php
    $path_home = "../index.php";
    $path_sayit = "./sayit.php";
    $path_quiz = "./quiz.php";
    $path_contact = "./contact.php";
    $join = 0;
    session_start();
    // check if the user is already logged in
    if(!isset($_SESSION['id']))
    {
        echo "You are already logged in";
        header("location: ./login.php");
        exit;
    }
    include_once('./../config/config.php')
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/9a28018dec.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
  <title>Dashboard - Quiska</title>
</head>
<body>
<?php
    require_once './../public/components/navbar.php';
?>
<div class="container-dashboard">
    <div class="container-stats">

    </div>
        <div class="container-recent-events">
            <div class="container-recent_quiz">
                <div class="next-quiz">
                    <center>
                        <i class="fa-solid fa-circle-chevron-right fa-2xl" style="color: #000000;"></i>
                    </center>
                </div>
            </div>
            <div class="container-recent_sayit">
            <div class="next-sayit">
                    <center>
                        <i class="fa-solid fa-circle-chevron-right fa-2xl" style="color: #000000;"></i>
                    </center>
                </div>
            </div>
        </div>
    </div>
</body>
<?php
    require_once './../public/components/footer.php';
?>
<script type="text/javascript" src="./javascript.js" href="./javascript.js"></script>
</html>