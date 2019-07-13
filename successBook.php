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
				<h1 class="heading_primary">Successfull Page</h1></div>
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
												<div id="payment" class="travel_tour-checkout-payment">
													 <div class="col-sm-12 text-center">
							                            
							                            <h4>Successfully your package booking</h4>
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
			</div>
		</section>
	</div>
	<?php include 'inc/footer.php'; ?>