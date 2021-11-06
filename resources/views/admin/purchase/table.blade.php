<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Supplier</th>
                <th>Product</th>
                <th>Stock</th>
                <th>Price</th>
                <th>Total Price</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($purchases as $key => $purchase)
            <tr>
                <td>{{ $purchases->firstItem() + $key }}</td>
                <td>{{ $purchase->supplier->name }}</td>
                <td>{{ $purchase->product->name }}</td>
                <td>{{ $purchase->stock }}</td>
                <td>{{ $purchase->price }}</td>
                <td>{{ $purchase->price * $purchase->stock }}</td>
                <td>{{ $purchase->created_at }}</td>
                <td>
                    <a href="{{ route('admin.purchase.edit', $purchase->id) }}" class="btn btn-info">
                        <i class="fas fa-edit"></i>
                    </a>
                    <button onclick="deleteFunction({{ $purchase->id }})" class="btn btn-danger">
                        <i class="fas fa-trash"></i>
                    </button>

                    <form id="formDelete[{{ $purchase->id }}]" method="POST"
                        action="{{ route('admin.purchase.destroy',$purchase->id) }}">
                        @method('DELETE')
                        @csrf
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>