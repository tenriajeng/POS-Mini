<div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
    <div class="col-md-6">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">@</span>
            </div>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                placeholder="Username" aria-label="Username" aria-describedby="basic-addon1"
                value="{{ $user->name ?? old('name') }}" autocomplete="name" autofocus>
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
</div>

<div class="form-group row">
    <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
    <div class="col-md-6">
        <div class="input-group mb-3">
            <input id="email" name="email" type="email" class="form-control @error('email') is-invalid @enderror"
                placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2"
                value="{{ $user->email ?? old('email') }}" autocomplete="email" autofocus>
            <div class="input-group-append">
                <span class="input-group-text" id="basic-addon2">@example.com</span>
            </div>

            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>


    </div>
</div>

<div class="form-group row">
    <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
    <div class="col-md-6">
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
            name="password" autocomplete="current-password">
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label class="col-md-4 col-form-label text-md-right">Role</label>
    <div class="col-md-6">
        <select name="role[]" class="select2" multiple="multiple" data-placeholder="Select Role" style="width: 100%;">
            @foreach (App\Models\Role::all() as $item)
            <option @php if (isset($user)) { foreach(App\Models\User::find($user->id)->getRoleNames() as $role) { if
                ($role == $item->name){ echo "selected"; }}} @endphp
                value="{{ $item->id }}">
                {{ $item->name }}
            </option>
            @endforeach
        </select>
        @error('role')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>