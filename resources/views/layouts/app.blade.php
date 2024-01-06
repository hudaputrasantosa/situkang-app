<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    @yield('head-section')
    @vite(['resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/datepicker.min.js"></script>

    <link rel="stylesheet" href="{{ asset('assets/css/features.css') }}">
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>

</head>

<body class="no-scrollbar">
    <div id="app">
        @includeIf('components.navbar', ['status' => 'success'])

        {{-- <main class="py-4"> --}}
        @yield('content')
        {{-- </main> --}}
    </div>
    @include('components.footer')

    @include('sweetalert::alert')
    <script src="{{ asset('assets/jquery-3.7.1.js') }}"></script>
    @yield('js')
</body>

</html>
