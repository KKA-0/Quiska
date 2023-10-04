<?php
    $path_home = "./../../";
    $path_sayit = "./../sayit.php";
    $path_quiz = "./../quiz.php";
    $path_contact = "./../contact.php";
    $logout = "./../../backend/logout.php";
    $join = 0;
    session_start();
    if(!isset($_SESSION['id']))
        {
            echo "You are not logged in";
            header("location: ./../join.php");
            exit;
        }
include_once('./../../public/components/navbar.php');
header("Access-Control-Allow-Origin: *");

?>
<link rel="stylesheet" href="./../../public/style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body class="createQuizbody">
    <div class="createQuizDiv">
        <!-- <div class="quizOptionsSettings">
            <img onclick="closeTutorial()" width="50" height="50" class="close-tutorial" src="https://img.icons8.com/ios-filled/50/close-window.png" alt="close-window"/>    
            <video width="90%" height="360" autoplay loop controls>
                <source src="./../images/tutorial.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video> 
        </div> -->
        <div class="createQuizSidebar">
            <span class="question-span">Question</span>
            <input type="text" class="question-input" onchange="previewTitleUpdate()" placeholder="What is...?">
            <span class="question-span">Options</span>
                <div class="add-options" id="option">
                    <input type="text" onchange="previewTitleUpdate()" class="answer-input" id="OptionA" placeholder="Option A">
                    <input type="text" onchange="previewTitleUpdate()" class="answer-input" id="OptionB" placeholder="Option B">
                </div>
                <!-- <div class="add-options">
                </div> -->
            <button type="submit" onclick="addQuizOption()" id="submit" class="submit">Add More</button>
            <button type="submit" onclick="delQuizOption()" id="button" class="button"><svg viewBox="0 0 448 512" class="svgIcon"><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"></path></svg></button>
        </div>
        <div class="quizPreview">
            <div class="quizTitlePreview">
                <span id="titlePreviewText">What is... ?</span>
            </div>
            <div class="optionsDivPreview">
                <div class="option ansOptionsDiv">
                    <span class="ansPreviewText" id="ansPreviewText_A">Option A</span>
                </div>
                <div class="option ansOptionsDiv">
                    <span class="ansPreviewText" id="ansPreviewText_B">Option B</span>
                </div>
            </div>
        </div>
        <div class="quizLayers">
                <button class="buttonADD" onclick="quiz('add')" type="button">
                    <span class="button__textADD">Share</span>
                    <img class="svg" width="24" height="20" src="https://img.icons8.com/ios-filled/50/paper-plane.png" alt="paper-plane"/>
                </button>
            <div class="addLayer">
                <button class="buttonADD" type="button">
                    <span class="button__textADD">Add New Question</span>
                    <svg class="svg" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><line x1="12" x2="12" y1="5" y2="19"></line><line x1="5" x2="19" y1="12" y2="12"></line></svg>
                </button>
            </div>
        </div>
    </div>
</body>
<script type="text/javascript" src="./../../public/javascript.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.5.1/axios.min.js"></script>
</html>
