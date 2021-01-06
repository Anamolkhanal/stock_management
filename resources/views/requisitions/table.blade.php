<div class="table-responsive">
    <table class="table" id="words-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Product_id</th>
                <th>Quantity</th>
                <th>Description</th>
                <th>User_id</th>
                <th>Mode</th>
                <th>Remarks</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
        @foreach($requisitions as $requisition)
            <tr>
                <td>{{ $requisition->id }}</td>
                <td>{{ $requisition->product_id}}</td>
                <td>{{ $requisition->quantity}}</td>
                <td>{{ $requisition->description}}</td>
                <td>{{ $requisition->user_id}}</td>
                <td>{{ $requisition->mode}}</td>
                <td>{{ $requisition->remarks}}</td>
                <td>{{ $requisition->created_at}}</td>
                <td>{{ $requisition->updated_at}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
