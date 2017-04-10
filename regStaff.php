<?php
	session_start();
	include_once 'dbconnect.php';
	
	if(isset($_POST['submitBttn']))
	{
		$firstName = $_POST['fname'];
		$lastName = $_POST['lname'];
		$position = $_POST['position'];
		$sex = $_POST['sex'];
		$dob = $_POST['dob'];
		$cellNum = $_POST['cell'];
		$email = $_POST['email'];
		
		$query = "INSERT INTO `lng_prop`.`staff` (`fName`, `lName`, `position`, `sex`, `dob`, `cellNum`, `email`) 
		VALUES ('$firstName', '$lastName', '$position', '$sex', '$dob', '$cellNum', '$email')";
		mysql_query($query);
		
		echo "<script>alert('Staff member addded successfully')</script>";
	}
	
?>


<!DOCTYPE html>
<html lang = "en">
<head>
		<meta charset = "utf-8">
		<title>Register staff member</title>
		<link href="css/bootstrap.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="css/default.css" type="text/css">
		
		<link href="css/stylesheetHome.css" rel="stylesheet" />
		<link href="css/stylesheetAbout2.css" rel="stylesheet" />
		<link href="css/stylesheetContact.css" rel="stylesheet" />
		<link href="css/uploadStyle1.css" rel="stylesheet" />
		<link href="css/regStaffStyle.css" rel="stylesheet" />
		  
    
		
	</head>
	
	<body>
		
	 <nav class="navbar navbar-inverse" role="navigation">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">LNG Property</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Property<span class="caret"></span></a>
        <ul class="dropdown-menu">
		  <caption id = "cap">View Commercial:</caption>
          <li><a href="#">For Sale</a></li>
          <li><a href="#">For Rent</a></li>
          <caption id = "cap">View Residential:</caption>
		  <li><a href="#">For Sale</a></li>
          <li><a href="#">For Rent</a></li>
        </ul>
      </li>
	  <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Sellers<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Contact Us</a></li>
        </ul>
      </li>
      <li><a href="#">About Us</a></li>
    </ul>
	<ul class="nav navbar-nav navbar-right">
      
      <li><a href="home.php"><span class="glyphicon glyphicon-log-out"></span> Log out</a></li>
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
			<h1>Register staff member</h1>
		
			<form action = "regStaff.php" name = "form"  method="post">
				
				<p>First name: <input = "text" name = "fname" required></p>
				<p>Last name: <input = "text" name = "lname" required></p>
				<p>position: <input = "text" name = "position" required></p>
				<p>sex: <select name = "sex" required>
					<option>M</option>
					<option>F</option>
				</select></p>
				<p>Date of birth: <input type="text" id="datepicker" name = "dob"></p>
				<p>cell Number:  <input = "text" name = "cell" required></p>
				<p>email:  <input = "text" name = "email" required></p>
				
				<p><input type="submit" value="Submit" name = "submitBttn"> <input type = "reset" value = "Clear"></p>
				
			</form>
				<?php
					$query = "select count(staffNo) as id from lng_prop.staff";
					$result = mysql_query($query);
					$staffID = 0;
					while($row = mysql_fetch_assoc($result))
					{
						$staffID = $row['id'];
						echo "<p>Proceed to registering new staff member as user</p>";
						echo "<form method=get action = signUp.php>
								<input type=hidden name=id value=$staffID>
							<button type=submit>Register as a new user</button>
							</form>";
					}
				?>
		</article>
		
		

		<footer class = "foot">
			<h2 class = "footer-heading">LNG Property</h2>
			2016 &copy LNG Property Developed by BMG Development &reg.
		</footer>

		<script src="js/jquery-1.12.2.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/zebra_datepicker.js"></script>
		</body>
</html>