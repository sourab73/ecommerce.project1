
<?php
	session_start();
	$session=session_id();
    echo $session;

include("../dbConnection/connect.php");
include("../method.php");
$db = new connection();
//echo $db->sms;
$mod=new phpMethod();




?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>MegaBazar</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="OneTech shop project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/responsive.css" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="styles/main_styles.css">
      <link rel="stylesheet" type="text/css" href="styles/product_styles.css">
<link rel="stylesheet" type="text/css" href="styles/contact_styles.css">
<link rel="stylesheet" type="text/css" href="styles/contact_responsive.css">

<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="styles/contact_styles.css">
<link rel="stylesheet" type="text/css" href="styles/contact_responsive.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="plugins/slick-1.8.0/slick.css">
<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="styles/responsive.css">




</head>

<body>

<div class="super_container">
	
	<!-- Header -->
	
	<header class="header">

		<!-- Top Bar -->

		<div class="top_bar">
			<div class="container">
				<div class="row">
					<div class="col d-flex flex-row">
						<div class="top_bar_contact_item"><div class="top_bar_icon"><img src="images/phone.png" alt=""></div>+880 176 492 4719</div>
						<div class="top_bar_contact_item"><div class="top_bar_icon"><img src="images/mail.png" alt=""></div><a href="mailto:info@easyshop.com">info@easyshop.com</a></div>
						<div class="top_bar_content ml-auto">
							<div class="top_bar_menu">
								
							</div>
							<div class="top_bar_user">
								<div class="user_icon"><img src="images/user.svg" alt=""></div>
								<div><a href="register.html">Register</a></div>
								<div><a href="signin.html">Login</a></div>
							</div>
						</div>
					</div>
				</div>
			</div>		
		</div>

		<!-- Header Main -->

		<div class="header_main" style=" box-shadow: 0px 2px 5px 0px #ccc">
			<div class="container">
				<div class="row">

					<!-- Logo -->
					<div class="col-lg-2 col-sm-3 col-3 order-1">
						<div class="logo_container">
							<div class="logo"><a href="home.php"><img src="logo/logo.png" style="max-height:80px;" alt="" /></a></div>
						</div>
					</div>

					<!-- Search -->
					<div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
						<div class="header_search">
							<div class="header_search_content">
								<div class="header_search_form_container">
									<form action="#" class="header_search_form clearfix">
										<input type="search" required="required" class="header_search_input" placeholder="Search for products...">
										<div class="custom_dropdown">
											<div class="custom_dropdown_list">
												<span class="custom_dropdown_placeholder clc">All Categories</span>
												<i class="fas fa-chevron-down"></i>
												<ul class="custom_list clc">
													<li><a class="clc" href="#">All Categories</a></li>
													<li><a class="clc" href="#">Computers</a></li>
													<li><a class="clc" href="#">Laptops</a></li>
													<li><a class="clc" href="#">Cameras</a></li>
													<li><a class="clc" href="#">Hardware</a></li>
													<li><a class="clc" href="#">Smartphones</a></li>
												</ul>
											</div>
										</div>
										<button type="submit" class="header_search_button trans_300" value="Submit"><img src="images/search.png" alt=""></button>
									</form>
								</div>
							</div>
						</div>
					</div>

					<!-- Wishlist -->
					<div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
						<div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
							<div class="wishlist d-flex flex-row align-items-center justify-content-end">
								
								<div class="wishlist_content">
									
								</div>
							</div>

							<!-- Cart -->
							<div class="cart">
								<div class="cart_container d-flex flex-row align-items-center justify-content-end">
									<div class="cart_icon">
										<img src="images/cart.png" alt="">
										<div class="cart_count"><span>0</span></div>
									</div>
									<div class="cart_content">
										<div class="cart_text"><a href="#">Cart</a></div>
										<div class="cart_price">৳(0.00)</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	
<br>		
<div class="container">
<div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12">
    <span class="h4 font-weight-bold ">Cart<hr></span>
  </div>
