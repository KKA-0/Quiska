<?php 

include_once('./../config/config.php');
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $query = ("DELETE FROM sayit WHERE id = ?");
    $stmt = mysqli_prepare($con, $query);
    $deleteID = trim($_POST['deleteID']);
    echo $deleteID;
    mysqli_stmt_bind_param($stmt, "s", $deleteID);
    mysqli_stmt_execute($stmt);
}
?>