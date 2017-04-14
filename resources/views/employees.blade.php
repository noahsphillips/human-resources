@extends('layout')

@section('body')
	<div class="row">
		<div class="container">
			<div class="col-md-12 text-center">
				<h2>All Employees</h2>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="container">
			<div class="col-md-10 col-md-offset-1">
				<table class="table table-striped">
				  <thead class="thead-inverse">
				    <tr>
				      <th>ID</th>
				      <th>First Name</th>
				      <th>Last Name</th>
				      <th>Age</th>
				      <th>Gender</th>
				      <th>Office</th>
				      <th>Supervisor</th>
				    </tr>
				  </thead>
				  <tbody>
				  	@foreach ($allEmployees as $employee)
				  		<tr>
					  		<th scope="row">{{$employee->id}}</th>
					  		<td><a href="employee/{{$employee->id}}">{{$employee->first_name}}</a></td>
					  		<td>{{$employee->last_name}}</td>
					  		<td>{{$employee->age}}</td>
					  		<td>{{$employee->gender}}</td>
					  		<td>{{$employee->office}}</td>
					  		<td>{{$employee->supervisor}}</td>
				  		</tr>
				  	@endforeach
				  </tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="container">
			<div class="col-md-10 col-md-offset-1 text-right">
				<a href="employee/create" class="btn btn-primary">Add Employee</a>
			</div>
		</div>
	</div>
@endsection