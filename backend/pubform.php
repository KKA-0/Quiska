<?php

include_once('./../config/config.php');

$err = "";
$name = $message = "";

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $name = $_POST['name'];
    $message = $_POST['mess'];
    if($name == "" || $message == ""){
        echo "Empty Feilds ";
        $err = "Empty Feilds";
        echo $name, $message;
    }
    if(empty($err)){
        $sql = "INSERT INTO public (name, mess) VALUES (?, ?)";
        $stmt = mysqli_prepare($con, $sql);
        if ($stmt){
            mysqli_stmt_bind_param($stmt, "ss",$name, $message);
            if(mysqli_stmt_execute($stmt)){
                echo "Awesome! Your Comment Added!";
            }
            else{
                echo "Something went wrong...";
             }
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($con);
}

?>