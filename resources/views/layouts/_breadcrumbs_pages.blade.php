<div id="page-heading" @if($page->image != null) class="lazyloading" style="background-image: url( {{ asset('img/th.jpg')  }} );" data-src="{{ asset('uploads/' . $page->image) }}" @endif>
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<h1>{{$page->title}}</h1>
					<div class="line"></div>
					<span>{!! $page->short_descr !!}</span>
					<div class="page-active">
						<ul>
							<li><a href="/">Главная</a></li>
							<li><i class="fas fa-circle"></i></li>
							<li><a href="javascript:void(0)">{{ $page->title }}</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>