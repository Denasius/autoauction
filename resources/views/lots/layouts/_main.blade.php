<div id="container">
	<div class="main-attributes">			
		
		@foreach ($general_attrs as $element)
			@if ($element['items']->isNotEmpty())
				<div class="main-attributes_block">
					<span class="title">{{ $element['title'] }}</span>
					<ul class="general-attrs">
						@foreach ($element['items'] as $item)
							<li>{{ $item->title }}</li>
						@endforeach
					</ul>
				</div>
			@endif
		@endforeach

	</div>

	<div class="additional-attributes">
		@foreach ($additional_attrs as $element)
			@if ($element['items']->isNotEmpty())
			<div class="additional-attributes_block">
				<span class="title">{{ $element['title'] }}</span>
				<ul class="general-attrs">
					@foreach ($element['items'] as $item)
						<li>{{ $item->title }}</li>
					@endforeach
				</ul>
			</div>
			@endif
		@endforeach
	</div>
</div>