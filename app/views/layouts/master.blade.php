<html>
	<head>
		<title> Health Care Information Systems </title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		{{ HTML::style('css/main.css') }}
		{{ HTML::style('css/bootstrap.min.css') }}
		{{ HTML::style('css/bootstrap-theme.css') }}
		{{ HTML::style('css/simple-sidebar.css') }}
		<meta charset="utf-8">
	</head>
	<body>
		<header role="banner">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<nav class="navbar navbar-default" role="navigation">
					<div class="container">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="#">Brand</a>
						</div>

						<div class="collapse navbar-collapse" id="navigationbar">
							<ul class="nav navbar-nav">
								<li class="active"><a href="#">Search</a></li>
								<li><a href="#">New Patient</a></li>
							</ul>
							<ul class="nav navbar-nav pull-right">
								<li class="nav">
									<form class="form-inline justifytop" role="form">
										<div class="form-group">
											<div class="input-group">
												<input class="form-control" type="username" placeholder="Username">
											</div>
										</div>
										<div class="form-group">
											<label class="sr-only" for="password">Password</label>
											<input type="password" class="form-control" id="password" placeholder="Password">
										</div>
										<div class="checkbox">
											<label>
												<input type="checkbox"> Remember me
											</label>
										</div>
									<button type="submit" class="btn btn-default">Sign in</button>
									</form>
								</li>
							</ul>
						</div>
					</div> <!-- End div/countainer-->
				</nav>
			</div>
		</header>
		
		
		<!-- Sidebar -->
		<div class="container">
			<div id="sidebar-wrapper">
				<ul class="sidebar-nav">
					<li class="sidebar-brand">
						<a href="#">
						Admin
						</a>
					</li>
					<li>
						<a href="#">Function1</a>
					</li>
					<li>
						<a href="#">Function2</a>
					</li>
					<li>
						<a href="#">Function3</a>
					</li>
					<li>
						<a href="#">Function4</a>
					</li>
					<li>
						<a href="#">Function4</a>
					</li>
					<li>
						<a href="#">Function5</a>
					</li>
					<li>
						<a href="#">Function6</a>
					</li>
				</ul>
			</div>
		</div>
		<!-- End div/sidebar-wrapper -->	

		<!-- Main content -->
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="container">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Search Patient</h3>
					</div>
					<div class="panel-body">
						Panel content2
						@yield('content')
					</div>
				</div> <!-- end div/container-->
			</div>
		</div> <!-- End div/panel2 -->

		{{ HTML::script('js/jquery.min.js') }}
		{{ HTML::script('js/bootstrap.min.js') }}
	</body>
</html>