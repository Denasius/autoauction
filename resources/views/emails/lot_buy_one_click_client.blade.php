<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Поздравляем!</title>
</head>
<body>
	<p>Благодарим за покупку авто на нашем сайте! В ближайшее время с Вами свяжутся наши менеджеры для уточнения деталей.</p>

	<p>Напоминаем, что вы приобрели авто <a href="{{ asset($mail['link_to_lot']) }}">{{ $mail['lot_name'] }}</a></p>
</body>
</html>