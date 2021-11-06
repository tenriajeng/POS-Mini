@extends('admin.layouts.app')

@push('page_header')
Category Menu
@endpush

@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('admin.category.create') }}" class="btn btn-primary float-right">Create New
                            Category</a>
                    </div>
                    <!-- ./card-header -->
                    <div class="card-body">
                        @include('admin.category.table')
                    </div>
                    <div class="card-footer">
                        {!! $categories->links() !!}
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