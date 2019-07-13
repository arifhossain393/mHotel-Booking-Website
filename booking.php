	<?php include 'inc/header.php'; ?>


	<!-- Internal Page Header -->
	<div class="internal-page-title about-page" data-parallax="scroll" data-image-src="../assets/img/booking-header.jpg">
		<h1>Book <span>Rooms</span></h1>
		<ol class="breadcrumb"><!-- Internal Page Breadcrumb -->
            <li><a href="index-2.php">Home</a></li>
            <li class="active">Book Rooms</li>
        </ol>
	</div>
	<!-- End of Internal Page Header -->

	<!-- Booking Page Container -->
	<div id="booking-page-content">
		<div class="booking-container container">
			
			<div class="heading-box">
				<h2>Book <span>Now</span></h2>
			</div>
			<div class="main-booking-description">
				This section is provided to add some description and instruction about booking process to help users to book their rooms based on their needs. Also you can add some description about your hotel's rooms of booking.
			</div>


            <!-- The tabular structure uses the Bootstrap tab structure! -->
            <ul class="nav nav-tabs nav-justified" id="booking-tabs"><!-- Booking Tabs -->
                <li class="active"><!-- Add Active class for the active tab -->
                    <a href="#booking-choose-date" data-toggle="tab">
                        <span class="number">1</span><!-- Tab number -->
                        <span class="title">Choose <b>Date</b></span><!-- Tab title -->
                    </a>
                </li>
                <li>
                    <a href="#booking-choose-room" data-toggle="tab">
                        <span class="number">2</span><!-- Tab number -->
                        <span class="title">Choose <b>Room</b></span><!-- Tab title -->
                    </a>
                </li>
                <li>
                    <a href="#booking-reservation" data-toggle="tab">
                        <span class="number">3</span><!-- Tab number -->
                        <span class="title">Reservation</span><!-- Tab title -->
                    </a>
                </li>
                <li>
                    <a href="#booking-confirmation" data-toggle="tab">
                        <span class="number">4</span><!-- Tab number -->
                        <span class="title">Confirmation</span><!-- Tab title -->
                    </a>
                </li>
            </ul>

            <!-- Tab main content container -->
            <div id="booking-tab-contents" class="tab-content">
                <!-- Tab Contents ( Do Not Change / Remove the ID) -->
                <div class="tab-pane fadeInUp in active clearfix" id="booking-choose-date">
                    <!-- Check In / Check Out section -->
                    <div class="input-daterange booking-dates col-xs-12 col-lg-8">
                        <div class="booking-date-fields-container col-xs-12 col-sm-6"><!-- Do NOT change the "booking-date-fields-container" Class -->
                            <h4><b>Check</b> in</h4>
                        </div>
                        <div class="booking-date-fields-container col-xs-12 col-sm-6"><!-- Do NOT change the "booking-date-fields-container" Class -->
                            <h4><b>Check</b> out</h4>
                        </div>
                    </div>

                    <div class="more-details-container col-xs-12 col-lg-4">
                        <h4><b>Other</b> details</h4><!-- Other Section Title -->
                        
                        <div class="field-container">
                            <label for="adult-guest">Adult :</label>
                            <select name="adult-guest" id="adult-guest"><!-- Adult Guest Select Box -->
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                            </select>
                        </div>
                        <div class="field-container">
                            <label for="child-guest">Children :</label>
                            <select name="child-guest" id="child-guest"><!-- Children Select Box -->
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                            </select>
                        </div>
                        <div class="field-container">
                    		<input type="submit" class="btn btn-default" value="Check Availability">
                        </div>
                    </div>
                </div>
                <!-- Tab Contents ( Do Not Change / Remove the ID) -->
                <div class="tab-pane fadeInUp" id="booking-choose-room">
                    <!-- Rooms Container -->
					<div class="room-container room-grid clearfix">

						<!-- Room Boxes -->
						<div class="room-box col-xs-6">
							<div class="img-container">
								<div class="check-box-container">
									<input type="checkbox" value="1" id="room-1">
									<label for="room-1">
										<span></span>
										Select This <b>Room</b>
									</label>
								</div>
								<img src="assets/img/rooms/grid/1.jpg" alt="1">
								<a href="#" class="btn btn-default">More Details</a>
							</div>
							<div class="details">
								<div class="title"><a href="#">Single <span>Room</span></a></div>
								<div class="desc">
									Short description of rooms will be located in this section that you can describe some special features and equipment of rooms.
								</div>
								<div class="price">
									<span>$240</span>
									- Per Night
								</div>
							</div>
						</div>

						<!-- Room Boxes -->
						<div class="room-box col-xs-6">
							<div class="img-container">
								<div class="check-box-container">
									<input type="checkbox" value="2" id="room-2">
									<label for="room-2">
										<span></span>
										Select This <b>Room</b>
									</label>
								</div>
								<img src="assets/img/rooms/grid/2.jpg" alt="2">
								<a href="#" class="btn btn-default">More Details</a>
							</div>
							<div class="details">
								<div class="title"><a href="#">Double <span>Room</span></a></div>
								<div class="desc">
									Short description of rooms will be located in this section that you can describe some special features and equipment of rooms.
								</div>
								<div class="price">
									<span>$350</span>
									- Per Night
								</div>
							</div>
						</div>

						<!-- Room Boxes -->
						<div class="room-box col-xs-6">
							<div class="img-container">
								<div class="check-box-container">
									<input type="checkbox" value="3" id="room-3">
									<label for="room-3">
										<span></span>
										Select This <b>Room</b>
									</label>
								</div>
								<img src="assets/img/rooms/grid/3.jpg" alt="">
								<a href="#" class="btn btn-default">More Details</a>
							</div>
							<div class="details">
								<div class="title"><a href="#">Deluxe <span>One-bedroom</span> Suite</a></div>
								<div class="desc">
									Short description of rooms will be located in this section that you can describe some special features and equipment of rooms.
								</div>
								<div class="price">
									<span>$440</span>
									- Per Night
								</div>
							</div>
						</div>

						<!-- Room Boxes -->
						<div class="room-box col-xs-6">
							<div class="img-container">
								<div class="check-box-container">
									<input type="checkbox" value="4" id="room-4">
									<label for="room-4">
										<span></span>
										Select This <b>Room</b>
									</label>
								</div>
								<img src="assets/img/rooms/grid/4.jpg" alt="">
								<a href="#" class="btn btn-default">More Details</a>
							</div>
							<div class="details">
								<div class="title"><a href="#">Deluxe <span>Two-bedroom</span> Suite</a></div>
								<div class="desc">
									Short description of rooms will be located in this section that you can describe some special features and equipment of rooms.
								</div>
								<div class="price">
									<span>$480</span>
									- Per Night
								</div>
							</div>
						</div>

						<!-- Room Boxes -->
						<div class="room-box col-xs-6">
							<div class="img-container">
								<div class="check-box-container">
									<input type="checkbox" value="5" id="room-5">
									<label for="room-5">
										<span></span>
										Select This <b>Room</b>
									</label>
								</div>
								<img src="assets/img/rooms/grid/5.jpg" alt="">
								<a href="#" class="btn btn-default">More Details</a>
							</div>
							<div class="details">
								<div class="title"><a href="#"><span>Royal</span> Suit</a></div>
								<div class="desc">
									Short description of rooms will be located in this section that you can describe some special features and equipment of rooms.
								</div>
								<div class="price">
									<span>$530</span>
									- Per Night
								</div>
							</div>
						</div>

						<!-- Room Boxes -->
						<div class="room-box col-xs-6">
							<div class="img-container">
								<div class="check-box-container">
									<input type="checkbox" value="6" id="room-6">
									
									<label for="room-6">
										<span></span>
										Select This <b>Room</b>
									</label>
								</div>
								<img src="assets/img/rooms/grid/6.jpg" alt="">
								<a href="#" class="btn btn-default">More Details</a>
							</div>
							<div class="details">
								<div class="title"><a href="#"><span>King</span> Suit</a></div>
								<div class="desc">
									Short description of rooms will be located in this section that you can describe some special features and equipment of rooms.
								</div>
								<div class="price">
									<span>$620</span>
									- Per Night
								</div>
							</div>
						</div>
						
					</div>
					<!-- End of Rooms Container -->
                </div>
                <!-- Tab Contents ( Do Not Change / Remove the ID) -->
                <div class="tab-pane fadeInUp clearfix" id="booking-reservation">

					<div class="reservation-summary col-md-4">
						<h4>Reservation <b>Summary</b></h4>
						<div class="info-boxes">
							<div class="title"><span>Reservation <b>Info</b></span></div>
							<ul>
								<li>
									<div class="info">Check in :</div>
									<div class="value">2015-04-29</div>
								</li>
								<li>
									<div class="info">Check out :</div>
									<div class="value">2015-04-30</div>
								</li>
								<li>
									<div class="info">Adult :</div>
									<div class="value">1</div>
								</li>
								<li>
									<div class="info">Child :</div>
									<div class="value">0</div>
								</li>
							</ul>
							<div class="title"><span>Room <b>Info</b></span></div>
							<ul>
								<li>
									<div class="info">Deluxe One-bedroom Suite</div>
									<div class="value">$214</div>
								</li>
							</ul>
							<div class="total-cost">
								<div class="info">Total Cost :</div>
								<div class="value">$1,785</div>
							</div>

						</div>
					</div>
					<div class="reservation-info col-md-8">
						<h4>Reservation <b>Info</b></h4>
						<div class="col-md-6">
							<div class="field-container">
	                            <input type="text" placeholder="First Name *"><!-- First Name Field -->
	                        </div>
	                        <div class="field-container">
	                            <input type="text" placeholder="Last Name *"><!-- Last Name Field -->
	                        </div>
	                        <div class="field-container">
	                            <input type="email" placeholder="Email *"><!-- Email Field -->
	                        </div>
	                        <div class="field-container">
	                            <input type="text" placeholder="Phone *"><!-- Phone Field -->
	                        </div>
	                        <div class="field-container">
	                            <input type="text" placeholder="City"><!-- City Field -->
	                        </div>
	                        <div class="field-container">
	                            <input type="text" placeholder="Address"><!-- Address Field -->
	                        </div>
						</div>
						<div class="col-md-6">
							<div class="field-container message-field">
		                        <textarea id="message-field" placeholder="Special Requirements"></textarea><!-- Special Requirements Field -->
		                    </div>
							<div class="field-container btn-field">
		                    	<input type="submit" class="btn btn-default" value="Submit"><!-- Payment Button -->
		                    </div>
						</div>
					</div>
                   
                    <!-- End of Guest Info form -->
                </div>
                <!-- Tab Contents ( Do Not Change / Remove the ID) -->
                <div class="tab-pane fadeInUp clearfix" id="booking-confirmation">
                    <h3>Reservation Complete!</h3>
                    <div class="description">
                    	Thanks for your reservation. Our staff will check the information and after their confirmation your reservation will be finalized. If you need to have extra information you can contact us via our contact page.
                    </div>
					
					<div class="reservation-summary col-md-4">
						<h4>Reservation <b>Summary</b></h4>
						<div class="info-boxes">
							<div class="title"><span>Reservation <b>Info</b></span></div>
							<ul>
								<li>
									<div class="info">Check in :</div>
									<div class="value">2015-04-29</div>
								</li>
								<li>
									<div class="info">Check out :</div>
									<div class="value">2015-04-30</div>
								</li>
								<li>
									<div class="info">Adult :</div>
									<div class="value">1</div>
								</li>
								<li>
									<div class="info">Child :</div>
									<div class="value">0</div>
								</li>
							</ul>
							<div class="title"><span>Room <b>Info</b></span></div>
							<ul>
								<li>
									<div class="info">Deluxe One-bedroom Suite</div>
									<div class="value">$214</div>
								</li>
							</ul>
							<div class="total-cost">
								<div class="info">Total Cost :</div>
								<div class="value">$1,785</div>
							</div>

						</div>
					</div>
					<div class="reservation-info col-md-8">
						<h4>Reservation <b>Info</b></h4>
						<div class="col-md-6">
							<ul>
								<li>
									<div class="info">First Name :</div>
									<div class="value">John</div>
								</li>
								<li>
									<div class="info">Last Name :</div>
									<div class="value">Doe</div>
								</li>
								<li>
									<div class="info">Email :</div>
									<div class="value">Info@ravistheme.com</div>
								</li>
								<li>
									<div class="info">Phone :</div>
									<div class="value">0185 26 37 48 59</div>
								</li>
								<li>
									<div class="info">City :</div>
									<div class="value">Sydney</div>
								</li>
								<li>
									<div class="info">Address :</div>
									<div class="value">133 Elizabethstreet, Sydney 4000, Australia</div>
								</li>
							</ul>
						</div>
						<div class="col-md-6">
							<ul>
								<li>
									<div class="info">Special Requirements :</div>
									<div class="value">Airport Pick up</div>
								</li>
							</ul>
						</div>
					</div>



                </div>
            </div>
        </div>
	</div>
	<!-- End of Booking Page Container -->

	<?php include 'inc/footer.php'; ?>