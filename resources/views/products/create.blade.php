@extends('layouts.app')

@section('content')
<form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" >
                    <div class="card-header">
                        <h3>Product Add Form</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                        @csrf
                            <div class="form-group">
                                <label>Product Name</label>
                                <input type="text" name="name"  required class="form-control p_input">
                            </div>
                            <div class="form-group">
                                <label>Category</label>
                                <select name="cat_id" required class="form-control p_input">
                                    @foreach(App\Models\Category::all() as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Quantity</label>
                                <input type="number" name="quantity"  required class="form-control p_input">
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <input type="number" name="price"  required class="form-control p_input">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description"  class="form-control p_input"></textarea>
                            </div>
                            
                            <div class="form-group">
                                <label>Remarks</label>
                                <textarea name="remarks"  class="form-control p_input"></textarea>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success">Submit</button>
                                <a href="{{ route('products.index') }}" class="btn btn-default">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
