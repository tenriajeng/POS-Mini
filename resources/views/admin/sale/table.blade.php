<div class="table-responsive">
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
            @foreach ($sales as $key => $sale)
            <tr>
                <td>{{ $sales->firstItem() + $key }}</td>
                <td>{{ $sale->customer->name }}</td>
                <td>{{ $sale->created_at }}</td>
                <td>
                    <a href="{{ route('admin.sale.edit', $sale->id) }}" class="btn btn-info">
                        <i class="fas fa-edit"></i>
                    </a>
                    <button onclick="deleteFunction({{ $sale->id }})" class="btn btn-danger">
                        <i class="fas fa-trash"></i>
                    </button>

                    <form id="formDelete[{{ $sale->id }}]" method="POST"
                        action="{{ route('admin.sale.destroy',$sale->id) }}">
                        @method('DELETE')
                        @csrf
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>