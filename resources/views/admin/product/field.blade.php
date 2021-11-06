<div class="form-group row">
    <div class="col-lg-6">
        <label>Product Name</label>
        <input type="text" name="name" value="{{  $product->name ?? old('name') }}"
            class="form-control @error('name') is-invalid @enderror" placeholder="Enter product name">
        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="col-lg-6">
        <label>Suplplier</label>
        <select name="supplier_id" class="select2-1 form-control @error('status') is-invalid @enderror"
            data-placeholder="Select Category" style="width: 100%;">
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

</div>

<div class="form-group row">

    <div class="col-lg-6 col-md-12 col-sm-12 col-12">
        <label>Category </label>
        <select name="category[]" class="select2 form-control @error('status') is-invalid @enderror" multiple="multiple"
            data-placeholder="Select Category" style="width: 100%;">
            @foreach (App\Models\Category::all() as $item)
            <option value="{{ $item->id }}" @if (isset($product))
                @foreach(App\Models\ProductCategory::where('product_id', $product->
                id)->get() as $product_category)
                @if($item->id == $product_category->category->id)
                {{ 'selected' }}
                @endif
                @endforeach
                @endif
                >
                {{ $item->name }}
            </option>
            @endforeach
        </select>

        @error('category[]')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="col-lg-2 col-md-4 col-sm-12 col-12">
        <label>Price </label>
        <input type="number" name="price" value="{{ $product->price ?? old('price') }}"
            class="form-control @error('price') is-invalid @enderror" placeholder="Enter product price">
        @error('price')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="col-lg-2 col-md-4 col-sm-12 col-12">
        <label>Stock </label>
        <input type="number" name="stock" value="{{ $product->stock ?? old('stock') }}"
            class="form-control @error('stock') is-invalid @enderror" placeholder="Enter product stock">

        @error('stock')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="col-lg-2 col-md-4 col-sm-12 col-12">
        <label>Status </label>
        <select name="status" class="select2-1 form-control @error('status') is-invalid @enderror"
            data-placeholder="Select Category" style="width: 100%;">
            <option {{ isset($product) && $product->status == 0 ? 'selected' : '' }} value="0">Non Active</option>
            <option {{ isset($product) && $product->status == 1 ? 'selected' : '' }} value="1">Active</option>
        </select>
        @error('status')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <div class="col-12">
        <input type="file" id="file" name="image">
    </div>
</div>

<div class="form-group row">
    <div class="col-12">
        <label>Description</label>
        <textarea name="description">{{  $product->description ?? old('description') }}</textarea>
        @error('description')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>


@push('page_style')
<link href="{{asset('filepond/css/filepond-plugin-image-preview.css')}}" rel="stylesheet">
<link href="{{asset('filepond/css/filepond.css')}}" rel="stylesheet" />
@endpush

@push('page_script')
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('description');
</script>

<script src="{{ asset('filepond/filepond-plugin-file-validate-type.js')}}"></script>
<script src="{{ asset('filepond/filepond-plugin-image-preview.js')}}"></script>
<script src="{{ asset('filepond/filepond-plugin-image-crop.js')}}"></script>
<script src="{{ asset('filepond/filepond-plugin-file-validate-size.js')}}"></script>
<script src="{{ asset('filepond/filepond-plugin-image-transform.js')}}"></script>
<script src="{{ asset('filepond/filepond.js') }}"></script>

<script>
    const inputElement = document.querySelector('input[id="file"]');
    FilePond.registerPlugin(FilePondPluginFileValidateType);
    FilePond.registerPlugin(FilePondPluginImagePreview);
    FilePond.registerPlugin(FilePondPluginImageCrop);
    FilePond.registerPlugin(FilePondPluginFileValidateSize);
    FilePond.registerPlugin(FilePondPluginImageTransform);
    const pond = FilePond.create(
        inputElement,
        {
            allowFileSizeValidation:true,
            maxFileSize:2048000000, 
            allowImagePreview:true,
            labelFileSizeNotAvailable:'',
            labelIdle:'Seret File Anda atau <span class="filepond--label-action"> Telusuri </span>',
            acceptedFileTypes: 
            [
                'image/png',
                'image/jpeg' , 
            ],
            fileValidateTypeDetectType: (source, type) => new Promise((resolve, reject) => {
                resolve(type);
            })
        },
		 
    );
    
    FilePond.setOptions({
        server: {
            url : "{{ route('admin.file.upload') }}",
            method: 'POST',
            headers :{
               'X-CSRF-TOKEN':'{{ csrf_token() }}'
            }
        }
    });
</script>
@endpush