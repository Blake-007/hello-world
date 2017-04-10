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

		<h1>SEARCH RESULTS</h1>
		<?php
			session_start();
			include_once 'dbconnect.php';
			
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

			
			
				$area = $_GET['q'];
				
				
				$propSQL = mysql_query("SELECT p.propID,p.heading, p.summDescription, p.numBeds, p.numBaths, p.numGarages, p.price, i.imagePath FROM property as p, image as i where p.area ='$area' and p.propID = i.propNo LIMIT $previousRows, $rowsPerPage" );
				
				$count = mysql_num_rows($propSQL); 
				if($count > 0) 
				{
					$img_url = "http://localhost/EC%20project%20code%20/upload img/";
					while(list($propID, $heading,$summDescription,$numBaths , $numBeds, $numGarages,$price , $img) = mysql_fetch_array($propSQL))//loops through all values in db, until there are none left
					{ 
						$id = $propID;
						//echo "<article>";
						echo "<h3 id = h>".$heading."</h3>";
						echo '<p><a href="#"><img src="'.$img_url.$img.'" alt = "Greenwood Park House" width = "30%" height = "30%"  ></a></p>';
						echo "<p>".$summDescription."</p>";
						echo "<p><u>Num of beds:</u> ".$numBeds." <u>Num of baths:</u> ".$numBaths." <u>Num of Garages:</u> ".$numGarages."</p>";
						echo "<p><u>Price:</u> R".$price."</p>";
					
						echo "<form method=get action=saleDetails.php>
								<input type=hidden name=id value=$id>
							<button type=submit>View Details</button>
							</form>";
						//echo "</article>";
					}
				}
				else
				{
					echo "<h1>No Result Found</h1>";
				}
				$query = "SELECT COUNT(p.propID) AS numrows FROM property as p, image as i where p.propID = i.propNo and p.commercialResidential = 'Residential' and p.commercialResidential = 'Commercial'  and p.rentSale = 'sale' and p.rentSale = 'rent'";

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
				

	
		<script src="js/jquery-1.12.2.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
	
	</html>