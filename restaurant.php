<?php include 'inc/header.php'; ?>
	<!-- Internal Page Header -->
	<div class="internal-page-title about-page" data-parallax="scroll" data-image-src="assets/img/resaurant/header.jpg">
		<h1>Pinar <span>Restaurant</span></h1>
		<ol class="breadcrumb"><!-- Internal Page Breadcrumb -->
            <li><a href="">Home</a></li>
            <li class="active">Restaurant</li>
        </ol>
	</div>
	<!-- End of Internal Page Header -->

	<!-- Welcome -->
	<div id="welcome" class="container">
		
		<!-- Heading box -->
		<div class="heading-box">
			<h2>We Are <span>Proud</span> to Be Your <span>Host</span></h2><!-- Title -->
			<div class="subtitle">Good Tastes, Warm &amp; Comfortable Space</div><!-- Subtitle -->
		</div>

		<!-- Inner section -->
		<div class="inner-content">
			<div class="img-frame " data-parallax="scroll" data-image-src="assets/img/resaurant/1.jpg">
			</div>
			<div class="desc">
				We welcome you to our hotel as you enlighten our abode with your warmth and smiley nature. We are truly grateful to you for your visit here and hope to have memorable moments throughout your visit. <br>
				May I take this opportunity to reassure you that our hotel's team will continue to not just provide the highest standards of service and comfort you have been so accustomed to, bur exceeding your expectations will be our constant mission.
				<cite>John Doe - <span>Kitchen Lead</span></cite>
			</div>
		</div>
	</div>
	<!-- End of Welcome -->

	<!-- Luxury Rooms -->
	<div id="special-dishes" class="container">
		<!-- Heading box -->
		<div class="heading-box">
			<h2>Special <span>Dishes</span></h2><!-- Title -->
		</div>

		<!-- Room Box Container -->
		<div class="room-container">

			<?php
                $query = "SELECT * FROM tbl_resturent WHERE food_cat = '3' LIMIT 3";
                $resturent = $db->select($query);
                if ($resturent) {
                    while ($result = $resturent->fetch_assoc()) {
                      
                  
             ?>
			<!-- Room box -->
			<div class="room-boxes wow fade fadeInRight">
				<img src="admin/<?php echo $result['food_img']; ?>" alt="Filet De Saumon" class="room-img"><!-- Room Image -->
				<div class="room-details col-xs-6 col-md-4">
					<div class="title"><?php echo $result['food_name']; ?></div><!-- Room title -->
					<div class="description"><!-- Room Description -->
						<?php echo $result['food_desc']; ?>
					</div>
					<div class="btn btn-default">৳<?php echo $result['price']; ?></div><!-- Price Box -->
				</div>
			</div>
			<?php } } ?>
			
			
		</div>
	</div>
	<!-- End of Luxury Rooms -->

	<!-- Great Taste Section -->
	<div id="great-taste" data-parallax="scroll" data-image-src="assets/img/resaurant/great-taste.jpg">
		<h2>International <b>Food</b></h2>
		<h3>Great Taste</h3>
	</div>
	<!-- End of Great Taste Section -->


	<!-- Special Packages -->
	<div id="restaurant-menu" class="container">
		<!-- Heading box -->
		<div class="heading-box">
			<h2>Restaurant <span>Menu</span></h2><!-- Title -->
			<div class="subtitle">Select your favorite meal</div><!-- Subtitle -->
		</div>

		<!-- Package Container -->
		<div class="package-container clearfix">
			<!-- Package Box -->
			<div class="package-box wow fadeInUp col-md-4">
				<div class="package-inner">
					<div class="title">Breakfast</div>
					<div class="selection"><span>Imported Salmon Steak</span>Chef Selection</div>
					<div class="package-details">
						<ul>
							<?php
			                $query = "SELECT * FROM tbl_resturent WHERE food_cat = '0' LIMIT 10";
			                $resturent = $db->select($query);
			                if ($resturent) {
			                    while ($result = $resturent->fetch_assoc()) {
			             ?>
							<li><?php echo $result['food_name']; ?><span>৳<?php echo $result['price']; ?></span></li>
						<?php } } ?>
						</ul>
					</div>
				</div>
			</div>

			<!-- Package Box -->
			<div class="package-box wow fadeInUp col-md-4" data-wow-delay="0.5s">
				<div class="package-inner">
					<div class="title">Lunch</div>
					<div class="selection"><span>Italiana Steak Frites</span>Chef Selection</div>
					<div class="package-details">
						<ul>
							<?php
			                $query = "SELECT * FROM tbl_resturent WHERE food_cat = '1' LIMIT 10";
			                $resturent = $db->select($query);
			                if ($resturent) {
			                    while ($result = $resturent->fetch_assoc()) {
			             ?>
							<li><?php echo $result['food_name']; ?><span>৳<?php echo $result['price']; ?></span></li>
						<?php } } ?>
						</ul>
					</div>
				</div>
			</div>

			<!-- Package Box -->
			<div class="package-box wow fadeInUp col-md-4" data-wow-delay="1s">
				<div class="package-inner">
					<div class="title">Dinner</div>
					<div class="selection"><span>Lamb Chops  Scottaditta</span>Chef Selection</div>
					<div class="package-details">
						<ul>
							<?php
			                $query = "SELECT * FROM tbl_resturent WHERE food_cat = '2' LIMIT 10";
			                $resturent = $db->select($query);
			                if ($resturent) {
			                    while ($result = $resturent->fetch_assoc()) {
			             ?>
							<li><?php echo $result['food_name']; ?><span>৳<?php echo $result['price']; ?></span></li>
						<?php } } ?>
						</ul>
					</div>
				</div>
			</div>

		</div>
	</div>
	<!-- End of Special Packages -->

	<?php include 'inc/footer.php'; ?>