
<?php

session_start();
$session=session_id();

include("../dbConnection/connect.php");
include("../method.php");
$db = new connection();
//echo $db->sms;
$mod=new phpMethod();

?>


<!DOCTYPE html>
<html lang="en">
<head>
<title>MEGA BAZAR BD</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="../custom.css">
 <link rel="shortcut icon" type="image/icon" href="logo/logo.png" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Easyshop project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
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
						<div class="top_bar_contact_item"><div class="top_bar_icon"><img src="images/phone.png" alt=""></div><a href="Tel:+880 176 287 9579">+880 176 287 9579</a></div>
						<div class="top_bar_contact_item"><div class="top_bar_icon"><img src="images/mail.png" alt=""></div><a href="mailto:info@easyshop.com">info@southbanglait.com</a></div>
						<div class="top_bar_content ml-auto">
							<div class="top_bar_menu">
								
							</div>
							<div class="top_bar_user">
								<div class="user_icon"><img src="images/user.svg" alt=""></div>
								<div><a href="reg.php">Register</a></div>
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
							<div class="logo"><a href="home.php"><img src="logo/logo.png" style="max-height:90px;" alt="" /></a></div>
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
												<span class="custom_dropdown_placeholder clc">All Items</span>
												<i class="fas fa-chevron-down"></i>
											<ul class="custom_list clc">
												<li><a class="clc" href="#">All Items</a></li>
														<?php
														 $sql="SELECT * FROM `item_information`";
											              $query=$mod->excuteView($sql);
											              while($fetch=$query->fetch_array())
											              {
														   ?>

													<li><a class="clc" href="#"><?php echo $fetch[1]?></a></li>
													<?php } ?>

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
										<div class="cart_count"><a href="Cart.php"><span>0</span></a></div>
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
							<div class="cat_menu_container">
								<div class="cat_menu_title d-flex flex-row align-items-center justify-content-start">
									<div class="cat_burger"><span></span><span></span><span></span></div>
									<div class="cat_menu_text">Items List</div>
								</div>

								<ul class="cat_menu">
										<?php
											 $sql="SELECT * FROM `item_information`";
								              $query=$mod->excuteView($sql);
								              while($fetch=$query->fetch_array())
								              {
											?>
											
									<li class="hassubs"><a href="#"><?php echo $fetch[1];?><i class="fas fa-chevron-right"></i></a>

										<ul>

												
											
												<li><a href="#">Laptop<i class="fas fa-chevron-right"></i></a></li>
												<li><a href="#">Laptop<i class="fas fa-chevron-right"></i></a></li>
												<li><a href="#">Laptop<i class="fas fa-chevron-right"></i></a></li>

												
												
												

												
										</ul>
											
									</li>
								<?php }?>	
									
								</ul>
							</div>


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
	
	<!-- Banner -->

		<div class="container-fluid">

	<div class="row">
		<div class="col-lg-3"></div>
   
		<div class="col-lg-9 col-sm-12 col-md-12" >
    
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
    
    
  </ol>
  <div class="carousel-inner" style="max-height: 400px;">

    <div class="carousel-item active">
      <img src="slide/covid.webp" class="d-block w-100" alt="..." >
    </div>
    
    <div class="carousel-item">
      <img src="slide/stayhome.webp" class="d-block w-100" alt="..." >
    </div>
    <div class="carousel-item">
      <img src="slide/33.webp" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="slide/slide.jpg" class="d-block w-100" alt="...">
    </div>
   
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
		</div>
	</div>
</div><br><br><br><br><br>
</div>