
<?php include 'inc/header.php'; ?>

<?php 
		if (!isset($_GET['roomId']) || $_GET['roomId'] == NULL) {
			header("Location:index.php");
		}
		else {
			$pacId = $_GET['roomId'];
		}

	?>

	<!--Data insert in booking Table -->
	<?php 
		if(Session::get("cuslogin") == true)
		{
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $checkInDate = $fm->validation($_POST['checkInDate']);
        $checkOutDate = $fm->validation($_POST['checkOutDate']);
        $quantity = $fm->validation($_POST['quantity']);


        $checkInDate = mysqli_real_escape_string($db->link , $_POST['checkInDate']);
        $checkOutDate = mysqli_real_escape_string($db->link , $_POST['checkOutDate']);
        $quantity = mysqli_real_escape_string($db->link , $_POST['quantity']);
        $pacId = mysqli_real_escape_string($db->link , $pacId);
		$userId = Session::get("userId");
        
		$squery = "SELECT * FROM tbl_room WHERE id = '$pacId'";
		$result = $db->select($squery)->fetch_assoc();
		
		$pacName = $result['room_title'];
		$price = $result['price'];

		$cquery = "UPDATE tbl_room
            SET status = '1'
            WHERE id = '$pacId'
        ";
        $update_status = $db->update($cquery);
        if($update_status){
		
		 if (empty($checkInDate) || empty($checkOutDate) || empty($quantity)) {
          echo "<span style='color:red;'>Field must not be Empty!</span>";
          
      }else{
		$query = "INSERT INTO tbl_booking(usrId, RpacId, RpacName, RpacPrice, checkInDate, checkOutDate, quantity) VALUES('$userId','$pacId', '$pacName','$price','$checkInDate', '$checkOutDate', '$quantity')";
			
			$inserted_row = $db->insert($query);
			 if($inserted_row){
				echo "<script>window.location = 'checkout.php';</script>";
			}else{
				echo "<script>window.location = 'rooms-list.php';</script>";
			} 
		  }
		}
      }
  }else{
  	echo "<script>window.location = 'login.php';</script>";
  }

    ?>
    


	<!--Room Details Quary -->

	<?php
        $query = "SELECT * FROM tbl_room ORDER BY id DESC LIMIT 3";
        $room = $db->select($query);
        if ($room) {
            while ($result = $room->fetch_assoc()) {
              
          
     ?>

	<div class="room-detail-page">

		<!-- Main Slider -->
		<div id="room-details-slider">
			<div class="items">
	            <img src="admin/<?php echo $result['room_img']; ?>" alt="3"/><!-- Change the URL section based on your image\'s name -->
	        </div>
	    </div>

	    <div class="booking-title-box">
	    	<div class="booking-title-box-inner container">
		    	<!-- Heading box -->
				<div class="heading-box">
					<h2><span><?php echo $result['room_title']; ?></h2><!-- Title -->
					<div class="subtitle price">৳<?php echo $result['price']; ?><span>- Per Night</span></div><!-- Subtitle -->
				</div>
				 
				<!-- Booking form -->
		    	<form class="booking-form clearfix" action="" method="post"><!-- Do Not remove the classes -->
					<div class="input-daterange col-md-6">
			            <div class="booking-fields col-md-6">
			                <input placeholder="Check-in" class="datepicker-fields check-in" type="text" name="checkInDate" /><!-- Date Picker field ( Do Not remove the "datepicker-fields" class ) -->
			                <i class="fa fa-calendar"></i><!-- Date Picker Icon -->
			            </div>
			            <div class="booking-fields col-md-6">
			                <input placeholder="Check-Out" class="datepicker-fields check-out" type="text" name="checkOutDate" />
			                <i class="fa fa-calendar"></i>
			            </div>
			        </div>
		            <div class="booking-fields col-md-3">
		                <!-- Select boxes ( you can change the items and its value based on your project's needs ) -->
		                <select name="quantity" id="booking-field2">
		                    <option value="0">People Quantity</option>
		                    <option value="1">1</option>
		                    <option value="2">2</option>
		                    <option value="3">3</option>
		                    <option value="4">4</option>
		                    <option value="5">5</option>
		                </select>
		                <!-- End of Select boxes -->
		            </div>
		            <div class="booking-button-container">
		                <input class="btn btn-default" value="Book Now" type="submit"/><!-- Submit button -->
		            </div>
		        </form>
		       
	        </div>
	    </div>
	    <div class="room-details container">
	    	<div class="description">
	    		<?php echo $result['room_desc']; ?>
			</div>
	    	<ul class="services list-inline">
				<li><i class="fa fa-check"></i><?php echo $result['room_type']; ?></li>
				
			</ul>
	    </div>
	</div>	

	<?php } } ?>

	<!-- Rooms Container -->
	<div class="room-container container room-grid">
		<!-- Heading box -->
		<div class="heading-box">
			<h2>Other <span>Rooms</span></h2><!-- Title -->
		</div>
		<?php
            $query = "SELECT * FROM tbl_room ORDER BY id DESC LIMIT 2";
            $room = $db->select($query);
            if ($room) {
                while ($result = $room->fetch_assoc()) {
                  
              
         ?>

		<!-- Room Boxes -->
		<div class="room-box col-xs-6">
			<div class="img-container">
				<img src="admin/<?php echo $result['room_img']; ?>" alt="">
				<a href="rooms-details.php?roomId=<?php echo $result['id']; ?>" class="btn btn-default">More Details</a>
			</div>
			<div class="details">
				<div class="title"><a href="rooms-details.php?roomId=<?php echo $result['id']; ?>"><?php echo $result['room_title']; ?></a></div>
				<div class="desc">
					<?php echo $fm->textShorten($result['room_desc'], 50); ?>
				</div>
				<div class="price">
					<span>৳<?php echo $result['price']; ?></span>
					- Per Night
				</div>
			</div>
		</div>
		<?php } } ?>
		
	</div>
	<!-- End of Rooms Container -->
	

	<?php include 'inc/footer.php'; ?>