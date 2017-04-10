<?php
	session_start();
	include_once 'dbconnect.php';
	
	if(isset($_POST['submitBttn']))
	{
		$staffID = $_POST['staff'];
		$street = $_POST['street'];
		$city = $_POST['city'];
		$area = $_POST['area'];
		$postalCode = $_POST['postalCode'];
		$type = $_POST['type'];
		$commRes = $_POST['commercial/residential'];
		$rentSale = $_POST['rent/sale'];
		$price = $_POST['price'];
		$heading = $_POST['heading'];
		$descrip = $_POST['description'];
		$numBeds = $_POST['beds'];
		$numBaths = $_POST['baths'];
		$numGarages = $_POST['garage'];
		$ownerID = $_POST['owner'];
		$summDescription = substr($descrip, 0, -25).'....';  
		$staffID = 
		$query = "INSERT INTO `lng_prop`.`property` (`street`, `area`, `city`, `postalCode`, `type`, `commercialResidential`, `rentSale`, `price`, `heading`, `description`, `numBeds`, `numBaths`, `numGarages`, `summDescription`, `staffNo`, `ownerNo`) 
		VALUES ('$street', '$area', '$city', '$postalCode', '$type', '$commRes', '$rentSale', '$price', '$heading', '$descrip', '$numBeds', '$numBaths', '$numGarages', '$summDescription', '$staffID', '$ownerID')";
		mysql_query($query);

	}
	if (isset($_POST['submitBttn2'])) {
		$j = 0;     // Variable for indexing uploaded image.
		$target_path = "upload img/";     // Declaring Path for uploaded images.
		for ($i = 0; $i < count($_FILES['attachPhoto1']['name']); $i++) {
// Loop to get individual element from the array
		$validextensions = array("jpeg", "jpg", "png");      // Extensions which are allowed.
		$ext = explode('.', basename($_FILES['attachPhoto1']['name'][$i]));   // Explode attachPhoto1 name from dot(.)
		$file_extension = end($ext); // Store extensions in the variable.
		$name = basename($_FILES['attachPhoto1']['name'][$i]);
		$target_path = $target_path . basename($_FILES['attachPhoto1']['name'][$i]);     // Set the target path with a new name of image.
		$j = $j + 1;      // Increment the number of uploaded images according to the files in array.
        if (($_FILES["attachPhoto1"]["size"][$i] < 100000)     // Approx. 100kb files can be uploaded.
		&& in_array($file_extension, $validextensions)) {
		if (move_uploaded_file($_FILES['attachPhoto1']['tmp_name'][$i], $target_path)) {
// If file moved to uploads folder.
		//echo $j. 
			echo"<script>alert('Image uploaded successfully');</script>";
			
		} else {     //  If File Was Not Moved.
		//echo $j.
			echo "<script>alert('Error please try again');</script>";
			
		}
		} else {     //   If File Size And File Type Was Incorrect.
		//echo $j.
			echo "<script>alert('Inavlid file size or type ');</script>";
			
		}
		}
		$propSQL = "SELECT count(propID)+1 as id FROM lng_prop.property";
		$prop = mysql_query($propSQL);
		$propID = 0;
		while($row = mysql_fetch_assoc($prop))
		{
			$propID = $row['id'];
			
		}
		if(strpos($name, '.2') !== false)
		{
			$query = "INSERT INTO `lng_prop`.`imagegal` (`imgName`, `imagePath`, `prop_No`) VALUES ('img', '$name', $propID)";
			mysql_query($query);
		}
		else if(strpos($name, '.3') !== false)
		{
			$query = "INSERT INTO `lng_prop`.`imagegal` (`imgName`, `imagePath`, `prop_No`) VALUES ('img', '$name', $propID)";
			mysql_query($query);
		}
		else if(strpos($name, '.4') !== false)
		{
			$query = "INSERT INTO `lng_prop`.`imagegal` (`imgName`, `imagePath`, `prop_No`) VALUES ('img', '$name', $propID)";
			mysql_query($query);
		}
		else if(strpos($name, '.5') !== false)
		{
			$query = "INSERT INTO `lng_prop`.`imagegal` (`imgName`, `imagePath`, `prop_No`) VALUES ('img', '$name', $propID)";
			mysql_query($query);
		}
		else
		{
			$query = "INSERT INTO `lng_prop`.`image` (`imgName`, `imagePath`, `propNo`) VALUES ('$name', '$name', '$propID')";
			mysql_query($query);
		}
		
		}
	
?>


<!DOCTYPE html>
<html lang = "en">
<head>
		<meta charset = "utf-8">
		<title>Upload Property</title>
		<link href="css/bootstrap.min.css" rel="stylesheet" />
		<link href="css/stylesheetHome.css" rel="stylesheet" />
		<link href="css/stylesheetAbout2.css" rel="stylesheet" />
		<link href="css/stylesheetContact.css" rel="stylesheet" />
		<link href="css/uploadStyle1.css" rel="stylesheet" />
		
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
      
      <li><a href="home.php"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
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
			<h1>Upload property</h1>
		
			<form action = "upload.php" name = "form"  method="post">
				<p>Staff ID: <input = "text" name = "staff" required></p>
				<p>Street: <input = "text" name = "street" required></p>
				<p>Area: <input = "text" name = "area" required></p>
				<p>City: <input = "text" name = "city" required></p>
				<p>Postal Code: <input = "text" name = "postalCode" required></p>
				<p>Type: <select name = "type" required>
					<option>House</option>
					<option>Factory</option>
					<option>Apartment</option>
					<option>Flat</option>
					<option>Office</option>
					<option>Warehouse</option>
				</select></p>
					<p>Commercial/Residential: <select name = "commercial/residential" required>
					<option>Commercial</option>
					<option>Residential</option>
					
				</select></p>
					<p>Rent/sale<select name = "rent/sale" required>
					<option>rent</option>
					<option>sale</option>
					
				</select></p>
				<p>Price:  <input = "text" name = "price" required></p>
				<p>Heading:  <input = "text" name = "heading" required></p>
				<label>Description:</label><p><textarea name = "description" rows = "5" cols = "50" required></textarea></p>
				<p>Number of Bedrooms: <input = "text" name = "beds" required></p>
				<p>Number of bathrooms:  <input = "text" name = "baths" required></p>
				<p>Number of garages:  <input = "text" name = "garage" required></p>
				<p>Owner ID:  <input = "text" name = "owner" required></p>
				<p><input type="submit" value="Submit" name = "submitBttn"> <input type = "reset" value = "Clear"></p>

			</form>
			<?php
				echo "<form method=get action=changePass.php>
								<input type=hidden name=id value=$staffID>
							<button type=submit>Change Your Password</button>
							</form>";
			?>
		</article>
		
		<section id = "imgSection">	
			<form action="" method="post" name="" id="" enctype="multipart/form-data">
				<input type='file' name='attachPhoto1[]' multiple />
			<input type = "submit" name = "submitBttn2" value = "Upload Image"/>
		</section>

		<footer class = "foot">
			<h2 class = "footer-heading">LNG Property</h2>
			2016 &copy LNG Property Developed by BMG Development &reg.
		</footer>
		
		<script src="js/jquery-1.12.2.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		
	</body>
	
	
	</html>