<?php include 'inc/header.php'; ?>

<?php 
		if (isset($_GET['selectPac'])) {

			$id = $_GET['selectPac'];
			$userId = Session::get("userId");
			$squery = "SELECT * FROM tbl_package WHERE id = '$id'";
			$result = $db->select($squery)->fetch_assoc();

			$resturent_id = $result['resturent_id'];
			$pac_name = $result['pac_name'];
			$pac_desc = $result['pac_desc'];
			$pac_img = $result['pac_img'];
			$pac_duration = $result['pac_duration'];
			$startDate = $result['startDate'];
			$endDate = $result['endDate'];
			$pac_price = $result['pac_price'];
			$pac_quantity = $result['pac_quantity'];

			$query = "INSERT INTO tbl_booking(usrId, RpacId, RpacName, RpacPrice, checkInDate, checkOutDate, quantity) VALUES('$userId','$resturent_id', '$pac_name','$pac_price','$startDate','$endDate', '$pac_quantity')";
			
			$inserted_row = $db->insert($query);
			 if($inserted_row){
				echo "<script>window.location = 'checkout.php';</script>";
			}else{
				echo "<script>window.location = 'rooms-list.php';</script>";
			} 
		  }
			
		
		
	?>


	<!-- Internal Page Header -->
	<div class="internal-page-title about-page" data-parallax="scroll" data-image-src="assets/img/packages/header.jpg">
		<h1>Special <span>Packages</span></h1>
		<ol class="breadcrumb"><!-- Internal Page Breadcrumb -->
            <li><a href="">Home</a></li>
            <li class="active">Special Packages</li>
        </ol>
	</div>
	<!-- End of Internal Page Header -->

	<!-- Welcome -->
	<div id="welcome" class="container">
		<!-- Heading box -->
		<div class="heading-box">
			<h2>Special <span>Packages</span></h2><!-- Title -->
			<div class="subtitle">Choose one of our special offers</div><!-- Subtitle -->
		</div>
		<!-- Inner section -->
		<div class="inner-content">
			<div class="desc">
				For providing the better services in our hotel, we provided some special package that you can easily select them. These packages is provided for the guests who really expect the bests for their staying. Some special services that we provide in this packages are Flight Ticket, Airport Pick-up, Sport Activities and etc that you can select the best one based on your need and be sure that all the thing will be managed for you in the best way from our professional teams.
			</div>
		</div>
	</div>
	<!-- End of Welcome -->

	
	<!-- Special Packages -->
	<div id="special-packages-type-2" class="container">

		<!-- Room Box Container -->
		<div class="package-container">

			<?php
                $query = "SELECT tbl_package.*, tbl_resturent.food_name FROM tbl_package
		            INNER JOIN tbl_resturent ON tbl_package.resturent_id = tbl_resturent.id";
                $package = $db->select($query);
                if ($package) {
                    while ($result = $package->fetch_assoc()) {
                      
                  
             ?>
			<!-- package box -->
			<div class="package-boxes wow fade fadeInUp">
				<img src="admin/<?php echo $result['pac_img']; ?>" alt="King Suit" class="package-img"><!-- package Image -->
				<div class="package-details col-md-6 col-lg-4">
					<div class="title"><?php echo $result['pac_name']; ?></div><!-- package title -->
					<div class="description"><!-- package Description -->
						<ul class="list-inline">
							<p><?php echo $result['pac_desc']; ?></p>
							<li><?php echo $result['food_name']; ?> Include</li>
							<li><?php echo $result['pac_duration']; ?></li>
							<li><?php echo $result['pac_quantity']; ?> Peoples</li>
						</ul>
					</div>
					<div class="button-price clearfix">
						<?php 
							if(Session::get("cuslogin") == true)
							{ ?>
						<a href="?selectPac=<?php echo $result['id']; ?>" class="btn btn-default">Select Package</a>
				<?php	}else{ ?>
						<a href="login.php" class="btn btn-default">Login</a>
				<?php	} ?>

						<div class="price"><span>৳<?php echo $result['pac_price']; ?></span>per night</div>
					</div>
				</div>
			</div>
			<?php } } ?>
			
			
		</div>
	</div>
	<!-- End of Special Packages -->

	<?php include 'inc/footer.php'; ?>