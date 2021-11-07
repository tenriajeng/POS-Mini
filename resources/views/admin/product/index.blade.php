@extends('admin.layouts.app')

@push('page_header')
Product Menu
@endpush

@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('admin.product.create') }}" class="btn btn-primary float-right">Create New
                            product</a>
                    </div>
                    <!-- ./card-header -->
                    <div class="card-body">
                        @include('admin.product.table')
                    </div>
                    <div class="card-footer">
                        {!! $products->links() !!}
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