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
</head>
<body>
    
</body>
<script type="text/javascript" src="./../../public/javascript.js"></script>
</html>
<?php
include_once('./../../public/components/footer.php');
?>