<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Status</th>
                <th>Supplier</th>
                <th>Category</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $key => $product)
            <tr>
                <td>{{ $products->firstItem() + $key }}</td>
                <td>
                    <img src="{{ $product->image }}" width="60" alt="">
                </td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->stock }}</td>
                <td>
                    {!! $product->status == 1 ? '<span class="badge bg-success">Active</span>' :'<span
                        class="badge bg-danger">Non Active</span>' !!}
                </td>
                <td>
                    {{ $product->supplier->name }}
                </td>
                <td>
                    @foreach (App\Models\ProductCategory::where('product_id',$product->id)->get() as $product_category)
                    <span class="badge bg-success">{{ $product_category->category->name }}</span>
                    @endforeach
                </td>
                <td>{{ $product->created_at }}</td>
                <td>
                    <a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-info">
                        <i class="fas fa-edit"></i>
                    </a>
                    <button onclick="deleteFunction({{ $product->id }})" class="btn btn-danger">
                        <i class="fas fa-trash"></i>
                    </button>

                    <form id="formDelete[{{ $product->id }}]" method="POST"
                        action="{{ route('admin.product.destroy',$product->id) }}">
                        @method('DELETE')
                        @csrf
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>