<?php
session_start();

include_once 'dbconnect.php';

if(isset($_POST['btn-signup']))
{
	$uname = mysql_real_escape_string($_POST['uname']);
	
	$upass = md5(mysql_real_escape_string($_POST['pass']));
	
	$uname = trim($uname);
	
	$upass = trim($upass);
	$staffID = $_GET['id'];
	// email exist or not
	$query = "SELECT user_name FROM users WHERE user_name='$uname'";
	$result = mysql_query($query);
	
	$count = mysql_num_rows($result); // if email not found then register
	
	if($count == 0){
		
		if(mysql_query("INSERT INTO users(user_name,user_pass, staffNum) VALUES('$uname','$upass','$staffID')"))
		{
			
			?>
			<script>alert('User added successfully');</script>
			
			<?php
			header("Location: regStaff.php");
			
		}
		else
		{
			?>
			<script>alert('error while registering you...');</script>
			<?php
		}		
	}
	else{
			?>
			<script>alert('Sorry Email ID already taken ...');</script>
			<?php
	}
	
}

?>
<!DOCTYPE html>
<html lang = "en">
<head>
		<meta charset = "utf-8">
		<title>Sign Up</title>
		<link href="css/bootstrap.min.css" rel="stylesheet" />
		<link href="css/stylesheetHome.css" rel="stylesheet" />
		<link href="css/stylesheetAbout2.css" rel="stylesheet" />
		<link href="css/stylesheetContact.css" rel="stylesheet" />
		<link href="css/stylesheetLogin.css" rel="stylesheet" />
		
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
			<center>
				<div id="login-form">
					<form method="post">
					<table align="center" width="30%" border="0">
					<tr>
					<td><input type="text" name="uname" placeholder="User Name" required /></td>
					</tr>
					<tr>
					<td><input type="password" name="pass" placeholder="Your Password" required /></td>
					</tr>
					<tr>
					<td><button type="submit" name="btn-signup">Register</button></td>
					</tr>
					
					</table>
					</form>
				</div>
			</center>
		</article>
		


		<footer class = "foot">
			<h2 class = "footer-heading">LNG Property</h2>
			2016 &copy LNG Property Developed by BMG Development &reg.
		</footer>
		
		<script src="js/jquery-1.12.2.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	
	</body>
	
	
	</html>