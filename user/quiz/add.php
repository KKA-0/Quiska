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
            <button type="submit" onclick="addQuizOption()" class="submit">Add More</button>
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
    </div>
</body>
<script type="text/javascript" src="./../../public/javascript.js"></script>
</html>