</div>
</div>
    <section class="cart_area" style="margin-top: -40px">
      <div class="container">
        <div class="cart_inner">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                	
                  <th scope="col">Product Name</th>
                  <th scope="col">Image</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Price</th>
                  <th scope="col">Total</th>
                </tr>
              </thead>
              <tbody>

		     <?php
				 $amount=0;
				 $total=0;
				 $i=0;
		          $sql="SELECT * FROM `shopping_card` WHERE `session_id`='$session'";
		          $query=$mod->excuteView($sql);
		         while($fetch=$query->fetch_array()) 
		         {
		         	$amount=$fetch[2]*$fetch[3];
					$total=$total+$amount;
		          	$i++;
		         ?>

                <tr>
                  <td>
                    <div class="media">
                      <div class="d-flex">
                        <?php echo $fetch[1]?>
                      </div>

                      <div class="media-body">
                        <p></p>
                      </div>

                    </div>

                  </td>

                  <td>
                    <h5><img src="../productImage/<?php echo $fetch[0];?>.jpg" alt="" height="65" width="70"
                        /></h5>
                  </td>

                  <td>
                    <h5>
                    	<div class="product_quantity clearfix">
										
										<input id="quantity_input" type="text" pattern="[0-9]*" value="<?php echo $fetch[3]?>">
										<div class="quantity_buttons">
									<div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fas fa-chevron-up"></i></div>

									<div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fas fa-chevron-down"></i></div>
										</div>
									</div>

                    </h5>
                  </td>

                  <td>
                    <h5><?php echo $amount;?></h5>
                  </td>
                </tr>

      	<?php
      }

      	?>
               
                
           <!--      <tr class="bottom_button">
                  <td>
                   
                  </td>
                  <td></td>
                  <td></td>
                  <td>
                    <div class="cupon_text">
                      <input type="text" placeholder="Voucher Code" />
                      <a class="main_btn" href="#">Apply</a>
                      
                    </div>
                  </td>
                </tr> 
 -->

                <tr>
                  <td></td>
                  <td></td>
                  <td>
                    <h5>Subtotal</h5>
                  </td>
                  <td>
                    <h5><?php echo $total;?></h5>
                  </td>
                </tr>


              <!-- Shipping cost

                <tr class="shipping_area">
                  <td></td>
                  <td></td>
                  <td>
                    <h5>Shipping</h5>
                  </td>
                  <td>
                    <div class="shipping_box">
                      <ul class="list">
                       
                        <li >
                          <a href="#">Free Shipping</a>
                        </li>
                        
                        <li >
                          <a href="#">Local Delivery: $2.00</a>
                        </li>
                        <li >
                          <a href="#">Outside Dhaka: $5.00</a>
                        </li>
                      </ul>
                    
                    </div>
                  </td>
                </tr> -->


                <tr class="out_button_area">
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>
                    <div class="checkout_btn_inner">
                
                      <a href="order_form.php" class="main_btn" style="float: right;">Proceed to checkout</a>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>

	<!-- Footer -->

	<footer class="footer" style=" box-shadow: 0px 2px 20px 0px #ccc">
		<div class="container">
			<div class="row">

				<div class="col-lg-3 footer_col">
					<div class="footer_column footer_contact">
						<div class="logo_container">
							<div class="logo"><a href="#"><img src="logo/logo.png" style="max-height:80px;" alt="" /></a></div>
						</div>
						<div class="footer_title">Got Question? Call Us 24/7</div>
						<div class="footer_phone">+880-176-492-4719</div>
						<div class="footer_contact_text">
							<p>39 North Road, Vuter Goli,Dhanmondi</p>
							<p>Dhaka 1205, Bangladesh</p>
						</div>
						<div class="footer_social">
							<ul>
								<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
								<li><a href="#"><i class="fab fa-twitter"></i></a></li>
								<li><a href="#"><i class="fab fa-youtube"></i></a></li>
								
							</ul>
						</div>
					</div>
				</div>

				<div class="col-lg-3 offset-lg-2">
					<div class="footer_column">
						<div class="footer_title">Customer Care</div>
						<ul class="footer_list">
							<li><a href="#">My Account</a></li>
							<li><a href="#">Order Tracking</a></li>
							<li><a href="#">Wish List</a></li>
							<li><a href="#">Customer Services</a></li>
							<li><a href="#">Returns / Exchange</a></li>
							<li><a href="#">FAQs</a></li>
							<li><a href="#">Product Support</a></li>
						</ul>
					</div>
				</div>

				

				<div class="col-lg-3">
					<div class="footer_column">
					
					<span>
         	
         				<a href="#"><img src="image/unnamed.png" alt="" style="max-width:380px; padding-right:60px"></a>
        			</span>
						<br><br>
					<span>
         				<p style="font-size: 16px; color:black; font-weight:bold;">Download Our App</p>
         				<a href="#"><img src="image/download.png" alt="" style="max-width:120px;"></a>
         			</span>
         	 

						</div>
				</div>

			</div>
		</div>
	</footer>


	<!-- Copyright -->

	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col">
					
					<div class="copyright_container d-flex flex-sm-row flex-column align-items-center justify-content-start">
						<div class="copyright_content"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Developed by <a href="https://sbit.com.bd" target="_blank">South Bangla IT</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/slick-1.8.0/slick.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="js/custom.js"></script>
<script src="js/product_custom.js"></script>
</body>

</html>