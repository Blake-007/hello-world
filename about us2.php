<!DOCTYPE html>
<html lang = "en">
<head>
		<meta charset = "utf-8">
		<title>About us</title>
		<link href="css/bootstrap.min.css" rel="stylesheet" />
		<link href="css/stylesheetHome.css" rel="stylesheet" />
		<link href="css/stylesheetAbout2.css" rel="stylesheet" />
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
	<h1 id = "head">LNG Property</h1>
		
		<article>
			<div class = "para">
				<p>LNG Property was founded in 2014 by Larry Gilbert, and currently heads up the estate agency. 
				LNG Property is an estate agency that specialises in property sales with a growing market share in the Durban North areas. 
				Our focus is timely, professional and risk free delivery of property brokerage services and putting the needs of our clients first.</p>
				
			</div>
		</article>
		
		<footer class = "foot">
			<h2 class = "footer-heading">LNG Property</h2>
			2016 &copy LNG Property Developed by BMG Development &reg.
		</footer>
		
		<script src="js/jquery-1.12.2.min.js"></script>
		<script src="js/bootstrap.min.js"></script>



</body>
	
</html>