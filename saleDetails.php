<?php
session_start();
include_once 'dbconnect.php';

?>

<!DOCTYPE html>
<html lang = eng>
	<head>
		<meta charset = "UTF-8">
		<title>Property Details</title>
		<link href="css/bootstrap.min.css" rel="stylesheet" />
		<link href="css/stylesheetHome.css" rel="stylesheet" />
		<link href="css/saleDetailsStylesheet.css" rel="stylesheet" />
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
      <li><a href="index.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
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
		<?php
				
				session_start();
				//$id = $_SESSION['id'];
				$id = $_GET['id'];
				
				$sql = mysql_query("select heading from prop_view where propID = $id and imagePath like '%$id.jpg' ");
				while($row = mysql_fetch_assoc($sql))//loops through all values in db, until there are none left
				{
					echo "<h1>".$row['heading']."</h1>";
				}
				
		?>
		
		<article>
			<div class="container">
    <div id="main_area">
        <!-- Slider -->
        <div class="row">
            <div class="col-sm-6" id="slider-thumbs">
                <!-- Bottom switcher of slider -->
                <ul class="hide-bullets">
                    <li class="col-sm-3">
                        <a class="thumbnail" id="carousel-selector-0">
							<?php
								//$id = $_SESSION['id'];
											$id = $_GET['id'];
								
								$img_url = "http://localhost/EC%20project%20code%20/upload img/";
								$propSQL = mysql_query("SELECT imagePath FROM image where propNo = $id and imagePath like '%$id.jpg'");
								while($prop = mysql_fetch_assoc($propSQL))//loops through all values in db, until there are none left
								{
									echo '<img src="'.$img_url.$prop['imagePath'].'">';
					
					
					
								}
								

							?>
                            
                        </a>
                    </li>

                    <li class="col-sm-3">
                        <a class="thumbnail" id="carousel-selector-1"> <?php
											//$id = $_SESSION['id'];
											$id = $_GET['id'];
											
											$img_url = "http://localhost/EC%20project%20code%20/upload img/";
											$propSQL = mysql_query("SELECT imagePath FROM imagegal where prop_No = $id and imagePath like '%2.jpg'");
											while($prop = mysql_fetch_assoc($propSQL))//loops through all values in db, until there are none left
											{
												echo '<img src="'.$img_url.$prop['imagePath'].'">';
				
											}
											

										?></a>
                    </li>

                    <li class="col-sm-3">
                        <a class="thumbnail" id="carousel-selector-2"><?php
											//$id = $_SESSION['id'];
											$id = $_GET['id'];
											
											$img_url = "http://localhost/EC%20project%20code%20/upload img/";
											$propSQL = mysql_query("SELECT imagePath FROM imagegal where prop_No = $id and imagePath like '%3.jpg'");
											while($prop = mysql_fetch_assoc($propSQL))//loops through all values in db, until there are none left
											{
												echo '<img src="'.$img_url.$prop['imagePath'].'">';
				
											}
											

										?></a></a>
                    </li>

                    <li class="col-sm-3">
                        <a class="thumbnail" id="carousel-selector-3"><?php
											//$id = $_SESSION['id'];
											$id = $_GET['id'];
											
											$img_url = "http://localhost/EC%20project%20code%20/upload img/";
											$propSQL = mysql_query("SELECT imagePath FROM imagegal where prop_No = $id and imagePath like '%4.jpg'");
											while($prop = mysql_fetch_assoc($propSQL))//loops through all values in db, until there are none left
											{
												echo '<img src="'.$img_url.$prop['imagePath'].'">';
				
											}
											
											

										?></a>
                    </li>

                    <li class="col-sm-3">
                        <a class="thumbnail" id="carousel-selector-4"><?php
											//$id = $_SESSION['id'];
											$id = $_GET['id'];
											
											$img_url = "http://localhost/EC%20project%20code%20/upload img/";
											$propSQL = mysql_query("SELECT imagePath FROM imagegal where prop_No = $id and imagePath like '%5.jpg'");
											while($prop = mysql_fetch_assoc($propSQL))//loops through all values in db, until there are none left
											{
												echo '<img src="'.$img_url.$prop['imagePath'].'">';
				
											}
											

										?></a>
                    </li>

                  
                   
                </ul>
            </div>
            <div class="col-sm-6">
                <div class="col-xs-12" id="slider">
                    <!-- Top part of the slider -->
                    <div class="row">
                        <div class="col-sm-12" id="carousel-bounding-box">
                            <div class="carousel slide" id="myCarousel">
                                <!-- Carousel items -->
                                <div class="carousel-inner">
                                    <div class="active item" data-slide-number="0">
                                        <?php
										//$id = $_SESSION['id'];
											$id = $_GET['id'];
											
											$img_url = "http://localhost/EC%20project%20code%20/upload img/";
											$propSQL = mysql_query("SELECT imagePath FROM prop_view where propID = $id and imagePath like '%$id.jpg'");
											while($prop = mysql_fetch_assoc($propSQL))//loops through all values in db, until there are none left
											{
												echo '<img src="'.$img_url.$prop['imagePath'].'">';
				
											}
											

										?>
									</div>
                                    <div class="item" data-slide-number="1">
                                         <?php
										//$id = $_SESSION['id'];
											$id = $_GET['id'];
										
											$img_url = "http://localhost/EC%20project%20code%20/upload img/";
											$propSQL = mysql_query("SELECT imagePath FROM imagegal where prop_No = $id and imagePath like '%2.jpg'");
											while($prop = mysql_fetch_assoc($propSQL))//loops through all values in db, until there are none left
											{
												echo '<img src="'.$img_url.$prop['imagePath'].'">';
				
											}
											

										?>
									</div>

                                    <div class="item" data-slide-number="2">
                                         <?php
											
											//$id = $_SESSION['id'];
											$id = $_GET['id'];
											
											$img_url = "http://localhost/EC%20project%20code%20/upload img/";
											$propSQL = mysql_query("SELECT imagePath FROM imagegal where prop_No = $id and imagePath like '%3.jpg'");
											while($prop = mysql_fetch_assoc($propSQL))//loops through all values in db, until there are none left
											{
												echo '<img src="'.$img_url.$prop['imagePath'].'">';
				
											}
											
										?>
									</div>

                                    <div class="item" data-slide-number="3">
                                         <?php
											
											//$id = $_SESSION['id'];
											$id = $_GET['id'];
											$img_url = "http://localhost/EC%20project%20code%20/upload img/";
											$propSQL = mysql_query("SELECT imagePath FROM imagegal where prop_No = $id and imagePath like '%4.jpg'");
											while($prop = mysql_fetch_assoc($propSQL))//loops through all values in db, until there are none left
											{
												echo '<img src="'.$img_url.$prop['imagePath'].'">';
				
											}
											

										?>
									</div>

                                    <div class="item" data-slide-number="4">
                                         <?php
											
											//$id = $_SESSION['id'];
											$id = $_GET['id'];
											
											$img_url = "http://localhost/EC%20project%20code%20/upload img/";
											$propSQL = mysql_query("SELECT imagePath FROM imagegal where prop_No = $id and imagePath like '%5.jpg'");
											while($prop = mysql_fetch_assoc($propSQL))//loops through all values in db, until there are none left
											{
												echo '<img src="'.$img_url.$prop['imagePath'].'">';
				
											}
										

										?>
									</div>
  
                                </div>
                                <!-- Carousel nav -->
                                <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                </a>
                                <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/Slider-->
        </div>

    </div>
