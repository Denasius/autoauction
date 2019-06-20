<!DOCTYPE html>
<!--[if IE 9]>
<html class="ie ie9" lang="en-US">
<![endif]-->
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

	<title>Auction - Car Dealer HTML Theme</title>


	<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500,700' rel='stylesheet' type='text/css'>

  <link rel="stylesheet" href="css/styles.css">

	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	<![endif]-->

</head>
<body>

	
	<div class="sidebar-menu-container" id="sidebar-menu-container">

		<div class="sidebar-menu-push">

			<div class="sidebar-menu-overlay"></div>

			<div class="sidebar-menu-inner">

				<div id="sub-header">
					<div class="container">
						<div class="row">
							<div class="col-md-4 col-sm-12">
								<div class="social-icons">
									<ul>
										<li><a href="#"><i class="fa fa-facebook"></i></a></li>
										<li><a href="#"><i class="fa fa-twitter"></i></a></li>
										<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
										<li><a href="#"><i class="fa fa-instagram"></i></a></li>
										<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
										<li><a href="#"><i class="fa fa-rss"></i></a></li>
										<li><a href="#"><i class="fa fa-behance"></i></a></li>
									</ul>
								</div>
							</div>

							<div class="col-md-4 col-sm-12">
								<div class="informatio">
									<p>123</p>
								</div>
							</div>

							<div class="col-md-4 hidden-sm">
								<div class="right-info">
									
									<ul>
										<li>Call us: <em>570-694-4002</em></li>
										<li><a href="#">Get Free Appointment →</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>

				<header class="site-header">
					<div id="main-header" class="main-header header-sticky">
						<div class="inner-header container clearfix">
							<div class="logo">
								<a href="index.html"><img src="assets/images/logo.png" alt=""></a>
							</div>
							<div class="header-right-toggle pull-right hidden-md hidden-lg">
								<a href="javascript:void(0)" class="side-menu-button"><i class="fa fa-bars"></i></a>
							</div>
							<nav class="main-navigation text-left hidden-xs hidden-sm">
								<ul>
									<li><a href="index.html">Home</a></li>
									<li><a href="about.html">About Us</a></li>
									<li><a href="services.html">Services</a></li>
									<li><a href="#" class="has-submenu">Listing</a>
										<ul class="sub-menu">
											<li><a href="listing-right.html">Sidebar Right</a></li>
											<li><a href="listing-left.html">Sidebar Left</a></li>
											<li><a href="listing-grid.html">Grids System</a></li>
											<li><a href="single-list.html">Car Details</a></li>
										</ul>
									</li>
									<li><a href="#" class="has-submenu">Blog</a>
										<ul class="sub-menu">
											<li><a href="blog-right.html">Classic</a></li>
											<li><a href="blog-grid.html">Grids System</a></li>
											<li><a href="grid-right.html">Grids Sidebar</a></li>
											<li><a href="single-blog.html">Single Post</a></li>
										</ul>
									</li>
									<li><a href="contact.html">Contact</a></li>
									<li>
										<p><a href="#" id="example-show" class="showLink" onclick="showHide('example');return false;"><i class="fa fa-search"></i></a></p>
										<div id="example" class="more">
											<form method="get" id="blog-search" class="blog-search">
												<input type="text" class="blog-search-field" name="s" placeholder="Type to search" value="">
											</form>
											<p><a href="#" id="example-hide" class="hideLink" 
											onclick="showHide('example');return false;"><i class="
											fa fa-close"></i></a></p>
										</div>
									</li>
								</ul>
							</nav>
						</div>
					</div>
				</header>

				@yield('content')

				<section class="clients">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<div id="owl-demo">
									<div class="item">
										<img src="assets/images/client-1.png" alt="">
									</div>
									<div class="item">
										<img src="assets/images/client-2.png" alt="">
									</div>
									<div class="item">
										<img src="assets/images/client-3.png" alt="">
									</div>
									<div class="item">
										<img src="assets/images/client-4.png" alt="">
									</div>
									<div class="item">
										<img src="assets/images/client-5.png" alt="">
									</div>
									<div class="item">
										<img src="assets/images/client-6.png" alt="">
									</div>
									<div class="item">
										<img src="assets/images/client-3.png" alt="">
									</div>
									<div class="item">
										<img src="assets/images/client-2.png" alt="">
									</div>
									<div class="item">
										<img src="assets/images/client-1.png" alt="">
									</div>
									<div class="item">
										<img src="assets/images/client-4.png" alt="">
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>

				<div id="cta-2">
					<div class="container">
						<div class="row">
							<div class="col-md-8 col-sm-12">
								<div class="left-content">
									<h2>Subscribe to the auction</h2>
									<form method="get" id="subscribe" class="blog-search">
										<input type="text" class="blog-search-field" name="s" placeholder="E-mail Address" value="">
										<div class="simple-button">
											<a href="#">Subscribe</a>
										</div>
									</form>
								</div>
							</div>
							<div class="col-md-4 col-sm-12">
								<div class="right-content">
									<ul>
										<li><a href="#"><i class="fa fa-facebook"></i></a></li>
										<li><a href="#"><i class="fa fa-flickr"></i></a></li>
										<li><a href="#"><i class="fa fa-twitter"></i></a></li>
										<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
										<li><a href="#"><i class="fa fa-skype"></i></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>

				<footer>
					<div class="container">
						<div class="row">
							<div class="col-md-3">
								<div class="about-us">
									<img src="assets/images/logo-2.png" alt="">
									<p>Maecenas ne mollis orci. Phasell iacu sapie non aliquet ex euismo ac.</p>
									<ul>
										<li><i class="fa fa-map-marker"></i>Raver Croft Drive Knoxville, 37921</li>
										<li><i class="fa fa-phone"></i>+55 417-634-7071</li>
										<li><i class="fa fa-envelope-o"></i>contact@auction.com</li>
									</ul>
								</div>
							</div>
							<div class="col-md-3">
								<div class="featured-links">
									<h4>Featured Links</h4>
									<ul>
										<li><a href="#"><i class="fa fa-caret-right"></i>About Us</a></li>
										<li><a href="#"><i class="fa fa-caret-right"></i>Term &amp; Services</a></li>
										<li><a href="#"><i class="fa fa-caret-right"></i>Meet The Team</a></li>
										<li><a href="#"><i class="fa fa-caret-right"></i>Privacy Policy</a></li>
										<li><a href="#"><i class="fa fa-caret-right"></i>Company News</a></li>
									</ul>
									<ul>
										<li><a href="#"><i class="fa fa-caret-right"></i>Shop</a></li>
										<li><a href="#"><i class="fa fa-caret-right"></i>New Vehicle</a></li>
										<li><a href="#"><i class="fa fa-caret-right"></i>Features</a></li>
										<li><a href="#"><i class="fa fa-caret-right"></i>Promotions</a></li>
										<li><a href="#"><i class="fa fa-caret-right"></i>Contact</a></li>
									</ul>
								</div>
							</div>
							<div class="col-md-3">
								<div class="latest-news">
									<h4>Latest News</h4>
									<div class="latest-item">
										<img src="http://dummyimage.com/64x64/cccccc/fff.jpg" alt="">
										<a href="single-blog.html"><h6>Hella Kogi Whatever</h6></a>
										<ul>
											<li>24 Sep,2015</li>
											<li>2 comments</li>
										</ul>
									</div>
									<div class="latest-item">
										<img src="http://dummyimage.com/64x64/cccccc/fff.jpg" alt="">
										<a href="single-blog.html"><h6>Retro Art Party</h6></a>
										<ul>
											<li>21 Sep,2015</li>
											<li>2 comments</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="gallery">
									<h4>Gallery</h4>
									<div class="gallery-item">
										<img src="http://dummyimage.com/60x60/cccccc/fff.jpg" alt="">
									</div>
									<div class="gallery-item">
										<img src="http://dummyimage.com/60x60/cccccc/fff.jpg" alt="">
									</div>
									<div class="gallery-item">
										<img src="http://dummyimage.com/60x60/cccccc/fff.jpg" alt="">
									</div>
									<div class="gallery-item">
										<img src="http://dummyimage.com/60x60/cccccc/fff.jpg" alt="">
									</div>
									<div class="gallery-item">
										<img src="http://dummyimage.com/60x60/cccccc/fff.jpg" alt="">
									</div>
									<div class="gallery-item">
										<img src="http://dummyimage.com/60x60/cccccc/fff.jpg" alt="">
									</div>
									<div class="gallery-item">
										<img src="http://dummyimage.com/60x60/cccccc/fff.jpg" alt="">
									</div>
									<div class="gallery-item">
										<img src="http://dummyimage.com/60x60/cccccc/fff.jpg" alt="">
									</div>
								</div>
							</div>
						</div>
					</div>
				</footer>

				<div id="sub-footer">
					<div class="container">
						<div class="row">
							<div class="col-md-6 col-sm-12">
								<p>Copyrights 2015 <em>Auction</em>. Developed by Robert</p>
							</div>
							<div class="col-md-6 col-sm-12">
								<ul>
									<li><a href="#">Home</a></li>
									<li><a href="#">About Us</a></li>
									<li><a href="#">Services</a></li>
									<li><a href="#">Shop</a></li>
									<li><a href="#">Pages</a></li>
									<li><a href="#">Contact</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>

				<a href="#" class="go-top"><i class="fa fa-angle-up"></i></a>

			</div>

		</div>

		<nav class="sidebar-menu slide-from-left">
			<div class="nano">
				<div class="content">
					<nav class="responsive-menu">
						<ul>
							<li><a href="index.html">Home</a></li>
							<li><a href="about.html">About Us</a></li>
							<li><a href="services.html">Services</a></li>
							<li class="menu-item-has-children"><a href="#">Listing</a>
								<ul class="sub-menu">
									<li><a href="listing-right.html">Sidebar Right</a></li>
									<li><a href="listing-left.html">Sidebar Left</a></li>
									<li><a href="listing-grid.html">Grids System</a></li>
									<li><a href="single-list.html">Car Details</a></li>
								</ul>
							</li>
							<li class="menu-item-has-children"><a href="#">Blog</a>
								<ul class="sub-menu">
									<li><a href="blog-right.html">Classic</a></li>
									<li><a href="blog-grid.html">Grids System</a></li>
									<li><a href="grid-right.html">Grids Sidebar</a></li>
									<li><a href="single-blog.html">Single Post</a></li>
								</ul>
							</li>
							<li><a href="about.html">About</a></li>
							<li><a href="contact.html">Contact</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</nav>

	</div>
  
  <script src="js/scripts.js"></script>

</body>
</html>