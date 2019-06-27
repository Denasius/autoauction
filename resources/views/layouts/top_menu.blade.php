@foreach ($categories as $category)
	@if ($category->children()->count())
		<li><a href="#" class="has-submenu">{{$category->title}}</a>
			<ul class="sub-menu">
				@include('layouts.top_menu', ['categories'=>$category->children])
			</ul>
	@else
		<li><a href="">{{ $category->title }}</a>
	@endif
		</li>
@endforeach