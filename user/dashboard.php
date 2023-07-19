<?php
    $path_home = "../index.php";
    $path_sayit = "./sayit.php";
    $path_quiz = "./quiz.php";
    $path_contact = "./contact.php";
    $logout = "./../backend/logout.php";
    $join = 0;
    session_start();
    // check if the user is already logged in
    if(!isset($_SESSION['id']))
    {
        echo "You are not logged in";
        header("location: ./join.php");
        exit;
    }
    include_once('./../config/config.php')
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../public/style.css">
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
    <div id="greetuser">
        <h2>Good Morning, <?php echo $_SESSION["name"]; ?>!</h2>
    </div>
<div class="container-dashboard">
    <center>
        <div class="container-stats">
            <div id="dotSVG_div">
            <svg id="dotSVG" enable-background="new 0 0 24 24" id="Layer_1" version="1.0" width="30" height="30" viewBox="0 0 24 24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <circle cx="12" cy="12" r="2" />
                <circle cx="12" cy="5" r="2" />
                <circle cx="12" cy="19" r="2" />
            </svg>
            </div>
        </div>
        <div class="container-stats">
            <div id="dotSVG_div">
                <svg id="dotSVG" enable-background="new 0 0 24 24" id="Layer_1" version="1.0" width="30" height="30" viewBox="0 0 24 24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <circle cx="12" cy="12" r="2" />
                    <circle cx="12" cy="5" r="2" />
                    <circle cx="12" cy="19" r="2" />
                </svg>
            </div>
        </div>
        <div class="container-stats">
        <div id="dotSVG_div">
            <svg id="dotSVG" enable-background="new 0 0 24 24" id="Layer_1" version="1.0" width="30" height="30" viewBox="0 0 24 24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <circle cx="12" cy="12" r="2" />
                <circle cx="12" cy="5" r="2" />
                <circle cx="12" cy="19" r="2" />
            </svg>
            </div>
        </div>
    </center>
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
<script type="text/javascript" src="./../public/javascript.js"></script>
</html>