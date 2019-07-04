@extends('layout')

@section('seo')
  <title>Главная страница</title>
  <meta name="description" content="Главная страница">
@endsection


@section('content')
<div class="slider">
  <div class="fullwidthbanner-container">
    <div class="fullwidthbanner">
      <ul>
        @foreach($sliders as $item)
          <li class="first-slide" data-transition="fade" data-slotamount="10" data-masterspeed="300">
            <img src="{{$item->image}}" data-fullwidthcentering="on" alt="slide">
            @if (!Auth::check())
              <div class="tp-caption first-line lft tp-resizeme start" data-x="center" data-hoffset="0" data-y="160" data-speed="1000" data-start="200" data-easing="Power4.easeOut" data-splitin="none" data-splitout="none" data-elementdelay="0" data-endelementdelay="0">Регистрация</div>
            @endif
            <div class="tp-caption second-line lfb tp-resizeme start" data-x="center" data-hoffset="0" data-y="210" data-speed="1000" data-start="800" data-easing="Power4.easeOut" data-splitin="none" data-splitout="none" data-elementdelay="0" data-endelementdelay="0">{{$item->title}}</div>
            <div class="tp-caption third-line lfb tp-resizeme start" data-x="center" data-hoffset="0" data-y="280" data-speed="1000" data-start="800" data-easing="Power4.easeOut" data-splitin="none" data-splitout="none" data-elementdelay="0" data-endelementdelay="0">{!! $item->descr !!}</div>
            <div class="tp-caption slider-thumb sfb tp-resizeme start container hidden-xs hidden-sm" data-x="center" data-hoffset="0" data-y="460" data-speed="1000" data-start="2200" data-easing="Power4.easeOut" data-splitin="none" data-splitout="none" data-elementdelay="0" data-endelementdelay="0">
              @foreach ($randomLots as $item)
                <div class="col-md-4">
                  <a href="{{ $item->slug }}"><div class="thumb-item">
                      <div class="top-content">
                        <span>$55,000</span>
                        <div class="span-bg"></div>
                        <h2>{{ $item->title }}</h2>
                      </div>
                      <div class="down-content">
                        <p>{{ strip_tags($item->getFormatString($item->desr)) }}</p>
                        <img class="slide-image" src="{{ $item->image }}" alt="{{ $item->title }}">
                      </div>
                    </div></a>
                </div>
              @endforeach
            </div>
          </li>
        @endforeach

      </ul>
    </div>
  </div>
</div>

<div id="cta-1">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <p>Owners of salvage-title <em>vehicles</em> will encounter some unique issues.</p>
        <div class="advanced-button">
          <a href="{{ url('aukciony') }}">Посмотреть все аукционы<i class="fa fa-car"></i></a>
        </div>
      </div>
    </div>
  </div>
</div>

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
              <div class="service-item second-row last-service">
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

<section class="featured-listing">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="heading-section-2 text-center">
          <h2>Featured Cars Listing</h2>
          <span>Vivamus gravida magna massa in cursus mi vehicula at. Nunc sem quam suscipit</span>
          <div class="dec"><i class="fa fa-car"></i></div>
          <div class="line-dec"></div>
        </div>
      </div>
    </div>
    <div class="row">
      <div id="featured-cars">
        @foreach($lots as $lot)
          <div class="featured-item col-md-15 col-sm-6">
            <img src="{{ $lot->image }}" alt="{{ $lot->title }}">
            <div class="down-content">
              <a href="{{ $lot->slug }}"><h2>{{ $lot->title }}</h2></a>
              <span>52,000</span>
              <div class="light-line"></div>
              <p>{{ strip_tags($lot->getFormatString($lot->desr, 60)) }}</p>
              <div class="car-info">
                <ul>
                  <li><i class="icon-gaspump"></i>{{ $lot->fuel }}</li>
                  <li><i class="icon-car"></i>{{ $lot->car_model }}</li>
                  <li><i class="icon-road2"></i>{{ $lot->car_mileage }}</li>
                </ul>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</section>

<section class="blog-news">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="heading-section-2 text-center">
          <h2>Прошедшие аукционы</h2>
          <span>Vivamus gravida magna massa in cursus mi vehicula at. Nunc sem quam suscipit</span>
          <div class="dec"><i class="fa fa-file"></i></div>
          <div class="line-dec"></div>
        </div>
      </div>
    </div>
    <div class="row">
              <div class="col-md-6">
                <div class="left-video">
                  <img src="/img/time_out_cars.jpg" alt="Завершенные лоты">
                  <div class="video-content">
                    <div class="inner-content">
                      {{-- <i class="fa fa-play"></i> --}}
                      <div class="tittle">
                        <a href="single-blog.html"><h2>Завершенные лоты</h2></a>
                        <ul>
                          <li>May 14, 2015</li>
                          <li>Posted by <a href="#">Admin</a></li>
                          <li>2 Comments</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                @foreach ($timeOutLots as $item)
                  <div class="blog-item">
                    <div class="up-content">
                      <ul>
                        <li>May 14, 2015</li>
                      </ul>
                      <div class="tittle">
                        <a href="{{ $item->slug }}"><h2>{{ $item->title }}</h2></a>
                      </div>
                    </div>
                    <p>{{ strip_tags($item->getFormatString($item->desr, 200)) }}</p>
                    <a href="{{ $item->slug }}">Подробнее</a>
                  </div>
                @endforeach
              </div>
            </div>
  </div>
</section>
@endsection