@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="row">
                <h1>Edit: {!! $work->name !!}</h1>
                 @include('_errors')
                 {!! Form::model($work, ['method' => 'PATCH', 'action' => ['WorksController@update', $work->id]]) !!}
				 @include('_workform', ['submitButtonText' => 'Edit Work'])
                 {!! Form::close() !!}
				{!! Form::model($work, ['method' => 'DELETE', 'action' => ['WorksController@destroy', $work->id]]) !!}
				<div class="form-group">
				   {!! Form::submit('Delete Work', ['class' => 'btn btn-danger form-control']) !!}
				</div>
                 {!! Form::close() !!}

			</div><!-- /input-group -->
		</div><!-- /.row -->
	</div>
</div>
@endsection
