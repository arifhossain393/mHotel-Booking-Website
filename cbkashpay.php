<?php include 'inc/header.php'; ?>


<?php
	$userId = Session::get("userId");
    $login = Session::get("cuslogin");
    if ($login == false) {
        echo "<script>window.location='login.php';</script>";
    }
 ?>
 <?php 
 	if (isset($_GET['orderId']) && $_GET['orderId'] == 'order') {
 		$query = "SELECT * FROM tbl_booking WHERE usrId = '$userId'";
          $orderData = $db->select($query);
          if ($orderData) {
           while ($result = $orderData->fetch_assoc()) {
           	$pacId = $result['RpacId'];
           	$pacName = $result['RpacName'];
           	$totalPrice = Session::get("totalprice");
           	$checkInDate = $result['checkInDate'];
           	$checkOutDate = $result['checkOutDate'];
           	$quantity = $result['quantity'];

           	$query = "INSERT INTO  tbl_payment(usrId, RpacId, pacName, price, checkInDate,  checkOutDate, quantity) VALUES('$userId', '$pacId', '$pacName', '$totalPrice', '$checkInDate', '$checkOutDate', quantity)";
          $roominsert = $db->insert($query);
      	}
  	  }
	      $delquary = "DELETE FROM tbl_booking WHERE usrId = '$userId'";
	      $delbook = $db->delete($delquary);
	       echo "<script>window.location='successBook.php';</script>";
 	}

 ?>
	<div class="site wrapper-content"  style="padding: 100px 0;">
		<div class="top_site_main" style="background-image:url(images/banner/top-heading.jpg);">
			<div class="banner-wrapper container article_heading">
				<div class="breadcrumbs-wrapper">
				</div>
				<h1 class="heading_primary">Checkout Page</h1></div>
		</div>
		<section class="content-area">
			<div class="container">
				<div class="row">
					<div class="site-main col-sm-12">
						<div class="entry-content">
							<div class="travel_tour">
							<!--update User Profile -->
						
								<div class="row">
									<div class="col-md-12 columns">
										<div class="order-wrapper">
											<h3 id="order_review_heading">Your order</h3>
											<div id="order_review" class="travel_tour-checkout-review-order">

											<?php
				                            $query = "SELECT * FROM tbl_booking WHERE usrId = '$userId'";
				                            $roombook = $db->select($query);
				                            if ($roombook) {
				                                 while ($result = $roombook->fetch_assoc()) {

				                           ?>
												<table class="shop_table travel_tour-checkout-review-order-table" style="width: 100%">
														<thead>
														<tr>
															<th class="product-name" style="width: 25%">Room/Package</th>
															<th class="product-total" style="width: 25%">Check In Date</th>
															<th class="product-total" style="width: 25%">Check Out Date</th>
															<th class="product-total" style="width: 25%">Total</th>
														</tr>
														</thead>
														<tbody>
														<tr class="cart_item">
															<td class="product-name">
																<?php echo $result['RpacName']; ?>
															</td>
															<td class="product-total">
																<?php echo $result['checkInDate']; ?>
															</td>
															<td class="product-cdate">
																<?php echo $result['checkOutDate']; ?>
															</td>
															<td class="product-odate">
																৳<?php echo $result['RpacPrice']; ?> x

														<?php
															$date1 = strtotime($result['checkInDate']);
															$date2 = strtotime($result['checkOutDate']);
															$day=round(abs($date2 - $date1) / (60*60*24),0);
															echo $day;
															Session::set("day", $day);
														?> days
															</td>
														</tr>
														</tbody>
														<tfoot>

														<tr class="cart-subtotal">
															<th>Vat(2%)</th>
															<td>
																<span class="travel_tour-Price-amount amount"><span class="travel_tour-Price-currencySymbol">৳</span>
																<?php 
																	$price = Session::get("day") * $result['RpacPrice'];
																	$vat = $price * 0.02;
																	echo $vat;

																 ?>
																</span>
															</td>
														</tr>


														<tr class="order-total">
															<th>Total</th>
															<td>
																<strong><span class="travel_tour-Price-amount amount"><span class="travel_tour-Price-currencySymbol">৳</span>
																<?php 
																	$price = Session::get("day") * $result['RpacPrice'];
																	$totalprice = $price + $vat;
																	echo $totalprice;

														Session::set("totalprice", $totalprice);

																 ?>
																</span></strong>
															</td>
														</tr>


														</tfoot>
													</table>
												<?php } } ?>

												
												<div id="payment" class="travel_tour-checkout-payment">
													 <div class="col-sm-6">
							                             <label for="phn" class="required" style="color: green;">Confirm bKash Payment</label><br>

							                             <a type="button" href="?orderId=order" class="button alt">Reservation</a>
							                        </div><!--/ [col] -->
												</div>
								
											</div>
										</div>
									</div>
								</div>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
	<?php include 'inc/footer.php'; ?>