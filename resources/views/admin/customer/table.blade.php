<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>City</th>
                <th>Province</th>
                <th>country</th>
                <th>Postal Code</th>
                <th>Join At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $key => $customer)
            <tr>
                <td>{{ $customers->firstItem() + $key }}</td>
                <td>{{ $customer->first_name }}</td>
                <td>{{ $customer->last_name }}</td>
                <td>{{ $customer->email }}</td>
                <td>{{ $customer->phone }}</td>
                <td>{{ $customer->address }}</td>
                <td>{{ $customer->city }}</td>
                <td>{{ $customer->province }}</td>
                <td>{{ $customer->country }}</td>
                <td>{{ $customer->postal_code }}</td>
                <td>{{ $customer->created_at }}</td>
                <td>
                    <a href="{{ route('admin.customer.edit', $customer->id) }}" class="btn btn-info m-1">
                        <i class="fas fa-edit"></i>
                    </a>
                    <button onclick="deleteFunction({{ $customer->id }})" class="btn btn-danger m-1">
                        <i class="fas fa-trash"></i>
                    </button>

                    <form id="formDelete[{{ $customer->id }}]" method="POST"
                        action="{{ route('admin.customer.destroy',$customer->id) }}">
                        @method('DELETE')
                        @csrf
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>