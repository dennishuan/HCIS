@extends('layouts/master')
@section('content')
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="container">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Search</h3>
					</div>
					<div class="panel-body">
						<form method="POST" action="/ducks" novalidate>

							<div class="form-group">
								<label for="careID">Care Card Number</label>
								<input type="text" id="careCardID" class="form-control" name="careCardID" placeholder="Care Card">
							</div>
							
							<div class="form-group">
								<label for="name">Patient Name</label>
								<input type="text" id="patientName" class="form-control" name="patientName" placeholder="Name">
							</div>
							
							<div class="form-group">
								<label for="name">Phone Number</label>
								<input type="text" id="phoneNumber" class="form-control" name="phoneNumber" placeholder="Phone Number">
							</div>


							<button type="submit" class="btn btn-success">Search</button>

						</form>
					</div>
				</div> <!-- end div/container-->
			</div>
		</div> <!-- End div/panel2 -->
@stop