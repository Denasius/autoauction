@extends('layout')

@section('seo')
  <title>{{ $meta_title }}</title>
  <meta name="description" content="{{ $meta_description }}">
@endsection

@section('content')

<div id="page-heading">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<h1>{{ $title }}</h1>
				<div class="line"></div>
				<span>{{ $description }}</span>
				<div class="page-active">
					<ul>
						<li><a href="/">Главная</a></li>
						<li><i class="fa fa-dot-circle-o"></i></li>
						<li><a href="javascript:void(0)">Аукционы</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<section class="listing-grid">
	<div class="container">
		<div class="row">
			<div id="listing-cars" class="col-md-9">
				<div class="pre-featured clearfix">
					<div class="info-text">
						<h4>{{ $lots->count() }} results founded</h4>
					</div>
					<div class="right-content">
						<form class="form-filter" action="{{ route('filter') }}" method="POST">
							@csrf							
							<div class="input-select">
	                            <select name="mark" id="mark" class="mark-top-filter">
	                                <option value="-1">Сортировать по</option>
	                                	<option value="title">Наименование</option>
	                                  	<option value="car_mileage">Пробег</option>
	                                  	<option value="price">Цена</option>
	                                  	<option value="date">Год</option>
	                            </select>
	                        </div>
						</form>

                        {{-- <div class="grid-list">
                        	<ul>
                        		<li><a href="#"><i class="fa fa-list"></i></a></li>
                        		<li><a href="#"><i class="fa fa-square"></i></a></li>
                        	</ul>
                        </div> --}}
					</div>
				</div>
				<div id="featured-cars">
					<div class="row">
						@foreach ($lots as $lot)
							<div class="featured-item col-md-4">
								<div class="lot-image">
									<img src="{{ $lot->image }}" alt="{{ $lot->title }}">
								</div>
								<div class="down-content">
									<a href="{{ $lot->slug }}"><h2>{{ $lot->title }}</h2></a>
									<span>{{ number_format($lot->price, 0) }} {{ $lot->currency }}</span>
									<div class="light-line"></div>
									<p>{{ strip_tags( $lot->getFormatString($lot->desr, 60) ) }}</p>
									<div class="car-info">
										<ul>
											<li><i class="icon-gaspump"></i>{{ $lot->fuel }}</li>
											<li><i class="icon-car"></i>{{ $lot->car_model }}</li>
											<li><i class="icon-road2"></i>{{ $lot->price }} {{ $lot->currency }}</li>
										</ul>
									</div>
								</div>
							</div>						
						@endforeach
					</div>
				</div>

				<div class="paginate">
					{{$lots->render()}}
				</div>
				{{-- <div class="pagination">
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
				</div> --}}
			</div>
			<div id="sidebar" class="col-md-3">
				<div class="sidebar-content">
					<div class="head-side-bar">
						<h4>Расширенный поиск</h4>
					</div>
					<div class="search-form">
						<div class="select">
                            <select name="mark" id="make">
                                <option value="-1">Марка</option>
                                @foreach ($all_brands as $brand)
                                  	<option value="{{ $brand->id }}">{{ $brand->title }}</option>
                                @endforeach
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
						    	<input type="text" name="price" class="range price" id="amount" readonly>
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
							<button class="btn-filter-search" href="listing-right.html">Поиск<i class="fa fa-search"></i></button>
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