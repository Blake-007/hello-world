<?php
session_start();
include_once 'dbconnect.php';

?>



<!DOCTYPE html>
<html lang = "en">
	<head>
		<meta charset = "utf-8">
		<title>LNG Property Home</title>
		<link href="css/bootstrap.min.css" rel="stylesheet" />
		<link href="css/stylesheetHome.css" rel="stylesheet" />
		
		
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
		
		<aside>
			<div class = "cont">
				<layer id="placeholderlayer"></layer><div id="placeholderdiv"></div>
			
			<div class = "head"><h1>YOU AINT SELLING, IF YOU'RE NOT SELLING WITH LNG</h1></div>
			<div class = "head2"><h1>CLICK HERE TO SELL WITH THE BEST</h1></div>
			</div>
		</aside>
		
		<h1 class = "heading1">Properties of the Week</h1>
		
		<section class = "sect">
		
		
			<article class = "art">
			
				<div class = "saleHeading"><h3>Boss crib for sale in Greenwood Park</h3></div>
				<?php
					
					$img_url = "http://localhost/EC%20project%20code%20/upload img/";
					$imgSQL = mysql_query("SELECT imagePath FROM image where propNo = 1 and imgID = 1");
					while($row = mysql_fetch_assoc($imgSQL))//loops through all values in db, until there are none left
					{
						echo '<a href="#"><img src="'.$img_url.$row['imagePath'].'" alt = "Greenwood Park House"  ></a>';
					}
					
				?>
			<?php
				
				$propSQL = mysql_query("SELECT summDescription, numBeds, numBaths, numGarages FROM property where propID = 1");
				while($prop = mysql_fetch_assoc($propSQL))//loops through all values in db, until there are none left
				{
					
					echo "<p>".$prop['summDescription']."</p>";
					echo "<u>Num of beds:</u> ".$prop['numBeds']." <u>Num of baths:</u> ".$prop['numBaths']." <u>Num of Garages:</u> ".$prop['numGarages']."</p>";
					
				}
				
			?>
				<form method="get" action="saleDetails.php">
					<input type="hidden" name="id" value=1>
					<button type="submit">View Details</button>
				</form>
			
			</article> 
			
			<article class = "art2">
				
					<div class = "saleHeading"><h3>Boss crib for sale in Newlands East</h3></div>
				<?php
					
					
					$img_url2 = "http://localhost/EC%20project%20code%20/upload img/";
					$imgSQL2 = mysql_query("SELECT imagePath FROM image where propNo = 2 and imgID = 2");
					while($row = mysql_fetch_assoc($imgSQL2))//loops through all values in db, until there are none left
					{
						echo '<a href="#"><img src="'.$img_url2.$row['imagePath'].'" alt = "Greenwood Park House"  ></a>';
					}
					
				?>	
				<?php
						
				$propSQL2 = mysql_query("SELECT summDescription, numBeds, numBaths, numGarages  FROM property where propID = 2");
				while($prop2 = mysql_fetch_assoc($propSQL2))//loops through all values in db, until there are none left
				{
					
					echo "<p>".$prop2['summDescription']."</p>";
					echo "<u>Num of beds:</u> ".$prop2['numBeds']." <u>Num of baths:</u> ".$prop2['numBaths']." <u>Num of Garages:</u> ".$prop2['numGarages']."</p>";
					
				}
				echo '<form method="get" action="saleDetails.php">
					<input type="hidden" name="id" value=2>
					<button type="submit">View Details</button>
				</form>';
			?>
				
			
			</article> 
		
		</section>
		
		<footer class = "foot">
			<h2 class = "footer-heading">LNG Property</h2>
			2016 &copy LNG Property Developed by BMG Development &reg.
		</footer>
	
		
		
		<script language="JavaScript1.2">

				var howOften = 5; //number often in seconds to rotate
				var current = 0; //start the counter at 0
				var ns6 = document.getElementById&&!document.all; //detect netscape 6

				// place your images, text, etc in the array elements here
				var items = new Array();
				items[0]="<a href='about us2.php' ><img alt='image0 (9K)' src='img/house4.jpg' height='500' width='100%' border='0' /></a>"; //a linked image
				items[1]="<a href='about us2.php'><img alt='image1 (9K)' src='img/fancy-house1.jpg' height='500' width='100%' border='0' /></a>"; //a linked image
				items[2]="<a href='about us2.php'><img alt='image1 (9K)' src='img/fancy-house2.jpg' height='500' width='100%' border='0' /></a>"; //a linked image
				items[3]="<a href='about us2.php'><img alt='image1 (9K)' src='img/house1.png' height='500' width='100%' border='0' /></a>"; //a linked image
				
    
				function rotater() 
				{
					document.getElementById("placeholder").innerHTML = items[current];
					current = (current==items.length-1) ? 0 : current + 1;
					setTimeout("rotater()",howOften*1000);
				}

				function rotater() 
				{
					if(document.layers) 
					{
					document.placeholderlayer.document.write(items[current]);
					document.placeholderlayer.document.close();
					}
					if(ns6)document.getElementById("placeholderdiv").innerHTML=items[current]
					if(document.all)
					placeholderdiv.innerHTML=items[current];

					current = (current==items.length-1) ? 0 : current + 1; //increment or reset
					setTimeout("rotater()",howOften*1000);
				}
				window.onload=rotater;
//-->
				</script>
				<script src="js/jquery-1.12.2.min.js"></script>
				<script src="js/bootstrap.min.js"></script>
	</body>
	
	
	</html>