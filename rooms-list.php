	<?php include 'inc/header.php'; ?>


	<!-- Internal Page Header -->
	<div class="internal-page-title about-page" data-parallax="scroll" data-image-src="assets/img/internal-header.jpg">
		<h1>Rooms - <span>List View</span></h1>
		<ol class="breadcrumb"><!-- Internal Page Breadcrumb -->
            <li><a href="index.php">Home</a></li>
            <li class="active">Rooms - List</li>
        </ol>
	</div>
	<!-- End of Internal Page Header -->
	
	<!-- Rooms Container -->
	<div class="room-container container room-list">
		<!--pagination -->
		<?php 
			$per_page = 9;
			if (isset($_GET["page"])) {
				$page = $_GET["page"];
			} else {
				$page = 1;
			}
			$start_form = ($page - 1) * $per_page;

		?>
		<!--pagination -->

		<?php
            $query = "SELECT * FROM tbl_room ORDER BY id DESC LIMIT $start_form, $per_page";
            $room = $db->select($query);
            if ($room) {
                while ($result = $room->fetch_assoc()) {
                      
        ?>

		<!-- Room Boxes -->
		<div class="room-box clearfix">
			<div class="img-container col-xs-6">
				<img src="admin/<?php echo $result['room_img']; ?>" alt="1">
				<a href="rooms-details.php?roomId=<?php echo $result['id']; ?>" class="btn btn-default">More Details</a>
			</div>
			<div class="details col-xs-6">
				<div class="title"><a href="rooms-details.php?roomId=<?php echo $result['id']; ?>"><?php echo $result['room_title']; ?></a></div>
				<div class="desc">
					<?php echo $fm->textShorten($result['room_desc'], 50); ?>
					<ul class="facilities list-inline">
						<li><i class="fa fa-check"></i><?php echo $result['room_type']; ?></li>
						
					</ul>
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

	<!-- Pagination -->
	<div class="pagination-box">
        <ul class="list-inline">
           
            <!--pagination -->
			<?php
				$query = "select * from tbl_room";
				$result = $db->select($query);
				$total_rows = mysqli_num_rows($result);
				$total_pages = ceil($total_rows / $per_page);

			 
			 	for ($i = 1; $i <= $total_pages; $i++) {
			 		echo "<li><a href='rooms-list.php?page=".$i."'>".$i."</a></li>";
			 	}

				echo "<li><a href='rooms-list.php?page=$total_pages'>".'<i class="fa fa-angle-double-right"></i>'."</a></li>" ?>
			<!--pagination -->
        </ul>
    </div>
	<!-- End of Pagination -->
	
	<?php include 'inc/footer.php'; ?>
	