<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>Mercado Pago Laravel</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"/>
	<meta name="csrf-token" content="{{ csrf_token() }}"/>
</head>
<body>
	<form action="{{ route('checkout') }}" method="post">
		{{ csrf_field() }}
		<input type="number" name="precio" id="precio"/>
		<input type="submit" value="COMPRAR"/>
	</form>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
crossorigin="anonymous"></script>
</html>