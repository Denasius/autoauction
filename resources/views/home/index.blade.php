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
            <img src="{{asset($item->image)}}" data-fullwidthcentering="on" alt="slide">
            @if (!Auth::check())
              <div class="tp-caption first-line lft tp-resizeme start" data-x="center" data-hoffset="0" data-y="160" data-speed="1000" data-start="200" data-easing="Power4.easeOut" data-splitin="none" data-splitout="none" data-elementdelay="0" data-endelementdelay="0">Регистрация</div>
            @endif
            <div class="tp-caption second-line lfb tp-resizeme start" data-x="center" data-hoffset="0" data-y="210" data-speed="1000" data-start="800" data-easing="Power4.easeOut" data-splitin="none" data-splitout="none" data-elementdelay="0" data-endelementdelay="0">{{$item->title}}</div>
            <div class="tp-caption third-line lfb tp-resizeme start" data-x="center" data-hoffset="0" data-y="280" data-speed="1000" data-start="800" data-easing="Power4.easeOut" data-splitin="none" data-splitout="none" data-elementdelay="0" data-endelementdelay="0">{!! $item->descr !!}</div>
            <div class="tp-caption slider-thumb sfb tp-resizeme start container hidden-xs hidden-sm" data-x="center" data-hoffset="0" data-y="460" data-speed="1000" data-start="2200" data-easing="Power4.easeOut" data-splitin="none" data-splitout="none" data-elementdelay="0" data-endelementdelay="0">
              @foreach ($randomLots as $item)

              @if( $item->image )
              <div class="col-md-4">
                <a href="{{ $item->slug }}"><div class="thumb-item">
                    <div class="top-content">
                      <span>{{ number_format($item->price, 0) }}</span>
                      <div class="span-bg"></div>
                      <h2>{{ $item->title }}</h2>
                    </div>
                    <div class="down-content">
                      <p>{{ strip_tags($item->getFormatString($item->desr)) }}</p>
                      <img class="slide-image" src="{{ asset( $item->image) }}" alt="{{ $item->title }}">
                    </div>
                  </div></a>
              </div>
              @endif
                
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
      <p>{{ $text_under_slider }}</p>
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
            <h2>{{ $actions_text }}</h2>
            <span>{{ $under_actions_text }}</span>
            <div class="line-dec"></div>
          </div>
          <div class="services">

            @foreach ($actions as $action)
              <div class="col-md-6">
                <div class="service-item">
                  <i class="fas {{ $action->name }}"></i>
                  <div class="tittle">
                    <h2>{{ $action->descr }}</h2>
                  </div>
                  <p>{{ $action->value }}</p>
                </div>
              </div>
            @endforeach

          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="right-img">
            <img 
            class="lazyloading" 
            src="{{ asset('img/th.jpg') }}"
            data-src="{{ asset('assets/images/min_ban.jpg') }}"
            alt="ЧТО ПРЕДЛАГАЕТ VIN.BY"
          >
          <div class="img-bg"></div>
        </div>
      </div>
    </div>
  </div>
</section>
@if( $info->isNotEmpty() )
<section class="additional-information" id="seo-info">
  <div class="container">
    <div class="row">
      @foreach ($info as $title => $description)
        <div class="col-md-12">
          <div class="info">
            <div class="info-title">
              <span class="info-title__head">{{ $title }}</span>
            </div>
            <div class="info-description">
              <p class="info-description__desc">{{ $description }}</p>
            </div>
          </div>
        </div>
      @endforeach
      
    </div>
  </div>
</section>
@endif

<section class="featured-listing">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="heading-section-2 text-center">
          <h2>Текущие аукцтоны</h2>
          <div class="dec"><i class="fa fa-car"></i></div>
          <div class="line-dec"></div>
        </div>
      </div>
    </div>
    <div class="row">
      <div id="featured-cars">
        @foreach($lots as $lot)
          <div class="featured-item col-md-15 col-sm-6">
            <img 
              class="lazyloading" 
              src="{{ asset('img/th.jpg') }}" 
              @if($lot->image == null)
              data-src="{{ asset('img/no-image.png') }}"
              @else 
              data-src="{{ asset($lot->image) }}"
              @endif
              alt="{{ $lot->title }}"
            >
            <div class="down-content">
              <a href="{{ $lot->slug }}"><h2>{{ $lot->title }}</h2></a>
              <span>{{ number_format($lot->price, 0) }} {{ $lot->currency }}</span>
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

@if ( count($timeOutLots) > 0 )
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
      <div class="row last-auctions">
          @foreach($timeOutLots as $lot)
            <div class="featured-item col-sm-6 col-md-4 col-lg-3">
              <img src="{{ asset($lot->image) }}" alt="{{ $lot->title }}">
              <div class="down-content">
                <a href="{{ $lot->slug }}"><h2>{{ $lot->title }}</h2></a>
                <span>{{ number_format($lot->price, 0) }} {{ $lot->currency }}</span>
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
  </section>
@endif
@endsection