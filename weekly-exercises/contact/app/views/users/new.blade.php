<html>
	<head>
		<meta charset="utf-8">
		<title>Registration</title>
	</head>
	
	<body>
		<h1>Create new contact</h1>
		
		{{ Form::open(array('url' => 'register_action')) }}
 
        <p>Name: </p>
 
        <p>{{ Form::text('name') }}</p>
 
        <p>Email: </p>
 
        <p>{{ Form::text('email') }}</p>
 
        <p>Phone: </p>
 
        <p>{{ Form::text('phone') }}</p>
 
 
        <p>{{ Form::submit('Submit') }}</p>
 
		{{ Form::close() }}
	</body>
</html>