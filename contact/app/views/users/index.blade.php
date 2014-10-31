<html>
	<head>
		<meta charset="utf-8">
	</head>
	
	<body>
		<h1>Contacts </h1>
		
		@foreach ($users as $user)
			<li> {{ link_to("/users/{$user->id}", $user->name) }} </li>
		@endforeach
		
		<br>
		<a href="/users/new">Create new contact</a> 
	</body>
</html>