<?php
    $path_home = "../index.php";
    $path_sayit = "./sayit.php";
    $path_quiz = "./quiz.php";
    $path_contact = "./contact.php";
    $join = 1;

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
  <title>SayIt - Quiska</title>
</head>
<body class="bg-body">
<?php
    require_once './../public/components/navbar.php';
?>
  <form class="form center-div" action="">
    <div class="form-sayit-wel">Hi, Sent a Private Message. Receiver will don't know who sent it</div>
    <div class="textarea-container">
      <textarea style="resize: none;" type="text" name="message" placeholder="Send Them anonymous message... 😉"></textarea>
    </div>
    <button type="submit" class="submit">Send</button>
  </form>
</body>
<?php
    require_once './../public/components/footer.php';
?>
<script type="text/javascript" src="./javascript.js" href="./javascript.js"></script>
</html>