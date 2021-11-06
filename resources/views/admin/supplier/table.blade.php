<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Created At</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($suppliers as $key => $supplier)
        <tr>
            <td>{{ $suppliers->firstItem() + $key }}</td>
            <td>{{ $supplier->name }}</td>
            <td>{{ $supplier->phone }}</td>
            <td>{!! $supplier->address !!}</td>
            <td>{{ $supplier->created_at }}</td>
            <td>
                <a href="{{ route('admin.supplier.edit', $supplier->id) }}" class="btn btn-info">
                    <i class="fas fa-edit"></i>
                </a>
                <button onclick="deleteFunction({{ $supplier->id }})" class="btn btn-danger">
                    <i class="fas fa-trash"></i>
                </button>

                <form id="formDelete[{{ $supplier->id }}]" method="POST"
                    action="{{ route('admin.supplier.destroy',$supplier->id) }}">
                    @method('DELETE')
                    @csrf
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>