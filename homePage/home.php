
<?php
	include('header.php');
   $hidden=mysqli_real_escape_string($db->link,isset($_POST["hidden"])?$_POST["hidden"]:"");
   $Quantity=1;


  if(isset($_REQUEST["bye"]))
{
   $sql="select * from product_information where product_id='$hidden'";
    $query=$mod->excuteView($sql);
    $fetch_pdt=$query->fetch_array();

    $sql="insert into shopping_card(`sessoin_id`,`product_id`,`product_Name`,`product_price`,`product_quantity`) values('$session','$fetch_pdt[0]','$fetch_pdt[1]','$fetch_pdt[2]','$Quantity')";
    $mod->excuteQuery($sql);
    //echo $mod->sms;
    $message="Data Insert"."&nbsp;". $mod->sms;

}
?>



	<!-- Characteristics -->

	<div class="characteristics">
		<div class="container">
			<div class="row">

				<!-- Char. Item -->
				<div class="col-lg-3 col-md-6 char_col">
					
					<div class="char_item d-flex flex-row align-items-center justify-content-start">
						<div class="char_icon"><img src="images/char_1.png" alt=""></div>
						<div class="char_content">
							<div class="char_title">Fast Delivery</div>
							<div class="char_subtitle">For all oders</div>
						</div>
					</div>
				</div>

				<!-- Char. Item -->
				<div class="col-lg-3 col-md-6 char_col">
					
					<div class="char_item d-flex flex-row align-items-center justify-content-start">
						<div class="char_icon"><img src="images/char_2.png" alt=""></div>
						<div class="char_content">
							<div class="char_title">7 Days Easy Return</div>
							<div class="char_subtitle">Change of mind is not applicable</div>
						</div>
					</div>
				</div>

				<!-- Char. Item -->
				<div class="col-lg-3 col-md-6 char_col">
					
					<div class="char_item d-flex flex-row align-items-center justify-content-start">
						<div class="char_icon"><img src="images/char_3.png" alt=""></div>
						<div class="char_content">
							<div class="char_title">Secure Payment</div>
							<div class="char_subtitle">Protect Online Payment</div>
						</div>
					</div>
				</div>

				<!-- Char. Item -->
				<div class="col-lg-3 col-md-6 char_col">
					
					<div class="char_item d-flex flex-row align-items-center justify-content-start">
						<div class="char_icon"><img src="images/char_4.png" alt=""></div>
						<div class="char_content">
							<div class="char_title">Support</div>
							<div class="char_subtitle">From 9am-10pm</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<!-- Hot New Arrivals -->

	<div class="new_arrivals">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="tabbed_container">
						<div class="tabs clearfix tabs-right">
							<div class="new_arrivals_title">Flash Deals</div>

							<ul class="clearfix">
								<li>End In</li>
								<li>

									<div class="deals_timer_content ml-auto">
												<div class="deals_timer_box clearfix" data-target-time="">
													<div class="deals_timer_unit">
														<div id="deals_timer2_hr" class="deals_timer_hr"></div>
														<span>hours</span>
													</div>
													<div class="deals_timer_unit">
														<div id="deals_timer2_min" class="deals_timer_min"></div>
														<span>mins</span>
													</div>
													<div class="deals_timer_unit">
														<div id="deals_timer2_sec" class="deals_timer_sec"></div>
														<span>secs</span>
													</div>
												</div>
											</div>
										</li>
								
							</ul>
							<div class="tabs_line"><span></span></div>
						</div>



						<div class="row">
							<div class="col-lg-12" style="z-index:1;">

								<br><br>



							<form name="" method="post">
								<!-- Product Panel -->
								<div class="product_panel panel active">
									<div class="arrivals_slider slider">


										<!-- Slider Item -->
								<?php

									 $sql="SELECT * FROM `product_information`";
								      $query=$mod->excuteView($sql);
								      while($fetch_data=$query->fetch_array())
								      {

								      ?>

					<div class="arrivals_slider_item">
						<div class="border_active"></div>

			
						<div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">

							<div class="product_image d-flex flex-column align-items-center justify-content-center">

								<img src="../productImage/<?php echo $fetch_data[2];?>.jpg"  alt="" style="height: 120px; width: 120px;">
							</div>
							<div class="product_content">
								<div class="product_price"><?php echo $fetch_data[4]; ?></div>
								<div class="product_name"><div><a href=""><?php echo $fetch_data[3]; ?></a></a></a></div></div>
								<div class="product_extras">
									
									<input type="hidden" name="hidden" value="<?php print $fetch_data[2];?>" />

									<button type="submit" class="product_cart_button" name="bye">Add to Cart</button>
								</div>
							</div>



							<div class="product_fav"><i class="fas fa-heart"></i></div>
							<ul class="product_marks">
								<li class="product_mark product_discount">-25%</li>
								<li class="product_mark product_new">new</li>
							</ul>
						</div>

					</div>
											<?php
													}
											?>
											
										</form>

				
									</div>
									<div class="arrivals_slider_dots_cover"></div>
								</div>
								
							</div>


						</div>
								
					</div>
				</div>
			</div>
		</div>		
	</div>


	<!-- Banner -->




