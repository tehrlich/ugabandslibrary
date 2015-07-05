<div class="form-group">
    {!! Form::label('identifier', 'ID:') !!}
    {!! Form::text('identifier', null, ['class' => 'form-control', 'placeholder' => '(Required) C-????']) !!}
</div>

<div class="form-group">
   {!! Form::label('name', 'Title:') !!}
   {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => '(Required)']) !!}
</div>

<div class="form-group">
   {!! Form::label('composer', 'Composer:') !!}
   {!! Form::text('composer', null, ['class' => 'form-control', 'placeholder' => '(Required) Last Name, First Name']) !!}
</div>

<div class="form-group">
   {!! Form::label('arranger', 'Arranger:') !!}
   {!! Form::text('arranger', null, ['class' => 'form-control', 'placeholder' => 'Last Name, First Name']) !!}
</div>

<div class="form-group">
   {!! Form::label('editor', 'Editor:') !!}
   {!! Form::text('editor', null, ['class' => 'form-control', 'placeholder' => 'Last Name, First Name']) !!}
</div>

<div class="form-group">
   {!! Form::label('publisher', 'Publisher:') !!}
   {!! Form::text('publisher', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
   {!! Form::label('grade', 'Grade:') !!}
   {!! Form::select('grade', array('0', '1', '2', '3', '4', '5', '6'), null, ['class' => 'form-control']) !!}

</div>

<div class="form-group">
   {!! Form::label('oversizedScoreID', 'Oversized Score ID:') !!}
   {!! Form::text('oversizedScoreID', null, ['class' => 'form-control', 'placeholder' => 'If the score is kept seperately, indicate its ID on the oversized shelf.']) !!}
</div>

<div class="form-group">
   {!! Form::label('lastPerformedEnsemble', 'Last Performed Ensemble:') !!}
   {!! Form::text('lastPerformedEnsemble', null, ['class' => 'form-control', 'placeholder' => 'Wind Ensemble, Wind Symphony, Symphonic Band . . . ']) !!}
</div>

<div class="form-group">
   {!! Form::label('lastPerformedDate', 'Last Performed Date:') !!}
   {!! Form::text('lastPerformedDate', null, ['class' => 'form-control', 'placeholder' => 'YYYY-MM-DD']) !!}
</div>

<div class="form-group">
   {!! Form::label('checkedOut', 'Checked Out:') !!}
   {!! Form::text('checkedOut', null, ['class' => 'form-control', 'placeholder' => 'To Whom and When']) !!}
</div>

<div class="form-group">
   {!! Form::label('notes', 'Notes:') !!}
   {!! Form::textarea('notes', null, ['class' => 'form-control', 'placeholder' => 'Clarinet 2 is missing. . .']) !!}
</div>

<div class="form-group">
   {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>
