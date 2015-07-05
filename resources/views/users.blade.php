@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<h3>User List</h3>
		@include('_errors')
	</div>
	<table class="table table-striped table-hover">
	    <thead>
	        <tr>
	            <th>Name</th>
	            <th>Email</th>
				<th>Privilege</th>
				<th>Delete</th>
	        </tr>
	    </thead>
	    <tbody>
	        @foreach($users as $key => $value)
	            <tr>
	                <td>{{ $value->name }}</td>
	                <td>{{ $value->email }}</td>
					<td>{{ $value->priv }}</td>
					<td>{!! Form::model($value, ['method' => 'DELETE', 'action' => ['UsersController@destroy', $value->id]]) !!}
					   {!! Form::submit('Delete', ['class' => 'btn btn-link linklookalike']) !!}
	                 {!! Form::close() !!}</td>
	            </tr>
	        @endforeach
	    </tbody>
	</table>


	<div class="row">
		<hr>
		<h3>Add User</h3>
		{!! Form::open(['url' => 'users']) !!}
		<div class="form-group">
		    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name (First Name Last Name)']) !!}
		</div>

		<div class="form-group">
		   {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
		</div>

		<div class="form-group">
		   {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) !!}
		</div>

		<i><b>Viewers</b> can only view entries. <b>Editors</b> can view, edit, delete, and create new works. <b>Admins</b> have full edit access, and can add and remove other users.</i>
		<div class="form-group">
		   {!! Form::select('priv', array('Viewer' => 'Viewer', 'Editor' => 'Editor', 'Admin' => 'Admin'), null, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
		   {!! Form::submit('Add User', ['class' => 'btn btn-primary form-control']) !!}
		</div>

		{!! Form::close() !!}
	</div>


</div>
@endsection
