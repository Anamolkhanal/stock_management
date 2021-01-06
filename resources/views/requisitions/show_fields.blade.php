{{-- <!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $requisition->id }}</p>
</div> --}}

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

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $requisition->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $requisition->updated_at }}</p>
</div>

