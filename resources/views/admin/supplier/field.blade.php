<div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
    <div class="col-md-6">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">@</span>
            </div>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                placeholder="supplier name" aria-label="supplier name" aria-describedby="basic-addon1"
                value="{{ $supplier->name ?? old('name') }}" autocomplete="name" autofocus>
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
</div>

<div class="form-group row">
    <label for="phone" class="col-md-4 col-form-label text-md-right">Phone</label>
    <div class="col-md-6">
        <input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone"
            value="{{ $supplier->phone ?? old('phone') }}" required autocomplete="phone" autofocus>

        @error('phone')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label class="col-md-4 col-form-label text-md-right">address</label>
    <div class="col-md-6">
        <textarea name="address">{{  $supplier->address ?? old('address') }}</textarea>
        @error('address')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

@push('page_script')
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('address');
</script>
@endpush