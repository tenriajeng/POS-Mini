@extends('admin.layouts.app')

@push('page_header')
Create supplier
@endpush

@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- ./card-header -->
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.supplier.store') }}">
                            @csrf
                            @include('admin.supplier.field')

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Save
                                    </button>
                                    <a href="{{ route('admin.supplier.index') }}" class="btn btn-danger">
                                        Back
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>
<!-- Main content -->
@endsection