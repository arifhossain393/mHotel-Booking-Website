
<?php
 include 'config/config.php'; 
 include 'lib/Database.php';
 include 'lib/Session.php';
 Session::init();
 include 'helpers/Formate.php';
 
 $db = new Database();
 $fm = new Formate();
 
?>

<!DOCTYPE html>
<html lang="en">


<head>
	<meta charset="UTF-8">
	<title>hotel reservation for nibizsoft</title><!-- Website's title ( it will be shown in browser's tab ), Change the website's title based on your Hotel information -->
	<meta name="description" content="Pinar is Hotel and Resort HTML template."><!-- Add your Hotel short description -->
	<meta name="keywords" content="Responsive,HTML5,CSS3,XML,JavaScript"><!-- Add some Keywords based on your Hotel and your business and separate them by comma -->
	<meta name="author" content="Joseph a, ravistheme@gmail.com">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, user-scalable=no">
	<link href='https://fonts.googleapis.com/css?family=Lobster%7cRaleway:400,300,100,600,700,800' rel='stylesheet' type='text/css'><!-- Attach Google fonts -->
	<link rel="stylesheet" type="text/css" href="assets/css/styles.css"><!-- Attach the main stylesheet file -->
</head>
<body class="homepage trans-header sticky white-datepicker internal-pages room-details trans-header">
	
	<!-- Top Header -->
	<div id="top-header">
		<div class="inner-container container">
			<!-- Contact Info -->
			<ul class="contact-info list-inline">
				<li><i class="fa fa-phone"></i>01771337972</li>
				<li><i class="fa fa-envelope-o"></i>infonibiz@ravistheme.com</li>
			</ul>

		</div>
		<?php
            if (isset($_GET['action']) && $_GET['action'] == "usrlogout") {
                Session::usrdestroy();
            }
        ?>
		<div class="inner-container container">
			<!-- Contact Info -->
			<ul class="Right-menu">
				<?php 
					if (Session::get("cuslogin") == true) {
						?>
						<li><i class="fa fa-user"></i><a href="profile.php">Profile</a></li> 
						<li><i class="fa fa-envelope-o"></i><a href="?action=usrlogout">Logout</a></li>
				<?php	}else { ?>
						<li><i class="fa fa-user"></i><a href="sign-up.php">Sign Up</a></li> 
						<li><i class="fa fa-envelope-o"></i><a href="login.php">Login</a></li>
				 <?php }

			?>
			</ul>

		</div>
	</div>
	<!-- End of Top Header -->

	<!-- Main Header -->
	<header id="main-header">
		<div class="inner-container container">
			<div class="left-sec col-sm-4 col-md-2 clearfix">
				<!-- Top Logo -->
				<div id="top-logo">
					<div class="title"><span>Pinar</span> Hotel</div>
					<i class="fa fa-star-o"></i>
					<i class="fa fa-star-o"></i>
					<i class="fa fa-star-o"></i>
					<i class="fa fa-star-o"></i>
					<i class="fa fa-star-o"></i>
				</div>
			</div>
			<div class="right-sec col-sm-8 col-md-10 clearfix">



				

				<!-- Main Menu -->
				<nav id="main-menu">
					<ul class="list-inline">
						<li class="active"><a href="index.php">Home</a> 
						</li>
						<li><a href="about.php">About</a></li>
						<li><a href="rooms-list.php">Rooms</a></li>
						<li><a href="restaurant.php">Restaurant</a></li>
						<li><a href="packages.php">Packages</a></li>
						<li><a href="gallery-grid.php">Gallery</a></li>
						<li><a href="guest-book.php">Guest Book</a></li>
						<li><a href="blog.php">Blog</a></li>
						<li><a href="contact.php">Contact</a>
							
						</li>
					</ul>
				</nav>

				<!-- Menu Handel -->
				<div id="main-menu-handle" class="hidden-md hidden-lg"><i class="fa fa-bars"></i></div>
			</div>
		</div>
		<div id="mobile-menu-container" class="hidden-md hidden-lg"></div>
	</header>
	<!-- End of Main Header -->