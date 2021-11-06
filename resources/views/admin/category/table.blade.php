<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Created At</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $key => $category)
        <tr>
            <td>{{ $categories->firstItem() + $key }}</td>
            <td>{{ $category->name }}</td>
            <td>{{ $category->created_at }}</td>
            <td>
                <a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-info">
                    <i class="fas fa-edit"></i>
                </a>
                <button onclick="deleteFunction({{ $category->id }})" class="btn btn-danger">
                    <i class="fas fa-trash"></i>
                </button>

                <form id="formDelete[{{ $category->id }}]" method="POST"
                    action="{{ route('admin.category.destroy',$category->id) }}">
                    @method('DELETE')
                    @csrf
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>