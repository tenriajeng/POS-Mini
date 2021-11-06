<div class="form-group row">
    <div class="col-lg-4">
        <label>Customer</label>
        <select id="customer_id" name="customer_id"
            class="select2-1 form-control @error('customer_id') is-invalid @enderror" data-placeholder="Select customer"
            style="width: 100%;">
            @foreach (App\Models\Customer::all() as $customer)
            <option {{ isset($sale) && ($customer->id == $sale->customer->id) ? 'selected' : '' }}
                value="{{ $customer->id }}">
                {{ $customer->first_name.' '.$customer->last_name }}
            </option>
            @endforeach
        </select>
        @error('customer_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="col-lg-4">
        <label>Product</label>
        <select id="product_id" name="product_id"
            class="select2-1 form-control @error('product_id') is-invalid @enderror" data-placeholder="Select Product"
            style="width: 100%;">
            @foreach (App\Models\Product::all() as $product)
            <option {{ isset($sale) && ($product->id == $sale->product->id) ? 'selected' : '' }}
                value="{{ $product->id }}" data-price="{{ $product->price }}">{{ $product->name }}</option>
            @endforeach
        </select>
        @error('product_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="col-lg-4">
        <label>Status </label>
        <select name="status" class="select2-1 form-control @error('status') is-invalid @enderror"
            data-placeholder="Select Category" style="width: 100%;">
            <option {{ isset($sale) && $sale->status == 0 ? 'selected' : '' }} value="0">Non Active</option>
            <option {{ isset($sale) && $sale->status == 1 ? 'selected' : '' }} value="1">Active</option>
        </select>
        @error('status')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
        <label>Stock </label>
        <input id="stock" type="number" name="stock" onkeyup="priceChange()" value="{{ $sale->stock ?? old('stock') }}"
            class="form-control @error('stock') is-invalid @enderror" placeholder="Enter stock">

        @error('stock')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
        <label>Price </label>
        <input id="price" type="number" name="price" onkeyup="priceChange()" value="{{ $sale->price ?? old('price') }}"
            class="form-control @error('price') is-invalid @enderror" placeholder="Enter price">
        @error('price')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

@push('page_script')
<script>
    let price=0;
    let stock=0;
    function priceChange() {
        counting();
    }

    $(document).ready(function() { 
        counting();
    });

    function counting() { 
        stock=0;
        stock = document.getElementById("stock").value;
        console.log(price);
        document.getElementById("price").value = price * stock;
    } 


    $('#product_id').on('change', function () {
        stock = document.getElementById("stock").value;
        price = $(this).find(':selected').attr('data-price');
        document.getElementById("price").value = price*stock;
    }); 
</script>
@endpush