<div class="container" style="margin-top: -40px;">

	  <div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12">
			<h3 style="text-align: left;">JUST FOR YOU<hr></h3>
		</div>
	 </div>

	

<div class="row" >

<?php
	 $sql="SELECT * FROM `item_information`";
      $query=$mod->excuteView($sql);
      while($fetch=$query->fetch_array())
      {
	?>
	<div class="col-lg-2 col-md-6 col-sm-6 col-xs-6 mb-1" style="max-width: 50%;">
	    <a href="all_cat.php?itemName=<?php echo $fetch[1]; ?>" style="text-decoration: none; color:black">
	      <div class="card" style="height: 100%" > 
	        <img class="card-img-top" id="zoom" src="../item_image/<?php echo $fetch[0];?>.jpg" alt="Card image" style="height: 150px; width: 100%;">
	        <div class="card-body">
	          <h6 class="card-title"><?php echo $fetch[1];?></h6>

	          <!-- <p class="card-text" style="color:#F88824">৳12000 &nbsp<del style="color:#ccc" >-৳13000</del></p> -->
	         
	         </div>
	      </div>
	    </a>
	</div>
<?php } ?>
</div>






<!-- <div class="row"></div> -->



<!-- <div class="row"></div> -->



<br>
<div class="row">
<a href="" class="btn m-auto" style="width: 300px; background-color:white; outline: 1px solid blue">Load More</a>
</div>




</div>


	<!-- Brands -->

	<div class="brands">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="brands_slider_container">
						
						<!-- Brands Slider -->

						<div class="owl-carousel owl-theme brands_slider">
							
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="images/easy.png" alt="" style="max-width:80px;"></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="images/yellow.png" alt="" style="max-width:80px;"></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="images/dorjibari.png" alt="" style="max-width:80px;"></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="images/samsung.png" alt="" style="max-width:80px;"></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="images/realme.png" alt="" style="max-width:90px;"></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="images/oneplus.png" alt="" style="max-width:90px;"></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="images/unileaver.png" alt="" style="max-width:60px;"></div></div>
							
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="images/bata.png" alt="" style="max-width:80px;"></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="images/lotto-logo.png" alt="" style="max-width:80px;"></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="images/walton.png" alt="" style="max-width:80px;"></div></div>

						</div>
						
						<!-- Brands Slider Navigation -->
						<div class="brands_nav brands_prev"><i class="fas fa-chevron-left"></i></div>
						<div class="brands_nav brands_next"><i class="fas fa-chevron-right"></i></div>

					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Newsletter -->

	<div class="newsletter">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="newsletter_container d-flex flex-lg-row flex-column align-items-lg-center align-items-center justify-content-lg-start justify-content-center">
						<div class="newsletter_title_container">
							<div class="newsletter_icon"><img src="images/send.png" alt=""></div>
							<div class="newsletter_title">Sign up for Newsletter</div>
							<div class="newsletter_text"><p>...and receive %20 coupon for first shopping.</p></div>
						</div>
						<div class="newsletter_content clearfix">
							<form action="#" class="newsletter_form">
								<input type="email" class="newsletter_input" required="required" placeholder="Enter your email address">
								<button class="newsletter_button">Subscribe</button>
							</form>
							<div class="newsletter_unsubscribe_link"><a href="#">unsubscribe</a></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Footer -->

	<?php
	include('footer.php');
	 ?>