@extends('layout')

@section('seo')
  <title>Услуги</title>
  <meta name="description" content="Услуги">
@endsection


@section('content')

	<div id="page-heading">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<h1>Services</h1>
					<div class="line"></div>
					<span>Praesent volutpat nisi sed imperdiet facilisis felis turpis fermentum lectus</span>
					<div class="page-active">
						<ul>
							<li><a href="index.html">Home</a></li>
							<li><i class="fa fa-dot-circle-o"></i></li>
							<li><a href="services.html">Services</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
<h1>Шаблон service</h1>
	<section class="why-us">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div class="left-content">
						<div class="heading-section">
							<h2>Why choose us?</h2>
							<span>Vivamus gravida magna massa in cursus mi vehicula at. Nunc sem quam suscipit</span>
							<div class="line-dec"></div>
						</div>
						<div class="services">
							<div class="col-md-6">
								<div class="service-item">
									<i class="fa fa-bar-chart-o"></i>
									<div class="tittle">
										<h2>Results of Drivers</h2>
									</div>
									<p>Integer nec posuere metus, at feugiat. Sed sodales venenat malesuada.</p>
								</div>
							</div>
							<div class="col-md-6">
								<div class="service-item">
									<i class="fa fa-gears"></i>
									<div class="tittle">
										<h2>upgrades performance</h2>
									</div>
									<p>Integer nec posuere metus, at feugiat. Sed sodales venenat malesuada.</p>
								</div>
							</div>
							<div class="col-md-6">
								<div class="service-item second-row">
									<i class="fa fa-pencil"></i>
									<div class="tittle">
										<h2>product sellers</h2>
									</div>
									<p>Integer nec posuere metus, at feugiat. Sed sodales venenat malesuada.</p>
								</div>
							</div>
							<div class="col-md-6">
								<div class="service-item second-row">
									<i class="fa fa-wrench"></i>
									<div class="tittle">
										<h2>Fast Service</h2>
									</div>
									<p>Integer nec posuere metus, at feugiat. Sed sodales venenat malesuada.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="right-img">
						<img src="http://dummyimage.com/370x340/cccccc/fff.jpg" alt="">
						<div class="img-bg"></div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<div id="funny-facts">
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-sm-6 text-center">
		            <div class="fact-item">
		              <i class="fa fa-thumbs-o-up"></i>
		              <div class="count-number" data-count="22150">
		                <span class="count-focus">22,150</span>
		              </div>
		              <span class="fact-role">Lines of code</span>
		            </div>
		        </div>
		        <div class="col-md-3 col-sm-6 text-center">
		            <div class="fact-item">
		              <i class="fa fa-smile-o"></i>
		              <div class="count-number" data-count="30555">
		                <span class="count-focus">30,555</span>
		              </div>
		              <span class="fact-role">Happy Clients</span>
		            </div>
		        </div>
		        <div class="col-md-3 col-sm-6 text-center">
		            <div class="fact-item">
		              <i class="fa fa-heart-o"></i>
		              <div class="count-number" data-count="2000">
		                <span class="count-focus">2000</span>
		              </div>
		              <span class="fact-role">Winning Awards</span>
		            </div>
		        </div>
		        <div class="col-md-3 col-sm-6 text-center">
		            <div class="fact-item last-fact">
		              <i class="fa fa-lightbulb-o"></i>
		              <div class="count-number" data-count="14510">
		                <span class="count-focus">14,510</span>
		              </div>
		              <span class="fact-role">Projects Delivered</span>
		            </div>
		        </div>
			</div>
		</div>
	</div>

	<section class="plans">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="heading-section-2 text-center">
						<h2>Pricing Tables</h2>
						<span>Vivamus gravida magna massa in cursus mi vehicula at. Nunc sem quam suscipit</span>
						<div class="dec"><i class="fa fa-dollar"></i></div>
						<div class="line-dec"></div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3">
					<div class="pricing-table">
						<h2>Basic Plan</h2>
						<span><em>$</em>169<em>/mo</em></span>
						<ul>
							<li><i class="fa fa-check"></i>24/7 Online Support</li>
							<li><i class="fa fa-check"></i>Unlimited Subdomains</li>
							<li class="closet"><i class="fa fa-close"></i>Free Updates</li>
							<li class="closet"><i class="fa fa-close"></i>No Daily Backup</li>
							<li><i class="fa fa-check"></i>Another Featured Here</li>
						</ul>
						<div class="simple-button">
							<a href="#">Sign Up</a>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="pricing-table">
						<h2>Standard</h2>
						<span><em>$</em>179<em>/mo</em></span>
						<ul>
							<li><i class="fa fa-check"></i>24/7 Online Support</li>
							<li><i class="fa fa-check"></i>Unlimited Subdomains</li>
							<li class="closet"><i class="fa fa-close"></i>Free Updates</li>
							<li class="closet"><i class="fa fa-close"></i>No Daily Backup</li>
							<li><i class="fa fa-check"></i>Another Featured Here</li>
						</ul>
						<div class="simple-button">
							<a href="#">Sign Up</a>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="pricing-table">
						<h2>Proffesional</h2>
						<span><em>$</em>189<em>/mo</em></span>
						<ul>
							<li><i class="fa fa-check"></i>24/7 Online Support</li>
							<li><i class="fa fa-check"></i>Unlimited Subdomains</li>
							<li class="closet"><i class="fa fa-close"></i>Free Updates</li>
							<li class="closet"><i class="fa fa-close"></i>No Daily Backup</li>
							<li><i class="fa fa-check"></i>Another Featured Here</li>
						</ul>
						<div class="simple-button">
							<a href="#">Sign Up</a>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="pricing-table">
						<h2>Premium</h2>
						<span><em>$</em>199<em>/mo</em></span>
						<ul>
							<li><i class="fa fa-check"></i>24/7 Online Support</li>
							<li><i class="fa fa-check"></i>Unlimited Subdomains</li>
							<li class="closet"><i class="fa fa-close"></i>Free Updates</li>
							<li class="closet"><i class="fa fa-close"></i>No Daily Backup</li>
							<li><i class="fa fa-check"></i>Another Featured Here</li>
						</ul>
						<div class="simple-button">
							<a href="#">Sign Up</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

@endsection