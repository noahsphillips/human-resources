@extends('layout')

@section('body')
	<div class="row">
		<div class="container">
			<div class="col-md-10 col-md-offset-1 text-center">
				<h2>Editing: {{$employee->first_name}} {{$employee->last_name}}</h2>
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
				<form action="/employee/{{$employee->id}}" method="post">
					{{csrf_field()}}
					{{method_field('PUT')}}
					<div class="form-group">
						<label for="first_name">First Name</label>
						<input type="text" name="first_name" class="form-control" id="first_name" placeholder="First Name" value="{{$employee->first_name}}">
					</div>
					<div class="form-group">
						<label for="last_name">Last Name</label>
						<input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" value="{{$employee->last_name}}">
					</div>
					<div class="form-group">
						<label for="age">Age</label>
						<input type="number" class="form-control" id="age" name="age" placeholder="Age" value="{{$employee->age}}">
					</div>
					<div class="form-group">
						<label for="gender">Gender</label><br>
						<label class="radio-inline">
						  <input type="radio" name="gender" id="inlineRadio1" value="Male"<?php echo ($employee->gender== 'Male' ? ' checked="checked"':''); ?>> Male
						</label>
						<label class="radio-inline">
						  <input type="radio" name="gender" id="inlineRadio2" value="Female"<?php echo ($employee->gender== 'Female' ? ' checked="checked"':''); ?>> Female
						</label>
					</div>
					<div class="form-group">
						<label for="age">Office</label>
						<input type="text" class="form-control" id="office" name="office" placeholder="Office" value="{{$employee->office}}">
					</div>
					<div class="form-group">
						<label for="supervisor">Supervisor</label>
						<select class="form-control" name="supervisor">
							<option value="-">-</option>
						  	@foreach ($allEmployees as $anEmployee)
								@if ( $anEmployee->id === $employee->id)
								    <!-- Do Nothing -->
								@else
								    <option value="{{$anEmployee->first_name}} {{$anEmployee->last_name}}"<?php echo (($anEmployee->first_name . ' ' . $anEmployee->last_name) == $employee->supervisor ? ' selected="selected"':''); ?>>{{$anEmployee->first_name}} {{$anEmployee->last_name}}</option>
								@endif
						  	@endforeach
						</select>

					</div>
					<button type="submit" class="btn btn-primary">Submit Changes</button>
					<button type="button" id="delete-confirm" class="btn btn-danger pull-right">Delete Employee</button>
				</form>
			</div>
		</div>
	</div>
	<div class="lightbox-overlay hidden"></div>
	<div class="lightbox-confirm hidden">
		<div class="wrapper text-center">
			<h3>Are you sure you want to delete {{$employee->first_name}}?</h3>
			<form action="/employee/{{$employee->id}}" method="post">
				{{csrf_field()}}
				{{method_field('DELETE')}}
				<button type="submit" class="btn btn-danger">Yes, delete {{$employee->first_name}}</button>
				<button type="button" class="btn btn-success do-not-delete">No, go back</button>
			</form>
		</div>
	</div>
	<style>
		.lightbox-confirm {
			position: absolute;
		    top: 50%;
		    left: 50%;
		    max-width: 320px;
		    margin: -60px 0 0 -160px;
		    width: 100%;
		    height: 100%;
		    max-height: 140px;
		    background: #ffcece;
		    border-radius: 10px;
		}
		.lightbox-overlay {
			width: 100vw;
			height: 100vh;
			position: absolute;
			top: 0;
			left: 0;
			background: rgba(0, 0, 0, 0.58);
		}
	</style>
@endsection