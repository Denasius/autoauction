@foreach ($models as $model)
	<option value="{{ $model->title }}">{{ $model->title }}</option>
@endforeach