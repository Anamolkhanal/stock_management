
<!-- product_id Field -->
<div class="form-group">
    {!! Form::label('product_id', 'Product_id:') !!}
    <p>{{ $requisition->product_id }}</p>
</div>
<!-- user_id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User_id:') !!}
    <p>{{ $requisition->user_id }}</p>
</div>

<!-- quantity Field -->
<div class="form-group">
    {!! Form::label('quantity', 'Quantity:') !!}
    <p>{{ $requisition->quantity }}</p>
</div>
<!-- mode Field -->
<div class="form-group">
    {!! Form::label('mode', 'Mode:') !!}
    <p>{{ $requisition->mode }}</p>
</div>
<!-- description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $requisition->description }}</p>
</div>
<!-- remarks Field -->
<div class="form-group">
    {!! Form::label('remarks', 'Remarks:') !!}
    <p>{{ $requisition->remarks }}</p>
</div>
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('requisitions.index') }}" class="btn btn-default">Cancel</a>
</div>
