<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Composer</th>
            <th>Arranger</th>
            <th>View</th>
            <th>Edit</th>
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
                <td><a href="{{ URL::to('works/' . $value->id . '/edit') }}">Edit</a></td>
            </tr>
        @endforeach
    </tbody>
</table>
@if (!isset($query))
    <nav>
      <ul class="pager">
        <li class="previous @if ($works->currentPage() === 1 ) disabled @endif"><a href="{{ $works->previousPageUrl() }}"><span aria-hidden="true">&larr;</span> Previous</a></li>
        <li class="next"><a href="{{ $works->nextPageUrl() }}">Next <span aria-hidden="true">&rarr;</span></a></li>
      </ul>
    </nav>
@endif
