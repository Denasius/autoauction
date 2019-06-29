@extends('layout')

@section('seo')
  <title>О нас</title>
  <meta name="description" content="О нас">
@endsection

@section('content')

	<div id="page-heading">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<h1>About Us</h1>
					<div class="line"></div>
					<span>Praesent volutpat nisi sed imperdiet facilisis felis turpis fermentum lectus</span>
					<div class="page-active">
						<ul>
							<li><a href="index.html">Home</a></li>
							<li><i class="fa fa-dot-circle-o"></i></li>
							<li><a href="about.html">About Us</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
<h1>Шаблон about</h1>
	<section class="who-is">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="left-content">
						<div class="heading">
							<h2>Who is the auction?</h2>
							<span>Irony distillery fashion axe</span>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sed est sed orcit elit
							auctor ullamcorper et imperdiet lectus. Vivamus gravida metus vitae nunc sempe lacinia est pulvinar. Ut sit amet lacus luctus, iaculis turpis sit amet.<br><br>Maecenas eros mi, lacinia eu ultricies vel, elementum et justo. Ut at tortor a odio vestib suscipit non sit amet dolor. Morbi molestie magna nec metus facilisis, at iaculis adipiscing. Praesent ac diam velit. Curabitur lacinia tristique velit ut laoreet. Nam pretium id risuse fermentum. Aenean eu euismod justo.</p>
							<a href="#">Read More</a>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="right-content">
						<div class="skill-bars">
							<div class="skillbar clearfix " data-percent="68%">
								<div class="skillbar-title"><h6>Photoshop</h6><span>(68%)</span></div>
								<div class="skillbar-bar" style="background: repeating-linear-gradient(145deg,#51779d,#2e5c89 2px,#2e5c89 5px,#2e5c89 5px);"></div>
							</div>
							<div class="skillbar clearfix " data-percent="89%">
								<div class="skillbar-title"><h6>Javascript</h6><span>(89%)</span></div>
								<div class="skillbar-bar" style="background: repeating-linear-gradient(145deg,#51779d,#2e5c89 2px,#2e5c89 5px,#2e5c89 5px);"></div>
							</div>
							<div class="skillbar clearfix " data-percent="42%">
								<div class="skillbar-title"><h6>Wordpress</h6><span>(42%)</span></div>
								<div class="skillbar-bar" style="background: repeating-linear-gradient(145deg,#51779d,#2e5c89 2px,#2e5c89 5px,#2e5c89 5px);"></div>
							</div>
							<div class="skillbar clearfix " data-percent="75%">
								<div class="skillbar-title"><h6>Web design</h6><span>(75%)</span></div>
								<div class="skillbar-bar" style="background: repeating-linear-gradient(145deg,#51779d,#2e5c89 2px,#2e5c89 5px,#2e5c89 5px);"></div>
							</div>									
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="meet-team">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="heading-section-2 text-center">
						<h2>Meet the team</h2>
						<span>Vivamus gravida magna massa in cursus mi vehicula at. Nunc sem quam suscipit</span>
						<div class="dec"><i class="fa fa-user"></i></div>
						<div class="line-dec"></div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3 col-sm-6">
					<div class="team-member text-center">
						<div class="thumb-holder">
							<img src="http://dummyimage.com/220x220/cccccc/fff.jpg" alt="">
							<div class="hover-content">
								<div class="line"></div>
								<p>Donec sit amet eros sit<br> amet quam auctor</p>
								<ul>
									<li><a href="#"><i class="fa fa-facebook"></i></a></li>
									<li><a href="#"><i class="fa fa-google"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								</ul>
							</div>
							<div class="down-content">
								<h2>Casey Algarin</h2>
								<span>Designer</span>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6">
					<div class="team-member text-center">
						<div class="thumb-holder">
							<img src="http://dummyimage.com/220x220/cccccc/fff.jpg" alt="">
							<div class="hover-content">
								<div class="line"></div>
								<p>Donec sit amet eros sit<br> amet quam auctor</p>
								<ul>
									<li><a href="#"><i class="fa fa-facebook"></i></a></li>
									<li><a href="#"><i class="fa fa-google"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								</ul>
							</div>
							<div class="down-content">
								<h2>Rosa Gray</h2>
								<span>Creative Director</span>		
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6">
					<div class="team-member text-center">
						<div class="thumb-holder">
							<img src="http://dummyimage.com/220x220/cccccc/fff.jpg" alt="">
							<div class="hover-content">
								<div class="line"></div>
								<p>Donec sit amet eros sit<br> amet quam auctor</p>
								<ul>
									<li><a href="#"><i class="fa fa-facebook"></i></a></li>
									<li><a href="#"><i class="fa fa-google"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								</ul>
							</div>
							<div class="down-content">
								<h2>James Sprenger</h2>
								<span>Web Designer</span>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6">
					<div class="team-member text-center">
						<div class="thumb-holder">
							<img src="http://dummyimage.com/220x220/cccccc/fff.jpg" alt="">
							<div class="hover-content">
								<div class="line"></div>
								<p>Donec sit amet eros sit<br> amet quam auctor</p>
								<ul>
									<li><a href="#"><i class="fa fa-facebook"></i></a></li>
									<li><a href="#"><i class="fa fa-google"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								</ul>
							</div>
							<div class="down-content">
								<h2>Teri Emerson</h2>
								<span>Ceo and Founder</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="testimonials">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="heading-section-2 text-center">
						<h2>Meet the team</h2>
						<span>Vivamus gravida magna massa in cursus mi vehicula at. Nunc sem quam suscipit</span>
						<div class="dec"><i class="fa fa-user"></i></div>
						<div class="line-dec"></div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div id="owl-testimonials">
						<div class="item text-center col-md-8 col-md-offset-2">
							<p>Readymade aesthetic 8-bit Vice food truck. Viral Banksy Echo Park freegan. Distillery XOXO try-hard fanny pack Godard. Kale chips Apparel. Lumbersexual Intelligentsia Neutra mixtape paleo fashion axe pug.</p>
							<img src="assets/images/testimonial-1.png" alt="">
							<h2>Louis Golden</h2>
							<span>Founder and ceo of auction cars</span>
						</div>
						<div class="item text-center col-md-8 col-md-offset-2">
							<p>Readymade aesthetic 8-bit Vice food truck. Viral Banksy Echo Park freegan. Distillery XOXO try-hard fanny pack Godard. Kale chips Apparel. Lumbersexual Intelligentsia Neutra mixtape paleo fashion axe pug.</p>
							<img src="assets/images/testimonial-2.png" alt="">
							<h2>Anica Luvies</h2>
							<span>Founder and ceo of auction cars</span>
						</div>
					</div>
				</div>
				<div class="owl-controls col-md-12">
					<a class="btn prev fa fa-arrow-left"></a>
					<div class="bg-prev"></div>
					<a class="btn next fa fa-arrow-right"></a>
				 	<div class="bg-next"></div>
				</div>
			</div>
		</div>
	</section>

@endsection