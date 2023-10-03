<?php
    $path_home = "../";
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
    include_once('./../config/config.php');

    //counting the sayits for the users

    $sql = "SELECT COUNT(*) FROM sayit WHERE userid = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "s", $param_userid);
    $param_userid = $_SESSION['id'];
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    mysqli_stmt_bind_result($stmt, $count);
    mysqli_stmt_fetch($stmt);
    $sayitCount =  $count;

    //setting ID
    $idFromSESSION = $_SESSION['id'];

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
        <h2>Welcome Back, <?php echo $_SESSION["name"]; ?>!</h2>
        <a href="./quiz/add.php" >
        <button class="DASHBOARD_CREATE">
            <div class="sign_DASHBOARD_CREATE">+</div>
            <div class="text_DASHBOARD_CREATE">Create</div>
        </button>
        </a> 
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
            <span class="statsTextone">Total SayIt</span>
            <br/>
            <br/>
            <span class="statsTextone"><?php echo $sayitCount ?></span>
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
        <div class="container-sayit_link">
        <div id="heading_sayit_container"><h3>Your SayIt Link</h3></div>
        <svg style="z-index: 1; height: 20rem;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill=" rgba(150, 93, 233, 1)" fill-opacity="1" d="M0,288L48,288C96,288,192,288,288,245.3C384,203,480,117,576,117.3C672,117,768,203,864,197.3C960,192,1056,96,1152,53.3C1248,11,1344,21,1392,26.7L1440,32L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
        </svg>
            <div id="sayit_link_div">
                <input id="sayit_link" type="text" value="localhost/quiska/user/sayit.php?user=<?php echo $_SESSION['name'] ?>" readonly>
                <svg onclick="sayitLinkCopy()" class="pointer" viewBox="0 0 30 30" height="30" width="30" xmlns="http://www.w3.org/2000/svg">
                    <path d="M21,8.94a1.31,1.31,0,0,0-.06-.27l0-.09a1.07,1.07,0,0,0-.19-.28h0l-6-6h0a1.07,1.07,0,0,0-.28-.19.32.32,0,0,0-.09,0A.88.88,0,0,0,14.05,2H10A3,3,0,0,0,7,5V6H6A3,3,0,0,0,3,9V19a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V18h1a3,3,0,0,0,3-3V9S21,9,21,8.94ZM15,5.41,17.59,8H16a1,1,0,0,1-1-1ZM15,19a1,1,0,0,1-1,1H6a1,1,0,0,1-1-1V9A1,1,0,0,1,6,8H7v7a3,3,0,0,0,3,3h5Zm4-4a1,1,0,0,1-1,1H10a1,1,0,0,1-1-1V5a1,1,0,0,1,1-1h3V7a3,3,0,0,0,3,3h3Z" fill="#6563ff"/>
                </svg>
            </div>
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
                        <?php
                        include_once('./../backend/private_cards.php');
                        ?> 
            <a href="./sayit/all.php">
                <div class="next-sayit">
                    <i class="fa-solid fa-circle-chevron-right fa-2xl" style="color: #000000;"></i>
                </div>
            </a>
            </div>
        </div>

        <!-- <?php echo $_SESSION['id'] ?> -->

    </div>
</body>
<?php
    include_once('./../public/components/sayitPreview.php');
    require_once './../public/components/alerts.php';
    require_once './../public/components/footer.php';
    include_once("./../public/components/preference.php")
?>
<script type="text/javascript" src="./../public/javascript.js"></script>
</html>