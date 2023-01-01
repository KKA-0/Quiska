<?php
include('form.php');
$message=($_POST['message']);
$karan = ($_POST['karan']);
// ' error fix
$message = str_replace("'", "\'", $message);
mysqli_query($con,"insert into confess (message, userid) values('$message','$karan')");
echo "Success Baby";
?>

<script>
	setTimeout(function () {
	window.location.href= '<?php echo $_POST['url']; ?>'; // rediect hogaya baby
 
 },2000);
 </script>