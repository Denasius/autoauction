@extends('layout')

@section('seo')
  <title>{{ $lot->meta_title }}</title>
  <meta name="description" content="{{ $lot->meta_description }}">
@endsection

@section('content')

	<div id="page-heading">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<h1>Vehicle details</h1>
					<div class="line"></div>
					<span>Praesent volutpat nisi sed imperdiet facilisis felis turpis fermentum lectus</span>
					<div class="page-active">
						<ul>
							<li><a href="index.html">Home</a></li>
							<li><i class="fa fa-dot-circle-o"></i></li>
							<li><a href="listin-right.html">Vehicle details</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>

	<section class="car-details">
		<div class="container">
			<div class="row">
				<div id="single-car" class="col-md-8">
					<div class="up-content clearfix">
						<h2>{{ $lot->title }}</h2>
						<span>{{ number_format($lot->price, 0) }} {{ $lot->currency }}</span>
					</div>
					<div class="flexslider">
						<ul class="slides">
						    <li data-thumb="http://dummyimage.com/117x83/cccccc/fff.jpg">
						      <img src="http://dummyimage.com/770x350/cccccc/fff.jpg" alt="" />
						    </li>
						    <li data-thumb="http://dummyimage.com/117x83/cccccc/fff.jpg">
						      <img src="http://dummyimage.com/770x350/cccccc/fff.jpg" alt="" />
						    </li>
						    <li data-thumb="http://dummyimage.com/117x83/cccccc/fff.jpg">
						      <img src="http://dummyimage.com/770x350/cccccc/fff.jpg" alt="" />
						    </li>
						    <li data-thumb="http://dummyimage.com/117x83/cccccc/fff.jpg">
						      <img src="http://dummyimage.com/770x350/cccccc/fff.jpg" alt="" />
						    </li>
						    <li data-thumb="http://dummyimage.com/117x83/cccccc/fff.jpg">
						      <img src="http://dummyimage.com/770x350/cccccc/fff.jpg" alt="" />
						    </li>
						</ul>
					</div>
					<div class="tab">
						<div class="tabs">
						    <ul class="tab-links">
						        <li><a href="#tab1">vehicle overview</a></li>
						        <li class="active"><a href="#tab2">description</a></li>
						        <li><a href="#tab3">vehicle location</a></li>
						        <li><a href="#tab4">contact dealer</a></li>
						    </ul>
						    <div class="tab-content">
						        <div id="tab1" class="tab">
						            <p>	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi in dolorem blanditiis voluptatibus quidem nisi eaque, cupiditate minus omnis, voluptatum corporis neque placeat quod temporibus mollitia. Quod accusamus iure eveniet laboriosam laudantium, saepe quidem incidunt, laboriosam aliquid quibusdam atque.</p>
						        </div>								 
						        <div id="tab2" class="tab active">
						        	<h6>The dealer's details will be emailed to you immediately after you submit your query</h6>
						            <p>Selvage drinking vinegar roof party bitters beard wolf craft beer Blue Bottle, literally you probably haven't heard of them. Deep v jean shorts Williamsburg synth pork belly actually. Organic PBRB viral four loko Bushwick pork belly. Selvage fashion axe sartorial cliche before they sold out, mustache vinyl DIY gastropub fingerstache mlkshk. High Life lo-fi chillwave meggings.<br><br>Migas gluten-free ennui Truffaut ugh, listicle umami plaid lomo sustainable mumblecore street art biodiesel readymade. Polaroid ethical Pitchfork, sartorial bitters mlkshk cliche keytar tofu four loko pork belly High Life lomo listicle.<br><br>Semiotics Vice Wes Anderson Bushwick organic. Chambray twee Banksy, asymmetrical disrupt bitters selfies Helvetica. Gentrify direct trade disrupt Odd Future. Bespoke tote bag small batch, try-hard drinking vinegar cronut beard migas ethical. Seitan wolf Vice banh mi YOLO flannel. Banh mi pug cred church-key, cardigan drinking vinegar hella bicycle rights ugh sustainable. Marfa Bushwick aesthetic, locavore messenger bag 8-bit tote bag.</p>
						        </div>							 
						        <div id="tab3" class="tab">
						            <p>	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi in dolorem blanditiis voluptatibus quidem nisi eaque, cupiditate minus omnis, voluptatum corporis neque placeat quod temporibus mollitia. Quod accusamus iure eveniet laboriosam laudantium.</p>
						        </div>
						        <div id="tab4" class="tab">
						            <p>	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi in dolorem blanditiis voluptatibus quidem nisi eaque, cupiditate minus omnis, voluptatum corporis neque placeat quod temporibus mollitia. Quod accusamus iure eveniet laboriosam laudantium.</p>
						        </div>
						    </div>
						    <div class="more-info">
						    	<div class="row">
						    		<div class="first-info col-md-4">
							    		<h4>Enterainment</h4>
							    		<ul>
							    			<li><i class="fa fa-check"></i>Central Locking</li>
							    			<li><i class="fa fa-check"></i>Automatic Air Conditioning</li>
							    			<li><i class="fa fa-check"></i>Full Leather Interior</li>
							    			<li><i class="fa fa-check"></i>Electric Heated Seats</li>
							    			<li><i class="fa fa-check"></i>Navigation GPS Multimedia</li>
							    		</ul>
							    	</div>
							    	<div class="second-info col-md-4">
							    		<h4>exterior features</h4>
							    		<ul>
							    			<li><i class="fa fa-check"></i>Parking Sensors</li>
							    			<li><i class="fa fa-check"></i>Double Exhaust</li>
							    			<li><i class="fa fa-check"></i>Electric Mirrors</li>
							    			<li><i class="fa fa-check"></i>Manifacturing Year 2015</li>
							    			<li><i class="fa fa-check"></i>Full Service History</li>
							    		</ul>
							    	</div>
							    	<div class="third-info col-md-4">
							    		<h4>interior features</h4>
							    		<ul>
							    			<li><i class="fa fa-check"></i>ABS</li>
							    			<li><i class="fa fa-check"></i>Xenon Headlights</li>
							    			<li><i class="fa fa-check"></i>Immobilizer</li>
							    		</ul>
							    	</div>
						    	</div>
						    </div>
						</div>
					</div>
				</div>
				<div id="left-info" class="col-md-4">
					<div class="details">
						<div class="head-side-bar">
							<h4>Vehicle Details</h4>
						</div>
						<div class="list-info">
							<ul>
								<li><span>Make:</span>Audi</li>
								<li><span>Fabrication Year:</span>2015-6-17</li>
								<li><span>Fuel Type:</span>Gasoline Fuel</li>
								<li><span>No. of Gears:</span>5</li>
								<li><span>Transmission:</span>Automatic</li>
								<li><span>Color:</span>Blue</li>
								<li><span>Fuel Economy:</span>12l/City - 10l/hwy</li>
								<li><span>Motor Capacity:</span>( 179KW / 400BHP )</li>
								<li><span>Country of Origin:</span>Germany ( Munich )</li>
								<li><span>Price:</span>$30,000</li>
							</ul>
						</div> 
					</div>
					<div class="enquiry">
						<div class="head-side-bar">
							<h4>Vehicle Enquiry</h4>
						</div>
						<div class="contact-form">
							<p>The dealer's details will be emailed to you immediately after you submit your query.</p>
							<input type="text" class="name" name="s" placeholder="Your Name" value="">
							<input type="text" class="email" name="s" placeholder="Email Address" value="">
							<input type="text" class="phone" name="s" placeholder="Your Phone Number" value="">
							<textarea id="message" class="message" name="message" placeholder="Message..."></textarea>
						</div>
						<div class="subhead-side-bar">
							<h4>Ask a question</h4>
						</div>
						<div class="check-boxes">
							<ul>
								<li>
									<input type="checkbox" id="c1" name="cc"/>
									<label for="c1">Can I book a test drive?</label>
								</li>
								<li>
									<input type="checkbox" id="c2" name="cc"/>
									<label for="c2">What is your adress and opening hours?</label>
								</li>
								<li>
									<input type="checkbox" id="c3" name="cc"/>
									<label for="c3">Other?</label>
								</li>
							</ul>
							<div class="advanced-button">
								<a href="#">Send enquiry <i class="fa fa-paper-plane"></i></a>
							</div>
						</div>
						<div class="subhead-side-bar">
							<h4>Contact the Seller</h4>
						</div>
						<div class="call-info">
							<i class="fa fa-phone"></i>
							<h6>816-819-0221</h6>
							<p>Car code: <span>55637</span></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="featured-listing">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="heading-section-2 text-center">
						<h2>Recent Vehicles</h2>
						<span>Vivamus gravida magna massa in cursus mi vehicula at. Nunc sem quam suscipit</span>
						<div class="dec"><i class="fa fa-car"></i></div>
						<div class="line-dec"></div>
					</div>
				</div>
			</div>
			<div class="row">
				<div id="featured-cars">
					<div class="featured-item col-md-3">
						<img src="http://dummyimage.com/310x210/cccccc/fff.jpg" alt="">
						<div class="down-content">
							<a href="single-list.html"><h2>Mercedes Amg 6.3</h2></a>
							<span>52,000</span>
							<div class="light-line"></div>
							<p>Donec eu nullas sapien pretium volutpat vel quis turpis. Donec vel risus lacinia euismod urna vel fringilla justo.</p>
							<div class="car-info">
								<ul>
									<li><i class="icon-gaspump"></i>Diesel</li>
									<li><i class="icon-car"></i>Sport</li>
									<li><i class="icon-road2"></i>12,000</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="featured-item col-md-3">
						<img src="http://dummyimage.com/310x210/cccccc/fff.jpg" alt="">
						<div class="down-content">
							<a href="single-list.html"><h2>vw golf VII GTI</h2></a>
							<span>30,000</span>
							<div class="light-line"></div>
							<p>Donec eu nullas sapien pretium volutpat vel quis turpis. Donec vel risus lacinia euismod urna vel fringilla justo.</p>
							<div class="car-info">
								<ul>
									<li><i class="icon-gaspump"></i>Diesel</li>
									<li><i class="icon-car"></i>Sport</li>
									<li><i class="icon-road2"></i>12,000</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="featured-item col-md-3">
						<img src="http://dummyimage.com/310x210/cccccc/fff.jpg" alt="">
						<div class="down-content">
							<a href="single-list.html"><h2>mercedes amg gt</h2></a>
							<span>65,000</span>
							<div class="light-line"></div>
							<p>Donec eu nullas sapien pretium volutpat vel quis turpis. Donec vel risus lacinia euismod urna vel fringilla justo.</p>
							<div class="car-info">
								<ul>
									<li><i class="icon-gaspump"></i>Diesel</li>
									<li><i class="icon-car"></i>Sport</li>
									<li><i class="icon-road2"></i>12,000</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="featured-item col-md-3">
						<img src="http://dummyimage.com/310x210/cccccc/fff.jpg" alt="">
						<div class="down-content">
							<a href="single-list.html"><h2>bmw m4 430D</h2></a>
							<span>64,000</span>
							<div class="light-line"></div>
							<p>Donec eu nullas sapien pretium volutpat vel quis turpis. Donec vel risus lacinia euismod urna vel fringilla justo.</p>
							<div class="car-info">
								<ul>
									<li><i class="icon-gaspump"></i>Diesel</li>
									<li><i class="icon-car"></i>Sport</li>
									<li><i class="icon-road2"></i>12,000</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

@endsection