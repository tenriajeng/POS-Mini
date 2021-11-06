<div class="form-group row">
    <div class="col-lg-4">
        <label>First Name</label>
        <input type="text" name="first_name" value="{{  $customer->first_name ?? old('first_name') }}"
            class="form-control @error('first_name') is-invalid @enderror" placeholder="Enter First Name">
        @error('first_name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="col-lg-4">
        <label>Last Name</label>
        <input type="text" name="last_name" value="{{  $customer->last_name ?? old('last_name') }}"
            class="form-control @error('last_name') is-invalid @enderror" placeholder="Enter Last Name">
        @error('last_name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="col-lg-4">
        <label>Email</label>
        <input type="text" name="email" value="{{  $customer->email ?? old('email') }}"
            class="form-control @error('email') is-invalid @enderror" placeholder="Enter email">
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <div class="col-lg-4">
        <label>Phone</label>
        <input type="text" name="phone" value="{{  $customer->phone ?? old('phone') }}"
            class="form-control @error('phone') is-invalid @enderror" placeholder="Enter phone">
        @error('phone')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="col-lg-4">
        <label>Address</label>
        <input type="text" name="address" value="{{  $customer->address ?? old('address') }}"
            class="form-control @error('address') is-invalid @enderror" placeholder="Enter address">
        @error('address')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="col-lg-4">
        <label>City</label>
        <input type="text" name="city" value="{{  $customer->city ?? old('city') }}"
            class="form-control @error('city') is-invalid @enderror" placeholder="Enter city">
        @error('city')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <div class="col-lg-4">
        <label>Province</label>
        <input type="text" name="province" value="{{  $customer->province ?? old('province') }}"
            class="form-control @error('province') is-invalid @enderror" placeholder="Enter province">
        @error('province')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="col-lg-4">
        <label>Country</label>
        <input type="text" name="country" value="{{  $customer->country ?? old('country') }}"
            class="form-control @error('country') is-invalid @enderror" placeholder="Enter country">
        @error('country')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="col-lg-4">
        <label>Postal Code</label>
        <input type="text" name="postal_code" value="{{  $customer->postal_code ?? old('postal_code') }}"
            class="form-control @error('postal_code') is-invalid @enderror" placeholder="Enter postal code">
        @error('postal_code')
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
    // CKEDITOR.replace('description');
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