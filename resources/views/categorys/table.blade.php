<div class="table-responsive">
    <table class="table" id="category-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Created At</th>
                <th>Updated At</th>
               
            </tr>
        </thead>
        <tbody>
        @foreach($categorys as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->created_at}}</td>
                <td>{{ $category->updated_at}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
