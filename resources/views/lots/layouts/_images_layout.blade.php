<div id="container">
	<div class="preview-thumbnails">
		@foreach ($thumbnails as $thumbnail)
			<div class="lot-thumbnail col-xs-6 col-sm-4 col-md-2">
				<a data-fancybox="gallery" href="{{ asset($thumbnail->image_src) }}">
					<img class="lazyloading" src="data:image/gif;base64,R0lGODlhmQBWAIAAAP///wAAACH5BAEAAAEALAAAAACZAFYAAAKIjI+py+0Po5y02ouz3rz7D4biSJbmiabqyrbuC8fyTNf2jef6zvf+DwwKh8Si8YhMKpfMpvMJjUqn1Kr1is1qt9yu9wsOi8fksvmMTqvX7Lb7DY/L5/S6/Y7P6/f8vv8PGCg4SFhoeIiYqLjI2Oj4CBkpOUlZaXmJmam5ydnp+QkaKjpKWppXAAA7" data-src="{{ asset($thumbnail->image_src) }}" alt="{{ $thumbnail->image_alt }}" title="{{ $thumbnail->image_title }}">
				</a>
			</div>
		@endforeach
	</div>
</div>