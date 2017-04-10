<?php
	session_start();
include_once 'dbconnect.php';
	$name = $_POST["fname"];
	$email = $_POST["email"]; 
	$msg = $_POST["textArea"];
	
	$sql = "INSERT INTO client (fName, lName, message) VALUES ('$name', '$email', '$msg')";
	
	if(mysql_query($sql))
	{

		echo "<script>
			alert('Message submitted successfully');
			</script>";
		
	} 
	else
	{

		echo "ERROR: Could not able to execute $sql. " . mysql_error();

	}
	
?>
<html>
	<head>
		<title>Thank you</title>
	</head>
	<body>
	
	<table width="400" border="0" cellspacing="0" cellpadding="0">
		<tr>
		<td>
			<div align="center">Thank You, Your Information Has Been Submitted</div>
		</td>
		</tr>
	</table>
</body>
</html>