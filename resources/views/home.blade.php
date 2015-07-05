@extends('app')

@section('content')
<div class="container">
	<div class="row">
		@if (Session::has('message-success'))
		<div class="alert alert-success">{{ Session::get('message-success') }}</div>
		@endif
		@if (Session::has('message-danger'))
		<div class="alert alert-danger">{{ Session::get('message-danger') }}</div>
		@endif
		@if (!isset($query))
		<div class="col-md-10 col-md-offset-1">
			<div class="row">
				{!! Form::open(['method' => 'GET', 'action' => ['WorksController@index']]) !!}
			    <div class="input-group">
					{!! Form::text('query', null, ['class' => 'form-control', 'placeholder' => 'Search by ID, Title, Composer, Editor, or Arranger. . .']) !!}
			      <span class="input-group-btn">
			        <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
			      </span>
			    </div><!-- /input-group -->
				{!! Form::close() !!}
			</div><!-- /.row -->
		</div>
		@else
		<h3>{!! $title !!}</h3>
		@endif
		@include('_table')
		</div>
</div>
@endsection

{{-- {{ URL::to('works/' . $value->id . '/edit') }} --}}

{{-- {!! Form::model($work, ['method' => 'PATCH', 'action' => ['WorksController@update', $work->id]]) !!} --}}
