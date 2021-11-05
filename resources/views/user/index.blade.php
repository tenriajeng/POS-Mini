@extends('user.layouts.app')

@section('content')
<section class="py-2">
    <div class="container-fluid">
        <div class="row justify-content-left px-3">
            <div class="col-12">
                <h3>Produk</h3>
            </div>
        </div>
    </div>
</section>

<section class="py-2">
    <div class="container-fluid">
        <div class="row justify-content-left px-4">

            <div class="col-lg-3 col-md-3 col-sm-6 col-12 p-2 ">
                <div class="card">
                    <img src="{{ asset('asset/standard_repo.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">

                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-6 col-12 p-2 ">
                <div class="card">
                    <img src="{{ asset('asset/paket-advance.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">

                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-6 col-12 p-2 ">
                <div class="card">
                    <img src="{{ asset('asset/paket-lifestyle.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">

                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-6 col-12 p-2 ">
                <div class="card">
                    <img src="{{ asset('asset/paket-desktop.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">

                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection