
<?php
session_start();
$session=session_id();

include("../dbConnection/connect.php");
include("../method.php");
$db = new connection();
//echo $db->sms;
$mod=new phpMethod();

$message="";


$hidden=mysqli_real_escape_string($db->link,isset($_POST["hidden"])?$_POST["hidden"]:"");
$Quantity=mysqli_real_escape_string($db->link,isset($_POST["quntity"])?$_POST["quntity"]:"");


if(isset($_REQUEST["bye"]))
{
  $sql="SELECT * from product_information where product_id='$hidden'";
    $query=$mod->excuteView($sql);
    $fetch_pdt=$query->fetch_array();

    $sql="insert into shopping_card(`product_id`,`product_name`,`product_price`,`product_quantity`,`session_id`) values('$hidden','$fetch_pdt[1]','$fetch_pdt[4]','$Quantity','$session')";
    $mod->excuteQuery($sql);
    //echo $mod->sms;
    $message="Data Insert"."&nbsp;". $mod->sms;

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
<title>MEGA BAZAR BD</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="OneTech shop project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="styles/product_styles.css">
<link rel="stylesheet" type="text/css" href="styles/product_responsive.css">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="css/style.css">
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
						<div class="top_bar_contact_item"><div class="top_bar_icon"><img src="images/phone.png" alt=""></div>+880 176 287 9579</div>
						<div class="top_bar_contact_item"><div class="top_bar_icon"><img src="images/mail.png" alt=""></div><a href="mailto:info@easyshop.com">info@southbanglait.com</a></div>
						<div class="top_bar_content ml-auto">
							<div class="top_bar_menu">
								
							</div>
							<div class="top_bar_user">
								<div class="user_icon"><img src="images/user.svg" alt=""></div>
								<div><a href="register.php">Register</a></div>
								<div><a href="signin.php">Login</a></div>
							</div>
						</div>
					</div>
				</div>
			</div>		
		</div>

		<!-- Header Main -->

		<div class="header_main">
			<div class="container">
				<div class="row">

					<!-- Logo -->
					<div class="col-lg-2 col-sm-3 col-3 order-1">
						<div class="logo_container">
							<div class="logo"><a href="home.php"><img src="logo/logo.png" style="max-height:60px;" alt="" /></a></div>
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
										<div class="cart_count"><span><a href="Cart.php">Cart</a></span></div>
									</div>
									<div class="cart_content">
										<div class="cart_text"><a href="Cart.php">Cart</a></div>
										<div class="cart_price">৳(0.00)</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	
		<!-- Main Navigation -->

		<nav class="main_nav">
			<div class="container">
				<div class="row">
					<div class="col">
						
						<div class="main_nav_content d-flex flex-row">

							<!-- Categories Menu -->
							<!-- <div class="cat_menu_container">
								<div class="cat_menu_title d-flex flex-row align-items-center justify-content-start">
									<div class="cat_burger"><span></span><span></span><span></span></div>
									<div class="cat_menu_text">categories</div>
								</div>

								<ul class="cat_menu">
									<li class="hassubs"><a href="#">Electronic Device<i class="fas fa-chevron-right"></i></a>
											<ul>
												<li><a href="#">Mobile<i class="fas fa-chevron-right"></i></a></li>
												<li><a href="#">Tablets<i class="fas fa-chevron-right"></i></a></li>
												<li><a href="#">Laptops<i class="fas fa-chevron-right"></i></a></li>
												<li><a href="#">Desktop<i class="fas fa-chevron-right"></i></a></li>
												<li><a href="#">Cameras<i class="fas fa-chevron-right"></i></a></li>
											</ul>
									</li>
									<li class="hassubs">
										<a href="#">Electronic Accessories<i class="fas fa-chevron-right"></i></a>
										<ul>
											<li class="hassubs">
												<a href="#">Mobile Accessories<i class="fas fa-chevron-right"></i></a>
												<ul>
													<li><a href="#">Phone Cases<i class="fas fa-chevron-right"></i></a></li>
													<li><a href="#">Power Bank<i class="fas fa-chevron-right"></i></a></li>
													<li><a href="#">Cables & Converter<i class="fas fa-chevron-right"></i></a></li>
													<li><a href="#">Wireless Charger<i class="fas fa-chevron-right"></i></a></li>
													
												</ul>
											</li>
											<li class="hassubs"><a href="#">Audio<i class="fas fa-chevron-right"></i></a>
												<ul>
													<li><a href="#">Headphone & Headset<i class="fas fa-chevron-right"></i></a></li>
													<li><a href="#">Home Entertainment<i class="fas fa-chevron-right"></i></a></li>
													<li><a href="#">Blutooth Speakers<i class="fas fa-chevron-right"></i></a></li>
												</ul>
											</li>
											<li class="hassubs"><a href="#">Wearable<i class="fas fa-chevron-right"></i></a>
												<ul>
													<li><a href="#">Smart Watches<i class="fas fa-chevron-right"></i></a></li>
													<li><a href="#">Virtual Reality<i class="fas fa-chevron-right"></i></a></li>
												</ul>
											</li>
											<li class="hassubs"><a href="#">Camera Accessories<i class="fas fa-chevron-right"></i></a>
												<ul>
													<li><a href="#">Memory Card<i class="fas fa-chevron-right"></i></a></li>
													<li><a href="#">DSLR Lens <i class="fas fa-chevron-right"></i></a></li>
													<li><a href="#">Mirrorless Lens<i class="fas fa-chevron-right"></i></a></li>
													<li><a href="#">Tripods & Monopods<i class="fas fa-chevron-right"></i></a></li>
													<li><a href="#">Dry Box<i class="fas fa-chevron-right"></i></a></li>
													<li><a href="#">Batteries<i class="fas fa-chevron-right"></i></a></li>
													
												</ul>
											</li>
											<li class="hassubs"><a href="#">Storage<i class="fas fa-chevron-right"></i></a>
												<ul>
													<li><a href="#">External Drive<i class="fas fa-chevron-right"></i></a></li>
													<li><a href="#">Internal Drive<i class="fas fa-chevron-right"></i></a></li>
													<li><a href="#">Flash Drive<i class="fas fa-chevron-right"></i></a></li>
													<li><a href="#">OTG Drive<i class="fas fa-chevron-right"></i></a></li>
												</ul>
											</li>
											<li class="hassubs"><a href="#">Printer<i class="fas fa-chevron-right"></i></a>
												<ul>
													<li><a href="#">Printer<i class="fas fa-chevron-right"></i></a></li>
													<li><a href="#">INC<i class="fas fa-chevron-right"></i></a></li>
													<li><a href="#">Printer Stands<i class="fas fa-chevron-right"></i></a></li>
													
												</ul>
											</li>
											<li class="hassubs"><a href="#">Network Components<i class="fas fa-chevron-right"></i></a>
												<ul>
													<li><a href="#">Acccess Point<i class="fas fa-chevron-right"></i></a></li>
													<li><a href="#">Modem<i class="fas fa-chevron-right"></i></a></li>
													<li><a href="#">Router<i class="fas fa-chevron-right"></i></a></li>
													<li><a href="#">Wireless USB Adapter<i class="fas fa-chevron-right"></i></a></li>
													
													
												</ul>
											</li>
										</ul>
									</li>
									
									<li class="hassubs"><a href="#">TV & Home applience<i class="fas fa-chevron-right"></i></a>
										<ul>
											<li><a href="#">Television<i class="fas fa-chevron-right"></i></a></li>
											<li><a href="#">Home Audio<i class="fas fa-chevron-right"></i></a></li>
											<li><a href="#">Cooling Heating<i class="fas fa-chevron-right"></i></a></li>
											<li><a href="#">Vaccums & Floor<i class="fas fa-chevron-right"></i></a></li>
											<li><a href="#">Water Purify<i class="fas fa-chevron-right"></i></a></li>
													
										</ul>
									</li>
									<li class="hassubs"><a href="#">Babies & Toys<i class="fas fa-chevron-right"></i></a>
										<ul>
											<li><a href="#">Mother & Baby<i class="fas fa-chevron-right"></i></a></li>
											<li><a href="#">Feeding<i class="fas fa-chevron-right"></i></a></li>
											<li><a href="#">Baby Gear<i class="fas fa-chevron-right"></i></a></li>
											<li><a href="#">Clothing<i class="fas fa-chevron-right"></i></a></li>
											<li><a href="#">Toys & Games<i class="fas fa-chevron-right"></i></a></li>
													
										</ul>
									</li>
									<li class="hassubs"><a href="#">Health & Beauty<i class="fas fa-chevron-right"></i></a>
										<ul>
											<li><a href="#">Bath Body<i class="fas fa-chevron-right"></i></a></li>
											<li><a href="#">Beauty Tools<i class="fas fa-chevron-right"></i></a></li>
											<li><a href="#">Fragnances<i class="fas fa-chevron-right"></i></a></li>
											<li><a href="#">Men's Care<i class="fas fa-chevron-right"></i></a></li>
											<li><a href="#">Skin Care<i class="fas fa-chevron-right"></i></a></li>
											<li><a href="#">Food Supliments<i class="fas fa-chevron-right"></i></a></li>
													
										</ul>
									</li>
									<li><a href="#">Groceries & Pets<i class="fas fa-chevron-right"></i></a></li>
									<li class="hassubs"><a href="#">Women's Fashion<i class="fas fa-chevron-right"></i></a>
										<ul>
											<li><a href="#">Traditional Clothing<i class="fas fa-chevron-right"></i></a></li>
											<li><a href="#">Saree<i class="fas fa-chevron-right"></i></a></li>
											<li><a href="#">Wedding Wear<i class="fas fa-chevron-right"></i></a></li>
											<li><a href="#">Kurties<i class="fas fa-chevron-right"></i></a></li>
											<li><a href="#">Women's Bag<i class="fas fa-chevron-right"></i></a></li>
											<li><a href="#">Shoes<i class="fas fa-chevron-right"></i></a></li>
											<li><a href="#">Accoceries<i class="fas fa-chevron-right"></i></a></li>
											<li><a href="#">Travel & Lugges<i class="fas fa-chevron-right"></i></a></li>
													
										</ul>
									</li>
									<li class="hassubs"><a href="#">Men's Fashion<i class="fas fa-chevron-right"></i></a>
										<ul>
											<li><a href="#">T-shirt<i class="fas fa-chevron-right"></i></a></li>
											<li><a href="#">Shirt<i class="fas fa-chevron-right"></i></a></li>
											<li><a href="#">Punjabi & Katua<i class="fas fa-chevron-right"></i></a></li>
											<li><a href="#">Polo Shirts<i class="fas fa-chevron-right"></i></a></li>
											<li><a href="#">Jeans<i class="fas fa-chevron-right"></i></a></li>
											<li><a href="#">Pant<i class="fas fa-chevron-right"></i></a></li>
											<li><a href="#">Accoceries<i class="fas fa-chevron-right"></i></a></li>
											<li><a href="#">Shoes<i class="fas fa-chevron-right"></i></a></li>
													
										</ul>
									</li>
									<li class="hassubs"><a href="#">Sports & Outdoors<i class="fas fa-chevron-right"></i></a>
										<ul>
											<li><a href="#">Trednills<i class="fas fa-chevron-right"></i></a></li>
											<li><a href="#">Dumbbels<i class="fas fa-chevron-right"></i></a></li>
											<li><a href="#">Cycling<i class="fas fa-chevron-right"></i></a></li>
											<li><a href="#">Racket Sports<i class="fas fa-chevron-right"></i></a></li>
											<li><a href="#">Camping & Hicking<i class="fas fa-chevron-right"></i></a></li>
											<li><a href="#">Outdoor Recreation<i class="fas fa-chevron-right"></i></a></li>
											<li><a href="#">Cricket Sports<i class="fas fa-chevron-right"></i></a></li>
											<li><a href="#">Fanshop<i class="fas fa-chevron-right"></i></a></li>
													
										</ul>
									</li>
									
									
								</ul>
							</div>
 -->

							<!-- Main Nav Menu -->

							
							<!-- Menu Trigger -->

							<div class="menu_trigger_container ml-auto">
								<div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
									<div class="menu_burger">
										<div class="menu_trigger_text"></div>
										<div class="cat_burger menu_burger_inner"><span></span><span></span><span></span></div>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</nav>
		
		<!-- Menu -->

		<div class="page_menu">
			<div class="container">
				<div class="row">
					<div class="col">
						
						<div class="page_menu_content">
							
							<div class="page_menu_search">
								<form action="#">
									<input type="search" required="required" class="page_menu_search_input" placeholder="Search for products...">
								</form>
							</div>
							
							
							<div class="menu_contact">
								
							
								<span style="display: flex;">
								<div style="margin-right: 10px;"><a href="register.html" style="color:white; text-decoration: none;">Register</a></div>
								<span style="color:white">|</span>
								<div style="margin-left: 10px;"><a href="signin.html" style="color:white;text-decoration: none">Sign in</a></div>
								</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</header>

	<!-- Single Product -->

	<div class="single_product" style="margin-top: -60px;">
		<div class="container">
			<div class="row">

				<!-- Images -->
			<!-- 	<div class="col-lg-2 order-lg-1 order-2">
					<ul class="image_list">
						<li data-image="images/cat_8.jpg"><img src="images/cat_8.jpg" alt=""></li>
						<li data-image="image/cat_6.jpg"><img src="image/cat_6.jpg" alt=""></li>
						<li data-image="image/cat_5.jpg"><img src="image/cat_5.jpg" alt=""></li>
					</ul>
				</div> -->

				<!-- Selected Image -->

				<?php
			      $id=$_GET["moreId"];
			      $sql="SELECT * from product_information where product_id='$id'";
			    	$query=$mod->excuteView($sql);
			    	$fetch=$query->fetch_array();
			    ?> 
				<div class="col-lg-5 order-lg-2 order-1">
					<div class="image_selected">
					<!-- 	<img src="images/cat_8.jpg" alt="" > -->

						<img src="../productImage/<?php echo $fetch[2]?>.jpg" alt="" >

					</div>
				</div>


				<!-- Description -->
				<div class="col-lg-5 order-3">
					<div class="product_description">
						<div class="product_category"><?php echo $fetch[1];?></div>
						<div class="product_name"><?php echo $fetch[3];?></div>
						<div class="rating_r rating_r_4 product_rating"><i></i><i></i><i></i><i></i><i></i></div>
						<div class="product_text"><p><?php echo $fetch[6];?></p></div>


						<div class="product_text"><p>Availibility:&nbsp&nbsp<span style="color:#63B72B;">In Stock</span></p></div>
						<div class="order_info d-flex flex-row">
							<form method="post">
								<div class="clearfix" style="z-index: 1000;">

									<!-- Product Quantity -->
									<div class="product_quantity clearfix">
										<span>Quantity: </span>
										<input id="quantity_input" type="text" name="quntity" pattern="[0-9]*" value="1">

										<input type="hidden" name="hidden" value="<?php print $fetch[2];?>" />

										<div class="quantity_buttons">
											<div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fas fa-chevron-up"></i></div>

											<div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fas fa-chevron-down"></i></div>
										</div>
									</div>

									<!-- Product Color -->
									
								</div>

								<div class="product_price"><span style="font-size: 20px; font-weight: bold;">৳ <?php echo $fetch[4];?></span></div>


								<div class="button_container">

									<button type="submit" name="bye" class="button cart_button" style="background-color: #2E2E54;">Add to Cart</button>


									<button type="button" class="button cart_button" style="background-color: #F46623;">Buy Now</button>
									<div class="product_fav"><i class="fas fa-heart"></i></div>
								</div>

								<?php echo $message; ?>

								
							</form>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

<!--================Product Description Area =================-->
    <section class="product_description_area" style="margin-top: -30px;">
      <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a
              class="nav-link"
              id="home-tab"
              data-toggle="tab"
              href="#home"
              role="tab"
              aria-controls="home"
              aria-selected="true"
              >Description</a
            >
          </li>
          <li class="nav-item">
            <a
              class="nav-link"
              id="profile-tab"
              data-toggle="tab"
              href="#profile"
              role="tab"
              aria-controls="profile"
              aria-selected="false"
              >Specification</a
            >
          </li>
          <li class="nav-item">
            <a
              class="nav-link"
              id="contact-tab"
              data-toggle="tab"
              href="#contact"
              role="tab"
              aria-controls="contact"
              aria-selected="false"
              >Comments</a
            >
          </li>
          <li class="nav-item">
            <a
              class="nav-link active"
              id="review-tab"
              data-toggle="tab"
              href="#review"
              role="tab"
              aria-controls="review"
              aria-selected="false"
              >Reviews</a
            >
          </li>
        </ul>
        <div class="tab-content" id="myTabContent">
          <div
            class="tab-pane fade"
            id="home"
            role="tabpanel"
            aria-labelledby="home-tab"
          >
            
            <p>
          Easy committed to provide intense quality t-shirts. Our fabric is 100% organic cotton, so it is very much safe for the sensitive skins. Our print quality is better than other brand, because we always try to satisfy the customer for our future. We always believe that our business is not for one day. We always try to make the customers happy after wearing our t-shirts.
            </p>
          </div>
          <div
            class="tab-pane fade"
            id="profile"
            role="tabpanel"
            aria-labelledby="profile-tab"
          >
            <div class="table-responsive">
              <table class="table">
                <tbody>
                  <tr>
                    <td>
                      <h5> Brand:</h5>
                    </td>
                    <td>
                      <h5>Easy</h5>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <h5>Product Type:</h5>
                    </td>
                    <td>
                      <h5>Polo-Shirt</h5>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <h5>Color:</h5>
                    </td>
                    <td>
                      <h5>-------</h5>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <h5>Main Material:</h5>
                    </td>
                    <td>
                      <h5> Cotton</h5>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <h5>Quality checking</h5>
                    </td>
                    <td>
                      <h5>yes</h5>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <h5>Gender:</h5>
                    </td>
                    <td>
                      <h5>Male</h5>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <h5>When packeting</h5>
                    </td>
                    <td>
                      <h5>Without touch of hand</h5>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <h5>Each Box contains</h5>
                    </td>
                    <td>
                      <h5>1pcs</h5>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div
            class="tab-pane fade"
            id="contact"
            role="tabpanel"
            aria-labelledby="contact-tab"
          >
            <div class="row">
              <div class="col-lg-6">
                <div class="comment_list">
                  <div class="review_item">
                    <div class="media">
                      <div class="d-flex">
                        <img
                          src="image/review-1.png"
                          alt=""
                        />
                      </div>
                      <div class="media-body">
                        <h4>Blake Ruiz</h4>
                        <h5>12th Feb, 2020 at 05:56 pm</h5>
                        <a class="reply_btn" href="#">Reply</a>
                      </div>
                    </div>
                    <p>
                      I need XL size. Is it available?
                    </p>
                  </div>
                  
                  <div class="review_item">
                    <div class="media">
                      <div class="d-flex">
                        <img
                          src="image/review-1.png"
                          alt=""
                        />
                      </div>
                      <div class="media-body">
                        <h4>Blake Ruiz</h4>
                        <h5>25th march, 2020 at 05:10 pm</h5>
                        <a class="reply_btn" href="#">Reply</a>
                      </div>
                    </div>
                    <p>
                      I dont like this color. Do you have other?
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="review_box">
                  <h4>Post a comment</h4>
                  <form
                    class="row contact_form"
                    action="contact_process.php"
                    method="post"
                    id="contactForm"
                    novalidate="novalidate"
                  >
                   
                    <div class="col-md-12">
                      <div class="form-group">
                        <input
                          type="email"
                          class="form-control"
                          id="email"
                          name="email"
                          placeholder="Email Address"
                        />
                      </div>
                    </div>
                    
                    <div class="col-md-12">
                      <div class="form-group">
                        <textarea
                          class="form-control"
                          name="message"
                          id="message"
                          rows="1"
                          placeholder="Message"
                        ></textarea>
                      </div>
                    </div>
                    <div class="col-md-12 text-right">
                      <button
                        type="submit"
                        value="submit"
                        class="btn submit_btn"
                      >
                        Submit Now
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div
            class="tab-pane fade show active"
            id="review"
            role="tabpanel"
            aria-labelledby="review-tab"
          >
            <div class="row">
              <div class="col-lg-6">
                <div class="row total_rate">
                  <div class="col-6">
                    <div class="box_total">
                      <h5>Overall</h5>
                      <h4 style="color:#F6B31D">4.4</h4>
                      <h6>(03 Reviews)</h6>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="rating_list">
                      <h3>Based on 3 Reviews</h3>
                      <ul class="list">
                        <li>
                          <a href="#"
                            >5 Star
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i> 04</a
                          >
                        </li>
                        <li>
                          <a href="#"
                            >4 Star
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i> 06</a
                          >
                        </li>
                        <li>
                          <a href="#"
                            >3 Star
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i> 01</a
                          >
                        </li>
                        <li>
                          <a href="#"
                            >2 Star
                      
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i> 01</a
                          >
                        </li>
                        <li>
                          <a href="#"
                            >1 Star
                           
                            <i class="fa fa-star"></i> 01</a
                          >
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="review_list">
                  <div class="review_item">
                    <div class="media">
                      <div class="d-flex">
                        <img
                          src="img/product/single-product/review-1.png"
                          alt=""
                        />
                      </div>
                      <div class="media-body">
                        <h4>Blake Ruiz</h4>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                      </div>
                    </div>
                    <p>
                      Very Comfortable T-shirt. I am Satisfied.Thank you Easyshop
                    </p>
                  </div>
                  
                 
                </div>
              </div>
              <div class="col-lg-6">
                <div class="review_box">
                  <h4>Add a Review</h4>
                  <p>Your Rating:</p>
                  <ul class="list">
                    <li>
                      <a href="#">
                        <i class="fa fa-star"></i>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="fa fa-star"></i>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="fa fa-star"></i>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="fa fa-star"></i>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="fa fa-star"></i>
                      </a>
                    </li>
                  </ul>
                  <p>Outstanding</p>
                  <form
                    class="row contact_form"
                    action="contact_process.php"
                    method="post"
                    id="contactForm"
                    novalidate="novalidate"
                  >
                    
                    <div class="col-md-12">
                      <div class="form-group">
                        <input
                          type="email"
                          class="form-control"
                          id="email"
                          name="email"
                          placeholder="Email Address"
                        />
                      </div>
                    </div>
                    
                    <div class="col-md-12">
                      <div class="form-group">
                        <textarea
                          class="form-control"
                          name="message"
                          id="message"
                          rows="1"
                          placeholder="Review"
                        ></textarea>
                      </div>
                    </div>
                    <div class="col-md-12 text-right">
                      <button
                        type="submit"
                        value="submit"
                        class="btn submit_btn"

                      >
                        Submit Now
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
	<!-- Recently Viewed -->

	<div class="viewed" style="background-color: #FDFDFD; margin-top:-30px;">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="viewed_title_container">
						<h3 class="viewed_title">Recently Viewed</h3>
						<div class="viewed_nav_container">
							<div class="viewed_nav viewed_prev"><i class="fas fa-chevron-left" style="color:#A8952C;"></i></div>
							<div class="viewed_nav viewed_next"><i class="fas fa-chevron-right" style="color:#A8952C;"></i></div>
						</div>
					</div>

					<div class="viewed_slider_container">
						
						<!-- Recently Viewed Slider -->

						<div class="owl-carousel owl-theme viewed_slider">
							
							<!-- Recently Viewed Item -->
							<div class="owl-item">
								<div class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
									<div class="viewed_image"><img src="image/cat_11.jpg" alt=""></div>
									<div class="viewed_content text-center">
										<div class="viewed_price">$225<span>$300</span></div>
										<div class="viewed_name"><a href="#">Beoplay H7</a></div>
									</div>
									<ul class="item_marks">
										<li class="item_mark item_discount">-25%</li>
										<li class="item_mark item_new">new</li>
									</ul>
								</div>
								
							</div>

							<!-- Recently Viewed Item -->
							<div class="owl-item">
								<div class="viewed_item d-flex flex-column align-items-center justify-content-center text-center">
									<div class="viewed_image"><img src="image/cat_13.jpg" alt=""></div>
									<div class="viewed_content text-center">
										<div class="viewed_price">$379</div>
										<div class="viewed_name"><a href="#">LUNA Smartphone</a></div>
									</div>
									<ul class="item_marks">
										<li class="item_mark item_discount">-25%</li>
										<li class="item_mark item_new">new</li>
									</ul>
								</div>
							</div>

							<!-- Recently Viewed Item -->
							<div class="owl-item">
								<div class="viewed_item d-flex flex-column align-items-center justify-content-center text-center">
									<div class="viewed_image"><img src="image/pro_21.jpg" alt=""></div>
									<div class="viewed_content text-center">
										<div class="viewed_price">$225</div>
										<div class="viewed_name"><a href="#">Samsung J730F...</a></div>
									</div>
									<ul class="item_marks">
										<li class="item_mark item_discount">-25%</li>
										<li class="item_mark item_new">new</li>
									</ul>
								</div>
							</div>

							<!-- Recently Viewed Item -->
							<div class="owl-item">
								<div class="viewed_item is_new d-flex flex-column align-items-center justify-content-center text-center">
									<div class="viewed_image"><img src="image/pro_22.jpg" alt=""></div>
									<div class="viewed_content text-center">
										<div class="viewed_price">$379</div>
										<div class="viewed_name"><a href="#">Huawei MediaPad...</a></div>
									</div>
									<ul class="item_marks">
										<li class="item_mark item_discount">-25%</li>
										<li class="item_mark item_new">new</li>
									</ul>
								</div>
							</div>

							<!-- Recently Viewed Item -->
							<div class="owl-item">
								<div class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
									<div class="viewed_image"><img src="image/pro_23.jpg" alt=""></div>
									<div class="viewed_content text-center">
										<div class="viewed_price">$225<span>$300</span></div>
										<div class="viewed_name"><a href="#">Sony PS4 Slim</a></div>
									</div>
									<ul class="item_marks">
										<li class="item_mark item_discount">-25%</li>
										<li class="item_mark item_new">new</li>
									</ul>
								</div>
							</div>

							<!-- Recently Viewed Item -->
							<div class="owl-item">
								<div class="viewed_item d-flex flex-column align-items-center justify-content-center text-center">
									<div class="viewed_image"><img src="image/pro_15.jpg" alt=""></div>
									<div class="viewed_content text-center">
										<div class="viewed_price">$375</div>
										<div class="viewed_name"><a href="#">Speedlink...</a></div>
									</div>
									<ul class="item_marks">
										<li class="item_mark item_discount">-25%</li>
										<li class="item_mark item_new">new</li>
									</ul>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
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
							
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="images/brands_1.jpg" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="images/brands_2.jpg" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="images/brands_3.jpg" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="images/brands_4.jpg" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="images/brands_5.jpg" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="images/brands_6.jpg" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="images/brands_7.jpg" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="images/brands_8.jpg" alt=""></div></div>

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
<footer class="footer">
		<div class="container">
			<div class="row">

				<div class="col-lg-3 footer_col">
					<div class="footer_column footer_contact">
						<div class="logo_container">
							<div class="logo"><a href="home.php"><img src="logo/logo.png" style="max-height:60px;" alt="" /></a></div>
						</div>
						<div class="footer_title">Got Question? Call Us 24/7</div>
						<div class="footer_phone">+880 176 287 9579</div>
						<div class="footer_contact_text">
							<p>379, S.S.K Road, Mohipal Plaza</p>
							<p>Level-04, Feni : 3900</p>
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
						<ul class="footer_list">
							<li><a href="#">My Account</a></li>
							<li><a href="#">Order Tracking</a></li>
							<li><a href="#">Wish List</a></li>
							<li><a href="contact.html">Customer Services</a></li>
							<li><a href="#">Terms & Condition</a></li>
							<li><a href="#">FAQs</a></li>
							<li><a href="about.html">About Us</a></li>
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

<script src="js/jquery-3.3.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="js/product_custom.js"></script>
</body>

</html>