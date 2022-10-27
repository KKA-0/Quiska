<!DOCTYPE html>
<html>

<head>
	<title>successfully sent</title>
</head>

<body>
	
		<?php

		$conn = mysqli_connect("localhost", "root", "", "quiska");
		
		if($conn === false){
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}
		
       
		$name = $_REQUEST['name'];
		$email = $_REQUEST['email'];
        $message = $_REQUEST['message'];
		
		$sql = "INSERT INTO contact SET
        name='$name',
        email='$email',
        message='$message'
		";
		if(mysqli_query($conn, $sql)){
			echo "<h3>Thanks for your feedback... Get back to you in short time. </h3>";

			
		} else{
			echo "ERROR: Oops some error accoured "
				. mysqli_error($conn);
		}
		
		mysqli_close($conn);
		?>
	
</body>

</html>