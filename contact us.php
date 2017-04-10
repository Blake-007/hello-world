<?php
require 'PHPMailer-master/PHPMailerAutoload.php';
if(isset($_POST['sendBttn']))
{
	$mail = new PHPMailer;

$mail->IsSMTP(); // telling the class to use SMTP
    $mail->SMTPAuth = true; // enable SMTP authentication
    $mail->SMTPSecure = "ssl"; // sets the prefix to the servier
    $mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
    $mail->Port = 465; // set the SMTP port for the GMAIL server
    $mail->Username = "lngprop500@gmail.com"; // GMAIL username
    $mail->Password = "youlackhatred"; // GMAIL password
                            // TCP port to connect to
$name = $_POST['fname'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$msg = $_POST['msg'];
$mail->setFrom($email, $name);
//$mail->addReplyTo('email@codexworld.com', 'CodexWorld');
$mail->addAddress('lngprop500@gmail.com');   // Add a recipient
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

$mail->isHTML(true);  // Set email format to HTML




$mail->Subject = $subject;
$mail->Body    = $msg;

if(!$mail->send()) {
    echo "<script>alert('Message could not be sent.')</script>";
    echo "<script>alert('Mailer Error: ".$mail->ErrorInfo.")</script>";
} else {
    echo "<script>alert('Message has been sent.')</script>";
}
}

?>

<!DOCTYPE html>
<html lang = "en">
<head>
		<meta charset = "utf-8">
		<title>Contact us</title>
		<link href="css/bootstrap.min.css" rel="stylesheet" />
		<link href="css/stylesheetHome.css" rel="stylesheet" />
		<link href="css/stylesheetAbout2.css" rel="stylesheet" />
		<link href="css/stylesheetContact.css" rel="stylesheet" />
		
	</head>
	
	<body>
		
	 <nav class="navbar navbar-inverse" role="navigation">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">LNG Property</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="home.php">Home</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Property<span class="caret"></span></a>
        <ul class="dropdown-menu">
		  <caption id = "cap">View Commercial:</caption>
          <li><a href="commercial for sale.php">For Sale</a></li>
          <li><a href="commercial for rent.php">For Rent</a></li>
          <caption id = "cap">View Residential:</caption>
		  <li><a href="residential for sale.php">For Sale</a></li>
          <li><a href="residential for rent.php">For Rent</a></li>
        </ul>
      </li>
	  <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Sellers<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="contact us.php">Contact Us</a></li>
        </ul>
      </li>
      <li><a href="about us2.php">About Us</a></li>
    </ul>
	<ul class="nav navbar-nav navbar-right">
      <li><a href="index1.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="index.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
		<div class="[ bootsnipp-search animate ]">
			<div class="[ container ]">
				<form action="searchResult.php" method="GET" role="search">
					<div class="[ input-group ]">
						<input type="text" class="[ form-control ]" name="q" placeholder="Search for area and hit enter">
						<span class="[ input-group-btn ]">
							<button class="[ btn btn-danger ]" type="reset"><span class="[ glyphicon glyphicon-remove ]"></span></button>
						</span>
					</div>
				</form>
  </div>
</nav>

		<article>
			<div id = "form">
			<h1>Contact Us</h1>
		
			<form action = "contact us.php" name = "form" onsubmit="return formValidation()" method="post">
				<p>Name: <input = "text" name = "fname"></p>
				<p>Email: <input = "text" name = "email"></p>
				<p>Subject: <input = "text" name = "subject"></p>
				<label>Message:</label>
				<p><textarea name = "msg" rows = "5" cols = "50"></textarea></p>
				<p><input type="submit" value="Send" name = "sendBttn"> <input type = "reset" value = "Clear"></p>

			</form>
			</div>
			<div id = "contactDets">
				<div id = "contactNum">
					Phone: 031 564 2611
				</div>
			
				<div id = "cellNum">
					Cell: 072 615 7257
				</div>
			
				<div id = "email">
					Email: lngprop@gmail.com
				</div>
			</div>
		</article>
		


		<footer class = "foot">
			<h2 class = "footer-heading">LNG Property</h2>
			2016 &copy LNG Property Developed by BMG Development &reg.
		</footer>
		
		<script src="js/jquery-1.12.2.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script language = "JavaScript1.2">
			function formValidation() 
			{
				var name = document.forms["form"]["fname"].value;
				var email = document.forms["form"]["email"].value;
				var msg = document.forms["form"]["textArea"].value;
    
				
				if(name == null || name == ""|| email == null || email == "" || msg == null || msg == "")
				{
					alert("All fields must be filled out");
					return false;
				}
				var val = email.search('@');
				if( val == -1)
				{
					alert("Invalid email address");
					return false;
				}
			}
		</script>
	</body>
	
	
	</html>