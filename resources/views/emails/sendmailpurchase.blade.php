<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Новое письмо</title>
</head>
<body>
	<h3>Новое письмо</h3>
	@if( isset($mail['type']) && $mail['type'] === 'purchase_car' )
		<p>{{ $mail['name'] }} хочет продать свою такчку</p>
	@elseif( isset($mail['type']) && $mail['type'] === 'cost_estimate' )
		<p>{{ $mail['name'] }} хочет оценить свою такчку для аукциона</p>
	@elseif( isset($mail['type']) && $mail['type'] === 'europe_shipping' )
		<p>{{ $mail['name'] }} хочет привезти такчку из Европы</p>
	@endif
</body>
</html>