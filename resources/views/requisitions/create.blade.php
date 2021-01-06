@extends('layouts.app')

@section('content')
<form action="{{route('requisitions.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" >
                    <div class="card-header">
                        <h3>Requisition Form</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                        @csrf
                            <div class="form-group">
                                <label>User</label>
                                <select name="user_id" required class="form-control p_input">
                                    @foreach(App\Models\User::all() as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Product</label>
                                <select name="product_id" required class="form-control p_input">
                                    @foreach(App\Models\Product::all() as $product)
                                    <option value="{{$product->id}}">{{$product->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Quantity</label>
                                <input type="number" name="quantity"  required class="form-control p_input">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description"  class="form-control p_input"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Mode</label>
                                <select name="mode" required class="form-control p_input">
                                    <option value="In">In</option>
                                    <option value="Out">Out</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label>Date</label>
                                <input type="date" name="created_at"  required class="form-control p_input">
                            </div>
                            <div class="form-group">
                                <label>Remarks</label>
                                <textarea name="remarks"  class="form-control p_input"></textarea>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success">Submit</button>
                                <a href="{{ route('requisitions.index') }}" class="btn btn-default">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
