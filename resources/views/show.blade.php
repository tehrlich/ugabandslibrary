@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="row">
				<h1> {{$work->identifier}} – {{$work->name}} </h1>
				<dl class="dl-horizontal">
				  <dt>Composer</dt>
				  <dd> {{$work->composer}} </dd>
				  <dt>Editor:</dt>
				  <dd> {{$work->editor}} </dd>
				  <dt>Publisher: </dt>
				  <dd> {{$work->publisher}} </dd>
				  <dt> Grade: </dt>
				  <dd> {{$work->grade}} </dd>
				  <dt>Oversized Score Location </dt>
				  <dd> {{$work->oversizedScoreID}} </dd>
				  <dt>Last Ensemble Perf.: </dt>
				  <dd> {{$work->lastPerformedEnsemble}} </dd>
				  <dt>Last Performed Date: </dt>
				  <dd> {{$work->lastPerformedDate}} </dd>
				  <dt> Additional Notes: </dt>
				  <dd> {{$work->notes}} </dd>
				</dl>
			</div><!-- /input-group -->
		</div><!-- /.row -->
	</div>
</div>
@endsection
