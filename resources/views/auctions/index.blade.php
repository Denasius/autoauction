@extends('layout')

@section('seo')
  <title>Аукцион разводящая</title>
  <meta name="description" content="Аукцион разводящая">
@endsection

@section('content')

<div id="page-heading">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<h1>Listing Results</h1>
				<div class="line"></div>
				<span>Praesent volutpat nisi sed imperdiet facilisis felis turpis fermentum lectus</span>
				<div class="page-active">
					<ul>
						<li><a href="index.html">Home</a></li>
						<li><i class="fa fa-dot-circle-o"></i></li>
						<li><a href="listin-right.html">Listing Results</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<h1>Шаблон аукционов разводящий</h1>
<section class="listing-grid">
	<div class="container">
		<div class="row">
			<div id="listing-cars" class="col-md-9">
				<div class="pre-featured clearfix">
					<div class="info-text">
						<h4>24 results founded</h4>
					</div>
					<div class="right-content">
						<div class="input-select">
                            <select name="mark" id="mark">
                                <option value="-1">Sorted by</option>
                                  <option>Price</option>
                                  <option>Miles</option>
                                  <option>Year</option>
                                  <option>Near</option>
                            </select>
                        </div>
                        <div class="grid-list">
                        	<ul>
                        		<li><a href="#"><i class="fa fa-list"></i></a></li>
                        		<li><a href="#"><i class="fa fa-square"></i></a></li>
                        	</ul>
                        </div>
					</div>
				</div>
				<div id="featured-cars">
					<div class="row">
						<div class="featured-item col-md-4">
							<img src="http://dummyimage.com/310x210/cccccc/fff.jpg" alt="">
							<div class="down-content">
								<a href="{{ url('novyy-bmw-dlya-pacekov') }}"><h2>Mercedes e class <br>amg 6.3</h2></a>
								<span>52,000</span>
								<div class="light-line"></div>
								<p>Donec eu nullas sapien pretium volutpat vel quis turpis.</p>
								<div class="car-info">
									<ul>
										<li><i class="icon-gaspump"></i>Diesel</li>
										<li><i class="icon-car"></i>Sport</li>
										<li><i class="icon-road2"></i>12,000</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="featured-item col-md-4">
							<img src="http://dummyimage.com/310x210/cccccc/fff.jpg" alt="">
							<div class="down-content">
								<a href="{{ url('novyy-bmw-dlya-pacekov') }}"><h2>volkswagen <br>passat</h2></a>
								<span>30,000</span>
								<div class="light-line"></div>
								<p>Donec eu nullas sapien pretium volutpat vel quis turpis.</p>
								<div class="car-info">
									<ul>
										<li><i class="icon-gaspump"></i>Diesel</li>
										<li><i class="icon-car"></i>Sport</li>
										<li><i class="icon-road2"></i>12,000</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="featured-item col-md-4">
							<img src="http://dummyimage.com/310x210/cccccc/fff.jpg" alt="">
							<div class="down-content">
								<a href="{{ url('novyy-bmw-dlya-pacekov') }}"><h2>Mercedes <br>amg Gt s 6.3</h2></a>
								<span>65,000</span>
								<div class="light-line"></div>
								<p>Donec eu nullas sapien pretium volutpat vel quis turpis.</p>
								<div class="car-info">
									<ul>
										<li><i class="icon-gaspump"></i>Diesel</li>
										<li><i class="icon-car"></i>Sport</li>
										<li><i class="icon-road2"></i>12,000</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="featured-item col-md-4">
							<img src="http://dummyimage.com/310x210/cccccc/fff.jpg" alt="">
							<div class="down-content">
								<a href="{{ url('novyy-bmw-dlya-pacekov') }}"><h2>bmw m4 <br>convertible</h2></a>
								<span>64,000</span>
								<div class="light-line"></div>
								<p>Donec eu nullas sapien pretium volutpat vel quis turpis.</p>
								<div class="car-info">
									<ul>
										<li><i class="icon-gaspump"></i>Diesel</li>
										<li><i class="icon-car"></i>Sport</li>
										<li><i class="icon-road2"></i>12,000</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="featured-item col-md-4">
							<img src="http://dummyimage.com/310x210/cccccc/fff.jpg" alt="">
							<div class="down-content">
								<a href="{{ url('novyy-bmw-dlya-pacekov') }}"><h2>audi a6 tfsi <br>s-line</h2></a>
								<span>48,000</span>
								<div class="light-line"></div>
								<p>Donec eu nullas sapien pretium volutpat vel quis turpis.</p>
								<div class="car-info">
									<ul>
										<li><i class="icon-gaspump"></i>Diesel</li>
										<li><i class="icon-car"></i>Sport</li>
										<li><i class="icon-road2"></i>12,000</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="featured-item col-md-4">
							<img src="http://dummyimage.com/310x210/cccccc/fff.jpg" alt="">
							<div class="down-content">
								<a href="{{ url('novyy-bmw-dlya-pacekov') }}"><h2>bmw m3 e92 <br>blue</h2></a>
								<span>61,000</span>
								<div class="light-line"></div>
								<p>Donec eu nullas sapien pretium volutpat vel quis turpis.</p>
								<div class="car-info">
									<ul>
										<li><i class="icon-gaspump"></i>Diesel</li>
										<li><i class="icon-car"></i>Sport</li>
										<li><i class="icon-road2"></i>12,000</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="featured-item col-md-4">
							<img src="http://dummyimage.com/310x210/cccccc/fff.jpg" alt="">
							<div class="down-content">
								<a href="{{ url('novyy-bmw-dlya-pacekov') }}"><h2>vencer sarthe <br>super auto</h2></a>
								<span>41,500</span>
								<div class="light-line"></div>
								<p>Donec eu nullas sapien pretium volutpat vel quis turpis.</p>
								<div class="car-info">
									<ul>
										<li><i class="icon-gaspump"></i>Diesel</li>
										<li><i class="icon-car"></i>Sport</li>
										<li><i class="icon-road2"></i>12,000</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="featured-item col-md-4">
							<img src="http://dummyimage.com/310x210/cccccc/fff.jpg" alt="">
							<div class="down-content">
								<a href="{{ url('novyy-bmw-dlya-pacekov') }}"><h2>aston martin <br>v12 vantage</h2></a>
								<span>78,000</span>
								<div class="light-line"></div>
								<p>Donec eu nullas sapien pretium volutpat vel quis turpis.</p>
								<div class="car-info">
									<ul>
										<li><i class="icon-gaspump"></i>Diesel</li>
										<li><i class="icon-car"></i>Sport</li>
										<li><i class="icon-road2"></i>12,000</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="featured-item col-md-4">
							<img src="http://dummyimage.com/310x210/cccccc/fff.jpg" alt="">
							<div class="down-content">
								<a href="{{ url('novyy-bmw-dlya-pacekov') }}"><h2>Mclaren mp4 <br>- 12c</h2></a>
								<span>82,000</span>
								<div class="light-line"></div>
								<p>Donec eu nullas sapien pretium volutpat vel quis turpis.</p>
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
				<div class="pagination">
					<div class="prev">
						<a href="#"><i class="fa fa-arrow-left"></i>Prev</a>
					</div>
					<div class="page-numbers">
						<ul>
							<li><a href="#">1</a></li>
							<li><a href="#">...</a></li>
							<li><a href="#">14</a></li>
							<li class="active"><a href="#">15</a></li>
							<li><a href="#">16</a></li>
							<li><a href="#">...</a></li>
							<li><a href="#">47</a></li>
						</ul>
					</div>
					<div class="next">
						<a href="#">Next<i class="fa fa-arrow-right"></i></a>
					</div>
				</div>
			</div>
			<div id="sidebar" class="col-md-3">
				<div class="sidebar-content">
					<div class="head-side-bar">
						<h4>Refine Your Search</h4>
					</div>
					<div class="search-form">
						<div class="select">
                            <select name="mark" id="make">
                                <option value="-1">Select Makes</option>
                                  <option>Price</option>
                                  <option>Miles</option>
                                  <option>Year</option>
                                  <option>Near</option>
                            </select>
                        </div>
                        <div class="select">
                            <select name="mark" id="model">
                                <option value="-1">Select Car Model</option>
                                  <option>Price</option>
                                  <option>Miles</option>
                                  <option>Year</option>
                                  <option>Near</option>
                            </select>
                        </div>
                        <div class="select">
                            <select name="mark" id="style">
                                <option value="-1">Select Style</option>
                                  <option>Price</option>
                                  <option>Miles</option>
                                  <option>Year</option>
                                  <option>Near</option>
                            </select>
                        </div>
                        <div class="slider-range">
                        	<p>
						    	<input type="text" class="range" id="amount" readonly>
						    </p>
							<div id="slider-range"></div>
                        </div>
                        <div class="select">
                            <select name="mark" id="types">
                                <option value="-1">Select Car Types</option>
                                  <option>Price</option>
                                  <option>Miles</option>
                                  <option>Year</option>
                                  <option>Near</option>
                            </select>
                        </div>
                        <div class="select">
                            <select name="mark" id="color">
                                <option value="-1">Select Color</option>
                                  <option>Price</option>
                                  <option>Miles</option>
                                  <option>Year</option>
                                  <option>Near</option>
                            </select>
                        </div>
                        <div class="advanced-button">
							<a href="listing-right.html">Search Now<i class="fa fa-search"></i></a>
						</div>
					</div>
				</div>
				<div class="video-post">
					<div class="video-holder">
						<img src="http://dummyimage.com/270x170/cccccc/fff.jpg" alt="">
						<div class="video-content">
							<a href="single-blog.html"><i class="fa fa-play"></i></a>
							<a href="single-blog.html"><h4>Video post example</h4></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection