<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    @include('user.layouts.style')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
    <div id="page-container">
        <div id="content-wrap">
            @include('user.layouts.navbar')
            <main class="py-4">
                @yield('content')
            </main>
        </div>
        @include('user.layouts.footer')
    </div>

    @include('sweetalert::alert')

    @include('user.layouts.script')

    @stack('page_script')

</body>

</html>