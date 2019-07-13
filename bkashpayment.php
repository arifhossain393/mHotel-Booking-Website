<?php include 'inc/header.php'; ?>


<?php
	$userId = Session::get("userId");
    $login = Session::get("cuslogin");
    if ($login == false) {
        echo "<script>window.location='login.php';</script>";
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

																 ?>
																</span></strong>
															</td>
														</tr>


														</tfoot>
													</table>
												<?php } } ?>

												
												<div id="payment" class="travel_tour-checkout-payment">
													<?php
										                if (isset($_POST["bkashbutton"])) {
										                  if (isset($_POST["security"])) {
										                  $bkash = $_POST['security'];
										                     if(empty($bkash)) {
										                         echo"<div class='alert alert-danger'>Field must not be Empty!</div>";
										                     }    
										                   elseif(strlen($bkash) < 5){
										                    echo"<div class='alert alert-danger'>Security Key is not Valid</div>";
										                  }else {
										                    echo "<script>window.location='cbkashpay.php';</script>";
										                  }
										                }
										              }
										            ?>
													<form action="" method="post">

								                        <div class="col-sm-6">
								                            <label for="phn" class="required"><strong>bKash Number :</strong> 01771337972</label><br>
								                            <label for="phn" class="required">Security Key</label>
								                            <input class="input form-control" type="text" name="security" id="phn" value="" placeholder="Enter your 6 digit Secutity Key"><br>
															<input type="submit" class="button alt" name="bkashbutton" id="place_order" value="Reservation">
								                        </div><!--/ [col] -->

											      </form>
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