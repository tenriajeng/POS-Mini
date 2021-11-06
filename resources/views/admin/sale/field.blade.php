<div class="form-group row">
    <div class="col-lg-6">
        <label>Customer</label>
        <input type="text" name="customer" value="{{  $product->customer ?? old('customer') }}"
            class="form-control @error('customer') is-invalid @enderror" placeholder="Enter customer">
        @error('customer')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

@include('admin.sale.product')