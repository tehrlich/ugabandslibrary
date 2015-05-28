@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="row">
                <h1>Add Work</h1>
                @include('_errors')
                 {!! Form::open(['url' => 'works']) !!}
                 @include('_workform', ['submitButtonText' => 'Add Work'])
                 {!! Form::close() !!}

			</div><!-- /input-group -->
		</div><!-- /.row -->
	</div>
</div>
@endsection
