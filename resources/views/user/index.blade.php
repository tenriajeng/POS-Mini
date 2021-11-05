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

            <div class="col-lg-3 col-md-6 col-sm-6 col-12 p-2">
                <div class="card">
                    <img src="{{ asset('asset/standard_repo.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">
                            ac ut consequat semper viverra nam libero justo laoreet sit amet cursus sit
                            amet dictum
                        </p>
                    </div>
                    <div class="card-footer" style="border: none; background-color: white">
                        <div class="row justify-content-center">
                            <button class="btn btn-primary">Beli</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12 p-2">
                <div class="card">
                    <img src="{{ asset('asset/paket-advance.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">
                            ullamcorper a lacus vestibulum sed arcu non odio euismod lacinia at quis
                            risus sed vulputate odio ut enim blandit volutpat maecenas volutpat blandit aliquam etiam
                            erat velit scelerisque in dictum
                        </p>
                    </div>
                    <div class="card-footer" style="border: none; background-color: white">
                        <div class="row justify-content-center">
                            <button class="btn btn-primary">Beli</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12 p-2">
                <div class="card">
                    <img src="{{ asset('asset/paket-lifestyle.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">
                            eu augue ut lectus arcu bibendum at varius vel pharetra vel turpis nunc eget lorem dolor sed
                            viverra ipsum nunc aliquet bibendum enim facilisis gravida neque convallis a cras semper
                            auctor neque vitae tempus quam pellentesque nec nam aliquam sem et tortor consequat id porta
                            nibh venenatis cras sed felis eget velit aliquet sagittis id consectetur purus ut faucibus
                            pulvinar
                        </p>
                    </div>
                    <div class="card-footer" style="border: none; background-color: white">
                        <div class="row justify-content-center">
                            <button class="btn btn-primary">Beli</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12 p-2">
                <div class="card">
                    <img src="{{ asset('asset/paket-desktop.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">
                            urna cursus eget nunc scelerisque viverra mauris in aliquam sem fringilla ut morbi tincidunt
                            augue interdum velit euismod in pellentesque massa placerat duis ultricies lacus sed turpis
                            tincidunt id aliquet risus feugiat in ante metus dictum at tempor commodo ullamcorper a
                            lacus vestibulum sed arcu non odio euismod lacinia at quis risus sed vulputate odio ut enim
                            blandit volutpat maecenas
                        </p>
                    </div>
                    <div class="card-footer" style="border: none; background-color: white">
                        <div class="row justify-content-center">
                            <button class="btn btn-primary">Beli</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection