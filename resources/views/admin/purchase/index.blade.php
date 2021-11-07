@extends('admin.layouts.app')

@push('page_header')
Purchase Menu
@endpush

@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <form action="{{ route('admin.purchase.index') }}" method="GET">
                                    <div class="input-group">
                                        <input type="date" class="form-control" name="search">
                                        <div class="input-group-append">
                                            <input class="btn btn-success" type="submit" value="search">
                                        </div>

                                    </div>
                                </form>
                            </div>
                            <div class="col-6">
                                <a href="{{ route('admin.purchase.create') }}"
                                    class="btn btn-primary float-right">Create New
                                    purchase</a>
                            </div>
                        </div>
                    </div>
                    <!-- ./card-header -->
                    <div class="card-body">
                        @include('admin.purchase.table')
                    </div>
                    <div class="card-footer">
                        {!! $purchases->links() !!}
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