<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Username</th>
            <th>Email</th>
            <th>Role</th>
            <th>Join At</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $key => $user)
        <tr>
            <td>{{ $users->firstItem() + $key }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                @foreach ($user->getRoleNames() as $role)
                <span class="badge bg-success">{{ $role }}</span>
                @endforeach
            </td>
            <td>{{ $user->created_at }}</td>
            <td>
                <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-info">
                    <i class="fas fa-edit"></i>
                </a>
                <button onclick="deleteFunction({{ $user->id }})" class="btn btn-danger">
                    <i class="fas fa-trash"></i>
                </button>

                <form id="formDelete[{{ $user->id }}]" method="POST"
                    action="{{ route('admin.user.destroy',$user->id) }}">
                    @method('DELETE')
                    @csrf
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>