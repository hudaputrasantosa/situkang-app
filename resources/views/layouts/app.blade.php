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
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>
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
    @if (Auth::check())
        <script type="text/javascript">
            $(document).ready(function() {
                // Pusher.logToConsole = true;

                const pusher = new Pusher('3efa55baed4ff74ddd16', {
                    cluster: 'ap1'
                });
                const channel = pusher.subscribe('update-sewa');
                channel.bind('update-event', function(data) {
                    JSON.stringify(data);
                    if (data.pelanggans_id === '{{ Auth::user()->id }}') {
                        const notifElement = document.getElementById('notif');
                        let notifCount = parseInt(notifElement.innerHTML);
                        if (notifCount) {
                            notifCount++;
                            notifElement.innerHTML = notifCount;
                        } else {
                            notifElement.innerHTML = notifCount;
                        }
                    }
                });

            });
        </script>
    @endif
    @yield('js')
</body>

</html>
