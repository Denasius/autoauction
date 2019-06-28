@extends('layout')

@section('content')

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

<div id="page-heading">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<h1>Blog Posts</h1>
				<div class="line"></div>
				<span>Praesent volutpat nisi sed imperdiet facilisis felis turpis fermentum lectus</span>
				<div class="page-active">
					<ul>
						<li><a href="index.html">Home</a></li>
						<li><i class="fa fa-dot-circle-o"></i></li>
						<li><a href="blog-right.html">Blog Posts</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>

<section class="blog-grid">
	<div class="container">
		<div class="row">
			<div id="blog-posts">
				<div class="blog-item col-md-4">
					<img src="http://dummyimage.com/370x270/cccccc/fff.jpg" alt="">
					<div class="down-content">
						<div class="post-info">
							<ul>
								<li>May 14, 2015</li>
								<li>Posted by <a href="#">Admin</a></li>
							</ul>
							<div class="tittle">
								<a href="single-blog.html"><h2>Hella kogi whatever, small batch</h2></a>
							</div>
						</div>
						<p>Praesent mollis at odio in aliquam. Morbi sit amet enim ante. Phasellus commodo urna sed laoreet mauris.</p>
						<a href="single-blog.html">Read More</a>
					</div>
				</div>
				<div class="blog-item col-md-4">
					<img src="http://dummyimage.com/370x270/cccccc/fff.jpg" alt="">
					<div class="down-content">
						<div class="post-info">
							<ul>
								<li>May 14, 2015</li>
								<li>Posted by <a href="#">Admin</a></li>
							</ul>
							<div class="tittle">
								<a href="single-blog.html"><h2>Normcore pour-over taxidermy twee</h2></a>
							</div>
						</div>
						<p>Praesent mollis at odio in aliquam. Morbi sit amet enim ante. Phasellus commodo urna sed laoreet mauris.</p>
						<a href="single-blog.html">Read More</a>
					</div>
				</div>
				<div class="blog-item col-md-4">
					<img src="http://dummyimage.com/370x270/cccccc/fff.jpg" alt="">
					<div class="down-content">
						<div class="post-info">
							<ul>
								<li>May 14, 2015</li>
								<li>Posted by <a href="#">Admin</a></li>
							</ul>
							<div class="tittle">
								<a href="single-blog.html"><h2>Retro art party vinyl meditation</h2></a>
							</div>
						</div>
						<p>Praesent mollis at odio in aliquam. Morbi sit amet enim ante. Phasellus commodo urna sed laoreet mauris.</p>
						<a href="single-blog.html">Read More</a>
					</div>
				</div>
				<div class="blog-item col-md-4">
					<img src="http://dummyimage.com/370x270/cccccc/fff.jpg" alt="">
					<div class="down-content">
						<div class="post-info">
							<ul>
								<li>May 14, 2015</li>
								<li>Posted by <a href="#">Admin</a></li>
							</ul>
							<div class="tittle">
								<a href="single-blog.html"><h2>Retro art party vinyl meditation</h2></a>
							</div>
						</div>
						<p>Praesent mollis at odio in aliquam. Morbi sit amet enim ante. Phasellus commodo urna sed laoreet mauris.</p>
						<a href="single-blog.html">Read More</a>
					</div>
				</div>
				<div class="blog-item col-md-4">
					<img src="http://dummyimage.com/370x270/cccccc/fff.jpg" alt="">
					<div class="down-content">
						<div class="post-info">
							<ul>
								<li>May 14, 2015</li>
								<li>Posted by <a href="#">Admin</a></li>
							</ul>
							<div class="tittle">
								<a href="single-blog.html"><h2>Hella kogi whatever, small batch</h2></a>
							</div>
						</div>
						<p>Praesent mollis at odio in aliquam. Morbi sit amet enim ante. Phasellus commodo urna sed laoreet mauris.</p>
						<a href="single-blog.html">Read More</a>
					</div>
				</div>
				<div class="blog-item col-md-4">
					<img src="http://dummyimage.com/370x270/cccccc/fff.jpg" alt="">
					<div class="down-content">
						<div class="post-info">
							<ul>
								<li>May 14, 2015</li>
								<li>Posted by <a href="#">Admin</a></li>
							</ul>
							<div class="tittle">
								<a href="single-blog.html"><h2>Normcore pour-over taxidermy twee</h2></a>
							</div>
						</div>
						<p>Praesent mollis at odio in aliquam. Morbi sit amet enim ante. Phasellus commodo urna sed laoreet mauris.</p>
						<a href="single-blog.html">Read More</a>
					</div>
				</div>
				<div class="blog-item col-md-4">
					<img src="http://dummyimage.com/370x270/cccccc/fff.jpg" alt="">
					<div class="down-content">
						<div class="post-info">
							<ul>
								<li>May 14, 2015</li>
								<li>Posted by <a href="#">Admin</a></li>
							</ul>
							<div class="tittle">
								<a href="single-blog.html"><h2>Retro art party vinyl meditation</h2></a>
							</div>
						</div>
						<p>Praesent mollis at odio in aliquam. Morbi sit amet enim ante. Phasellus commodo urna sed laoreet mauris.</p>
						<a href="single-blog.html">Read More</a>
					</div>
				</div>
				<div class="blog-item col-md-4">
					<img src="http://dummyimage.com/370x270/cccccc/fff.jpg" alt="">
					<div class="down-content">
						<div class="post-info">
							<ul>
								<li>May 14, 2015</li>
								<li>Posted by <a href="#">Admin</a></li>
							</ul>
							<div class="tittle">
								<a href="single-blog.html"><h2>Normcore pour-over taxidermy twee</h2></a>
							</div>
						</div>
						<p>Praesent mollis at odio in aliquam. Morbi sit amet enim ante. Phasellus commodo urna sed laoreet mauris.</p>
						<a href="single-blog.html">Read More</a>
					</div>
				</div>
				<div class="blog-item col-md-4">
					<img src="http://dummyimage.com/370x270/cccccc/fff.jpg" alt="">
					<div class="down-content">
						<div class="post-info">
							<ul>
								<li>May 14, 2015</li>
								<li>Posted by <a href="#">Admin</a></li>
							</ul>
							<div class="tittle">
								<a href="single-blog.html"><h2>Hella kogi whatever, small batch</h2></a>
							</div>
						</div>
						<p>Praesent mollis at odio in aliquam. Morbi sit amet enim ante. Phasellus commodo urna sed laoreet mauris.</p>
						<a href="single-blog.html">Read More</a>
					</div>
				</div>
				<div class="col-md-12 text-center">
					<div class="load-more-button">
						<a href="#">Load more</a><i class="fa fa-spinner"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection