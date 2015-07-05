<div class="modal fade" id="{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">{{$value->identifier}} – {{$value->name}}</h4>
      </div>
      <div class="modal-body">
		<dl class="dl-horizontal">
			<dt>Composer:</dt>
			<dd> {{$value->composer}} </dd>
			<dt>Editor:</dt>
			<dd> {{$value->editor}} </dd>
			<dt>Publisher:</dt>
			<dd> {{$value->publisher}} </dd>
			<dt> Grade:</dt>
			<dd> {{$value->grade}} </dd>
			<dt>Oversized Score ID:</dt>
			<dd> {{$value->oversizedScoreID}} </dd>
			<dt>Last Performed By:</dt>
			<dd> {{$value->lastPerformedEnsemble}} </dd>
			<dt>Last Performed Date:</dt>
			<dd> {{$value->lastPerformedDate}} </dd>
            <dt>Checked Out:</dt>
            <dd> {{$value->checkedOut}} </dd>
			<dt>Additional Notes:</dt>
			<dd> {{$value->notes}} </dd>
			<dt>Last Edited By:</dt>
			<dd> {{$value->lastEditedBy}} </dd>
			<dt>Created On:</dt>
			<dd> {{$value->created_at}} </dd>
			<dt>Edited On:</dt>
			<dd> {{$value->updated_at}} </dd>
		</dl>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
