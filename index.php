<?php include 'inc/header.php'; ?>

	<!-- Top Slider and Booking form -->
	<div id="home-top-section">
		
		<!-- Main Slider -->
		<div id="main-slider">
			<div class="items">
	            <a href="http://google.com/">
	            	<img src="assets/img/slider/1.jpg" alt="3"/><!-- Change the URL section based on your image\'s name -->
	            </a>
	        </div>
	        <div class="items">
	            <a href="http://google.com/">
	            	<img src="assets/img/slider/3.jpg" alt="3"/>
	            </a>
	        </div>
	        <div class="items">
	            <a href="http://google.com/">
	            	<img src="assets/img/slider/4.jpg" alt="4"/>
	            </a>
	        </div>
	        <div class="items">
	            <a href="http://google.com/">
	            	<img src="assets/img/slider/2.jpg" alt="2"/>
	            </a>
	        </div>
	    </div>

		

	<!-- Luxury Rooms -->
	<div id="luxury-rooms">
		<!-- Heading box -->
		<div class="heading-box">
			<h2>Luxury <span>Rooms</span></h2><!-- Title -->
			<div class="subtitle">Best rooms with Best services</div><!-- Subtitle -->
		</div>

		<!-- Room Box Container -->
		<div class="room-container container">

			<?php
                $query = "SELECT * FROM tbl_room WHERE status = '0' ORDER BY id DESC LIMIT 3";
                $room = $db->select($query);
                if ($room) {
                    while ($result = $room->fetch_assoc()) {
                      
                  
             ?>

			<!-- Room box -->
			<div class="room-boxes">
				<img src="admin/<?php echo $result['room_img']; ?>" alt="King Suit" class="room-img"><!-- Room Image -->
				<div class="room-details col-xs-6 col-md-4">
					<div class="title"><?php echo $result['room_title']; ?></div><!-- Room title -->
					<div class="description"><!-- Room Description -->
						<?php echo $fm->textShorten($result['room_desc'], 50); ?>
					</div>
					<a href="rooms-details.php?roomId=<?php echo $result['id']; ?>" class="btn btn-default">Details</a><!-- Detail link -->
				</div>
				<div class="price-container col-xs-6 col-md-8">
					<div class="price">
						<span>৳<?php echo $result['price']; ?></span>
						- Per Night
					</div>
				</div>

			</div>
			<?php } } ?>
			
		</div>
	</div>
	<!-- End of Luxury Rooms -->

	<!-- Special Packages -->
	<div id="special-packages" class="container">
		<!-- Heading box -->
		<div class="heading-box">
			<h2>Special <span>Packages</span></h2><!-- Title -->
			<div class="subtitle">Choose one of our special offers</div><!-- Subtitle -->
		</div>

		<!-- Package Container -->
		<div class="package-container clearfix">

		<?php
            $query = "SELECT tbl_package.*, tbl_resturent.food_name FROM tbl_package
	            INNER JOIN tbl_resturent ON tbl_package.resturent_id = tbl_resturent.id LIMIT 3";
            $package = $db->select($query);
            if ($package) {
                while ($result = $package->fetch_assoc()) {
                  
              
         ?>
			<!-- Package Box -->
			<div class="package-box wow fadeInUp col-sm-6 col-md-4">
				<div class="package-inner">
					<div class="title"><?php echo $result['pac_name']; ?></div>
					<div class="price"><span>৳<?php echo $result['pac_price']; ?></span>per night</div>
					<div class="package-details">
						<ul>
							<li><?php echo $result['food_name']; ?> Include</li>
							<li><?php echo $result['pac_duration']; ?></li>
							<li><?php echo $result['pac_quantity']; ?> Peoples</li>
						</ul>
					</div>
					<a href="#" class="btn btn-default">Select Package</a>
				</div>
			</div>
		<?php } } ?>
			

		</div>
	</div>
	<!-- End of Special Packages -->

	<!-- Gallery -->
	<div id="gallery">
		<!-- Heading box -->
		<div class="heading-box">
			<h2>Pinar <span>Gallery</span></h2><!-- Title -->
		</div>

		<!-- Gallery Container -->
		<div class="gallery-container">
			<div class="sort-section">
				<div class="sort-section-container">
					<div class="sort-handle">Filters</div>
					<ul class="list-inline">
						<li><a href="#" data-filter="*" class="active">All</a></li>
						<li><a href="#" data-filter=".restaurant">Restaurant</a></li>
						<li><a href="#" data-filter=".bars">Bars</a></li>
						<li><a href="#" data-filter=".pool">Pool</a></li>
						<li><a href="#" data-filter=".rooms">Rooms</a></li>
						<li><a href="#" data-filter=".lobby">Lobby</a></li>
					</ul>
				</div>
			</div>
			<ul class="image-main-box clearfix">
				<li class="item col-xs-6 col-md-3 lobby">
					<figure>
						<img src="assets/img/gallery/1.jpg" alt="11"/>
						<a href="assets/img/gallery/1.jpg" class="more-details" data-title="Great View">Enlarge</a>
						<figcaption>
							<h4><span>Great</span> View</h4>
						</figcaption>
					</figure>
				</li>
				<li class="item col-xs-6 col-md-6 pool">
					<figure>
						<img src="assets/img/gallery/2.jpg" alt="11"/>
						<a href="assets/img/gallery/2.jpg" class="more-details" data-title="Outdoor Pool">Enlarge</a>
						<figcaption>
							<h4><span>Outdoor</span> Pool</h4>
						</figcaption>
					</figure>
				</li>
				<li class="item col-xs-6 col-md-3 bars">
					<figure>
						<img src="assets/img/gallery/3.jpg" alt="11"/>
						<a href="assets/img/gallery/3.jpg" class="more-details" data-title="Delicious Foods">Enlarge</a>
						<figcaption>
							<h4><span>Delicious</span> Foods</h4>
						</figcaption>
					</figure>
				</li>
				<li class="item col-xs-6 col-md-3 restaurant">
					<figure>
						<img src="assets/img/gallery/4.jpg" alt="11"/>
						<a href="assets/img/gallery/4.jpg" class="more-details" data-title="International Foods">Enlarge</a>
						<figcaption>
							<h4><span>International</span> Foods</h4>
						</figcaption>
					</figure>
				</li>
				<li class="item col-xs-6 col-md-3 pool">
					<figure>
						<img src="assets/img/gallery/5.jpg" alt="11"/>
						<a href="assets/img/gallery/5.jpg" class="more-details" data-title="Cozy Spaces">Enlarge</a>
						<figcaption>
							<h4><span>Cozy</span> Spaces</h4>
						</figcaption>
					</figure>
				</li>
				<li class="item col-xs-6 col-md-3 rooms">
					<figure>
						<img src="assets/img/gallery/6.jpg" alt="11"/>
						<a href="assets/img/gallery/6.jpg" class="more-details" data-title="Comfortable Rooms">Enlarge</a>
						<figcaption>
							<h4><span>Comfortable </span> Rooms</h4>
						</figcaption>
					</figure>
				</li>
				<li class="item col-xs-6 col-md-3 pool">
					<figure>
						<img src="assets/img/gallery/7.jpg" alt="11"/>
						<a href="assets/img/gallery/7.jpg" class="more-details" data-title="Relaxation Spaces">Enlarge</a>
						<figcaption>
							<h4><span>Relaxation</span> Spaces</h4>
						</figcaption>
					</figure>
				</li>
				<li class="item col-xs-6 col-md-6 pool">
					<figure>
						<img src="assets/img/gallery/8.jpg" alt="11"/>
						<a href="assets/img/gallery/8.jpg" class="more-details" data-title="Indoor Pool">Enlarge</a>
						<figcaption>
							<h4><span>Indoor</span> Pool</h4>
						</figcaption>
					</figure>
				</li>
			</ul>

			<a href="#" class="btn btn-default btn-sm">More ...</a>
		</div>
	</div>
	<!-- End of Gallery -->


	<?php include 'inc/footer.php'; ?>