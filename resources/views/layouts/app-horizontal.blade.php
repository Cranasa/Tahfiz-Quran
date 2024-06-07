<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
      @isset($title)
        {{ config('app.name') | $title}}
      @else
        {{ config('app.name') }}
      @endisset
    </title>
    <link rel="shortcut icon" href="/img/logo/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="/mazer/assets/compiled/css/app.css">
    <link rel="stylesheet" href="/mazer/assets/compiled/css/app-dark.css">

    {{-- Toastify --}}
    <link rel="stylesheet" href="/mazer/assets/extensions/toastify-js/src/toastify.css">

    {{-- Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="/customize/style.css">
    <x-css>
        @stack('css')
    </x-css>
</head>

<body>
    <script src="/mazer/assets/static/js/initTheme.js"></script>
    <div id="app">
        <div id="main" class="layout-horizontal">
            <header class="mb-5">

                <x-navbar-vertical/>

                <x-topbar/>

            </header>

            <div class="content-wrapper container">

                @yield('page-title')

                <div class="page-content">
                    <section class="row">
                        <div class="col">
                            @yield('content')
                        </div>
                    </section>
                </div>

            </div>

            <x-footer-horizontal/>

        </div>
    </div>
    <script src="/mazer/assets/static/js/components/dark.js"></script>
    <script src="/mazer/assets/static/js/pages/horizontal-layout.js"></script>
    <script src="/mazer/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="/mazer/assets/compiled/js/app.js"></script>

    {{-- Toastify --}}
    <script src="/mazer/assets/extensions/toastify-js/src/toastify.js"></script>
    @include('partials.toastify')

    <script src="/customize/script.js"></script>

    <x-js>
        @stack('js')
    </x-js>

</body>

</html>
