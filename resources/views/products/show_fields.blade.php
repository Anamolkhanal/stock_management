<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $product->id }}</p>
</div>

<!-- product_id Field -->
<div class="form-group">
    {!! Form::label('product_id', 'Product_id:') !!}
    <p>{{ $product->product_id }}</p>
</div>
<!-- user_id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User_id:') !!}
    <p>{{ $product->user_id }}</p>
</div>
<!-- mode Field -->
<div class="form-group">
    {!! Form::label('mode', 'Mode:') !!}
    <p>{{ $product->mode }}</p>
</div>
<!-- description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $product->description }}</p>
</div>
<!-- remarks Field -->
<div class="form-group">
    {!! Form::label('remarks', 'Remarks:') !!}
    <p>{{ $product->remarks }}</p>
</div>

<!-- quantity Field -->
<div class="form-group">
    {!! Form::label('quantity', 'Quantity:') !!}
    <p>{{ $product->quantity }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $product->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $product->updated_at }}</p>
</div>

