<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Новое письмо</title>
</head>
<body>
	<h3>Новое письмо</h3>
	<table>
		@isset ($mail['name'])
		    <tr>
		      <td>Имя: {{ $mail['name'] }}</td>
		    </tr>
		@endisset
	    
		@isset ($mail['lastname'])
		    <tr>
		      <td>Фамилия: {{ $mail['lastname'] }}</td>
		    </tr>
		@endisset

		@isset ($mail['city'])
		    <tr>
		      <td>Город: {{ $mail['city'] }}</td>
		    </tr>
		@endisset

		@isset ($mail['manufacturer'])
		    <tr>
		      <td>Предприятие: {{ $mail['manufacturer'] }}</td>
		    </tr>
		@endisset

		@isset ($mail['address'])
		    <tr>
		      <td>Адрес: {{ $mail['address'] }}</td>
		    </tr>
		@endisset

		@isset ($mail['district'])
		    <tr>
		      <td>Область: {{ $mail['district'] }}</td>
		    </tr>
		@endisset

	    @isset ($mail['phone'])
		    <tr>
		      <td>Телефон: {{ $mail['phone'] }}</td>
		    </tr>
		@endisset

		@isset ($mail['mail'])
		    <tr>
		      <td>E-mail: {{ $mail['mail'] }}</td>
		    </tr>
		@endisset

		@isset ($mail['email'])
		    <tr>
		      <td>E-mail: {{ $mail['email'] }}</td>
		    </tr>
		@endisset

		@isset ($mail['postcode'])
		    <tr>
		      <td>Почтовый индекс: {{ $mail['postcode'] }}</td>
		    </tr>
		@endisset

		

	     
	  </table>
</body>
</html>