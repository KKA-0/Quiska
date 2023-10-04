<?php
// include_once('./../config/config.php');
$query = "SELECT id, userid, message, created_at FROM `sayit` WHERE userid = ? ORDER by id DESC limit 3;";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "s", $idFromSESSION);
    if(mysqli_stmt_execute($stmt)){
        mysqli_stmt_store_result($stmt);
        if(mysqli_stmt_num_rows($stmt) == 0){
            echo '<center style="margin: 80px auto;"> <img src="./../user/images/No data-amico.png" height="200" alt= "not found">
            <h1 style="color: black;">No Sayit`s Found</h1><br><h5>Share your Link on socials to get sayit`s</h5> </center>';
        }
        mysqli_stmt_bind_result($stmt, $id, $userid, $mess, $created_at);
        while(mysqli_stmt_fetch($stmt)){
            echo '<div class="card" id='. $id .' style="width: 80%;" onclick="displayPreviewSayit(`'. $mess .'`)">
            <h3 class="card__title">Anomalous</h3>
            <p class="card__content">'. $mess .'</p>
            <div class="card__date">
                '. $formattedDateTime = date("F j, Y g:i A", strtotime($created_at)) .' </div>
            <div class="card__arrow">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" height="15" width="15">
                    <path fill="#fff" d="M13.4697 17.9697C13.1768 18.2626 13.1768 18.7374 13.4697 19.0303C13.7626 19.3232 14.2374 19.3232 14.5303 19.0303L20.3232 13.2374C21.0066 12.554 21.0066 11.446 20.3232 10.7626L14.5303 4.96967C14.2374 4.67678 13.7626 4.67678 13.4697 4.96967C13.1768 5.26256 13.1768 5.73744 13.4697 6.03033L18.6893 11.25H4C3.58579 11.25 3.25 11.5858 3.25 12C3.25 12.4142 3.58579 12.75 4 12.75H18.6893L13.4697 17.9697Z"></path>
                </svg>
            </div>
        </div>';
        }
    }
    else{
        echo "No Records Found";
    }
    mysqli_stmt_close($stmt);
    mysqli_close($con);

?>