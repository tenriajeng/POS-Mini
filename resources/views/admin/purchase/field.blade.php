@isset($purchase)

<input type="hidden" name="supplier_id" value="{{ $purchase->supplier_id }}">
<input type="hidden" name="product_id" value="{{ $purchase->product_id }}">

<div class="form-group row">
    <div class="col-lg-6">
        <label>Supplier</label>
        <label class="form-control">
            {{ $purchase->supplier->name }}
        </label>
    </div>
    <div class="col-lg-6">
        <label>Product</label>
        <label class="form-control">
            {{ $purchase->product->name }}
        </label>
    </div>
</div>

@else

<div class="form-group row">
    <div class="col-lg-6">
        <label>Supplier</label>
        <select id="supplier_id" name="supplier_id"
            class="select2-1 form-control @error('supplier_id') is-invalid @enderror" data-placeholder="Select Supplier"
            style="width: 100%;">
            @foreach (App\Models\Supplier::all() as $supplier)
            <option {{ isset($product) && ($supplier->id == $product->supplier->id) ? 'selected' : '' }}
                value="{{ $supplier->id }}"> {{
                $supplier->name }} </option>
            @endforeach
        </select>
        @error('supplier_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="col-lg-6">
        <label>Product</label>
        <select id="product_id" name="product_id"
            class="select2-1 form-control @error('product_id') is-invalid @enderror" data-placeholder="Select Product"
            style="width: 100%;">

        </select>
        @error('product_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

@endisset

<div class="form-group row">
    <div class="col-lg-4">
        <label>Stock</label>
        <input id="stock" type="number" onkeyup="priceChange()" name="stock"
            value="{{ $purchase->stock ?? old('stock') }}" class="form-control @error('stock') is-invalid @enderror"
            placeholder="Enter product stock">
        @error('stock')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="col-lg-4">
        <label>Price</label>
        <input id="price" type="number" onkeyup="priceChange()" name="price"
            value="{{ $purchase->price ?? old('price') }}" class="form-control @error('price') is-invalid @enderror"
            placeholder="Enter product price">
        @error('price')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="col-lg-4">
        <label>Total Price</label>
        <label id="total_price" type="text" class="form-control">
    </div>
</div>

@push('page_script')
<script>
    function priceChange() {
       counting();
    }

    $(document).ready(function() {
       counting();
    });

    function counting() {
        let price = document.getElementById("price").value;
        let stock = document.getElementById("stock").value;

        document.getElementById("total_price").innerHTML = price*stock;
    } 

    $('#supplier_id').on('change', function () {
        
        document.getElementById("product_id").innerHTML = '';
        
        $.get(
            `/admin/product/${this.value}`,
            function(res) {
                res.forEach(element => {
                    let data = `<option value="${element.id}" > ${element.name} </option>`

                    $("#product_id").append(data);
                });
            }
        );
    }); 
</script>
@endpush