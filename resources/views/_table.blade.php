<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Composer</th>
            <th>Arranger</th>
            <th>View</th>
            @if(!isset($restore))
                <th>Edit</th>
            @else
                <th>Restore</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach($works as $key => $value)
            <tr>
                <td>{{ $value->identifier }}</td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->composer }}</td>
                <td>{{ $value->arranger }}</td>
                @include('_infoModal')
                <td><a href="#" data-toggle="modal" data-target="#{{$value->id}}">View</a></td>
                @if(!isset($restore))
                <td><a href="{{ URL::to('works/' . $value->id . '/edit') }}">Edit</a></td>
                @else
                <td>{!! Form::model($value, ['method' => 'POST', 'action' => ['WorksController@restore', $value->id]]) !!}
				   {!! Form::submit('Restore', ['class' => 'btn btn-link linklookalike']) !!}
                 {!! Form::close() !!}</td>
                @endif
            </tr>
        @endforeach
    </tbody>
</table>
    <nav>
      <ul class="pager">
        <li class="previous @if ($works->currentPage() === 1 ) disabled @endif"><a href="{{ $works->previousPageUrl() }}"><span aria-hidden="true">&larr;</span> Previous</a></li>
        <li class="next @if ($works->hasMorePages() === false ) disabled @endif"><a href="{{ $works->appends(Request::only('query'))->nextPageUrl() }}">Next <span aria-hidden="true">&rarr;</span></a></li>
      </ul>
    </nav>
