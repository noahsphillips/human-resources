@extends('layout')

@section('body')
	<div class="row">
		<div class="container">
			<div class="col-md-12 text-center">
				<h2>New Employee</h2>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="container">
			<div class="col-md-10 col-md-offset-1 text-left">
				<a href="/employee" class="btn btn-default">< Back</a>
			</div>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="container">
			<div class="col-md-4 col-md-offset-4">
				@if (count($errors)>0)
					<div class="alert alert-danger">
						@foreach ($errors->all() as $error)
							{{$error}}
						@endforeach
					</div>
				@endif
				<form action="/employee" method="post">
					{{csrf_field()}}
					<div class="form-group">
						<label for="first_name">First Name</label>
						<input type="text" name="first_name" class="form-control" id="first_name" placeholder="First Name">
					</div>
					<div class="form-group">
						<label for="last_name">Last Name</label>
						<input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name">
					</div>
					<div class="form-group">
						<label for="age">Age</label>
						<input type="number" class="form-control" id="age" name="age" placeholder="Age">
					</div>
					<div class="form-group">
						<label for="gender">Gender</label><br>
						<label class="radio-inline">
						  <input type="radio" name="gender" id="inlineRadio1" value="Male"> Male
						</label>
						<label class="radio-inline">
						  <input type="radio" name="gender" id="inlineRadio2" value="Female"> Female
						</label>
					</div>
					<div class="form-group">
						<label for="age">Office</label>
						<input type="text" class="form-control" id="office" name="office" placeholder="Office">
					</div>
					<div class="form-group">
						<label for="supervisor">Supervisor</label>
						<select class="form-control" name="supervisor">
							<option value="-">-</option>
						  	@foreach ($allEmployees as $anEmployee)
								<option value="{{$anEmployee->first_name}} {{$anEmployee->last_name}}">{{$anEmployee->first_name}} {{$anEmployee->last_name}}</option>
						  	@endforeach
						</select>

					</div>
					<button type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
		</div>
	</div>
@endsection('body')