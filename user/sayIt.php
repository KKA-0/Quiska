<?php
    $path_home = "../index.php";
    $path_sayit = "./sayit.php";
    $path_quiz = "./quiz.php";
    $path_contact = "./contact.php";
    $logout = "./../backend/logout.php";
    $join = 1;
    session_start();
    include_once('./../config/config.php');
    $id = @$_SESSION['id'];
    if(isset($id)){
        $join = 0;
    }
    
    include_once('./../public/components/alerts.php');


    $username = $_GET['user'];
    if(!isset($username))
    {
        echo "user not present";
        header("location: ./join.php");
        exit;
    }
    $sql = "SELECT id, username FROM users WHERE username = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "s", $param_username);
    $param_username = $username;
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    if(mysqli_stmt_num_rows($stmt) == 1){
      mysqli_stmt_bind_result($stmt, $id, $username);
      mysqli_stmt_fetch($stmt);
    }else{
      header("location: ./../index.php");
    }

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
  <title>SayIt - Quiska</title>
</head>
<body class="bg-body">
<?php
    require_once './../public/components/navbar.php';
?>
  <form class="form center-div" action="./../backend/sayitSubmit.php" method="post">
    <div class="form-sayit-wel">Hi, Sent a Private Message. Receiver will don't know who sent it</div>
    <h1 id="userIDsayitSubmit" style="display: none;"> <?php echo $id ?> </h1>
    <div class="textarea-container">
      <textarea style="resize: none;" type="text" id="sayitSubmit" name="message" placeholder="Send Them anonymous message... 😉"></textarea>
    </div>
    <button type="submit" onclick="preventDefault('sayit')"  class="submit">Send</button>
  </form>
</body>
<?php
    require_once './../public/components/footer.php';
    include_once("./../public/components/preference.php")
?>
<script type="text/javascript" src="./../public/javascript.js"></script>
</html>