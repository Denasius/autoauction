<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Покупка авто в один клик</title>
</head>
<body>
	<h1>Покупка авто в один клик</h1>

	<p>Клиент <strong>{{ $mail['user'] }}</strong> нажал кнопку "Купить авто в один клик"</p>
	<p>Лот <strong>№ {{ $mail['lot_id'] }}</strong></p>
	<p>Название лота - <strong>{{ $mail['lot_name'] }}</strong></p>
</body>
</html>