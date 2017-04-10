<?php
session_start();
include_once 'dbconnect.php';

?>

<!DOCTYPE html>
<html lang = "en">
<head>
		<meta charset = "utf-8">
		<title>Residential: For Rent</title>
		<link href="css/bootstrap.min.css" rel="stylesheet" />
		<link href="css/stylesheetHome.css" rel="stylesheet" />
		<link href="css/stylesheetAbout2.css" rel="stylesheet" />
		<link href="css/stylesheetContact.css" rel="stylesheet" />
		<link href="css/stylesheetCommSale.css" rel="stylesheet" />
		
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
		
		<h1 id = "commHeading">RESIDENTIAL PROPERTY FOR RENT</h1>
		<?php
					// rows per page

					$rowsPerPage = 3;

					// if $_GET

					if(isset($_GET['page']))

					{

						$pageNum= $_GET['page'];

					}

					else

						$pageNum = 1;
					// preceding rows

					$previousRows =($pageNum - 1) * $rowsPerPage;

					// the first, optional value of LIMIT is the start position

					//the next required value is the number of rows to retrieve
					$count = 1;
					$sale = "sale";
					$img_url = "http://localhost/EC Project Code/upload img/";
					$imgSQL = "SELECT i.imagePath, p.propID,p.heading, p.summDescription, p.numBeds, p.numBaths, p.numGarages, p.price FROM image as i, property as p where i.propNo = p.propID and p.rentSale = 'rent' and p.commercialResidential = 'Residential'
					          LIMIT $previousRows, $rowsPerPage";
					$result = mysql_query($imgSQL) or die('Error couldn\'t get the data').mysql_error();
					
					
					while(list($img, $propID,$heading, $summDescription, $numBeds, $numBaths, $numGarages, $price) = mysql_fetch_array($result))
					{
						//echo '<article id = art.$count>';
						echo "<h3 id = h>".$heading."</h3>";
						echo '<p><a href="#"><img src="'.$img_url.$img.'" alt = "Greenwood Park House" width = "30%" height = "30%"  ></a></p>';
						echo "<p>".$summDescription."</p>";
						echo "<p><u>Num of beds:</u> ".$numBeds." <u>Num of baths:</u> ".$numBaths." <u>Num of Garages:</u> ".$numGarages."</p>";
						echo "<p><u>Price:</u> R".$price."</p>";
					
						echo "<form method=get action=saleDetails.php>
								<input type=hidden name=id value=$propID>
							<button type=submit>View Details</button>
							</form>";
						
						
						//$count++;
					}
					
					//echo '</article>';
					

				
				
				// Find the number of rows in the query

	$query = "SELECT COUNT(p.propID) AS numrows FROM property as p, image as i where p.propID = i.propNo and p.commercialResidential = 'Residential' and p.rentSale = 'rent' ";

	$result = mysql_query($query) or die('Error, couldn\'t get count title=\"$page\"').mysql_error();

//use an associative array

	$row = mysql_fetch_assoc($result);

	$numrows = $row['numrows'];

	// find the last page number

	$lastPage = ceil($numrows/$rowsPerPage);

//we use ceil which rounds up the result, because if we have 4.2 as an answer, we'd need 5 pages.

	$phpself = $_SERVER['PHP_SELF'];

//if the current page is greater than 1, that is, it isn't the first page

//then we print first and previous links

	if ($pageNum > 1)

	{

		$page = $pageNum - 1;

		$prev = " <a href=\"$phpself?page=$page\" title=\"Page $page\">[Back]</a> ";

		$first = " <a href=\"$phpself?page=1\" title=\"Page 1\">[First Page]</a> ";

	}

	else

	//otherwise we do not print a link, because the current page is

	//the first page, and there are no previous pages

	{

		$prev = ' [Back] ';

		$first = ' [First Page] ';

	}

	// We print the links for the next and last page only if the current page

	//isn't the last page

	if ($pageNum < $lastPage)

	{

		$page = $pageNum + 1;

		$next = " <a href=\"$phpself?page=$page\" title=\"Page $page\">[Next]</a> ";

		$last = " <a href=\"$phpself?page=$lastPage\" title=\"Page $lastPage\">[Last Page]</a> ";

	}

	//the current page is the last page, so we don't print links for

	//the last and next pages, there is of course no next page.

	else

	{

		$next = ' [Next] ';

		$last = ' [Last Page] ';

	}

	//We print the links depending on our selections above

	echo $first . $prev . " Showing page <bold>$pageNum</bold> of

	<bold>$lastPage</bold> pages " . $next . $last;
?>
		
		
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



