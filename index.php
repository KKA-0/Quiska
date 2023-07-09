<?php
    $join = 1;
    $path_home = "/quiska/index.php";

    include_once('./config/config.php')
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Quiska</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./static/style.css">
    <script src="https://kit.fontawesome.com/9a28018dec.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script async src="https://unpkg.com/typer-dot-js@0.1.0/typer.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto:100" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="./static/images/logo.ico">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
</head>

<body>
    <!--Nav bar start-->
    <?php
        require_once './public/components/navbar.php';
    ?>
    <!--Nav bar End-->
    <div class="box1 bg-body">

        <br>
        <div class="start">
            <p id='head1' class='header'>Quizs Made </p>
            <p id='head2' class='header'>Simple</p>
            <p id='head3' class='header'>And Fun</p>
            <p id='head4' class='header'>Test Yourself or Others</p>
            <p id='head5' class='header'>Welcome to Quiska</p>
        </div>

        <div class="buttonww"><a href="./static/dashboard.php">
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
                <form class="form" action="">
                    <div class="input-container">
                      <input type="text" name="name" placeholder="Name">
                      <span>
                      </span>
                  </div>
                  <div class="input-container">
                      <input type="text" name="message" placeholder="Message">
                    </div>
                     <button type="submit" class="submit">
                    Submit
                  </button>
                  </p></form>
                <div class="card">
                    <h3 class="card__title">Karan Agarwal</h3>
                    <p class="card__content">Hi People, How you doin. </p>
                    <div class="card__date">
                        April 15, 2022
                    </div>
                    <div class="card__arrow">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" height="15" width="15">
                            <path fill="#fff" d="M13.4697 17.9697C13.1768 18.2626 13.1768 18.7374 13.4697 19.0303C13.7626 19.3232 14.2374 19.3232 14.5303 19.0303L20.3232 13.2374C21.0066 12.554 21.0066 11.446 20.3232 10.7626L14.5303 4.96967C14.2374 4.67678 13.7626 4.67678 13.4697 4.96967C13.1768 5.26256 13.1768 5.73744 13.4697 6.03033L18.6893 11.25H4C3.58579 11.25 3.25 11.5858 3.25 12C3.25 12.4142 3.58579 12.75 4 12.75H18.6893L13.4697 17.9697Z"></path>
                        </svg>
                    </div>
                </div>
                <div class="card">
                    <h3 class="card__title">Yash Agarwal</h3>
                    <p class="card__content">Dattebayo</p>
                    <div class="card__date">
                        April 15, 2022
                    </div>
                    <div class="card__arrow">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" height="15" width="15">
                            <path fill="#fff" d="M13.4697 17.9697C13.1768 18.2626 13.1768 18.7374 13.4697 19.0303C13.7626 19.3232 14.2374 19.3232 14.5303 19.0303L20.3232 13.2374C21.0066 12.554 21.0066 11.446 20.3232 10.7626L14.5303 4.96967C14.2374 4.67678 13.7626 4.67678 13.4697 4.96967C13.1768 5.26256 13.1768 5.73744 13.4697 6.03033L18.6893 11.25H4C3.58579 11.25 3.25 11.5858 3.25 12C3.25 12.4142 3.58579 12.75 4 12.75H18.6893L13.4697 17.9697Z"></path>
                        </svg>
                    </div>
                </div>
            </div>
    </section>
    <?php
        require_once './public/components/footer.php';
    ?>

    <script src="javascript.js"></script>
</body>