<div class="table-responsive">
    <table class="table" id="products-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Category_id</th>
                <th>Description</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
                <th>Remarks</th>
                <th>Created At</th>
                <th>Updated At</th>
               
            </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->cat_id }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->quantity }}</td>
                <td>{{ $product->price}}</td>
                <td>{{ $product->total }}</td>
                <td>{{ $product->remarks}}</td>
                <td>{{ $product->created_at}}</td>
                <td>{{ $product->updated_at}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
