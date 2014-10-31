<html>
	<head>
		<meta charset="utf-8">
	</head>
	
	<body>
		<h1>Contact List: {{ $user->name }}</h1>
		<br>
		<h2> Name: {{ $user->name }} </h2>
		<h2> Email: {{ $user->email }} </h2>
		<h2> Phone: {{ $user->phone }} </h2>
		
		<a href="/users">Return</a>
	</body>
</html>