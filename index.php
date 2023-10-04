<?php
    $join = 1;
    $path_home = "/quiska/index.php";
    $logout = "./backend/logout.php";
    session_start();
    include_once('./config/config.php');
    $id = @$_SESSION['id'];
    if(isset($id)){
        $join = 0;
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta property="og:title" content="Quiska">
    <meta property="og:image" content="./uiska.png">
    <meta property="og:description" content="Welcome to the Anonymous Messaging and Quiz Website!">
    <meta charset="utf-8">
    <title>Quiska</title>
    <meta name="description" content="Welcome to the Anonymous Messaging and Quiz Website!">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/style.css">
    <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=6516d05dd3a9920012124ab4&product=image-share-buttons&source=platform" async="async"></script>
    <script src="https://kit.fontawesome.com/9a28018dec.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script async src="https://unpkg.com/typer-dot-js@0.1.0/typer.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto:100" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="./user/images/logo.ico">
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/1db173a9e0.js" crossorigin="anonymous"></script>
</head>

<body>
    <!--Nav bar start-->
    <?php
        require_once './public/components/navbar.php';
    ?>
    <!--Nav bar End-->
    <div class="box1 bg-body">
    <figure class="td-figure">
        <img style="position: relative;
    height: 100%;
    z-index: 1;" src="./user/images/bg1.png" alt="quiz bg">
    </figure>
        <br>
        <div class="start">
            <p id='head1' class='header'>Quizs Made </p>
            <p id='head2' class='header'>Simple</p>
            <p id='head3' class='header'>And Fun</p>
            <p id='head4' class='header'>Test Yourself <br> or Others</p>
            <p id='head5' class='header'>Welcome to <br> Quiska</p>
        </div>

        <div class="buttonww"><a href="./user/dashboard.php">
            <button class="cssbuttons-io-button"> Get started
                <div class="icon">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"></path><path fill="currentColor" d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z"></path></svg>
                </div>
              </button>
              </a>
        </div>
    </div>

    </div>
    <section class="quiz">
        <div class="box2" id="quiz321">
            <h1 id="quiz">SayIt</h1>
        </div>
            <div class="cardsforsayit">
                <form class="pub_form" action="">
                    <div class="input-container">
                      <input type="text" class="pub_input" id="pubName" name="pubName" placeholder="Name (Optional)">
                      <span>
                      </span>
                  </div>
                  <div class="input-container">
                      <textarea id="pub-textarea" type="text" class="pub_input" name="pubMess" placeholder="Message"></textarea>
                    </div>
                    <h6 id="warning">Slug, Rasict or harmfull Message are prohabited</h6>
                     <button type="submit" onclick="preventDefault('pubForm')" class="submit">
                    Submit
                  </button>
                  </p></form>
                  <!-- CARD START -->
                <?php
                require_once('./backend/public_cards.php')
                ?>
                <!-- CARD END -->
            </div>
    </section>
    <section>
        
    </section>
    <?php
        require_once './public/components/alerts.php';
        require_once './public/components/footer.php';
        require_once './public/components/meta.php';
    ?>

    <script src="./public/javascript.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <?php include_once("./public/components/preference.php") ?>

</body>