</div>
		</article>
		
		<section>
			<?php
				
				//$id = $_SESSION['id'];
				$id = $_GET['id'];
				$sql = mysql_query("select description from property where propID = $id");
				while($row = mysql_fetch_assoc($sql))//loops through all values in db, until there are none left
				{
					echo "<p>".$row['description']."</p>";
				}
				$sql2 = mysql_query("select numBaths, numBeds, numGarages, price from property where propID = $id ");
				while($row2 = mysql_fetch_assoc($sql2))//loops through all values in db, until there are none left
				{
					echo "<p>Price: R".$row2['price']."</p>";
					echo "<p>Number of Bedrooms: ".$row2['numBeds']."</p>";
					echo "<p>Number of bathrooms: ".$row2['numBaths']."</p>";
					echo "<p>Number of garages: ".$row2['numGarages']."</p>";
				}
			

			?>
		
		</section>
		<aside class = "aside">
			<h1>Agent Contact Details:</h1>
			<?php
				
				//$id = $_SESSION['id'];
				$id = $_GET['id'];
				$sql = mysql_query("select fName, lName, cellNum, email from staff_view  where propID = $id ");
				while($row = mysql_fetch_assoc($sql))//loops through all values in db, until there are none left
				{
					echo "<p>".$row['fName']." ".$row['lName']."</p>";
					echo "<p>Contact Number: ".$row['cellNum']."</p>";
					echo "<p>Email: ".$row['email']."</p>";
				}
				

			?>
		</aside>
		<footer  class = "foot">
			<h2 class = "footer-heading">LNG Property</h2>
			2016 &copy LNG Property Developed by BMG Development &reg.
		</footer>
		<script src="js/jquery-1.12.2.min.js"></script>
				<script src="js/bootstrap.min.js"></script>
		<script>
			  jQuery(document).ready(function($) {
 
        $('#myCarousel').carousel({
                interval: 10000
        });
 
        //Handles the carousel thumbnails
        $('[id^=carousel-selector-]').click(function () {
        var id_selector = $(this).attr("id");
        try {
            var id = /-(\d+)$/.exec(id_selector)[1];
            console.log(id_selector, id);
            jQuery('#myCarousel').carousel(parseInt(id));
        } catch (e) {
            console.log('Regex failed!', e);
        }
    });
        // When the carousel slides, auto update the text
        $('#myCarousel').on('slid.bs.carousel', function (e) {
                 var id = $('.item.active').data('slide-number');
                $('#carousel-text').html($('#slide-content-'+id).html());
        });
});
		</script>	
	</body>
	
</html>